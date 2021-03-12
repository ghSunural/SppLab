window.addEventListener('error', function (e) {
    var stack = e.error.stack;
    var message = e.error.toString();
    if (stack) {
        message += '\n' + stack;
    }

    let userMessage = e.message;

    console.log("ОБРАБОТКА ИСКЛЮЧЕНИЙ\n " + message);
  //  alert("ОБРАБОТКА ИСКЛЮЧЕНИЙ\n " + message);
    /*
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/log', true);
    xhr.send(message);

     */

    document.getElementById("js-console").innerHTML = userMessage;
});