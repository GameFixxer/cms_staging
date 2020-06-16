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
use function PHPUnit\Framework\isEmpty;

class PasswordController implements BackendController
{
    public const ROUTE = 'password';
    private View $view;
    private UserRepository $userRepository;
    private UserEntityManager $userEntityManager;
    private PasswordManager $passwordManager;
    private SessionUser $userSession;
    private EmailManager $emailManager;


    public function __construct(Container $container)
    {
        $this->view = $container->get(View::class);
        $this->userRepository = $container->get(UserRepository::class);
        $this->userEntityManager = $container->get(UserEntityManager::class);
        $this->passwordManager = $container->get(PasswordManager::class);
        $this->emailManager = $container->get(EmailManager::class);
    }

    public function init(): void
    {
        $this->view->addTemplate('passwordReset.tpl');
    }


    public function resetAction()
    {
        if (isset($_POST['resetpassword'])&& !empty(trim($_POST['resetCode']))) {
            $resetCode = (string)trim($_POST['resetCode']);
            $userDTO = $this->userRepository->getUser($resetCode);

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
