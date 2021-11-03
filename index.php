<?php
require_once './core/init.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magazin</title>
    <link rel="stylesheet" href="./style/landingPage.css">
    <script src="https://cdn.lordicon.com/libs/frhvbuzj/lord-icon-2.0.2.js"></script>
    <link rel="icon" type="image/svg+xml" href="./img/idk.svg">

</head>

<body>

    <?php
    // require './components/loading.php'
    ?>

    <?php
    require './components/navbar.php';
    ?>
    <main>

        <section class="firstPage">
            <div class="content">
                <div class="txtCenter">
                    <h1>Bun venit la atelierul de creatie <br><span>Punktuletz</span> </h1>
                    <!-- <p>NU UITA SA PUI PRETU CA DECIMAL IN BAZA DE DATE
                    </p> -->
                </div>
                <div class="log">
                    <!-- <img src="./img/idk.svg" alt=""> -->
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="51.463px" height="51.463px" viewBox="0 0 51.463 51.463" style="enable-background:new 0 0 51.463 51.463;" xml:space="preserve">
                        <g>
                            <g>
                                <path fill="#222222" d="M24.832,22.621V33.15c0.903,0.114,2.122,0.204,3.747,0.204c2.96,0,5.373-0.7,6.889-2.079
                    c1.448-1.311,2.372-3.343,2.372-6.051c0-2.598-0.905-4.407-2.372-5.603c-1.398-1.175-3.363-1.764-6.209-1.764l-4.427,0.038v2.167
                    l4.672-0.034c3.479,0,5.422,1.919,5.397,5.284c0,3.864-2.145,5.85-5.756,5.828c-0.566,0-1.15,0-1.537-0.067v-8.453H24.832z" />
                                <path fill="#222222" d="M18.118,31.155c-1.451,0-2.874-0.584-3.459-0.936l-0.654,2.175c0.819,0.536,2.408,1.048,4.254,1.048
                    c3.76,0,5.909-2.029,5.909-4.601c0-2.056-1.494-3.458-3.34-3.784v-0.047c1.867-0.657,2.801-1.962,2.801-3.553
                    c0-1.987-1.61-3.715-4.741-3.715c-1.822,0-3.506,0.562-4.369,1.17l0.655,2.078c0.63-0.421,1.867-0.96,3.104-0.96
                    c1.66,0,2.435,0.866,2.435,1.896c0,1.519-1.681,2.126-3.016,2.126h-1.283v2.104h1.332c1.748,0,3.429,0.771,3.429,2.568
                    C21.204,29.918,20.313,31.155,18.118,31.155z" />
                                <path fill="#222222" d="M8.832,11.011l8.335,2.675c0.059,0.084,0.153,0.137,0.256,0.137c0.032,0,0.065-0.005,0.098-0.017l0.011-0.003l7.917,2.541
                    c0.03,0.01,0.063,0.015,0.095,0.015c0.031,0,0.063-0.005,0.094-0.015l7.6-2.438c0.007,0,0.013,0.003,0.02,0.003
                    c0.071,0,0.141-0.026,0.194-0.071L50.16,8.475c0.129-0.041,0.216-0.161,0.216-0.295c0-0.135-0.087-0.255-0.216-0.296L25.636,0.015
                    c-0.061-0.02-0.127-0.02-0.188,0L0.926,7.883C0.798,7.924,0.71,8.044,0.71,8.179s0.088,0.254,0.216,0.295L8.832,11.011
                    C8.831,11.011,8.831,11.011,8.832,11.011z M17.527,13.149l-7.605-2.44l7.012-2.352l7.378,2.518L17.527,13.149z M17.903,8.032
                    l7.534-2.525l7.462,2.488l-7.619,2.555L17.903,8.032z M25.543,15.722l-7.018-2.252l6.755-2.264l6.95,2.371L25.543,15.722z
                    M33.22,13.258l-6.971-2.378l7.631-2.559l7.221,2.407L33.22,13.258z M41.513,5.761l7.534,2.418l-6.978,2.239
                    c-0.025-0.02-0.053-0.038-0.084-0.048l-7.127-2.376l6.646-2.229C41.507,5.765,41.51,5.762,41.513,5.761z M40.517,5.441
                    l-6.638,2.226l-7.463-2.488l6.496-2.178L40.517,5.441z M25.543,0.636l6.371,2.044l-6.478,2.172l-6.391-2.131L25.543,0.636z
                    M18.053,3.039c0.009,0.004,0.017,0.012,0.026,0.016l6.378,2.126l-7.523,2.522l-6.501-2.219L18.053,3.039z M9.479,5.791
                    c0.029,0.024,0.063,0.046,0.103,0.06l6.383,2.177l-7.041,2.361L2.037,8.18L9.479,5.791z" />
                                <path fill="#222222" d="M50.54,42.987l-24.521-8.006c-0.063-0.021-0.13-0.021-0.193,0L1.304,42.987c-0.128,0.042-0.214,0.162-0.214,0.296
                    c0,0.136,0.088,0.255,0.216,0.296l7.693,2.469c0.023,0.011,0.047,0.019,0.072,0.022l16.756,5.377
                    c0.03,0.011,0.063,0.016,0.094,0.016c0.032,0,0.064-0.005,0.095-0.016l24.521-7.868c0.128-0.041,0.215-0.16,0.216-0.296
                    C50.753,43.148,50.667,43.029,50.54,42.987z M33.254,37.998l7.562,2.469l-6.733,2.284l-7.485-2.511l6.615-2.218
                    C33.228,38.017,33.239,38.005,33.254,37.998z M33.11,43.079l-7.354,2.494l-7.555-2.519l7.419-2.487L33.11,43.079z M25.921,35.604
                    l6.357,2.076l-6.659,2.233l-6.363-2.134L25.921,35.604z M18.271,38.102c0.004,0.002,0.008,0.005,0.012,0.006l6.359,2.132
                    l-7.421,2.488l-6.493-2.164L18.271,38.102z M2.409,43.28l7.341-2.396c0.014,0.007,0.023,0.017,0.037,0.021l6.455,2.152
                    l-7.105,2.382L2.409,43.28z M10.134,45.76l7.088-2.376l7.561,2.521l-6.904,2.342L10.134,45.76z M25.921,50.825l-7.049-2.262
                    l6.885-2.335l7.105,2.37L25.921,50.825z M33.81,48.295c-0.033-0.033-0.07-0.061-0.117-0.075l-6.961-2.321l7.352-2.494l7.316,2.454
                    L33.81,48.295z M42.399,45.539l-7.346-2.464l6.655-2.257c0.024-0.008,0.045-0.024,0.065-0.039l7.66,2.5L42.399,45.539z" />
                                <path fill="#222222" d="M1.09,10.664v29.175c0,0.171,0.139,0.311,0.31,0.311c0.173,0,0.312-0.139,0.312-0.311V10.664
                    c0-0.171-0.139-0.311-0.312-0.311C1.229,10.354,1.09,10.493,1.09,10.664z" />
                                <path fill="#222222" d="M9.276,13.893V36.61c0,0.146,0.118,0.265,0.265,0.265c0.146,0,0.264-0.118,0.264-0.265V13.893
                    c0-0.146-0.118-0.265-0.264-0.265C9.394,13.628,9.276,13.746,9.276,13.893z" />
                                <path fill="#222222" d="M49.86,10.421c-0.172,0-0.311,0.139-0.311,0.311v29.175c0,0.173,0.139,0.312,0.311,0.312s0.312-0.139,0.312-0.312V10.731
                    C50.171,10.561,50.032,10.421,49.86,10.421z" />
                                <path fill="#222222" d="M41.458,13.96v22.719c0,0.146,0.118,0.265,0.266,0.265c0.146,0,0.264-0.119,0.264-0.265V13.96
                    c0-0.146-0.118-0.265-0.264-0.265C41.576,13.695,41.458,13.813,41.458,13.96z" />
                            </g>
                        </g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                    </svg>
                </div>
            </div>
        </section>

        <section class="advatiges">
            <div class="adva">
                <lord-icon src="https://cdn.lordicon.com//ribdawhq.json" trigger="loop" colors="primary:#ff6a00,secondary:#0e121b" style="width:200px;height:200px">
                </lord-icon>
                <h1>flori proaspete</h1>
                <p>Lorem ipsum dolor sit amet, glhaf gjsfdlhg lk flkshfdl hsfdlkhfldh glksd fgoh sfdod gsoh bosikjahd k
                    sdconsectetur adipisicing elit. Sit molestias dignissimos alias maxime in
                    eius possimus earum.</p>
            </div>
            <div class="adva">
                <lord-icon src="https://cdn.lordicon.com//yeallgsa.json" trigger="loop" colors="primary:#121331,secondary:#ff6a00" style="width:200px;height:200px">
                </lord-icon>
                <h1>flori proaspete</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit molestias dignissimos alias maxime in
                    eius possimus earum.</p>
            </div>
            <div class="adva">
                <lord-icon src="https://cdn.lordicon.com//uetqnvvg.json" trigger="loop" colors="primary:#121331,secondary:#ff6a00" style="width:200px;height:200px">
                </lord-icon>
                <h1>flori proaspete</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit molestias dignissimos alias maxime in
                    eius possimus earum.</p>
            </div>
            <div class="adva">
                <lord-icon src="https://cdn.lordicon.com//kbtmbyzy.json" trigger="loop" colors="primary:#121331,secondary:#ff6a00" style="width:200px;height:200px">
                </lord-icon>
                <h1>flori proaspete</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit molestias dignissimos alias maxime in
                    eius possimus earum.</p>
            </div>
        </section>
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
                        <button type="submit" name="mail">Trimite mesaj</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <?php
    require './components/footer.php';

    require_once './components/imports.php';
    ?>
</body>

</html>