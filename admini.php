<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
</head>

<body>

    <?php
    require_once './core/init.php';
    if (isset($_GET['nu']) && $_GET['nu'] == "true") {
        echo "<h1>parola e gresita </h1>";
    }
    
    if(Session::exists("adminSession")){
        Redirect::to("admin.php");
    }
    

    ?>

    <form action="adminapi.php" method="POST">
        <input type="password" name="password">
        <input type="submit" value="Submit" name="submit">
    </form>
</body>

</html>