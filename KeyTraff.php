<?php

// Configuration constants
$HOST = "localhost";
$DB = "testworktrafgid";
$USER = 'root';
$PASS = '';
$CHARSET = 'utf8';

// Database queries
$SQLS = [
    '1' => 'SELECT requests.id as "Номер заказа", offers.name as "Имя товара", requests.price as "Цена", 
                requests.count as "Количество", operators.name as "Имя оператора"
            FROM requests
            INNER JOIN offers ON requests.offer_id = offers.id
            INNER JOIN operators ON requests.operator_id = operators.id
            WHERE requests.count > 2 AND operators.id IN (10, 12)',

    '2' => 'SELECT offers.name as "Имя товара", SUM(requests.count) as "Количество товара", 
                SUM(requests.price) as "Сумма"
            FROM requests
            INNER JOIN offers ON requests.offer_id = offers.id
            GROUP BY offers.name'
];

// Function to display the result for any sql request
function tableDraw($pdo, $sql) {
    $data = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    if (count($data) > 0) {
        echo "<table class='table'><thead><tr>";
        foreach (array_keys($data[0]) as $title) {
            echo "<th>" . $title . "</th>";
        }
        echo "</tr></thead><tbody>";
        foreach ($data as $row) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . $value . "</td>";
            }
            echo "</tr>";
        }
        echo "</tbody></table>";
    } else {
        echo '<div class="alert alert-warning">По данному запросу ничего не найдено</div>';
    }
};

// Processing ajax request
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['q'])) {
        $q = $_GET['q'];

        // Getting object PDO
        $dsn = "mysql:host=$HOST;dbname=$DB;charset=$CHARSET";
        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];
        $pdo = new PDO($dsn, $USER, $PASS, $opt);

        tableDraw($pdo, $SQLS[$q]);
    }
}