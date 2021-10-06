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
                Redirect::to("login.php?er=Email sau parola introdusa gresit");
            }

        } else {
            
            if (count($validate->errors())) {
                $er = "?";
                $index = 0;
                foreach ($validate->errors() as $error) {
                    $er .= "er" . $index . "=" . $error . "?";
                }
                Redirect::to("login.php".$er);
            }
        }
    }
}
