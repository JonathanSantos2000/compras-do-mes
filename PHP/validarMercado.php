<?php
include_once('config.php');

if (isset($_POST['submit'])) {
    $Mercado = $_POST['mercado'];

    $result = mysqli_query($conexao, "INSERT INTO `mercado` (`nm_mercado`) VALUES ('$Mercado')");

    header('Location: add-mercado.php');
}
