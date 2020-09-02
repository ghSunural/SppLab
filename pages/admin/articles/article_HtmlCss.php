Скрыть Input под картинкой

<div class="img-provider table-cell"
     style="background-image: url(https://lab.sppural.ru/resource/site/iconsimg/nalivnoi-pol.png);">
    <input type="color" :name="index" v-model="form.colorFill"
           title="Заливка полигонов"
           onchange="GeoController.setColorFill(this)">
</div>


<style>

    .img-provider {
        background-repeat: no-repeat;
        box-sizing: border-box;
        background-size: contain;
        width: 40px;
        height: 40px;
        text-align: center;
        display: inline-block;
        font-weight: bold;
    }


    input[type=color]
        /* .colorFill*/
    {
        opacity: 50;
        width: 100%;
        height: 100%;
        box-sizing: border-box;
        border-radius: 20px;
    }

</style>
