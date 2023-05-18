<?php
include '../PHP/include/header.php';
include_once('config.php');

$categoria_selecionada = false;

$select_show_categoria = "SELECT * FROM categoria ORDER BY nm_categoria";
$result_select_show_categoria = $conexao->query($select_show_categoria);

if (isset($_POST['submit_cat'])) {
    $categoria_selecionada = true;
    $categoria = $_POST['submit_cat'];

    //Categoria
    $selecionar_categoria = "SELECT * FROM categoria where nm_categoria ='$categoria'";
    $result_selecionar_categoria = $conexao->query($selecionar_categoria);

    while ($categoria_data = mysqli_fetch_assoc($result_selecionar_categoria)) {
        $idCat = $categoria_data['id_categoria'];
    }

    //produtos
    $selecionar_produtos = "SELECT * FROM produto WHERE id_categoria ='$idCat' ORDER BY nm_produto";
    $result_selecionar_produtos = $conexao->query($selecionar_produtos);

    $select_mercado = "SELECT * FROM mercado";
    $result_select_mercado = $conexao->query($select_mercado);
}


?>

<body>
    <div class="flex-conteiner">
        <div class="menu">
            <?php
            include '../PHP/include/menu.php';
            ?>
        </div>
        <div class="contorno">
            <div class="categorias">
                <form class="menu_cat" action="add-compras.php" method="post">
                    <ul>
                        <?php while ($categoria_show_data = mysqli_fetch_assoc($result_select_show_categoria)) { ?>
                            <li><input class="botton_cat" type="submit" name="submit_cat" value="<?php echo $categoria_show_data['nm_categoria'] ?>"></li>
                        <?php } ?>
                    </ul>
                </form>
            </div>

            <?php if ($categoria_selecionada) { ?>
                <div class="">
                    <form action="validarCompra.php" method="POST">
                        <fieldset>
                            <legend><b>Fórmulário de compra</b></legend>
                            <br>
                            <div class="inputBox">
                                <input type="date" name="data" id="data" required>
                            </div>
                            <label for="nome" class="inputBox">Produto:</label>
                            <div class="select">
                                <select name="select_produto" id="select_produto">
                                    <option value="">Selecionar</option>
                                    <?php while ($produto_data = mysqli_fetch_assoc($result_selecionar_produtos)) { ?>
                                        <option value="<?php echo $produto_data['id_produto'] ?>"> <?php echo $produto_data['nm_produto'] ?> </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <br><br>
                            <div class="inputBox">
                                <input type="text" name="marca" id="marca" class="inputItens">
                                <label for="marca" class="labelInput">Nome marca: (caso não tenha coloque N/A)</label>
                            </div>
                            <br><br>
                            <label for="nome" class="inputBox">Mercado:</label>
                            <div class="select">
                                <select name="select_mercado" id="select_mercado">
                                    <option value="">Selecionar</option>
                                    <?php while ($mercado_data = mysqli_fetch_assoc($result_select_mercado)) { ?>
                                        <option value="<?php echo $mercado_data['id_mercado'] ?>"> <?php echo $mercado_data['nm_mercado'] ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <br><br>

                            <div class="inputBox">
                                <input type="number" step=0.001 name="qt_ps" id="qt_ps" class="inputItens">
                                <label for="qt_ps" class="labelInput">Qt ou Peso</label>
                            </div>
                            <br><br>
                            <div class="inputBox">
                                <input type="number" step=0.01 name="vl_uni" id="vl_uni" class="inputItens">
                                <label for="vl_uni" class="labelInput">Valor unitario</label>
                            </div>
                            <br><br>
                            <input type="submit" name="submit" id="submit_cad">
                            <br><br>
                        </fieldset>
                    </form>

                </div>
            <?php } ?>
            <!-- fim -->
        </div>
    </div>
    <?php
    include '../PHP/include/footer.php';
    ?>