<?php

namespace HomeBundle\Controller;

use HomeBundle\Entity\newsletter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{


    public function indexAction(Request $request)
    {
        $news_letter = new newsletter();
        $form = $this->createForm('HomeBundle\Form\newsletterType', $news_letter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $news_letter->setEnabled(1);
            $em = $this->getDoctrine()->getManager();
            $em->persist($news_letter);
            $em->flush();

            $msg = \Swift_Message::newInstance()
                ->setSubject('Confirmation d abonnement')
                ->setFrom('bhyazaiez1@gmail.com')
                ->setTo($news_letter->getEmail())
                ->setBody('Merci pour votre abonnement');
            $this->get('mailer')->send($msg);
            /// Notif
            $this->get('session')->getFlashBag()->add(
                'notice',
                'Félicitations ! Vous êtes désormais abonnés à notre newsletter  !'
            );

            return $this->redirectToRoute('home_homepage');
        }

        return $this->render('@Home/Default/index.html.twig', array(
            'form' => $form->createView(),
        ));

    }

    public function actualiteAction()
    {
        return $this->render('@Home/actualite.html.twig');
    }

    public function contactAction()
    {
        return $this->render('@Home/contact.html.twig');
    }

    public function carriereAction()
    {
        return $this->render('@Home/carriere.html.twig');
    }




}
