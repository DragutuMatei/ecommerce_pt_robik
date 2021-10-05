<!DOCTYPE html>
<html lang="en">
<?php

require_once '../core/init.php';
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/flori.css">
    <title>Pagina de admin</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://cdn.lordicon.com/libs/frhvbuzj/lord-icon-2.0.2.js"></script>

    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

</head>


<body>

    <?php
    require_once './components/navbar.php';
    ?>

    <div style="width: 100vw;height:100px;"></div>

    <!-- <figure class="snip1543">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sample108.jpg" alt="sample108" />
        <figcaption>
            <h3>Inverness McKenzie</h3>
            <p>The only skills I have the patience to learn are those that have no real application in life.</p>
        </figcaption>
        <a href="#"></a>
    </figure>
    <figure class="snip1543 hover"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sample100.jpg" alt="sample100" />
        <figcaption>
            <h3>Alan Fresco</h3>
            <p>The real fun of living wisely is that you get to be smug about it.</p>
        </figcaption>
        <a href="#"></a>
    </figure>
    <figure class="snip1543"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sample101.jpg" alt="sample101" />
        <figcaption>
            <h3>Indigo Violet</h3>
            <p>But Calvin is no kind and loving god! He's one of the old gods! He demands sacrifice! </p>
        </figcaption>
        <a href="#"></a>
    </figure> -->
    <?php


    if (Input::exists()) {

        if (Token::check(Input::get('token'))) {
            $validate = new Validation();

            $validation = $validate->check($_POST, array(
                "nume" => array(
                    'required' => true,
                ),
                "descriere" => array(
                    'required' => true,
                ),
                "pret" => array(
                    "required" => true,
                ),
                "cantitate" => array(
                    'required' => true,
                ),
            ));

            if ($validation->passed()) {
                $user = new User();

                $files = array_filter($_FILES['imagini']['name']);
                $cate_is = count($_FILES['imagini']['name']);

                $array_cu_imag = array();

                for ($i = 0; $i < $cate_is; $i++) {
                    $temporale = $_FILES['imagini']['tmp_name'][$i];

                    if ($temporale != "") {
                        $array_cu_imag[$i] = "./img/" . $_FILES['imagini']['name'][$i];
                        $newFilePath = "./img/" . $_FILES['imagini']['name'][$i];
                        move_uploaded_file($temporale, $newFilePath);
                    }
                }

                $imgs = array();
                for ($i = 0; $i < count($array_cu_imag); $i++) {
                    $imgs[$i] = $array_cu_imag[$i];
                }

                try {
                    $user->addProdus(array(
                        'produs_id' => uniqid(),
                        'nume' => Input::get("nume"),
                        'descriere' => Input::get("descriere"),
                        'pret' => Input::get("pret"),
                        'cantitate' => Input::get("cantitate"),
                        'imagini' => json_encode($imgs)
                    ));
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            } else {
                foreach ($validation->errors() as $error) {
                    echo "<h2>" . $error . "</h2><br/>";
                }
            }
        }
    }
    ?>

    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="nume">
        <textarea type="text" name="descriere"></textarea>
        <input type="number" name="pret">
        <input type="number" name="cantitate">
        <input type="file" multiple name="imagini[]">
        <input type="hidden" value="<?php echo Token::generate(); ?>" name="token">
        <button type="submit">Submit</button>
    </form>


    <main>
        <div class="flori">

            <?php
            $db = Db::getInstance();
            $flori = $db->get("flori", array("id", ">=", "1"));

            $flori = $flori->results();


            $array_cu_img = array();


            foreach ($flori as $floare) {
                $imagini = json_decode($floare->imagini, true);
                $img = $imagini[0];
                echo   "<div class='floare'>
                            <div class='effect'></div>
                            <img src='" . $img . "' alt=''>
                            <h2>" . $floare->nume . "</h2>
                            <h2 class='more' >Citeste mai mult</h2>
                            <input type='hidden' value=" . $floare->id . " />

                            <form action='delete.php' method='POST'>
                            <input type='hidden' name='id' value=" . $floare->id . " />
                            <button type='submit' name='submit'>Delete</button>
                            </form>
                        </div>";
            }
            ?>
        </div>

        <div class="openMore">
            <div class="x">
                <lord-icon src="https://cdn.lordicon.com//iiueiwdd.json" trigger="loop" colors="primary:#ff6c00,secondary:#66d7ee" stroke="100" style="width:60px;height:60px">
                </lord-icon>
            </div>
            <div class="cont">

                <div class="swiper-container idk">
                    <div class="swiper-wrapper">
                        <!-- <div class="swiper-slide">Slide 1</div>
                        <div class="swiper-slide">Slide 2</div>
                        <div class="swiper-slide">Slide 3</div> -->
                    </div>

                    <div style="color:#ff6c00" class="swiper-pagination"></div>

                    <div style="color:#ff6c00" class="swiper-button-prev"></div>
                    <div style="color:#ff6c00" class="swiper-button-next"></div>

                    <div class="swiper-scrollbar" style="color:#ff6c00"></div>
                </div>

                <h1 class="titlu"></h1>
                <div class="t" style="justify-content: space-around; width:90%">
                    <div class="t">
                        <lord-icon src="https://cdn.lordicon.com//qhviklyi.json" trigger="loop" colors="primary:#121331,secondary:#ff6c00" style="width:60px;height:60px">
                        </lord-icon>
                        <h2 class="pret"></h2>
                    </div>
                    <div class="t" style="justify-content: center;">
                        <!-- <form method="POST" action="./addToCard.php">
                             
                            <input type="hidden" name="item" class="value">

                            <button name="add"  class="more">
                                Adaugă în coș
                            </button>
                             
                        </form> -->
                        <form method="POST" action="./addToCard.php">
                            <input type="hidden" name="item" class="value">
                            <button name="add">Adaugă în coș</button>
                        </form>
                    </div>
                </div>
                <hr>
                <!-- <div class="imgs"></div> -->
                <div class="t">
                    <lord-icon src="https://cdn.lordicon.com//nocovwne.json" trigger="loop" colors="primary:#121331,secondary:#ff6c00" style="width:60px;height:60px">
                    </lord-icon>
                    <h1>Descriere</h1>
                </div>
                <hr>

                <p class="text"></p>

            </div>
        </div>
    </main>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script>
        const swiper = new Swiper('.swiper-container', {
            loop: true,

            pagination: {
                el: '.swiper-pagination',
            },

            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            scrollbar: {
                el: '.swiper-scrollbar',
            },
        });

        const mores = document.querySelectorAll(".more");
        const openMore = document.querySelector(".openMore");
        const x = document.querySelector(".x");
        const txt = document.querySelector(".text");
        const titlu = document.querySelector(".titlu");
        const imgs = document.querySelector(".swiper-wrapper");
        const pret = document.querySelector(".pret");
        let value = document.querySelector(".value");
        const button = document.querySelector(".t form button");


        const ArrayValue = [
            <?php
            foreach ($flori as $floare) {
                echo "'" . $floare->id . "', ";
            }
            ?>
        ]

        const ArrayCantitate = [
            <?php
            foreach ($flori as $floare) {
                echo "'" . $floare->cantitate . "', ";
            }
            ?>
        ];;

        document.addEventListener("keydown", closespec);

        function closespec(e) {
            if (e.which == 27) {
                close();
            }
        }

        function deleteAll() {
            txt.innerHTML = "";
            titlu.innerHTML = "";
            while (imgs.firstChild) {
                imgs.removeChild(imgs.lastChild);
            }
        }

        let deschis = false;
        let arrayDescrieri = [
            <?php
            foreach ($flori as $floare) {
                echo "'" . trim($floare->descriere) . "', ";
            }
            ?>
        ];

        let arrayTitluri = [
            <?php
            foreach ($flori as $floare) {
                echo "'" . $floare->nume . "', ";
            }
            ?>
        ];

        const ArrayImgs = [
            <?php
            foreach ($flori as $floare) {
                $imagini = json_decode($floare->imagini, true);
                echo "[ ";
                foreach ($imagini as $fl) {
                    print_r("'" . $fl . "', ");
                }
                echo " ], ";
            }
            ?>
        ];

        const ArrayPret = [
            <?php
            foreach ($flori as $floare) {
                echo "'" . strval($floare->pret) . "', ";
            }
            ?>
        ]


        // document.querySelectorAll('.button').forEach(button => button.addEventListener('click', e => {
        //     if (!button.classList.contains('loading')) {
        //         close();
        //         button.classList.add('loading');

        //         setTimeout(() => button.classList.remove('loading'), 3700);
        //     }

        //     e.preventDefault();
        // }));


        let a = true;

        for (let i = 0; i < mores.length; i -= -1) {
            let more = mores[i];
            more.addEventListener("click", () => {
                deleteAll();

                if (a) {
                    document.querySelector("html").style.overflowY = "hidden";
                    a = !a;
                }
                mare(arrayTitluri[i], arrayDescrieri[i], ArrayImgs[i], ArrayCantitate[i], ArrayPret[i], ArrayValue[i]);
            });
        }

        x.addEventListener("click", close);

        function mare(tit_string, txt_string, imgsArr, cantitate, pret_int, value_id) {


            if (cantitate > 0) {
                openMore.style.display = "flex";
                titlu.innerHTML = tit_string;
                txt.innerHTML = txt_string;
                pret.innerHTML = pret_int + " RON";
                value.value = value_id;

                for (let i = 0; i < imgsArr.length; i++) {
                    let img = document.createElement("img");
                    img.setAttribute("src", imgsArr[i]);
                    imgs.appendChild(img);
                    img.classList = "swiper-slide";
                }
                button.disabled = false;

            } else {
                openMore.style.display = "flex";
                titlu.innerHTML = tit_string;
                txt.innerHTML = txt_string;
                pret.innerHTML = pret_int + " RON";
                value.value = value_id;

                for (let i = 0; i < imgsArr.length; i++) {
                    let img = document.createElement("img");
                    img.setAttribute("src", imgsArr[i]);

                    imgs.appendChild(img);
                }
                button.disabled = true;
            }
        }

        function close() {
            document.querySelector("html").style.overflowY = "scroll";
            a = !a;
            openMore.style.display = "none";
            deleteAll();
        }
    </script>


</body>

</html>
<!-- <script>
    /* Demo purposes only */
    $(".hover").mouseleave(
        function() {
            $(this).removeClass("hover");
        }
    );
</script> -->

<style>
    @import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro);
    @import url(https://fonts.googleapis.com/css?family=Teko:700);

    .snip1543 {
        background-color: #fff;
        color: #ffffff;
        font-family: 'Source Sans Pro', sans-serif;
        font-size: 16px;
        margin: 10px;
        max-width: 315px;
        min-width: 230px;
        overflow: hidden;
        position: relative;
        text-align: left;
        width: 100%;
        -webkit-transform: translateZ(0);
        transform: translateZ(0);
    }

    .snip1543 *,
    .snip1543 *:before,
    .snip1543 *:after {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        -webkit-transition: all 0.45s ease;
        transition: all 0.45s ease;
    }

    .snip1543 img {
        backface-visibility: hidden;
        max-width: 100%;
        vertical-align: top;
    }

    .snip1543:before,
    .snip1543:after {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        content: '';
        background-color: #b81212;
        opacity: 0.5;
        -webkit-transition: all 0.45s ease;
        transition: all 0.45s ease;
    }

    .snip1543:before {
        -webkit-transform: skew(30deg) translateX(-80%);
        transform: skew(30deg) translateX(-80%);
    }

    .snip1543:after {
        -webkit-transform: skew(-30deg) translateX(-70%);
        transform: skew(-30deg) translateX(-70%);
    }

    .snip1543 figcaption {
        position: absolute;
        top: 0px;
        bottom: 0px;
        left: 0px;
        right: 0px;
        z-index: 1;
        bottom: 0;
        padding: 25px 40% 25px 20px;
    }

    .snip1543 figcaption:before,
    .snip1543 figcaption:after {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: #b81212;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.7);
        content: '';
        opacity: 0.5;
        z-index: -1;
    }

    .snip1543 figcaption:before {
        -webkit-transform: skew(30deg) translateX(-100%);
        transform: skew(30deg) translateX(-100%);
    }

    .snip1543 figcaption:after {
        -webkit-transform: skew(-30deg) translateX(-90%);
        transform: skew(-30deg) translateX(-90%);
    }

    .snip1543 h3,
    .snip1543 p {
        margin: 0;
        opacity: 0;
        letter-spacing: 1px;
    }

    .snip1543 h3 {
        font-family: 'Teko', sans-serif;
        font-size: 36px;
        font-weight: 700;
        line-height: 1em;
        text-transform: uppercase;
    }

    .snip1543 p {
        font-size: 0.9em;
    }

    .snip1543 a {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 1;
    }

    .snip1543:hover h3,
    .snip1543.hover h3,
    .snip1543:hover p,
    .snip1543.hover p {
        -webkit-transform: translateY(0);
        transform: translateY(0);
        opacity: 0.9;
        -webkit-transition-delay: 0.2s;
        transition-delay: 0.2s;
    }

    .snip1543:hover:before,
    .snip1543.hover:before {
        -webkit-transform: skew(30deg) translateX(-20%);
        transform: skew(30deg) translateX(-20%);
        -webkit-transition-delay: 0.05s;
        transition-delay: 0.05s;
    }

    .snip1543:hover:after,
    .snip1543.hover:after {
        -webkit-transform: skew(-30deg) translateX(-10%);
        transform: skew(-30deg) translateX(-10%);
    }

    .snip1543:hover figcaption:before,
    .snip1543.hover figcaption:before {
        -webkit-transform: skew(30deg) translateX(-40%);
        transform: skew(30deg) translateX(-40%);
        -webkit-transition-delay: 0.15s;
        transition-delay: 0.15s;
    }

    .snip1543:hover figcaption:after,
    .snip1543.hover figcaption:after {
        -webkit-transform: skew(-30deg) translateX(-30%);
        transform: skew(-30deg) translateX(-30%);
        -webkit-transition-delay: 0.1s;
        transition-delay: 0.1s;
    }
</style>