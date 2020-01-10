<?php


namespace Application\Controllers;


class SignUpInController extends BaseController
{

    public function actionIndex()
    {
        //$var = ::get;
        // $this->models['var'] = $var;
        $this->render("pages/signUpIn/views/#VSignUp.php");
    }

    public function actionLogIn()
    {
        //$var = ::get;
        // $this->models['var'] = $var;
        $this->render("pages/signUpIn/views/#VLogIn.php");
    }

    public function actionSignUp()
    {
        //$var = ::get;
        // $this->models['var'] = $var;
        $this->render("pages/signUpIn/views/#VSignUp.php");
    }


    public static function actionRegister()
    {
        $name = '';
        $email = '';
        $password = '';

        $userAttrib = array(
            'name' => $name,
            'email' => $email,
            'password' => $password
        );

        if (!isset($_POST["submit"])) {
            return false;
        }

        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];

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

        $this->render("pages/signUpIn/articles/userAgreement.html");
    }

}

?>
