<?php
include_once('config.php');

if (isset($_POST['submit'])) {
    $data = $_POST['data'];
    $Produto = $_POST['select_produto'];
    $Produto = strtoupper($Produto);
    $mercado = $_POST['select_mercado'];
    
    $marca = $_POST['marca'];
    $marca = strtoupper($marca);

    $qt_kg = $_POST['qt_ps'];
    $vl_uni = $_POST['vl_uni'];

    $multiplicacao = $qt_kg * $vl_uni;
    $vl_total = number_format($multiplicacao, 2, ".", ".");

    $result = mysqli_query($conexao, "INSERT INTO compra (`id_produto`, `nm_marca`, `id_mercado`, `dt_compra`, `qt_or_kg_item`, `vl_uni`, `vl_total`) 
    VALUES ($Produto, '$marca' ,'$mercado', '$data', $qt_kg,  $vl_uni, $vl_total)");

    header('Location: add-compras.php');
}
