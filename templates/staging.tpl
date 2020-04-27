{extends file="basic.tpl"}
{block name="title"}
    Backend Login
{/block}
{block name ="body"}

    <form action="Backend.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" /><br />
        <label for="password">Password:</label>
        <input type="password" id="pwd" name="password">
        <input type="Submit" value="Submit" />
    </form>
{/block}