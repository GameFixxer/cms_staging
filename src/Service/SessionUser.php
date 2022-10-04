<?php
declare(strict_types=1);
namespace App\Service;

class SessionUser
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
            $_SESSION['shoppingCard'] = [];
        }
    }

    public function __destruct()
    {
        //session_destroy();
    }

    /**
     * @param string $id
     *
     * @return void
     */
    public function setSessionId(string $id): void
    {
        $_SESSION['ID'] = $id;
    }

    /**
     * @return void
     */
    public function setSessionTimer(): void
    {
        $_SESSION['timeout'] = time();
    }

    /**
     * @return bool
     */
    public function sessionTimeout(): bool
    {
        if (isset($_SESSION['timeout']) && $_SESSION['timeout'] - time() > 3600) {
            session_unset();
            session_destroy();
            return true;
        }
        return false;
    }

    /**
     * @param String $product
     *
     * @return void
     */
    public function addToShoppingCard(String $product): void
    {
        if (!isset($_SESSION['shoppingCard'])) {
            $_SESSION['shoppingCard'] = [];
            array_push($_SESSION['shoppingCard'], $product);
        } elseif (!is_array($_SESSION['shoppingCard'])) {
            $tmp = [];
            $tmp [] = $_SESSION['shoppingCard'];
            $_SESSION['shoppingCard'] = $tmp;
            array_push($_SESSION['shoppingCard'], $product);
        }
        array_push($_SESSION['shoppingCard'], $product);
    }

    /**
     * @param array $card
     *
     * @return void
     */
    public function setShoppingCard(array $card): void
    {
        $_SESSION['shoppingCard'] = $card;
    }

    /**
     * @param String $articleNumber
     *
     * @return void
     */
    public function removeFromShoppingCard(String $articleNumber): void
    {
        $key = array_search($articleNumber, $_SESSION['shoppingCard']);
        if ($key !== false && isset($_SESSION['shoppingCard'])) {
            $_SESSION['shoppingCard'][$key] = null;
            $card = [];
            foreach ($_SESSION['shoppingCard'] as $item) {
                if (isset($item)) {
                    $card[] = $item;
                }
            }
            $_SESSION['shoppingCard'] = $card;
        }
    }

    /**
     * @return array
     */
    public function getShoppingCard(): array
    {
        if (!isset($_SESSION['shoppingCard'])) {
            return [];
        }
        return $_SESSION['shoppingCard'];
    }

    /**
     * @return string
     */
    public function getSessionId(): string
    {
        return $_SESSION['ID'];
    }

    /**
     * @return bool
     */
    public function isLoggedIn(): bool
    {
        return isset($_SESSION['loggedin']);
    }

    /**
     * @param String $name
     *
     * @return void
     */
    public function setUser(String $name): void
    {
        $_SESSION['username'] = $name;
    }

    /**
     * @param String $name
     *
     * @return void
     */
    public function loginUser(String $name): void
    {
        $_SESSION['username'] = $name;
        $_SESSION['loggedin'] = true;
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $_SESSION['username'];
    }

    /**
     * @param String $role
     *
     * @return void
     */
    public function setUserRole(String $role): void
    {
        $_SESSION['role'] = $role;
    }

    /**
     * @return mixed
     */
    public function getUserRole()
    {
        return $_SESSION['role'];
    }

    /**
     * @return void
     */
    public function logoutUser(): void
    {
        $_SESSION['username'] = null;
        session_unset();
        session_destroy();
    }
}
