<html lang="">
<head>
    <title>Dashboard</title>
</head>
<body>
Welcome to the backstage area!
{foreach name=aussen item=page from=$id}
    <hr/>

    <a href="http://localhost:8080/Index.php?page=product&admin=true&id={$page->getProductId()}">{$page->getProductId()}</a>
    {$page->getProductName()}
    {$page->getProductDescription()}

{/foreach}
<br><br><br><br>
<form id="logout" name="logout" action="" method="post">
    <input type="hidden" id="logout" name="logout" value="logout">
    <input type="submit" value="logout">
</form>
</body>
</html>