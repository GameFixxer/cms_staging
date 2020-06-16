<?php
declare(strict_types=1);

namespace App\Controller\Backend;

use App\Controller\BackendController;
use App\Model\Dto\EmailDataTransferObject;
use App\Model\Dto\UserDataTransferObject;
use App\Model\UserEntityManager;
use App\Service\Container;
use App\Service\EmailManager;
use App\Service\PasswordManager;
use App\Service\View;
use App\Model\UserRepository;
use App\Service\SessionUser;

class LoginController implements BackendController
{
    public const ROUTE = 'login';
    private View $view;
    private UserRepository $userRepository;
    private UserEntityManager $userEntityManager;
    private PasswordManager $passwordManager;
    private SessionUser $userSession;
    private EmailManager $emailManager;


    public function __construct(Container $container)
    {
        $this->userSession = $container->get(SessionUser::class);
        $this->view = $container->get(View::class);
        $this->userRepository = $container->get(UserRepository::class);
        $this->userEntityManager = $container->get(UserEntityManager::class);
        $this->passwordManager = $container->get(PasswordManager::class);
        $this->emailManager = $container->get(EmailManager::class);
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
    public function resetAction()
    {
        $this->view->addTemplate('passwordReset.tpl');
        if (isset($_POST['resetpassword'])&& !empty(trim($_POST['email']))) {
            $username = (string)trim($_POST['email']);
            $userDTO = $this->userRepository->getUser($username);
            if ($userDTO instanceof UserDataTransferObject) {
                $emailDTO= new EmailDataTransferObject();
                $emailDTO->setTo($username);
                $emailDTO->setSubject('Reseting your Password');
                $emailDTO->setMessage('If you really have forgotten your password pls enter the following number 12345.');

                if ($this->emailManager->sendMail($emailDTO)) {
                    $this->view->addTemplate('mailCode.tpl');
                    $this->setEmergencySession($username);
                } else {
                    //dump(error_get_last());
                   // throw new \Exception('Email could not be send.', 1);
                }
            } else {
                $this->view->addTlpParam('loginMessage', 'Invalid Username');
            }
        }
    }

    public function logoutAction()
    {
        $this->userSession->logoutUser();
        $this->redirect(LoginController::ROUTE, 'page=login');
    }
    private function loginUser(UserDataTransferObject $userDTO, string $password, string $username)
    {
        if ($this->passwordManager->checkPassword($password, $userDTO->getUserPassword())) {
            $this->userSession->loginUser($username);
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
    private function setEmergencySession(string $username)
    {
        $id = $this->passwordManager->encryptPassword($username.time());
        $this->userSession->setSessionTimer();
        $this->userSession->setSessionId($id);
        $this->userSession->loginUser();
    }
}
