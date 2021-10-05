<?php
require_once '../core/init.php';
if (isset($_POST['submit'])) {
    $user = $_POST['user'];
    $id = $_POST['id'];
    $qt = $_POST['qt'];

    $_SESSION["qty"][$user][$id] = $qt;

    Redirect::to("cos.php");
    echo "asdas";
}
