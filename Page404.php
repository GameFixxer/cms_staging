<?php
class Page404 extends PageView {


    public function showErrorMessage():void{
        echo ('Fehler: 404'."&nbsp".'Page not found'."<br/>");
        echo ('Für eine Übersicht der verfügbaren Seiten gib folgendes ein:'."<br/>");
        echo '<a href="http://localhost:8080/Index.php?page=list">Click here</a>';
    }

}
