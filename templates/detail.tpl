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

{/block}