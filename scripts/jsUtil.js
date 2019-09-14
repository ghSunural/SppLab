'use strict';

;(function (exports) {

        exports.pushHtml = function (id, innerText) {
            document.getElementById(id).innerHTML = innerText;
        };

        exports.getInnerText = function (elemId) {
            return document.getElementById(elemId).value;
        };

        exports.readJsonFile = function (openDialog, outObject) {

            var file = openDialog.files[0];
            var reader = new FileReader();
            // var fileContentAsJsObject = {};

            reader.onload = function () {
                outObject = JSON.parse(reader.result);
                //console.log(fileContentAsJsObject.info.labNo);
                console.log(outObject);
            };

            reader.readAsText(file);
            // return fileContentAsJsObject;

        };

        exports.saveToLocalStorage = function (jsObject, filename) {

            var objJSON = JSON.stringify(jsObject, ' ', GAP);
            localStorage.setItem(filename, objJSON);
            console.log('Сохранено на localStorage');

        };

        exports.saveToJsonFile = function (jsObject, filename) {
            var objJSON = JSON.stringify(jsObject, ' ', GAP);
            downloadFile(filename, objJSON);
            console.log('Сохранено в файле');
        };

        function downloadFile(filename, text) {
            var pom = document.createElement('a');
            pom.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
            pom.setAttribute('download', filename);

            if (document.createEvent) {
                var event = document.createEvent('MouseEvents');
                event.initEvent('click', true, true);
                pom.dispatchEvent(event);
            } else {
                pom.click();
            }
        }

        exports.pushHtmlToFrame = function (id, innerText) {
            window.frames[0].document.getElementById(id).innerHTML = innerText;
            document.getElementById('reportFrame').contentWindow.document.getElementById('objectCode_d').innerHTML = 'innerText';
        };


        exports.contenteditable = function ($classname) {
            var $classes = document.getElementsByClassName($classname);
            for (var i = 0; i < $classes.length; i++) {
                $classes[i].setAttribute('contenteditable', true);
            }
        }

        exports.printDiv = function (divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }


    }(window.jsUtil = {})
);






