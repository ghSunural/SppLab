<?php

namespace signin\models;

use Application\Models\Model_base;
use user\models as U;

class MSignUpIn extends Model_base
{

    public static function auth()
    {

        $user = new U\TUser();
        /*
               session_start();
               // echo session_save_path();
               // $_SESSION['user'] = 'в сессии';
               $_SESSION['userId'] = $user->getId();
               $_SESSION['login'] = $user->getLogin();
               $_SESSION['role'] = $user->getRole();
       */

    }


    function sendMail($to, $subject, $body)
    {
        //require 'class.phpmailer.php';
        $from = "from@yourwebsite.com";
        $mail = new PHPMailer();
        $mail->IsSMTP(true);            // используем протокол SMTP
        $mail->IsHTML(true);
        $mail->SMTPAuth = true;                  // разрешить SMTP аутентификацию
        $mail->Host = "tls://smtp.yourwebsite.com"; // SMTP хост
        $mail->Port = 465;                    // устанавливаем SMTP порт
        $mail->Username = "SMTP_Username";  //имя пользователя SMTP
        $mail->Password = "SMTP_Password";  // SMTP пароль
        $mail->SetFrom($from, 'From Name');
        $mail->AddReplyTo($from, 'From Name');
        $mail->Subject = $subject;
        $mail->MsgHTML($body);
        $address = $to;
        $mail->AddAddress($address, $to);
        $mail->Send();
    }


    function activation()
    {
        $msg = '';
        if (!empty($_GET['code']) && isset($_GET['code'])) {
            $code = mysql_real_escape_string($_GET['code']);
            $c = mysqli_query($connection, "SELECT uid FROM users WHERE activation='$code'");
            if (mysqli_num_rows($c) > 0) {
                $count = mysqli_query($connection, "SELECT uid FROM users WHERE activation='$code' and status='0'");

                if (mysqli_num_rows($count) == 1) {
                    mysqli_query($connection, "UPDATE users SET status='1' WHERE activation='$code'");
                    $msg = "Ваш аккаунт активирован";
                } else {
                    $msg = "Ваш аккаунт уже активирован, нет необходимости активировать его снова.";
                }
            } else {
                $msg = "Неверный код активации.";
            }
        }
    }

}
