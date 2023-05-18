<?php
include_once('config.php');

if (isset($_POST['submit'])) {
    $Produto = $_POST['produto'];
    $Categoria = $_POST['select_categoria'];

    $result = mysqli_query($conexao, "INSERT INTO `produto` (`nm_produto`, `id_categoria`) VALUES ('$Produto', '$Categoria')");

    header('Location: add-produto.php');
}
