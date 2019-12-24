<div class="block block_box">
    REST
    <br>
    Поиск
    <br>
    Пользователи
    <br>
    Загрузки
    <br>
    <br>
    PDO
    <br>
</div>


<div class="block block_box">
    HTTP-заголовки <br>
    <?php
    $headers = $this->models['http_headers'];
    foreach ($headers as $name => $value) {
        echo "$name: $value\n" . "<br>";
    }
    ?>
    <br>
</div>