<?php

namespace climate\views;

use climate\models as M;

$town = $this->models['town'];

$tempByMonth = $this->models['tempByMonth'];

$sumNegativeTemp = $this->models['sumNegativeTemp'];

$freezingDepth023 = M\MTable_5_1_temperature::getFreezingDepth(0.23, $sumNegativeTemp);
$freezingDepth028 = M\MTable_5_1_temperature::getFreezingDepth(0.28, $sumNegativeTemp);
$freezingDepth030 = M\MTable_5_1_temperature::getFreezingDepth(0.30, $sumNegativeTemp);
$freezingDepth034 = M\MTable_5_1_temperature::getFreezingDepth(0.34, $sumNegativeTemp);

$temperature_Month_1 = $tempByMonth[0];
$temperature_Month_2 = $tempByMonth[1];
$temperature_Month_3 = $tempByMonth[2];
$temperature_Month_4 = $tempByMonth[3];
$temperature_Month_5 = $tempByMonth[4];
$temperature_Month_6 = $tempByMonth[5];
$temperature_Month_7 = $tempByMonth[6];
$temperature_Month_8 = $tempByMonth[7];
$temperature_Month_9 = $tempByMonth[8];
$temperature_Month_10 = $tempByMonth[9];
$temperature_Month_11 = $tempByMonth[10];
$temperature_Month_12 = $tempByMonth[11];

$temperature_year = $this->models['tempYear'];

/*
 СП 131.13330.2018 Строительная климатология (СНиП 23-01-99*)
            </br>
            Данные по: МС {$town->locality} ({$town->region})
*/

echo <<< EOL
     <div class="block block_wrap report-layout">   
       
     <table class="report-table" border="1" bordercolor="black" 
           style="
           width: 170mm;
           border-collapse: collapse;
           ">
     <caption>Таблица - Средняя месячная и средняя годовая температура воздуха, °С  
    {$town->locality} ({$town->region})</caption>       
     <tr>
        <th colspan="12" align="center"  valign="top">
            Средняя по месяцам
        </th>
        <th  width="120" align="center" rowspan="2"  valign="top">
            Средне&shy;годо&shy;вая
        </th>  
    </tr>
    <tr>

        <td nowrap width="60" align="center">
            I
        </td>
        <td nowrap width="60" align="center">
            II
        </td>

        <td nowrap width="60" align="center">
            III
        </td>

        <td nowrap width="60" align="center">
            IV
        </td>

        <td nowrap width="60" align="center">
            V
        </td>

        <td nowrap width="60" align="center">
            VI
        </td>
        <td nowrap width="60" align="center">
            VII
        </td>
        <td nowrap width="60" align="center" >
            VIII
        </td>

        <td nowrap width="60" align="center" size="5">
            IX
        </td>
        <td nowrap width="60" align="center" size="5">
            X
        </td>
        <td  nowrap width="60" align="center">
            XI
        </td>
        <td nowrap width="60" align="center" size="5">
            XII
        </td>
    </tr>

    <tr>
        <td nowrap width="60" align="center">
            {$temperature_Month_1}
        </td>
        <td nowrap width="60" align="center">
             {$temperature_Month_2}
        </td>
        <td nowrap width="60" align="center">
             {$temperature_Month_3}
        </td>
        <td nowrap width="60" align="center">
             {$temperature_Month_4}
        </td>
        <td nowrap width="60" align="center">
            {$temperature_Month_5}
        </td>
        <td nowrap width="60" align="center">
             {$temperature_Month_6}
        </td>
        <td nowrap width="60" align="center">
             {$temperature_Month_7}
        </td>
        <td nowrap width="60" align="center" >
             {$temperature_Month_8}
        </td>
        <td nowrap width="60" align="center" size="5">
             {$temperature_Month_9}
        </td>
        <td nowrap width="60" align="center" size="5">
             {$temperature_Month_10}
        </td>
        <td  nowrap width="60" align="center">
             {$temperature_Month_11}
        </td>
        <td nowrap width="60" align="center" size="5">         
             {$temperature_Month_12}           
        </td>
        <td nowrap width="60" align="center" size="5">            
             {$temperature_year}            
        </td>   
    </tr>
</table>  
EOL;

echo '</br>';
echo '</br>';
echo 'Модуль суммы отрицательных температур: '.$sumNegativeTemp;

echo '</br>';
echo '</br>';

echo <<< EOL

     
    <table border="1" bordercolor="black" 
           style="
           width: 170mm;
           border-collapse: collapse;
           ">
    <caption>Таблица – Нормативная глубина промерзания</caption>
    <tr>
        <th>
            Грунты
        </th>
        <th>
            Коэффициент
        </th>
        <th>
            Глубина промерзания
        </th>
    </tr>
     <tr>
        <td>
            Суглинки и глины
        </td>
        <td align="center" nowrap>
            0.23 м
        </td>
        <td align="center" nowrap>
            {$freezingDepth023}
        </td>
    </tr>

    <tr>
        <td>
            Супеси, пески мелкие и пылеватые
        </td>
        <td align="center" nowrap>
            0,28 м
        </td>
        <td align="center" nowrap>
            {$freezingDepth028}
        </td>
    </tr>

    <tr>
        <td>
            Пески гравелистые, крупные и средней крупности
        </td>
        <td align="center" nowrap>
            0,30 м
        </td>
        <td align="center" nowrap>
            {$freezingDepth030}
        </td>
    </tr>

    <tr>
        <td>Крупнообломочные грунты
        </td>
        <td align="center" nowrap>
            0,34 м
        </td>
        <td align="center" nowrap>
            {$freezingDepth034}
        </td>
    </tr>
</table>  
</div> 
EOL;
