<?php

namespace climate\views;

$coldSeasonData = $this->models['coldSeasonData'];

$town = $this->models['town'];

$theColdestDay098 = $coldSeasonData->theColdestDay098;
$theColdestDay092 = $coldSeasonData->theColdestDay092;
$theColdestFiveDays098 = $coldSeasonData->theColdestFiveDays098;
$theColdestFiveDays092 = $coldSeasonData->theColdestFiveDays092;

$temperature094 = $coldSeasonData->temperature094;
$absTemperatureMin = $coldSeasonData->absTemperatureMin;
$avrRange = $coldSeasonData->avrRange;

$duration_l0 = $coldSeasonData->duration_l0;
$avrTemp_l0 = $coldSeasonData->avrTemp_l0;
$duration_l8 = $coldSeasonData->duration_l8;
$avrTemp_l8 = $coldSeasonData->avrTemp_l8;
$duration_l10 = $coldSeasonData->duration_l10;
$avrTemp_l10 = $coldSeasonData->avrTemp_l10;

$relativeHumidityColdestMonth = $coldSeasonData->relativeHumidityColdestMonth;
$relativeHumidityColdestMonth15 = $coldSeasonData->relativeHumidityColdestMonth15;
$precipitation = $coldSeasonData->precipitation;

$wind = $coldSeasonData->wind;
$maxAvrWindSpeed = $coldSeasonData->maxAvrWindSpeed;
$avrWindSpeed_l8 = $coldSeasonData->avrWindSpeed_l8;

echo <<< EOL
<input type="button" onclick="jsUtil.printDiv('printableArea')" value="Печать"/>

<div  id="printableArea" class="block block_wrap report-layout">

<table class="bkg_color_report" border="1" 
           style="
           width: 170mm;
           border-collapse: collapse;
           ">
    <caption><span text-align="left" >Таблица   – Климатические параметры холодного периода года</span></caption>
    <tr>
        <td colspan="3">
            Метеостанция
        </td>
        <td align="center" nowrap>
            {$town->locality} ({$town->region})
        </td>
    </tr>
    <tr>
        <td rowspan="2" colspan="2">
            Температура воздуха наиболее холодных суток, <sup>0</sup>С, обеспеченностью
        </td>
        <td align="center" nowrap>
            0.98
        </td>
        <td align="center">
            {$theColdestDay098}
        </td>
    </tr>
    <tr>
        <td align="center" nowrap>
            0.92
        </td>
        <td align="center">
            {$theColdestDay092}
        </td>
    </tr>
    <tr>
        <td rowspan="2" colspan="2">
            Температура воздуха наиболее холодной пятидневки, <sup>0</sup>С, обеспеченностью
        </td>
        <td align="center" nowrap>
            0.98
        </td>
        <td align="center">
            {$theColdestFiveDays098}
        </td>
    </tr>
    <tr>
        <td align="center" nowrap>
            0.92
        </td>
        <td align="center">
            {$theColdestFiveDays092}
        </td>
    </tr>

    <tr>
        <td colspan="3">
            Температура воздуха, ºС, обеспеченностью 0,94
        </td>
        <td align="center">
            {$temperature094}
        </td>
    </tr>
    <tr>
        <td colspan="3">
            Абсолютная минимальная температура воздуха , ºС
        </td>
        <td align="center">
            {$absTemperatureMin}
        </td>
    </tr>
    <tr>
        <td colspan="3">
            Средняя суточная амплитуда температуры воздуха наиболее холодного месяца, ºС
        </td>
        <td align="center">
            {$avrRange}
        </td>
    </tr>
    <tr>
        <td rowspan="6">
            Продолжительность, сут. и средняя температура воздуха, ºС, периода со средней температурой воздуха
        </td>
        <td rowspan="2" nowrap>
            ≤ 0 ºС
        </td>
        <td>
            продолжительность
        </td>
        <td align="center">
            {$duration_l0}
        </td>
    </tr>
    <tr>
        <td>
            средняя температура
        </td>
        <td align="center">
            {$avrTemp_l0}
        </td>
    </tr>
    <tr>

        <td rowspan="2" nowrap>
            ≤ 8 ºС
        </td>
        <td>
            продолжительность
        </td>
        <td align="center">
            {$duration_l8}
        </td>
    </tr>
    <tr>
        <td>
            средняя температура
        </td>
        <td align="center">
            {$avrTemp_l8}
        </td>
    </tr>
    <tr>

        <td rowspan="2" nowrap>
            ≤ 10 ºС
        </td>
        <td>
            продолжительность
        </td>
        <td align="center">
            {$duration_l10}
        </td>
    </tr>
    <tr>
        <td>
            средняя температура
        </td>
        <td align="center">
            {$avrTemp_l10}
        </td>
    </tr>

    <tr>
        <td colspan="3">
            Средняя месячная относительная влажность воздуха наиболее холодного месяца, %
        </td>
        <td align="center">
            {$relativeHumidityColdestMonth}
        </td>
    </tr>

    <tr>
        <td colspan="3">
            Средняя месячная относительная влажность воздуха в 15 ч наиболее холодного месяца, %
        </td>
        <td align="center">
             {$relativeHumidityColdestMonth15}
        </td>
    </tr>
    <tr>
        <td colspan="3">
            Количество осадков за ноябрь-март, мм
        </td>
        <td align="center">
            {$precipitation}
        </td>
    </tr>
    <tr>
        <td colspan="3">
            Преобладающее направление ветра за декабрь - февраль
        </td>
        <td align="center">
            {$wind}
        </td>
    </tr>
    <tr>
        <td colspan="3">
            Максимальная из средних скоростей ветра по румбам за январь, м/с
        </td>
        <td align="center">
            {$maxAvrWindSpeed}
        </td>
    </tr>
    <tr>
        <td colspan="3">
            Средняя скорость ветра, м/с, за период со средней суточной температурой воздуха ≤ 8 ºС
        </td>
        <td align="center">
            {$avrWindSpeed_l8}
        </td>
    </tr>

</table>

</div>



EOL;

?>





