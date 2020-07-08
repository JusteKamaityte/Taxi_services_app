<?php

namespace Core;

use App\Users\User;

class Session
{
    /**
     * @var User'io duomenu masyvas.
     */
    private $user;

    /**
     * Konstruktorius kvieciantis loginFromCookie metoda.
     * Session constructor.
     */
    public function __construct()
    {
        $this->loginFromCookie();

    }

    /**
     * Metodas loggin'antis user'i su cookie'yje
     * esanciais user'io duomenimis.
     *Login user from cookie
     */
    public function loginFromCookie(): void
    {
        if (isset($_SESSION['email'])) {
            $this->login($_SESSION['email'], $_SESSION['password']);
        }
    }

    /**
     * Metodas loggin'antis user'i su ivestais duomenimis.
     * Login user and writes array to $this->user
     * @param $email
     * @param $password
     * @return bool
     */
    public function login($email, $password): bool
    {
        $conditions = [
            'email' => $email,
            'password' => $password
        ];

        if ($user = \App\App::$db->getRowWhere('users', $conditions))
        {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $this->user = new User($user);
            return true;
        }
        return false;
    }

    /**
     * Metodas grazinantis user'io duomenu masyva.
     * @return mixed
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * Metodas is'loggin'antis user'i
     * ir istrinantis cookie'yje esancius duomenis.
     */
    public function logout($redirect = null): void
    {
        session_destroy();
        $_SESSION = [];
//        setcookie('PHPSESSID', null, -1);
//        session_destroy();
        if ($redirect) {
            header("Location: $redirect");
        }
    }

    /**
     * @param $role
     * @return bool
     */
    public function userIs(int $role): bool
    {
        $current_user = \App\App::$session->getUser();
        if ($current_user && $current_user->getRole() == $role) {
            return true;
        }
        return false;
    }
}



