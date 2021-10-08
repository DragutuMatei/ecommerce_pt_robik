<?php
require_once './core/init.php';

if(isset($_POST['submit'])){
    try{
        $comanda = new Comanda();
        $comanda->deleteComanda(Input::get("id"));
        Redirect::to("admin.php");
    } catch(Exception $e){
        echo $e->getMessage();
    }
}

