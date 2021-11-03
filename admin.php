<!DOCTYPE html>
<html lang="en">
<?php

require_once './core/init.php';

if (!Session::exists("adminSession")) {
    Redirect::to("admini.php");
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/flori.css">
    <title>Pagina de admin</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://cdn.lordicon.com/libs/frhvbuzj/lord-icon-2.0.2.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

</head>


<body>

    <?php
    require_once './components/navbar.php';
    ?>

    <div style="width: 100vw;height:100px;"></div>
    <form method="POST" action="addAdmin.php" enctype="multipart/form-data">
        <h1>NU SCRIE CU "?" SAU EMOTICOANE SAU CU " SAU '</h1>

        <div class="mb-3">
            <label for="nume" class="form-label">Scrie numele produsului</label>
            <input type="text" class="form-control" name="nume">
        </div>
        <div class="mb-3">
            <label for="descriere" class="form-label">Scrie descrierea produsului</label>
            <textarea type="text" name="descriere" class="form-control"></textarea>

        </div>
        <div class="mb-3">
            <label for="pret" class="form-label">Scrie pretul produsului</label>
            <input type="number" step=".01" class="form-control" name="pret">


        </div>
        <div class="mb-3">
            <label for="cantitate" class="form-label">Scrie ce cantitate ai momentan la acest produs</label>
            <input type="number" class="form-control" name="cantitate">

        </div>
        <div class="mb-3">
            <label for="imagini" class="form-label">Pune cate poze vrei pentru produs</label>
            <input type="file" class="form-control" multiple name="imagini[]">

        </div>

        <input type="hidden" value="<?php echo Token::generate(); ?>" name="token" />

        <button class="btn btn-primary mb-3" type="submit">Submit</button>
    </form>


    <main class="admin">
        <div class="flori">

            <?php
            $db = Db::getInstance();
            $produse = $db->get("produse", array("id", ">=", "1"));

            $produse = $produse->results();
            $array_cu_img = array();


            foreach ($produse as $floare) {
                $imagini = json_decode($floare->imagini, true);
                $img = $imagini[0];
                echo   "<div class='floare'>
                            <div class='effect'></div>
                            <img src='" . $img . "' alt=''>
                            <h2>" . $floare->nume . "</h2>
                            <h2>" . $floare->cantitate . " de produse ramase</h2>
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

        <div class="idk">
            <h1 id="com" style="user-select: none;">Vezi comenzile</h1>
            <div class="comenzi" style="display: flex; flex-direction:column-reverse;  ">
                <?php
                $comanda = new Comanda();
                $comenzi = $comanda->getComenzi();

                foreach ($comenzi as $com) {
                    $produse = [];
                    $db = Db::getInstance();

                    $user = $db->get("users", array("id", "=", $com->user));
                    $user = $user->getFirst();

                    $ids = json_decode($com->ids, true);
                    $qts = json_decode($com->qt, true);


                    foreach ($ids as $id) {
                        $produs = $db->get("produse", array("id", "=", $id));
                        $produs = $produs->getFirst();

                        array_push($produse, $produs);
                    }

                    echo '
                    <div class="comanda" style="margin:0 50px" ><div class="produse" >';

                    $i = 0;
                    $total = 10;
                    foreach ($produse as $produs) {
                        $prett =  floatval($produs->pret) * intval($qts[$i]);
                        echo "<h6>" . $produs->nume . " - " . $prett . " RON - " . intval($qts[$i]) . " bucati</h6>";
                        $i++;
                        $total += $prett;
                    }

                    echo '
                </div>
                    <hr>
                        <p>' . $com->note . '</p>
                        <hr>
                        <p>Total: ' . $total . ' RON</p>
                        <div class="user">
                        <h2>email & telefon: ' . $user->email . ' | ' . $user->telefon . ' </h2>
                        <h2> validare: ' . $com->confirm . '</h2>
                        </div>
                        <form action="deleteComanda.php" method="POST">
                            <input type="hidden" name="id" value="' . $com->id . '" />
                            <input type="submit" name="submit" value="Delete comanda" />
                        </form>
                    </div>';
                }

                ?>
            </div>
        </div>

        <div class="idk">

            <h1 id="maila">Vezi mailuri</h1>

            <div class="mailuri">
                <?php

                $mail = new Mail();

                $mailuri = $mail->getEmail();

                foreach ($mailuri as $mails) {
                    echo '
                    <div class="mail" style="margin:0 50px">
                        <h2>' . $mails->nume . '</h2>
                        <a href="mailto:' . $mails->email . '">' . $mails->email . '</a>
                        <a href="tel:' . $mails->tel . '">' . $mails->tel . '</a>
                        <p>' . $mails->text . '</p>
                        <form action="deleteMail.php" method="POST">
                            <input type="hidden" name="token" value="' . Token::generate() . '" />
                            <input type="hidden" name="id" value="' . $mails->id . '" >
                            <input type="submit" name="submit" value="Delete mail" />
                        </form>
                    </div>
                    <hr>';
                }

                ?>

            </div>
        </div>

        <script>
            const com = document.querySelector("#com");
            const comenzi = document.querySelector(".comenzi");


            const mail = document.querySelector("#maila");
            const mailuri = document.querySelector(".mailuri");

            let di = false;
            let dd = false;

            const toogledi = () => {
                di ? comenzi.style.height = "auto" : comenzi.style.height = 0;
                di = !di;
            }

            const toogledd = () => {
                dd ? mailuri.style.height = "auto" : mailuri.style.height = 0;
                dd = !dd;
            }

            toogledi();
            toogledd();

            com.addEventListener("click", () => {
                toogledi();
            });
            mail.addEventListener("click", () => {
                toogledd();
            });
        </script>

    </main>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script>
        const swiper = new Swiper('.swiper-container', {
            loop: false,

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
            foreach ($produse as $floare) {
                echo "'" . $floare->id . "', ";
            }
            ?>
        ]

        const ArrayCantitate = [
            <?php
            foreach ($produse as $floare) {
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
            foreach ($produse as $floare) {
                echo "'" . trim($floare->descriere) . "', ";
            }
            ?>
        ];

        let arrayTitluri = [
            <?php
            foreach ($produse as $floare) {
                echo "'" . $floare->nume . "', ";
            }
            ?>
        ];

        const ArrayImgs = [
            <?php
            foreach ($produse as $floare) {
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
            foreach ($produse as $floare) {
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
                if (value)
                    value.value = value_id;

                for (let i = 0; i < imgsArr.length; i++) {
                    let img = document.createElement("img");
                    img.setAttribute("src", imgsArr[i]);
                    imgs.appendChild(img);
                    img.classList = "swiper-slide";
                }
                if (button) button.disabled = false;
            } else {
                openMore.style.display = "flex";
                titlu.innerHTML = tit_string;
                txt.innerHTML = txt_string;
                pret.innerHTML = pret_int + " RON";
                if (value.value)
                    // console.log("ASdasdasdasd");
                    value.value = value_id;

                for (let i = 0; i < imgsArr.length; i++) {
                    let img = document.createElement("img");
                    img.setAttribute("src", imgsArr[i]);
                    imgs.appendChild(img);
                    img.classList = "swiper-slide";
                }
                if (button) button.disabled = true;
            }

            // if (cantitate > 0) {
            //     openMore.style.display = "flex";
            //     titlu.innerHTML = tit_string;
            //     txt.innerHTML = txt_string;
            //     pret.innerHTML = pret_int + " RON";
            //     value.value = value_id;

            //     for (let i = 0; i < imgsArr.length; i++) {
            //         let img = document.createElement("img");
            //         img.setAttribute("src", imgsArr[i]);
            //         imgs.appendChild(img);
            //         img.classList = "swiper-slide";
            //     }
            //     button.disabled = false;

            // } else {
            //     openMore.style.display = "flex";
            //     titlu.innerHTML = tit_string;
            //     txt.innerHTML = txt_string;
            //     pret.innerHTML = pret_int + " RON";
            //     value.value = value_id;

            //     for (let i = 0; i < imgsArr.length; i++) {
            //         let img = document.createElement("img");
            //         img.setAttribute("src", imgsArr[i]);

            //         imgs.appendChild(img);
            //     }
            //     button.disabled = true;
            // }
        }

        function close() {
            document.querySelector("html").style.overflowY = "scroll";
            a = !a;
            openMore.style.display = "none";
            deleteAll();
        }
    </script>

    <?php
    require './components/footer.php';

    require_once './components/imports.php';
    ?>
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