<?php
require_once '../core/init.php';
$user = new User();

if ($user->isLoggedIn()) {
    Redirect::to("index.php");
}
$validate = new Validation();

if (Input::exists()) {
    if (Token::check(Input::get("token"))) {
        $validation = $validate->check($_POST, array(
            'email' => array(
                'required' => true,
            ),
            'parola' => array(
                'required' => true,
                'min' => 6,
            )
        ));

        if ($validation->passed()) {
            $login = $user->login(Input::get("email"), Input::get("parola"));
            $user->login(Input::get("email"), Input::get("parola"));

            if ($login) {
                Redirect::to('index.php');
            } else {
                Session::flash("ghinion", "Parola sau email gresit");
            }
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
    <title>Florarie</title>
    <link rel="stylesheet" href="./style/login.css">
    <script src="https://cdn.lordicon.com/libs/frhvbuzj/lord-icon-2.0.2.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDyJjeynZiCrmE-tRu6TlCdhTNyMe9ghIo&callback=initMap&libraries=&v=weekly" defer>
    </script>
</head>

<body> 
    <?php
    require './components/navbar.php'
    ?>

    <main>
        <section class="loginAll">
            <div class="hero">
                <h1>Înregistrează-te</h1>
            </div>



            <form method="POST">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="parola" placeholder="Parola">
                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                <button type="submit">Login</button>
                <p>Nu ai cont? <a href="./register.php">Înregistrează-te</a></p>
                <?php
                
                if(count($validate->errors())){
                    foreach ($validate->errors() as $error) {
                        echo "<h2>" . $error . "</h2><br/>";
                    }
                }
                if(Session::exists("ghinion")){
                    echo Session::get("ghinion");
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