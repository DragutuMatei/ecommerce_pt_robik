<?php
require_once './core/init.php';

$user = new User();

if ($user->isLoggedIn()) {
    Redirect::to("index.php");
}
$validate = new Validation();

if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        $validation = $validate->check($_POST, array(
            'nume' => array(
                'required' => true,
            ),
            'email' => array(
                'required' => true,
                'unique' => 'users',
            ),
            'parola1' => array(
                'required' => true,
                'min' => 5,
            ),
            'parola2' => array(
                'required' => true,
                'min' => 5,
                'matches' => 'parola1',
            ),
        ));

        if ($validation->passed()) {
            $user = new User();
            $salt = time();

            try {
                $user->create(array(
                    'nume' => Input::get('nume'),
                    'email' => Input::get('email'),
                    'telefon' => Input::get('telefon'),
                    'parola' => hash("sha256", Input::get("parola1") . $salt),
                    'salt' => $salt,
                ));
            } catch (Exception $e) {
                die($e->getMessage());
            }
            Redirect::to("login.php");
        } else {
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magazin</title>
    <link rel="icon" type="image/svg+xml" href="./img/idk.svg">

    <link rel="stylesheet" href="./style/login.css">
    <script src="https://cdn.lordicon.com/libs/frhvbuzj/lord-icon-2.0.2.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDyJjeynZiCrmE-tRu6TlCdhTNyMe9ghIo&callback=initMap&libraries=&v=weekly" defer>
    </script>
</head>

<body>
    <?php
    require './components/navbar.php';
    ?>

    <main>
        <section class="loginAll">
            <div class="hero">
                <h1>Înregistrează-te</h1>
            </div>
            <form method="POST">
                <input type="text" name="nume" placeholder="Nume">
                <input type="email" name="email" placeholder="Email">
                <input type="tel" name="telefon" placeholder="Număr de telefon">
                <input type="password" name="parola1" placeholder="Parola">
                <input type="password" name="parola2" placeholder="Parola">
                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                <button type="submit">Register</button>
                <p>Ai cont? <a href="./login.php">Loghează-te</a></p>
                <?php
                if (count($validate->errors())) {
                    foreach ($validate->errors() as $error) {
                        echo "<h2>" . $error . "</h2><br/>";
                    }
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