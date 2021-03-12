<?php

namespace climate\views;

$warmSeasonData = $this->models['warmSeasonData'];
$town = $this->models['town'];

$barometricPressure = $warmSeasonData->barometricPressure;
$temperature095 = $warmSeasonData->temperature095;
$temperature098 = $warmSeasonData->temperature098;
$avrTemperatureMax = $warmSeasonData->avrTemperatureMax;
$absTemperatureMax = $warmSeasonData->absTemperatureMax;
$avrRange = $warmSeasonData->avrRange;
$relativeHumidityWarmestMonth = $warmSeasonData->relativeHumidityWarmestMonth;
$relativeHumidityWarmestMonth15 = $warmSeasonData->relativeHumidityWarmestMonth15;
$precipitation = $warmSeasonData->precipitation;
$maxDayPrecipitation = $warmSeasonData->maxDayPrecipitation;
$wind = $warmSeasonData->wind;
$minAvrWindSpeed = $warmSeasonData->minAvrWindSpeed;

echo <<< EOL
<div class="block block_wrap report-layout">
<table       
           style="
           border: 1px black solid;
           width: 170mm;
           border-collapse: collapse;
           padding: 5px;
           ">
    <div class="caption">Таблица – Климатические параметры теплого периода года</div>
    <tr>
        <td>
            Метеостанция
        </td>
        <td align="center" nowrap>
             {$town->locality} ({$town->region})
        </td>
    </tr>
    <tr>
        <td>
            Барометрическое давление, КПа
        </td>
        <td align="center">
            {$barometricPressure}
        </td>
    </tr>
    <tr>
        <td>
            Температура воздуха, ºС, обеспеченностью 0.95
        </td>
        <td align="center">
            {$temperature095}
        </td>
    </tr>
    <tr>
        <td>
            Температура воздуха, ºС, обеспеченностью 0.98
        </td>
        <td align="center">
            {$temperature098}
        </td>
    </tr>
    <tr>
        <td>
            Средняя максимальная температура воздуха наиболее теплого месяца, ºС
        </td>
        <td align="center">
            {$avrTemperatureMax}
        </td>
    </tr>
    <tr>
        <td>
            Абсолютная максимальная температура воздуха, ºС
        </td>
        <td align="center">
            {$absTemperatureMax}
        </td>
    </tr>
    <tr>
        <td>
            Средняя суточная амплитуда температуры воздуха наиболее теплого месяца, ºС
        </td>
        <td align="center">
            {$avrRange}
        </td>
    </tr>
    <tr>
        <td>
            Средняя месячная относительная влажность воздуха наиболее теплого месяца, %
        </td>
        <td align="center">
            {$relativeHumidityWarmestMonth}
        </td>
    </tr>

    <tr>
        <td>
            Средняя месячная относительная влажность воздуха в 15 ч наиболее теплого месяца, %
        </td>
        <td align="center">
            {$relativeHumidityWarmestMonth15}
        </td>
    </tr>
    <tr>
        <td>
            Количество осадков за апрель – октябрь, мм
        </td>
        <td align="center">
            {$precipitation}
        </td>
    </tr>
    <tr>
        <td>
            Суточный максимум осадков, мм
        </td>
        <td align="center">
            {$maxDayPrecipitation}
        </td>
    </tr>
    <tr>
        <td>
            Преобладающее направление ветра за июнь – август
        </td>
        <td align="center">
            {$wind}
        </td>
    </tr>
    <tr>
        <td>
            Минимальная из средних скоростей ветра по румбам за июль, м/с
        </td>
        <td align="center">
            {$minAvrWindSpeed}
        </td>
    </tr>

</table>
</div>

<style>
 td {
border: 1px black solid;
 }


</style>

EOL;

