<?php

namespace Application\Controllers;

use Application\Debug;
use signin\models as M;
use user\models\MUsers;
use user\models\TUser;
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
            default:
                $this->render('pages/signUpIn/views/#VLogIn.php');
        }
    }

    public function acnAuth()
    {
       // $user = TUserFactory::createEmptyUser();
        // FormValid()
       // $user->setLogin($_POST['login']);
       // $user->setPassword($_POST['password']);
        if (MUsers::auth($_POST['login'], $_POST['password'])) {
            header("Location: /");
        }
        echo $_POST['login'];

    }

    public static function actionRegister()
    {
        $user = TUserFactory::createEmptyUser();

        $user->setSurname($_POST['Surname']);
        $user->setFirstName($_POST['firstName']);
        $user->setLogin($_POST['login']);
        $user->setEmail($_POST['email']);
        $user->setPassword($_POST['password']);
        $user->setRole('UEXT');

       // echo $user;
        MUsers::register($user);
       // MUsers::auth($user);



    }

    public function acnUnlog()
    {
        MUsers::unlog();
        header("Location: /sign/login");

    }

    public function actionUserAgreement()
    {
        $this->render('pages/signUpIn/articles/userAgreement.html');
    }

    public function actionLogInEnter()
    {
    }
}
