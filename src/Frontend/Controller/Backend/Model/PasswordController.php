<?php
declare(strict_types=1);

namespace App\Frontend\Controller\Backend\Model;

use App\Client\User\Business\UserBusinessFacade;
use App\Client\User\Business\UserBusinessFacadeInterface;
use App\Component\Container;
use App\Component\View;
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
            $this->redirect(DashboardController::ROUTE, 'page=list');
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
                $this->redirect(self::ROUTE, 'page=setnewpassword');
            }
        }
    }

    public function setnewpasswordAction()
    {
        if (isset($_POST['password'])) {
            $newUserPassword = $this->passwordManager->encryptPassword(trim($_POST['password']));
            if ($this->safePassword($newUserPassword)) {
                $this->redirect('login', 'page=login');
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
