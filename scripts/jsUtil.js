'use strict';

(function (exports) {
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
        };

        exports.printDiv = function (divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        };


        function doSearch(text) {
            var sel;
            if (window.find && window.getSelection) {
                sel = window.getSelection();
                if (sel.rangeCount > 0) {
                    sel.collapseToEnd();
                }
                window.find(text);
            } else if (document.selection && document.body.createTextRange) {
                sel = document.selection;
                var textRange;
                if (sel.type == "Text") {
                    textRange = sel.createRange();
                    textRange.collapse(false);
                } else {
                    textRange = document.body.createTextRange();
                    textRange.collapse(true);
                }
                if (textRange.findText(text)) {
                    textRange.select();
                }
            }
        }

        exports.searchpage = function () {

            doSearch(document.getElementById("search").value);
        };


    }(window.jsUtil = {})
);






