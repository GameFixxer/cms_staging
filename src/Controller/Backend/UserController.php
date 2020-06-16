<?php

declare(strict_types=1);

namespace App\Controller\Backend;

use App\Controller\BackendController;
use App\Model\Dto\ProductDataTransferObject;
use App\Model\Dto\UserDataTransferObject;
use App\Model\UserEntityManager;
use App\Model\UserRepository;
use App\Service\Container;
use App\Service\PasswordManager;
use App\Service\SessionUser;
use App\Service\View;

class UserController implements BackendController
{
    public const ROUTE = 'user';
    private UserRepository $userRepository;
    private UserEntityManager $userEntityManager;
    private SessionUser $userSession;
    private View $view;
    private PasswordManager $passwordManager;

    public function __construct(Container $container)
    {
        $this->userRepository = $container->get(UserRepository::class);
        $this->userEntityManager = $container->get(UserEntityManager::class);
        $this->userSession = $container->get(SessionUser::class);
        $this->passwordManager = $container->get(PasswordManager::class);
        $this->view = $container->get(View::class);
    }

    public function init(): void
    {
        if (!$this->userSession->isLoggedIn()) {
            $this->redirectToPage(LoginCOntroller::ROUTE, '&page=list');
        }
        if (!($this->userSession->getUserRole()==='root')) {
            $this->redirectToPage(LoginCOntroller::ROUTE, '&page=logout');
        }
    }

    public function listAction()
    {
        $userDataTransferObjects = $this->userRepository->getUserList();
        $this->view->addTlpParam('userList', $userDataTransferObjects);
        $this->view->addTemplate('userList.tpl');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            switch ($_POST) {
                case isset($_POST['delete']):
                    $this->deleteUser($_POST['delete']);
                    break;
                case isset($_POST['save']):
                    $this->saveUser(
                        (string)$_POST['newuserpassword'],
                        (string)$_POST['newusername'],
                        (string)$_POST['newuserrole'],
                    );
                    break;
            }
            $this->redirectToPage(self::ROUTE, '&page=list');
        }
    }


    public function detailAction(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            switch ($_POST) {
                case !empty($_POST['delete']):
                    $this->deleteUser($_POST['delete']);
                    break;
                case !empty($_POST['save']):

                    $this->saveUser(
                        (string)$_POST['newuserpassword'],
                        (string)$_POST['newusername'],
                        (string)$_POST['newuserrole']
                    );
                    break;
            }
        }
        $userDTO = $this->userRepository->getUser($_GET['id']);
        if ($this->checkForValidDTO($userDTO)) {
            $this->view->addTlpParam('product', $userDTO);
            $this->view->addTemplate('productEditPage.tpl');
        } else {
            $this->displayPageDoesNotExists();
        }
    }

    private function deleteUser(String $username): void
    {
        $userDTO = $this->userRepository->getUser($username);
        if ($userDTO instanceof UserDataTransferObject) {
            $this->userEntityManager->delete($userDTO);
        }
    }

    private function saveUser( String $password, String $username, String $role): void
    {
        $userDTO = $this->userRepository->getUser($username);
        if (!$userDTO instanceof UserDataTransferObject) {
            $userDTO = new UserDataTransferObject();
        }
        $userDTO->setUsername($username);
        $userDTO->setUserPassword($this->passwordManager->encryptPassword($password));
        $userDTO->setUserRole($role);
        $this->userEntityManager->save($userDTO);
    }

    private function checkForValidDTO($userDTO): bool
    {
        if (is_array($userDTO)) {
            return $this->checkArrayOfDTO($userDTO);
        } elseif ($userDTO === null) {
            return false;
        } else {
            return $userDTO instanceof UserDataTransferObject;
        }
    }

    private function checkArrayOfDTO($userDTO): bool
    {
        foreach ($userDTO as $key) {
            if (!($key instanceof UserDataTransferObject) || $key === null) {
                return false;
            }
        }
        return true;
    }

    private function displayPageDoesNotExists(): void
    {
        $this->view->addTlpParam('error', '404 Page not found.');
        $this->view->addTemplate('404.tpl');
    }

    private function redirectToPage(string $route, string $page): void
    {
        //$host =$_SERVER['HTTP_HOST'];
        $uri = trim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = 'Index.php?cl='.$route;
        $extra2 = $page;
        $extra3 = '&admin=true';
        //header("Location: http://$host$uri/$extra$extra2$extra3");
        header("Location:http://localhost:8080$uri/$extra$extra2$extra3");
    }
}
