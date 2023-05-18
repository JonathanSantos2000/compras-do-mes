<?php
include '../PHP/include/header.php';
include_once('config.php');

$select_categoria = "SELECT * FROM categoria";
$result_select_categoria = $conexao->query($select_categoria);


?>

<body>
    <div class="flex-conteiner">
        <div class="menu">
            <?php
            include '../PHP/include/menu.php';
            ?>
        </div>
        <div class="contorno">
            <div class="produto_form">
                <form action="validarProduto.php" method="POST">
                    <fieldset>
                        <legend><b>Fórmulário do Produto</b></legend>
                        <br>
                        <div class="inputBox">
                            <input type="text" name="produto" id="produto" class="inputItens" required>
                            <label for="produto" class="labelInput">Produto:</label>
                        </div>
                        <br>
                        <br>
                        <label for="nome" class="inputBox">Categoria:</label>
                        <div class="select">
                            <select name="select_categoria" id="select_categoria">
                                <option value="">Selecionar</option>
                                <?php while ($categoria_data = mysqli_fetch_assoc($result_select_categoria)) { ?>
                                    <option value="<?php echo $categoria_data['id_categoria'] ?>"> <?php echo $categoria_data['nm_categoria'] ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                        <br>
                        <br>
                        <input type="submit" name="submit" id="submit_cad">
                        <br><br>
                    </fieldset>
                </form>

            </div>
        </div>
    </div>
    <?php
    include '../PHP/include/footer.php';
    ?>