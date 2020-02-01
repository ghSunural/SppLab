<?php

namespace Application\Controllers;

use Application\Debug;
use signin\models as M;
use user\models\TUserFactory;

class SignUpInController extends BaseController
{
    public function acnSign($acn)
    {
        switch ($acn) {
            case 'login':
                $this->render('pages/signUpIn/views/#VLogIn.php');
                break;
            case 'reg':
                $this->render('pages/signUpIn/views/#VSignUp.php');
                break;
            case 'auth':
                self::acnAuth();
                break;
            default:
                $this->render('pages/signUpIn/views/#VLogIn.php');
        }
    }

    private function acnAuth()
    {

        /*
        //echo "Авторизация";
        //Debug::print_array($_REQUEST);
        $user = TUserFactory::createEmptyUser();
        $_REQUEST['Surname'];
        // if(){проверка повторного пароля}

        $user['Surname'] = $_REQUEST['Surname'];
        // Debug::print_array($user);

        if (isset($user['Surname'])) {
            $user['Surname'] = $_POST["Surname"];
        } else {
            $user['Surname'] = '';
        }


        $this->models['user'] = $user;


        M\MSignUpIn::auth();
        */
    }

    public static function actionRegister()
    {
        /*
         echo 'reg';
         Debug::print_array($_POST);
         if (!isset($_POST["submit"])) {

             return false;
         }
         echo 'reg2';
        */

        $user = TUserFactory::createEmptyUser();
        // FormValid()

        $user->setSurname($_POST['Surname']);
        $user->setFirstName($_POST['firstName']);
        $user->setLogin($_POST['login']);
        $user->setEmail($_POST['email']);
        $user->setPassword($_POST['password_']);

        Debug::print_array($_POST);
        echo $user;
        Debug::print_array($user);

        /*
                if(isset($name)){
                    echo "<br> имя: ".$name;
                }

                if(isset($email)){
                    echo "<br> почта: ".$email;
                }

                if(isset($password)){
                    echo "<br> пароль: ".$password;
                }
        */
    }

    public function actionUserAgreement()
    {
        $this->render('pages/signUpIn/articles/userAgreement.html');
    }

    public function actionLogInEnter()
    {
    }
}
