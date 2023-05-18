<?php
include_once('config.php');
$select_categoria_vltotal = "SELECT cat.nm_categoria, sum(c.vl_total) as total FROM compra c
JOIN produto p 
on c.id_produto = p.id_produto
JOIN categoria cat 
on p.id_categoria = cat.id_categoria
GROUP BY cat.nm_categoria
ORDER BY C.vl_total";

$result_categoria_vltotal = $conexao->query($select_categoria_vltotal);

$grafico_categoria_vltotal = array();
while ($categoria_vltotal_data = mysqli_fetch_assoc($result_categoria_vltotal)) {
    array_push($grafico_categoria_vltotal, "['"
        . $categoria_vltotal_data['nm_categoria'] .
        "'," . $categoria_vltotal_data['total'] . "],");
}
?>

<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/menu.css">
    <link rel="stylesheet" href="../CSS/form.css">
    <title>Compras do mês</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                <?php
                foreach ($grafico_categoria_vltotal as $produto) {
                    echo $produto;
                }
                ?>
            ]);

            var options = {
                width: 400,
                height: 240,
                title: 'My Daily Activities'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
</head>

<body>
    <div class="flex-conteiner">
        <div class="menu">
            <?php
            include '../PHP/include/menu.php';
            ?>
        </div>
        <div class="contorno">
            <div id="piechart" style="width: 900px; height: 500px;"></div>
        </div>
    </div>
    <?php
    include '../PHP/include/footer.php';
    ?>