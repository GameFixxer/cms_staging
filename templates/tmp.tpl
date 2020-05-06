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
<br><br>
<form id="form" name="form" action="" method="post">
    <label>
        Delete <input type="checkbox" name="delete" value={$page->getProductId()}>

    </label>
    <label>
        <br>
        Update description <input type="checkbox" name="update" value={$page->getProductId()}>

    </label>


    {/foreach}
    <br><br>
    <br><br>On Update:<br>
    <label for="updatedescription">New Description</label><br>
    <input type="text" id="updatedescription" name="updatedescription">
    <br><br><br><br>
    Create new product <input type="checkbox" name="new" value={$page->getProductId()}>
    <br>Productname
    <br><input type="text" name="newpname" size=40 maxlength=40>
    <br>Productdescription
    <br><input type="text" name="newpdescription" size=40 maxlength=40>
    <br><br>
    <input type="submit" value="Commit">
</form>
<form id="logout" name="logout" action="" method="post">
    <input type="hidden" id="logout" name="logout" value="logout">
    <input type="submit" value="logout">
</form>
</body>
</html>
