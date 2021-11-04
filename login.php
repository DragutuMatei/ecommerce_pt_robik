<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="./img/idk.svg">
    <title>Magazin</title>
    <link rel="stylesheet" href="./style/login.css">
    <script src="https://cdn.lordicon.com/libs/frhvbuzj/lord-icon-2.0.2.js"></script>
</head>

<body>
    <?php
    require_once './core/init.php';

    require './components/navbar.php'
    ?>

    <main>
        <section class="loginAll">
            <div class="hero">
                <h1>Loghează-te</h1>
            </div>



            <form method="POST" action="apilogin.php">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="parola" placeholder="Parola">
                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                <button type="submit">Login</button>
                <p>Nu ai cont? <a href="./register.php">Înregistrează-te</a></p>

                <?php
               
               foreach ($_GET as $errors) {
                    echo $errors . "<br>";
                }

                ?>
            </form>
        </section>
    </main>

    <?php
    require './components/footer.php';
    require_once './components/imports.php';
    ?>
</body>

</html>