<?php


use Application\Debug;

class Http
{

    static $httpRequest;
    static $httpResponse;


    public function __construct()
    {
        header("HTTP/1.1 200 OK");
        header('');
        echo $_SERVER['$HTTP_POST_VARS'];
        $_SERVER['REQUEST_METHOD'];
        header("Location: /index.php");
        http_response_code(404);
        include('my_404.php'); // provide your own HTML for the error page


        Debug::print_var('uri ', $_SERVER['REQUEST_URI']);
        Debug::print_var('host ', $_SERVER['HTTP_HOST']);
        Debug::print_var('method ', $_SERVER['REQUEST_METHOD']);
        $data = json_decode(file_get_contents("php://input"));
        print_r($data);
    }

    //  foreach (getallheaders() as $name => $value) {
    //    echo "$name: $value\n"."<br>";
    //  }


    public function getHttpAnswer()
    {

        $user_id = 210700286;

        $info = file_get_contents('https://api.vk.com/method/users.get.json?user_ids=' . $user_id . '&fields=bdate&v=5.68');
        $info = json_decode($info, true);
        print_r($info);
    }


}