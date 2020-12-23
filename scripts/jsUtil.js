'use strict';

(function (exports) {

        let arr_EN = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
            'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];


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

        exports.downloadFile = function (filename, text) {
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
        };

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

        exports.printDiv = function (divID) {
            var printContents = document.getElementById(divID).innerHTML;
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
                //if (!window.find(text)) {
                //      alert('По вашему запросу ничего не найдено! - 1');

                // }else {window.find(text);}


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


        var lastResFind = ""; // последний удачный результат
        var copy_page = ""; // копия страницы в ихсодном виде
        function TrimStr(s) {
            s = s.replace(/^\s+/g, '');
            return s.replace(/\s+$/g, '');
        }

        function FindOnPage(inputId) {//ищет текст на странице, в параметр передается ID поля для ввода
            var obj = window.document.getElementById(inputId);
            var textToFind;

            if (obj) {
                textToFind = TrimStr(obj.value);//обрезаем пробелы
            } else {
                alert("Введенная фраза не найдена");
                return;
            }
            if (textToFind == "") {
                alert("Вы ничего не ввели");
                return;
            }

            if (document.body.innerHTML.indexOf(textToFind) == "-1")
                alert("Ничего не найдено, проверьте правильность ввода!");

            if (copy_page.length > 0)
                document.body.innerHTML = copy_page;
            else copy_page = document.body.innerHTML;


            document.body.innerHTML = document.body.innerHTML.replace(eval("/name=" + lastResFind + "/gi"), " ");//стираем предыдущие якори для скрола
            document.body.innerHTML = document.body.innerHTML.replace(eval("/" + textToFind + "/gi"), "<a name=" + textToFind + " style='background:red'>" + textToFind + "</a>"); //Заменяем найденный текст ссылками с якорем;
            lastResFind = textToFind; // сохраняем фразу для поиска, чтобы в дальнейшем по ней стереть все ссылки
            window.location = '#' + textToFind;//перемещаем скрол к последнему найденному совпадению
        }


        exports.searchpage = function () {
            doSearch(document.getElementById("search").value);
           // FindOnPage("search");
        };


        var htReq = ('v' === '\v') ? new ActiveXObject('Microsoft.XMLHTTP') : new XMLHttpRequest();

        function sendReq() {
            htReq.open('get', 'myfile.txt');
            htReq.onreadystatechange = getReq;
            htReq.send(null);
        }

        function getReq() {
            if (htReq.readyState === 4) alert(htReq.responseText); // !!!
        }


        exports.saveToFileVar = function ($varValue) {
            //console.log();
            jsUtil.downloadFile("geoData_KML.kml", $varValue);
        };

        


        // element – Required. Specify the element ID to export content from.
        //  filename – Optional. Specify the file name of the word document.

         exports.export2Doc = function(element, filename = '') {
            var preHtml = "<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'><head><meta charset='utf-8'><title>Export HTML To Doc</title></head><body>";
            var postHtml = "</body></html>";
            var html = preHtml + document.getElementById(element).innerHTML + postHtml;

            var blob = new Blob(['\ufeff', html], {
                type: 'application/msword'
            });

            // Specify link url
            var url = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(html);

            // Specify file name
            filename = filename ? filename + '.doc' : 'document.doc';

            // Create download link element
            var downloadLink = document.createElement("a");

            document.body.appendChild(downloadLink);

            if (navigator.msSaveOrOpenBlob) {
                navigator.msSaveOrOpenBlob(blob, filename);
            } else {
                // Create a link to the file
                downloadLink.href = url;

                // Setting the file name
                downloadLink.download = filename;

                //triggering the function
                downloadLink.click();
            }

             document.body.removeChild(downloadLink);
         }

        function downloadURI(uri, name) {
            var link = document.createElement("a");
            link.download = name;
            link.href = uri;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            // delete link;
        }


        $("#btn-Convert-Html2Image").on('click', function () {
            html2canvas(element, {
                onrendered: function (canvas) {
                    var imgageData = canvas.toDataURL("image/png");
                    var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
                    downloadURI(newData, "your_pic_name.png");
                }
            });
        });


        /**
         * must be included in the file
         * <script src="/scripts/jsUtil.js"></script>
         */
        exports.export2Pdf = function(element, filename = ''){
            alert('pdf');

            //import { jsPDF } from "jspdf";

// Default export is a4 paper, portrait, using millimeters for units
            const doc = new jsPDF();

            doc.text("Hello world!", 10, 10);
            doc.save("a4.pdf");

            //var doc = new jsPDF();
            var specialElementHandlers = {
                '#editor': function (element, renderer) {
                    return true;
                }
            };

                doc.fromHTML($('#'+element).html(), 15, 15, {
                    'width': 190,
                    'elementHandlers': specialElementHandlers
                });
                doc.save('sample-page.pdf');


            alert('pdf2');

        }


    }(window.jsUtil = {})
);






