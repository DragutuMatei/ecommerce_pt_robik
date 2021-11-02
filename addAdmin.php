<?php

require_once './core/init.php';

if (Input::exists()) {

    // if (Token::check(Input::get('token'))) {
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
            echo "./img/" . $_FILES['imagini']['name'][$i] . "<br>";

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
            // Redirect::to("admin.php");
        } catch (Exception $e) {
            die($e->getMessage());
        }
    } else {
        foreach ($validation->errors() as $error) {
            echo "<h2>" . $error . "</h2><br/>";
        }
    }
    // } else {
    //     echo "nu merge, ca ai gresit ceva!";
    // }
}
