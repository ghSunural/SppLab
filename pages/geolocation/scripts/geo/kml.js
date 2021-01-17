'use strict';
;(function (exports) {

    /*        $coordinatesLine  =  ${this.getLong()}, ${this.getLat()}, ${this.getAlt()}
        for (let $geoPoint of $geoPoints) {
            $kml += ($geoPoint.toKml());        }     */


    exports.getKmlPointsBody = function ($geoPoints) {

        let $kml = getKmlOpenTags();

        let $styles = GeoController.$settings.$styles;
        // if($styles.length != 0 && $styles != undefined){}
        for (let $style of $styles) {

            $kml += getStyleTagsKml($style);
        }

        for (let $geoPoint of $geoPoints) {

            $kml += ($geoPoint.toKml());
        }

        $kml += (getCloseTagKml());

        return $kml;
    };


    exports.getKmlLinesBody = function ($geoLines) {

        let $kml = getKmlOpenTags();

        let $styles = GeoController.$settings.$styles;

        // if($styles.length != 0 && $styles != undefined){}
        for (let $style of $styles) {

            $kml += getStyleTagsKml($style);
        }


        for (let $geoLine of $geoLines) {

            $kml += ($geoLine.toKml());
        }

        $kml += (getCloseTagKml());

        return $kml;
    };


    exports.getKmlPolygonsBody = function ($geoPolygons) {

        let $kml = getKmlOpenTags();

        let $styles = GeoController.$settings.$styles;

        // if($styles.length != 0 && $styles != undefined){}
        for (let $style of $styles) {

            $kml += getStyleTagsKml($style);
        }


        for (let $geoPolygon of $geoPolygons) {

            $kml += ($geoPolygon.toKml());
        }

        $kml += (getCloseTagKml());

        return $kml;
    };


    exports.getKmlCircleBody = function ($geoCircle) {

        let $kml = getKmlOpenTags();

        let $styles = GeoController.$settings.$styles;

        // if($styles.length != 0 && $styles != undefined){}
        for (let $style of $styles) {

            $kml += getStyleTagsKml($style);
        }

        $kml += ($geoCircle.toKml());
        $kml += (getCloseTagKml());

        return $kml;
    };

    //private functions
    function getKmlOpenTags() {

        return `<?xml version="1.0" encoding="UTF-8"?>
<kml xmlns="http://www.opengis.net/kml/2.2">  
<Document>
`;
    }

    function getStyleTagsKml($style) {

        let $kmlColorLine = kml.colorHtml2Kml($style.getColorLine());
        let $kmlColorFill = kml.colorHtml2Kml($style.getColorFill());

        // $style.setIconUrl('https://lab.sppural.ru/resource/content/images/pages/earthquaqe.png');

        return `<Style id="${$style.getName()}">
<IconStyle>
<scale>${$style.getIconScale()}</scale>
<Icon>
<href>${$style.getIconUrl()}</href>
</Icon>
</IconStyle>
<LineStyle>
    <width>${$style.getWidth()}</width>
    <color>${$kmlColorLine}</color>
</LineStyle> 
<PolyStyle>
    <color>${$kmlColorFill}</color>
    <fill>1</fill>
    <outline>1</outline>
</PolyStyle>          
</Style>
`;
    }


    function getCloseTagKml() {

        return `
</Document>
</kml>`;
    }

    exports.colorHtml2Kml = function ($colorHtml) {

        // return 'ff' + $colorHtml[5,3] + $colorHtml[3,2] + $colorHtml[1,2]
        // ff- альфа-канал

        return '50' + $colorHtml.substring(5) + $colorHtml.substring(3, 5) + $colorHtml.substring(1, 3);
    }

}(window.kml = {}));

