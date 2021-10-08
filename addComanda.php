<?php
require_once './core/init.php';


if (isset($_POST['submit'])) {
    $array_ids = [];
    for ($i = 0; $i < Input::get("total"); $i++) {
        array_push($array_ids, Input::get("produse{$i}"));
    }

    $array_qt = [];
    for ($i = 0; $i < Input::get("total"); $i++) {
        array_push($array_qt, Input::get("qt{$i}"));
    }

    $comanda = new Comanda();

    try {
        $comanda->addComanda(array(
            "ids" => json_encode($array_ids),
            "qt" => json_encode($array_qt),
            "note" => Input::get("note"),
            "confirm" => Input::get("confirm"),
            "user" => Session::get(Config::get('session/session_name'))
        ));
        Cos::DeleteAll();
        Redirect::to("cos.php?send='success'");
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
