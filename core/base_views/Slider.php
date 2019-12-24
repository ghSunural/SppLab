<?php

if (isset($openDialog_header)) {
    // $openDialog_header = $openDialog_header;
} else {
    $openDialog_header = "ЗАГОЛОВОК";
}

if (isset($openDialog_htmlContent)) {
    // $openDialog_htmlContent = $openDialog_htmlContent;
} else {
    // $openDialog_htmlContent = "КОНТЕНТ";
}

?>

<div id="wrapper">
    <div id="left-side">
        <ul>
            <li class="choose active">
                <div class="icon active">
                    <svg viewBox="0 0 32 32">
                        <g filter="">
                            <use xlink:href="#shopping-cart"></use>
                        </g>
                    </svg>
                </div>
            </li>
        </ul>
    </div>
</div>

<!-- We will use PrefixFree - a script that takes care of CSS3 vendor prefixes
You can download it from http://leaverou.github.com/prefixfree/ -->


<style type="text/css">

    #left-side {
        height: 70%;
        width: 25%;
        display: flex;
        align-items: center;
        justify-content: center;

    li {
        padding-top: 10px;
        padding-bottom: 10px;
        display: flex;
        line-height: 34px;
        color: rgba($ black, .5);
        font-weight: 500;
        cursor: pointer;
        transition: all .2s ease-out;

    #border {
        height: 288px;
        width: 1px;
        background-color: rgba($ black, .2);

    #line.one {
        width: 5px;
        height: 54px;
        background-color: $ active;
        margin-left: -2px;
        margin-top: 35px;
        transition: all .4s ease-in-out;
    }

    }

    #right-side {
        height: 300px;
        width: 75%;
        overflow: hidden;


</style>

<script type="text/javascript">

    $(".choose").click(function () {
        $(".choose").addClass("active");
        $(".choose > .icon").addClass("active");
        $(".pay").removeClass("active");
        $(".wrap").removeClass("active");
        $(".ship").removeClass("active");
        $(".pay > .icon").removeClass("active");
        $(".wrap > .icon").removeClass("active");
        $(".ship > .icon").removeClass("active");
        $("#line").addClass("one");
        $("#line").removeClass("two");
        $("#line").removeClass("three");
        $("#line").removeClass("four");
    })

</script>