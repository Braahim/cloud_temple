<?php

namespace AppBundle\Controller;

use HomeBundle\Entity\newsletter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $news_letter = new newsletter();
        $form = $this->createForm('HomeBundle\Form\newsletterType', $news_letter);

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ], array(
            'form' => $form->createView(),
        ));
    }


}
