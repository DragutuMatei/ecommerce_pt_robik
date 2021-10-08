<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="./img/idk.svg">
    <title>Magazin</title>

    <link rel="stylesheet" href="./style/flori.css">
    <script src="https://cdn.lordicon.com/libs/frhvbuzj/lord-icon-2.0.2.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDyJjeynZiCrmE-tRu6TlCdhTNyMe9ghIo&callback=initMap&libraries=&v=weekly" defer></script>
    <link rel="stylesheet" href="./style/landingPage.css">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

</head>

<body>
    <?php
    require_once './core/init.php';

    ?>

    <?php
    require './components/navbar.php'
    ?>


    <main>
        <div class="headerFlori">
            <div class="layer"></div>
            <div class="incadrare">
                <h1>cele mai blana flori furate <br /> la tigani</h1>
            </div>
        </div>
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
                        <?php
                        $user = new User();
                        if ($user->isLoggedIn()) {
                            echo '
                          
                        <form method="POST" action="./AddToCard.php">
                        <input type="hidden" name="item" class="value">
                        <button name="add">Adaugă în coș</button>
                    </form>      ';
                        } else {
                            echo '
                            
                        <a href="login.php">Loghează-te ca să adaugi în coș</a>
                     ';
                        }
                        ?>
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
        <section class="mapa" id='contact'>
            <div class="content" style="flex-wrap: nowrap; width:100vw; justify-content: space-around;">
                <div class="txt">
                    <form action="mail.php" method="POST">
                        <h2>Pentru sugestii, ne puteti contacta prin formularul de mai jos</h2>
                        <div class="row">
                            <input type="text" name="nume" placeholder="Nume" required>
                            <input type="text" name="prenume" placeholder="Prenume" required>
                        </div>
                        <div class="row">
                            <input type="email" name="email" placeholder="Email" required>
                            <input type="tel" name="tel" autocomplete="tel" placeholder="Număr de telefon" required>
                        </div>
                        <textarea name="text" cols="30" rows="10" placeholder="Scrie un mesaj"></textarea>
                        <button type="submit" name="mail">Trimite comanda și așteaptă mesajul meu</button>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


    <script>
        const swiper = new Swiper('.swiper-container', {
            // Optional parameters
            // direction: 'vertical',
            loop: true,

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // And if we need scrollbar
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

    <?php
    require_once './components/footer.php';
    require_once './components/imports.php';
    ?>
</body>

</html>