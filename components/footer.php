<script src="https://kit.fontawesome.com/2647a8e79d.js" crossorigin="anonymous"></script>

<footer>
    <div class="up">
        <div class="leftFooter">
            <div class="linie">
                <lord-icon src="https://cdn.lordicon.com//zzcjjxew.json" trigger="loop" colors="primary:#121331,secondary:#ff6c00" style="width:60px;height:60px">
                </lord-icon>
                <p>Adresa lui robert</p>
            </div>
            <div class="linie">
                <lord-icon src="https://cdn.lordicon.com//hciqteio.json" trigger="loop" colors="primary:#121331,secondary:#ff6c00" style="width:60px;height:60px">
                </lord-icon>
                <p> Seriozitate și întelegere </p>
            </div>
            <div class="linie">
                <lord-icon src="https://cdn.lordicon.com//rhvddzym.json" trigger="loop" colors="primary:#121331,secondary:#ff6c00" style="width:60px;height:60px">
                </lord-icon>
                <p> Eficiență și încredere </p>
            </div>
        </div>
        <div class="centerFooter">
            <a href="https://www.facebook.com/robert.adrian.1690" target="blank" class="social">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="https://www.instagram.com/punktuletz/" target="blank" class="social">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="mailto: robert.chischop43@gmail.com" target="blank" class="social">
                <i class="far fa-envelope"></i>
            </a>
            <a href="tel:0765913099" target="blank" class="social">
                <i class="fas fa-phone"></i>
            </a>
        </div>
        <div class="leftFooter">
            <div class="linie">
                <a href="./">Acasă</a>
            </div>
            <div class="linie">
                <a href="./#contact">Despre Noi</a>
            </div>
            <div class="linie">
                <a href="./figurine.php">Figurine</a>
            </div>

            <?php
            $user = new User();
            if (!$user->isLoggedIn()) {
                echo '
                <div class="linie">
                    <a href="./register.php">Înregistrează-te</a>
                </div>
                <div class="linie">
                    <a href="./login.php">Intră în cont</a>
                </div>

                ';
            }
            ?>
        </div>
    </div>
    <div class="down">
        <a>termeni si conditii</a>
        <h2> © 2021 Punktuletz | All rights reserved</h2>
    </div>
</footer>
<!-- site facut de Dragutu Matei 
        fb: https://www.facebook.com/dragutu.matei/
        insta: https://www.instagram.com/dragutumatei/
    -->