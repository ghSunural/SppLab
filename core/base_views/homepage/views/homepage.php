<?php

?>

<!DOCTYPE html>
<html lang="ru-RU">
<?php
$title = 'SPP-Lab';
$styles['main-css'] = '/css/styles.css';

require 'core/base_views/VHead.php';
?>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        /* Стиль заголовка */
        .header {
            background-color: #f1f1f1;
            padding: 30px;
            text-align: center;
            font-size: 35px;
        }

        /* Контейнер для flexboxes */
        .row {
            display: -webkit-flex;
            display: flex;
            min-height: 90vh;
        }

        /* Создайте три неравных столбца, которые сидят рядом друг с другом */
        .column {
            padding: 10px;

        }

        /* Левый и правый столбец */
        .side {

            resize: horizontal;
            overflow: auto;
        }

        /* Средняя колонка */
        .column.middle {
            -webkit-flex: 2;
            -ms-flex: 2;
            flex: 2;
        }

        /* Стиль нижнего колонтитула */
        .footer {
            background-color: #f1f1f1;
            padding: 10px;
            text-align: center;
        }

        /* Отзывчивый макет - делает три колонки стек поверх друг друга, а не рядом друг с другом */
        @media (max-width: 600px) {
            .row {
                -webkit-flex-direction: column;
                flex-direction: column;
            }
        }
    </style>

<body>


<div class="header">
    <?php
    require 'core/base_views/VMainToolbar.php'
    ?>
</div>

<div class="row">
    <div class="column side" style="background-color:#aaa;">

        <nav class="ac-container">
            <div>
                <input id="ac-1" name="accordion-1" type="checkbox" checked/>
                <label for="ac-1">Для технического отчета</label>
                <article class="ac-small">
                    <p>
                    <ul>
                        <li><a href="climate" target="">Строительная климатология</a></li>
                        <li><a href="seismic" target="">Сейсмичность</a></li>
                        <li><a href="" target="">Геологические колонки</a></li>
                    </ul>
                    </p>
                </article>
            </div>
            <div>
                <input id="ac-2" name="accordion-1" type="checkbox" checked/>
                <label for="ac-2">Местоположение</label>
                <article class="ac-medium">
                    <p>
                    <ul>
                        <li><a href="geolocation/convert2geo" target="">Конвертер в геоданные</a></li>
                        <li><a href="geolocation/photo-with-location" target="">Фото с координатами</a></li>
                    </ul>
                    </p>
                </article>
            </div>

        </nav>

    </div>
    <div class="column middle" style="background-color:#bbb;">Столбец</div>
    <div class="column side" style="background-color:#ccc;">Столбец</div>
</div>

<?php
require 'core/base_views/VSiteFooter.php'
?>

</body>
</html>

<script>

</script>


<style>

    .ac-container{
        width: 400px;
        margin: 10px auto 30px auto;
        text-align: left;
    }
    .ac-container label{

        padding: 5px 20px;
        position: relative;
        z-index: 20;
        display: block;
        height: 30px;
        cursor: pointer;
        text-shadow: 1px 1px 1px rgba(255,255,255,0.8);
        line-height: 33px;

        background: #ffffff;

        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#eaeaea',GradientType=0 );
        box-shadow:
                0px 0px 0px 1px rgba(155,155,155,0.3),
                1px 0px 0px 0px rgba(255,255,255,0.9) inset,
                0px 2px 2px rgba(0,0,0,0.1);
    }
    .ac-container label:hover{
        background: #fff;
    }
    .ac-container input:checked + label,
    .ac-container input:checked + label:hover{
        background: #c6e1ec;
        color: #3d7489;
        text-shadow: 0px 1px 1px rgba(255,255,255, 0.6);
        box-shadow:
                0px 0px 0px 1px rgba(155,155,155,0.3),
                0px 2px 2px rgba(0,0,0,0.1);
    }
    .ac-container label:hover:after,
    .ac-container input:checked + label:hover:after{
        content: '';
        position: absolute;
        width: 24px;
        height: 24px;
        right: 13px;
        top: 7px;
        background: transparent url(../images/arrow_down.png) no-repeat center center;
    }
    .ac-container input:checked + label:hover:after{
        background-image: url(../images/arrow_up.png);
    }
    .ac-container input{
        display: none;
    }
    .ac-container article{
        background: rgba(255, 255, 255, 0.5);
        margin-top: -1px;
        overflow: hidden;
        height: 0px;
        position: relative;
        z-index: 10;
        transition: height 0.3s ease-in-out, box-shadow 0.6s linear;
    }
    .ac-container article p{

        line-height: 23px;
        font-size: 14px;
        padding: 20px;
        text-shadow: 1px 1px 1px rgba(255,255,255,0.8);
    }
    .ac-container input:checked ~ article {

        transition: height 0.5s ease-in-out, box-shadow 0.1s linear;
        box-shadow: 0px 0px 0px 1px rgba(155,155,155,0.3);
    }
    .ac-container input:checked ~ article.ac-small{
        height: 140px;
    }
    .ac-container input:checked ~ article.ac-medium{
        height: 180px;
    }
    .ac-container input:checked ~ article.ac-large{
        height: 230px;
    }


</style>

