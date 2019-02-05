<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Тестовое задание</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>
<div class="m-5">
    <a href="KeyTraff.php?q=1" type="button" class="btn btn-info">1) Номер заказа, имя товара, цена, количество, имя
        оператора за которым числится заказ, где количество товара &gt; 2 и id оператора 10 или 12</a>
    <a href="KeyTraff.php?q=2" type="button" class="btn btn-info mt-3">2) Имя товара, количество товара, и сумма (price)
        по каждому товару (сгруппировать)</a>
</div>
<div id="table-block" class="m-5"></div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
</script>
<script src="KeyTraff.js"></script>
</body>
</html>