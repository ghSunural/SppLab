<?php


namespace user\models;


use Application as A;


class TUser
{
    // Alt-insert - быстрые геттеры
    // Ctrl+Shift+ +-
    private $id;
    private $surname;
    private $firstName;
    private $login;
    private $passwordHash;
    private $email;
    private $role;

    /*
('BAN', 0, 'пользователь c запрещенным входом'),
('GST', 1, 'гость'),
('UR', 3, 'зарегистрированный пользователь'),
('UEXT', 5, 'пользователь с раширенными правами'),
('MDR', 7, 'модератор'),
('ADM', 9, 'администратор'),
('DEV', 12, 'разработчик');

    private $avatarFile;

    */
    /*
        public function __construct($login, $password, $role = 1)
        {
            try {
                $this->login = $login;
                $this->passwordHash = self::passwordCrypt($password);

            } catch (A\TException $e) {
                echo $e->getMessage();
            }



            if (self::checkPassword($password)) {

                $this->passwordHash = self::passwordCrypt($password);
            }


        }

    */


    public function __toString()
    {
        return
            'id: ' . $this->id . '<br>' .
            'surname: ' . $this->surname . '<br>' .
            'firstName: ' . $this->firstName . '<br>' .
            'login: ' . $this->login . '<br>' .
            'passwordHash: ' . $this->passwordHash . '<br>' .
            'email: ' . $this->email . '<br>' .
            'role: ' . $this->role . '<br>';

    }

    public function toArray()
    {


    }


    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @return mixed
     */
    public
    function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public
    function setSurname($surname)
    {
        $this->surname = htmlspecialchars($surname);
    }

    /**
     * @return mixed
     */
    public
    function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public
    function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public
    function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public
    function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public
    function getPasswordHash()
    {
        return $this->passwordHash;
    }

    /**
     * @param mixed $passwordHash
     */
    public
    function setPassword($password)
    {
        $this->passwordHash = self::passwordCrypt($password);
    }


    /**
     * @return mixed
     */
    public
    function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public
    function setEmail($email)
    {
        $this->email = $email;
    }


    public
    static function checkName($name)
    {

        if (strlen($name) >= 2) {
            return true;
        }

        return false;
    }

    public
    static function checkEmail($email)
    {

        if (preg_match($email, "/@sppural.ru/")) {
            return true;
        }
        return false;
    }

    public
    static function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        } else {
            throw new TException("Пароль должен составлять более 6-ти символов");
        }
    }

    public
    static function auth($userId)
    {
        $_SESSION['userId'] = $userId;
    }

    public
    static function isLogged()
    {

        return (isset($_SESSION['user'])) ? true : false;
        /*
                if (isset($_SESSION['user'])) {
                    return $_SESSION['user'];
                }

                return false;
        */
    }

    public
    static function isGuest()
    {
        return (isset($_SESSION['user'])) ? false : true;
        /*
           if (isset($_SESSION['user'])) {
               return false;
           }
           return true;
        */
    }

    private
    function passwordCrypt($password)
    {

        return password_hash($password, PASSWORD_DEFAULT);
    }

    public
    function verifyPassword($password)
    {
        if (isset($password) && isset($hash)) {
            return password_verify($password, $this->passwordHash);
        }

        return false;
    }


}