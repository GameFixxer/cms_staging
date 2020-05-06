{extends file="basic.tpl"}
{block name="title"}
    Detail:{$id->getProductName()}
{/block}
{block name ="body"}
    ID: {$id->getProductId()}
    <br>
    Productname: {$id->getProductName()}
    <br>
    Description: {$id->getProductDescription()}
    <br>
    <hr/>
    <form id="form" name="form" action="" method="post">
    Create product <input type="checkbox" name="id" value=''>
    Update product <input type="checkbox" name="update" value={$id->getProductId()}>
    Delete product <input type="checkbox" name="delete" value={$id->getProductId()}>
    <br>Productname
    <br><input type="text" name="newpagename" size=40 maxlength=40>
    <br>Productdescription
    <br><input type="text" name="newpagedescription" size=40 maxlength=40>
    <br><br>
    <input type="submit" value="commit">
    </form>
    <hr/>
    <a href="http://localhost:8080/Index.php?page=dashboard&admin=true">back to dashboard</a>

{/block}