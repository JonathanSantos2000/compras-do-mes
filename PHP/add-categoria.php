<?php
include '../PHP/include/header.php';


?>

<body>
    <div class="flex-conteiner">
        <div class="menu">
            <?php
            include '../PHP/include/menu.php';
            ?>
        </div>
        <div class="contorno">
            <div class="categoria_form">
                <form action="validarCategoria.php" method="POST">
                    <fieldset>
                        <legend><b>Fórmulário do Categoria</b></legend>
                        <br>
                        <div class="inputBox">
                            <input type="text" name="categoria" id="categoria" class="inputItens" required>
                            <label for="categoria" class="labelInput">Categoria:</label>
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