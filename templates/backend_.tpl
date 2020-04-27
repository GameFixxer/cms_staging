<html lang="">
<head>
    <title>Backend</title>
</head>
<body>
Welcome to the backend area <br><br>
Here you can see a list with all existing pages: <br><br>

{foreach name=aussen item=page from=$id}
    <hr/>
    <a href="http://localhost:8080/Index.php?page=detail&id={$page->getProductId()}">{$page->getProductId()}</a>
    {$page->getProductName()}
    {$page->getProductDescription()}
    <form action="" method="post">
        <input type="Submit" name="delete={$page->getProductID()}" value="Submit"/>
    </form>
{/foreach}

</body>
</html>
