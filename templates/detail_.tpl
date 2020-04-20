{extends file="basic.tpl"}
{block name="title"}
    Page Title
{/block}
{block name ="body"} Id:{$id}
    {$productname}.
    {$description}
{/block}