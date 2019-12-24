<?php

?>

<H1>Сейсморазведка и сейсмология</H1>

Часто задаваемые вопросы.

Зачем отрабатывать поперечные волны в двух направлениях

<H1>Способы синхронизации отметки момента и их техническая реализация</H1>

<H2>1. По замыканию </H2>
<p>
<span class="advantages">Преимущества</span>
Отсутствие ложных срабатываний
Нет необходимости в дополнительных элементах
Нет необходимости наличия специального сейсмоприемника
<div class="disadvantages">Недостатки</div>
Часто повреждается соединение с плашкой.
Наличие отдельных проводов, идущих к кувалде и плашке
</p>

2. Сигнал

2.1. Сейсмоприемник
<p>
    <span class="advantages">Преимущества</span>
    Небольшое количество ложных срабатываний
<div class="disadvantages">Недостатки</div>
<ul type="square">
    <li>Требуется дополнительный сейсмоприемник</li>
    <li>Точность небольшая и зависит от дистанции сейсмоприемник-плашка для возбуждения</li>
    <li>Риск повреждения дорогостоящего сейсмоприемника</li>
</ul>
</p>
2.2. Пьезоэлемент
Реализация проста. Подойдет ЗП-4, ЗП-5, но лучше выбрать
пьзокерамику - дешевле, надежнее, меньше ложных срабатываний

<div class="advantages">Преимущества</div>
- не требуется отдельного сейсмоприемника для синхронизации
<div class="disadvantages">Недостатки</div>
ложное срабатывание
Хрупкость пьезоэлементов, желательно иметь запасные
3. По размыканию
Особенных преимуществ нет, можно не использовать

<samp>
    main{ }

</samp>

<dialog id="dialog">
    <h1>Hello</h1>
</dialog>

<script>
    var dialog = document.getElementById('dialog');
    dialog.show();
</script>


<style type="text/css">

    .advantages {
        font-weight: bold;
        color: #4b2fff;
    }

    .disadvantages {
        font-weight: bold;
        color: #ff1c36;
    }

</style>