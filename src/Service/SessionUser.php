<?php
declare(strict_types=1);
namespace App\Service;

use App\Generated\Dto\ProductDataTransferObject;

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

    public function setSessionId(string $id)
    {
        $_SESSION['ID'] = $id;
    }

    public function setSessionTimer()
    {
        $_SESSION['timeout'] = time();
    }

    public function sessionTimeout():bool
    {
        if (isset($_SESSION['timeout']) && $_SESSION['timeout'] - time() > 3600) {
            session_unset();
            session_destroy();
            return true;
        }
        return false;
    }

    public function addToShoppingCard(String $product):void
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

    public function setShoppingCard(array $card):void
    {
        $_SESSION['shoppingCard'] = $card;
    }

    public function removeFromShoppingCard(String $articleNumber):void
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

    public function getShoppingCard()
    {
        if (!isset($_SESSION['shoppingCard'])) {
            return [];
        }
        return $_SESSION['shoppingCard'];
    }

    public function getSessionId():string
    {
        return $_SESSION['ID'];
    }
    public function isLoggedIn(): bool
    {
        return isset($_SESSION['loggedin']);
    }

    public function setUser(String $name):void
    {
        $_SESSION['username'] = $name;
    }
    public function loginUser(String $name): void
    {
        $_SESSION['username'] = $name;
        $_SESSION['loggedin'] = true;
    }


    public function getUser(): string
    {
        return $_SESSION['username'];
    }

    public function setUserRole(String $role):void
    {
        $_SESSION['role'] = $role;
    }

    public function getUserRole()
    {
        return $_SESSION['role'];
    }
    public function logoutUser(): void
    {
        $_SESSION['username'] = null;
        session_unset();
        session_destroy();
    }
}
