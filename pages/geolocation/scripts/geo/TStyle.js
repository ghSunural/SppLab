'use strict';


;(function (exports) {

    exports.TStyle = function () {

        this.name = '';
        this.colorLine = '#00008B';
        this.colorFill = '#000000';
        this.width = 5;
        this.iconUrl = '';
        this.iconScale = 1;

        this.init = function ($name, $width, $colorLine, $colorFill) {

            this.name = $name;
            this.colorLine = $colorLine;
            this.colorFill = $colorFill;
            this.width = $width;

        };

        this.setName = function ($name) {
            this.name = $name;
        };


        this.getName = function () {
            return this.name;
        };

        this.setWidth = function ($width) {
            this.width = $width;
        };

        this.getWidth = function () {

            return this.width;
        };


        this.setColorLine = function ($colorLine) {
            this.colorLine = $colorLine;
        };

        this.getColorLine = function () {

            return this.colorLine;
        };

        this.setColorFill = function ($colorFill) {
            this.colorFill = $colorFill;
        };

        this.getColorFill = function () {

            return this.colorFill;
        };


        this.setIconUrl = function($iconUrl){

            this.iconUrl = $iconUrl;
        }

        this.getIconUrl = function () {

            return this.iconUrl;
        };


        this.setIconScale = function($iconScale){

            this.iconScale = $iconScale;
        }

        this.getIconScale = function () {

            return this.iconScale;
        };

    };


}(window.styles = {}));