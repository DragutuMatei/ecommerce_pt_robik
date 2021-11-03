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
            <a href="https://www.facebook.com/florariadelaparc/" target="blank" class="social">
                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="white">
                    <rect fill="none" height="24" width="24" />
                    <path d="M22,12c0-5.52-4.48-10-10-10S2,6.48,2,12c0,4.84,3.44,8.87,8,9.8V15H8v-3h2V9.5C10,7.57,11.57,6,13.5,6H16v3h-2 c-0.55,0-1,0.45-1,1v2h3v3h-3v6.95C18.05,21.45,22,17.19,22,12z" />
                </svg>
            </a>
            <a href="https://www.instagram.com/florariadelaparc/" target="blank" class="social">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="white" d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                </svg>
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
        <h2>Copyright ©2021 Florăria de la parc | All rights reserved</h2>
    </div>
</footer>
<!-- site facut de Dragutu Matei 
        fb: https://www.facebook.com/dragutu.matei/
        insta: https://www.instagram.com/dragutumatei/
    -->