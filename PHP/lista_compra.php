<?php
include '../PHP/include/header.php';

include_once('config.php');

$selecionar_produtos = "SELECT * FROM compra c
JOIN produto p 
on c.id_produto = p.id_produto
JOIN categoria cat 
on p.id_categoria = cat.id_categoria
JOIN mercado m
on c.id_mercado = m.id_mercado
ORDER BY c.dt_compra";
$result_selecionar_produtos = $conexao->query($selecionar_produtos);


/* total compras */
$total_compra = "select sum(vl_total) AS 'total' from compra";
$result_total_compra = $conexao->query($total_compra);

$total = mysqli_fetch_array($result_total_compra);

$totalFormatado = number_format($total['total'], 2, ",", ".");

?>

<body>
    <div class="flex-conteiner">
        <div class="menu">
            <?php
            include '../PHP/include/menu.php';
            ?>
        </div>
        <div class="contorno">
            <table id="tb_produtos">
                <tr>
                    <th>Nome</th>
                    <th>marca</th>
                    <th>Mercado</th>
                    <th>Data de compra</th>
                    <th>Categoria</th>
                    <th>Qt ou kg</th>
                    <th>valor Unitario</th>
                    <th>valor Total</th>
                </tr>

                <?php while ($produto_data = mysqli_fetch_assoc($result_selecionar_produtos)) { ?>
                    <tr>
                        <td><?php echo $produto_data['nm_produto'] ?></td>
                        <td><?php echo $produto_data['nm_marca'] ?></td>
                        <td><?php echo $produto_data['nm_mercado'] ?></td>
                        <td><?php echo $produto_data['dt_compra'] ?></td>
                        <td><?php echo $produto_data['nm_categoria'] ?></td>
                        <td><?php echo $produto_data['qt_or_kg_item'] ?></td>
                        <td><?php echo $produto_data['vl_uni'] ?></td>
                        <td><?php echo $produto_data['vl_total'] ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Total:</th>
                    <th><?php echo $totalFormatado ?></th>
                </tr>
            </table>

        </div>
    </div>
    <?php
    include '../PHP/include/footer.php';
    ?>