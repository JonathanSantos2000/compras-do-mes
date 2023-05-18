<?php
include_once('config.php');

if (isset($_POST['submit'])) {
    $Categoria = $_POST['categoria'];

    $result = mysqli_query($conexao, "INSERT INTO `categoria` (`nm_categoria`) VALUES ('$Categoria')");

    header('Location: add-categoria.php');
}
