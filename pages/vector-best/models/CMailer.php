<?php


namespace vbest\models;


use SplSubject;

class CMailer implements \SplObserver
{

    private array $changes = [];

    public function update(SplSubject $subject)
    {
        // TODO: Implement update() method.
        $this->changes[] = clone $subject;

    }


    public function getChanges(): array
    {
        return $this->changes;
    }

    public static function sendMail($options = [])
    {


        $to = "ysunural@yandex.ru";
        // $to .= "mail2@example.com>";

        $subject = "отчет";

        //$message = ' <p>Произошли изменения</p> </br> <b>1-ая строчка </b> </br><i>2-ая строчка </i> </br>';
       // $message = $options['message'];

        $message = "сообщение от сервера";


        $headers = "Content-type: text/html; charset=windows-1251 \r\n";
        $headers .= "From: Vector-Bot\r\n";
        //  $headers .= "Reply-To: reply-to@example.com\r\n";

        echo mail($to, $subject, $message, $headers);
     //   echo 'Письмо отправлено';
    }


}