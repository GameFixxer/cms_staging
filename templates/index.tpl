<html lang="">
<head>
    <title>Smarty</title>
</head>
<body>
{foreach name=aussen item=page from=$id}
    <hr/>
    {$page->getProductId()}
    {$page->getProductName()}
    {$page->getProductDescription()}


{/foreach}

</body>
</html>
