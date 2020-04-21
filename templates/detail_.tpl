{extends file="basic.tpl"}
{block name="title"}
    Page Title
{/block}
{block name ="body"}
    ID: {$id->id}
    <br>
    Productname: {$id->productname}
    <br>
    Description: {$id->description}
    <br>

{/block}