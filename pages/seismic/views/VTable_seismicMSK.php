<?php

namespace climate\views;

$seismic = $this->models['seismic'];

$town = $this->models['town'];


$OSR2015_A = $seismic->OSR2015_A;
$OSR2015_B = $seismic->OSR2015_B;
$OSR2015_C = $seismic->OSR2015_C;


echo <<< EOL
<input type="button" onclick="printDiv('printableArea')" value="Печать"/>

<div  id="printableArea" class="block block_wrap report-layout">


{$town->locality} ({$town->region})
<br>
<br>
<br>

<table class="bkg_color_report" border="1" 
           style="
           width: 170mm;
           border-collapse: collapse;
           ">
    <caption><span text-align="left" >Таблица   – Расчетная сейсмическая
интенсивность в баллах шкалы MSK-64 для средних грунтовых условий и трех степеней
сейсмической опасности – А(10%), В(5%), С(1%) в течение 50 лет</span></caption>
    <tr>
        <td align="center" nowrap>
             Карта A
        </td>
         <td align="center" nowrap>
             Карта B
        </td>
         <td  align="center" nowrap>
             Карта C
        </td>            
    </tr>
    <tr>
        <td align="center" nowrap>
            {$OSR2015_A}
        </td>
        <td align="center" nowrap>
           {$OSR2015_B}
        </td>
        <td align="center" nowrap>
            {$OSR2015_C}
        </td>
    </tr>   

</table>

</div>


EOL;

?>





