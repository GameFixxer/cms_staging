<html lang="">
{extends file="basic.tpl"}
{block name="subtitel_h1"} {/block}
{block name="titel"}Welcome to the Backstagearea{/block}
{block name="titel_button"}Back to home{/block}
{block name="titel_button_href"}"http://localhost:8080/Index.php?cl=home"{/block}
{block name ="body"}
    <body>
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Userlist</h2>
                <h3 class="section-subheading text-muted">Manage our User</h3>

                <form id="deleteUpdateForm" name="deleteUpdateform" action="" method="post">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Username</th>
                            <th scope="col">Role</th>
                            <th scope="col"></th>
                            <th scope="col">
                                <button type="button" class="btn btn-primary btn-sm" id="create" data-toggle="modal"
                                        data-target="#model">
                                    Create new User
                                </button>
                            </th>
                        </tr>
                        {foreach name=aussen item=$user from=$userList}
                        </thead>
                        <tr>
                            <th scope="row" id={$user->getUsername()}>{$user->getUsername()}</th>
                            <td>{$user->getUserRole()}
                            <td>
                            <td>
                                <button class="btn btn-primary btn-sm text-uppercase" id="delete"
                                        data-title={$user->getUserName()} name="delete"
                                        type="submit" value={$user->getUserName()}>Delete
                                </button>
                            </td>
                            <th scope="col"><a class="btn btn-primary btn-sm text-uppercase"
                                               data-title={$user->getUserName()} id={$user->getUserName()}
                                               name="edit"
                                               href="/Index.php?cl=user&page=detail&id={$user->getUserId()}&admin=true"
                                               type="submit">Edit
                                </a></th>
                        </tr
                        {/foreach}
                        </tbody>
                    </table>
            </div>
            </form>
        </div>
        <div class="text-center">
            <a href="/Index.php?cl=dashboard&admin=true" class="list-group-item list-group-item-action">Return to Dashboard</a>
            <form id="logout" name="logout" action="" method="post">
                <button class="btn btn-primary btn-lg text-uppercase" id="logout" name="logout" type="submit">
                    Logout
                </button>
            </form>
        </div>
    </section>
    <div class="modal fade" id="model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="text-center">
                    <h2 class="text-uppercase">New User</h2>
                    <p class="item-intro text-muted"></p>
                    <form id="usercreation" name="usercreation" action="" method="post">
                        <div class="text-center">
                            <input type="text" name="newusername" id="newusername" placeholder="username"/>
                            <input type="password" name="newuserpassword" id="newuserpassword" placeholder="password"/>
                            <br>
                            <br>

                            <select class="selectpicker" id="newuserrole" name="newuserrole">
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                                <option value="root">Root</option>
                            </select>
                            <br>
                            <br>
                        </div>
                            <button class="btn btn-primary btn-lg text-uppercase" id="save" name="save" type="submit">
                                Create
                            </button>

                    </form>
                    <p>
                        <button class="btn btn-primary btn-sm" data-dismiss="modal" type="button"><i
                                    class="fas fa-times mr-1"></i>Discard
                        </button>
                </div>
            </div>
        </div>
    </div>


    </body>
{/block}
</html>