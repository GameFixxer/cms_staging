<?php


namespace App\Frontend\Shared;

class Router
{
    public function redirect(String $cl, String $page): void
    {
        $uri = trim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = 'Index.php?cl='.$cl;
        $extra2 = '&'.$page;
        $extra3 = '&admin=true';
        header("Location: http://localhost:8080$uri/$extra$extra2$extra3");
    }
}
