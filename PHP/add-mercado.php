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
            <div class="mercado_form">
                <form action="validarMercado.php" method="POST">
                    <fieldset>
                        <legend><b>Fórmulário do mercado</b></legend>
                        <br>
                        <div class="inputBox">
                            <input type="text" name="mercado" id="mercado" class="inputItens" required>
                            <label for="mercado" class="labelInput">Mercado:</label>
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