<?php
/*
   <<<EOL
   <script src="https://api-maps.yandex.ru/2.1/?apikey=<ваш API-ключ>&lang=ru_RU&load=Geolink"
   type="text/javascript"></script>
<!--
 <script src="https://api-maps.yandex.ru/2.1/?apikey=369c0410-04f2-44bc-8b5e-db38533c045b&lang=ru_RU"
 type="text/javascript">
 </script> -->
EOL;
*/

$favicon_as_html = <<< 'EOL'
    <link rel="shortcut icon" href="/resource/site/logo/favicon.ico" type="image/x-icon">
EOL;

$styles_as_html = '';
if (isset($styles)) {
    foreach ($styles as $row) {
        $html_string = "<link href=\"{$row}\" rel=\"stylesheet\">";
        $styles_as_html = $styles_as_html.$html_string."\n";
    }
}

$scripts_as_html = '';
if (isset($scripts)) {
    foreach ($scripts as $row) {
        $html_string = "<script type=\"text/javascript\" src=\"{$row}\" defer></script>";
        $scripts_as_html = $scripts_as_html.$html_string."\n";
    }
}
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <?= $favicon_as_html ?>
    <?= $styles_as_html ?>
    <script src="/js_vendor/JQuery.js"></script>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
    <script src="/scripts/jsUtil.js"></script>
    <script src="https://api-maps.yandex.ru/2.1/?apikey=a1859766-8675-4a34-97d0-54224e39220a&lang=ru_RU&load=Geolink"></script>
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=a1859766-8675-4a34-97d0-54224e39220a" type="text/javascript"></script>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(70644331, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/70644331" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="http://rawgit.com/vitmalina/w2ui/master/dist/w2ui.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://rawgit.com/vitmalina/w2ui/master/dist/w2ui.min.css" />
    <?= $scripts_as_html ?>
</head>
