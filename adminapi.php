<?php

require_once './core/init.php';

if (isset($_POST['submit'])) {

    $parola = "parola";
    if (trim(Input::get("password")) == $parola) {
        Session::put("adminSession", "true");
        Redirect::to("admin.php");
    } else {
        Redirect::to("admini.php?nu=true");
    }
}
