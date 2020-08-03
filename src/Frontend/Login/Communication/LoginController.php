<?php
declare(strict_types=1);

namespace App\Frontend\Login\Communication;

use App\Client\User\Business\UserBusinessFacade;
use App\Client\User\Business\UserBusinessFacadeInterface;
use App\Component\View;
use App\Frontend\BackendController;
use App\Frontend\User\Communication\DashboardController;
use App\Generated\Dto\EmailDataTransferObject;
use App\Generated\Dto\UserDataTransferObject;
use App\Service\PasswordManager;
use App\Service\SymfonyMailerManager;
use App\Service\SessionUser;

class LoginController implements BackendController
{
    public const ROUTE = 'login';
    private View $view;
    private UserBusinessFacadeInterface $userBusinessFacade;
    private PasswordManager $passwordManager;
    private SessionUser $userSession;
    private SymfonyMailerManager $mailManager;


    public function __construct(
        View $view,
        UserBusinessFacadeInterface $userBusinessFacade,
        PasswordManager $passwordManager,
        SessionUser $userSession,
        SymfonyMailerManager $mailManager
    ) {
        $this->userSession = $userSession;
        $this->view = $view;
        $this->userBusinessFacade = $userBusinessFacade;
        $this->passwordManager = $passwordManager;
        $this->mailManager = $mailManager;
    }

    public function init(): void
    {
        if ($this->userSession->isLoggedIn() && !($_GET['page'] === 'logout')) {
            $this->view->setRedirect(DashboardController::ROUTE, '&page=list', ['admin=true']);
        }
        $this->view->addTlpParam('login', 'LOGIN AREA');
    }

    public function loginAction(): void
    {
        if (isset($_POST['login']) && !empty(trim($_POST['username'])) && !empty(trim($_POST['password']))) {
            $username = (string)trim($_POST['username']);
            $password = (string)trim($_POST['password']);
            $userDTO = $this->userBusinessFacade->get($username);
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
        if (isset($_POST['resetpassword']) && !empty(trim($_POST['email']))) {
            $username = (string)trim($_POST['email']);
            $userDTO = $this->userBusinessFacade->get($username);
            if ($userDTO instanceof UserDataTransferObject) {
                $resetCode = $this->passwordManager->createResetPassword();
                $emailDTO = new EmailDataTransferObject();
                $emailDTO->setTo($username);
                $emailDTO->setSubject('Reseting your Password');
                $emailDTO->setMessage('If you really have forgotten your password pls enter the following number:'.$resetCode);

                if ($this->mailManager->sendMail($emailDTO)) {
                    $sessionId = $this->setEmergencySession($username);
                    $this->setEmergencyUserData($sessionId, $resetCode, $userDTO);
                    $this->view->setRedirect(PasswordController::ROUTE, '&page=reset', ['admin=true']);
                } else {
                    throw new \Exception('Email could not be send.', 1);
                }
            } else {
                $this->view->addTlpParam('loginMessage', 'Invalid Username');
            }
        }
    }

    public function logoutAction()
    {
        $userDTO = $this->userBusinessFacade->get($this->userSession->getUser());

        $userDTO->setShoppingCard($this->userSession->getShoppingCard());

        $this->userBusinessFacade->save($userDTO);

        $this->userSession->logoutUser();

        $this->view->setRedirect(LoginController::ROUTE, '&page=login', ['admin=true']);
    }
    private function loginUser(UserDataTransferObject $userDTO, string $password, string $username)
    {
        if ($this->passwordManager->checkPassword($password, $userDTO->getUserPassword())) {
            $this->userSession->setShoppingCard(array_merge($userDTO->getShoppingCard(), $this->userSession->getShoppingCard()));
            $this->userSession->loginUser($username);
            $this->userSession->setUserRole($userDTO->getUserRole());
            $this->view->setRedirect(DashboardController::ROUTE, '&page=list', ['admin=true']);
        }
    }
    private function setEmergencySession(string $username):String
    {
        $sessionId = $this->passwordManager->encryptPassword($username.time());
        $this->userSession->setSessionTimer();
        $this->userSession->setSessionId($sessionId);
        $this->userSession->setUser($username);
        return $sessionId;
    }

    private function setEmergencyUserData(String $sessionId, string $resetCode, UserDataTransferObject $userDTO)
    {
        $userDTO->setSessionId($sessionId);
        $userDTO->setResetPassword($resetCode);
        $this->userBusinessFacade->save($userDTO);
    }
}
