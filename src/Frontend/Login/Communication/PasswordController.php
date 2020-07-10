<?php
declare(strict_types=1);

namespace App\Frontend\Login\Communication;

use App\Client\User\Business\UserBusinessFacade;
use App\Client\User\Business\UserBusinessFacadeInterface;
use App\Component\Container;
use App\Component\View;
use App\Frontend\BackendController;
use App\Frontend\User\Communication\DashboardController;
use App\Generated\Dto\UserDataTransferObject;
use App\Service\PasswordManager;
use App\Service\SessionUser;

class PasswordController implements BackendController
{
    public const ROUTE = 'password';
    private View $view;
    private UserBusinessFacadeInterface $userBusinessFacade;
    private PasswordManager $passwordManager;
    private SessionUser $userSession;


    public function __construct(Container $container)
    {
        $this->view = $container->get(View::class);
        $this->userBusinessFacade = $container->get(UserBusinessFacade::class);
        $this->passwordManager = $container->get(PasswordManager::class);
        $this->userSession = $container->get(SessionUser::class);
    }

    public function init(): void
    {
        if ($this->userSession->isLoggedIn()) {
            $this->view->setRedirect(DashboardController::ROUTE, '&page=list', ['admin=true']);
        }
    }


    public function resetAction()
    {
        $this->view->addTemplate('mailCode.tpl');
        if (isset($_POST['resetpassword']) && !empty(trim($_POST['resetcode']))) {
            $resetCode = (string)trim($_POST['resetcode']);
            $userDTO = $this->userBusinessFacade->get($_SESSION['username']);
            if ($userDTO->getSessionId() === $_SESSION['ID'] && $userDTO->getResetPassword() === $resetCode) {
                $this->view->addTemplate('setNewPassword.tpl');
                $this->view->setRedirect(self::ROUTE, '&page=setnewpassword', ['admin=true']);
            }
        }
    }

    public function setnewpasswordAction()
    {
        if (isset($_POST['password'])) {
            $newUserPassword = $this->passwordManager->encryptPassword(trim($_POST['password']));
            if ($this->safePassword($newUserPassword)) {
                $this->view->setRedirect(LoginController::ROUTE, '&page=login', ['admin=true']);
            }
            $this->view->addTlpParam('errorMessage', 'This user does not exist');
        }
        $this->view->addTemplate('setNewPassword.tpl');
    }

    private function safePassword(string $password):bool
    {
        $userDTO = $this->userBusinessFacade->get($_SESSION['username']);
        if ($userDTO instanceof UserDataTransferObject) {
            $userDTO->setUserPassword($password);
            $userDTO->setResetPassword('0');
            $userDTO->setSessionId('0');
            $this->userBusinessFacade->save($userDTO);
            return true;
        }
        return false;
    }
}
