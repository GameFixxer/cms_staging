<?php
declare(strict_types=1);

namespace App\Controller\Backend;

use App\Controller\BackendController;
use App\Model\Dto\UserDataTransferObject;
use App\Model\UserEntityManager;
use App\Service\Container;
use App\Service\PasswordManager;
use App\Service\View;
use App\Model\UserRepository;
use App\Service\SessionUser;
use function PHPUnit\Framework\isEmpty;

class LoginController implements BackendController
{
    public const ROUTE = 'login';
    private View $view;
    private UserRepository $userRepository;
    private UserEntityManager $userEntityManager;
    private PasswordManager $passwordManager;
    private SessionUser $userSession;


    public function __construct(Container $container)
    {
        $this->userSession = $container->get(SessionUser::class);
        $this->view = $container->get(View::class);
        $this->userRepository = $container->get(UserRepository::class);
        $this->userEntityManager = $container->get(UserEntityManager::class);
        $this->passwordManager = $container->get(PasswordManager::class);
    }

    public function init(): void
    {
        if ($this->userSession->isLoggedIn()) {
            $this->redirectToDashboard();
        }
    }

    public function action(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['login']) && !empty(trim($_POST['username'])) && !empty(trim($_POST['password']))) {
                $username = (string)trim($_POST['username']);
                $password = (string)trim($_POST['password']);
                $userDTO = $this->userRepository->getUser($username);
                $this->loginUser($userDTO, $password, $username);
            }
            if (isset($_POST['createUser'], $_POST['newUsername'], $_POST['newUserPassword'])) {
                $username = (string)trim($_POST['newUsername']);
                $password = (string)trim($_POST['newUserPassword']);
                $this->createUser($username, $password);
            }
        }
        $this->view->addTemplate('login.tpl');
    }

    private function loginUser($userDTO, string $password, string $username)
    {
        if (($userDTO instanceof UserDataTransferObject) && ($this->passwordManager->checkPassword($password, $userDTO->getUserPassword()))) {
            $this->userSession->setUser($username);
            $this->redirectToDashboard();
        }
        $this->view->addTlpParam('loginMessage', 'Invalid Username or Password');
    }

    private function createUser(string $username, string $password): void
    {
        if ($userDTO = $this->userRepository->getUser($username) instanceof UserDataTransferObject) {
            $this->view->addTlpParam('loginMessage', 'Username already exists. Please choose another one.');
        } else {
            $userDTO = new UserDataTransferObject();
            $userDTO->setUsername($username);
            $userDTO->setUserPassword($this->passwordManager->encryptPassword($password));
            $this->userEntityManager->save($userDTO);
            $this->view->addTlpParam('loginMessage', 'Account successfully created. You can now login.');
        }
    }

    private function redirectToDashboard(): void
    {
        //$host = $_SERVER['HTTP_HOST'];
        $uri = trim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = 'Index.php?cl='.ProductController::ROUTE;
        $extra2 = '&page=list';
        $extra3 = '&admin=true';
        //header("Location: http://$host$uri/$extra$extra2$extra3");
        header("Location: http://localhost:8080$uri/$extra$extra2$extra3");
    }
}
