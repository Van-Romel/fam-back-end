<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bem vindo!</title>
    <?php
    session_start();
    if ((!isset ($_SESSION['user']) == true) and (!isset ($_SESSION['senha']) == true)) {
        unset($_SESSION['user']);
        unset($_SESSION['senha']);
        header('location:login.php');
    }

    $logado = $_SESSION['user'];
    ?>
</head>
<body>
<?php
echo "Bem vindo, $logado";
?>
</body>
</html>
