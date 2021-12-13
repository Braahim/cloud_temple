<?php
/**
 * Created by PhpStorm.
 * User: Brahim
 * Date: 13/12/2021
 * Time: 10:45
 */

namespace AppBundle\Security;


use AppBundle\Controller\DefaultController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Http\Authorization\AccessDeniedHandlerInterface;

class AccessDeniedHandler implements AccessDeniedHandlerInterface
{



    public function handle(Request $request, AccessDeniedException $accessDeniedException)
    {
        // ...


        return new RedirectResponse('http://127.0.0.1:8000/app_dev.php/_error/403');

    }
}