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
        if ($this->userSession->isLoggedIn() && !($_GET['page'] === 'logout')) {
            $this->redirect(DashboardController::ROUTE, 'page=list');
        }
        $this->view->addTlpParam('login', 'LOGIN AREA');
    }

    public function loginAction(): void
    {
        if (isset($_POST['login']) && !empty(trim($_POST['username'])) && !empty(trim($_POST['password']))) {
            $username = (string)trim($_POST['username']);
            $password = (string)trim($_POST['password']);
            $userDTO = $this->userRepository->getUser($username);
            if ($userDTO instanceof UserDataTransferObject) {
                $this->loginUser($userDTO, $password, $username);
            }
            $this->view->addTlpParam('loginMessage', 'Invalid Username or Password');
        }

        $this->view->addTemplate('login.tpl');
    }
    public function logoutAction()
    {
        $this->userSession->logoutUser();
        $this->redirect(LoginController::ROUTE, 'page=login');
        //$this->view->addTemplate('login.tpl');
    }
    private function loginUser(UserDataTransferObject $userDTO, string $password, string $username)
    {
        if ($this->passwordManager->checkPassword($password, $userDTO->getUserPassword())) {
            $this->userSession->setUser($username);
            $this->userSession->setUserRole($userDTO->getUserRole());
            $this->redirect(DashboardController::ROUTE, 'page=list');
        }
    }
    private function redirect(String $cl, String $page): void
    {
        //$host = $_SERVER['HTTP_HOST'];
        $uri = trim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = 'Index.php?cl='.$cl;
        $extra2 = '&'.$page;
        $extra3 = '&admin=true';
        //header("Location: http://$host$uri/$extra$extra2$extra3");
        header("Location: http://localhost:8080$uri/$extra$extra2$extra3");
    }
}
