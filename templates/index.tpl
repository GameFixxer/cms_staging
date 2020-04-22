<html lang="">
<head>
    <title>List</title>
</head>
<body>
{foreach name=aussen item=page from=$id}
    <hr/>
    <a href="http://localhost:8080/Index.php?page=detail&id={$page->getProductId()}">{$page->getProductId()}</a>
    {$page->getProductName()}
    {$page->getProductDescription()}


{/foreach}

</body>
</html>
