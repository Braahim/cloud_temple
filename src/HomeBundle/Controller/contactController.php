<?php

namespace HomeBundle\Controller;

use HomeBundle\Entity\actualite;
use HomeBundle\Entity\contact;
use HomeBundle\Entity\Mail;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Contact controller.
 *
 * @Route("contact")
 */
class contactController extends Controller
{

    /**
     * Creates a new contact entity.
     *
     * @Route("/new", name="contact_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $contact = new Contact();
        $form = $this->createForm('HomeBundle\Form\contactType', $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $prenom = $form['prenom']->getData();
            $nom = $form['nom']->getData();
            $email = $form['email']->getData();
            $tel = $form['tel']->getData();
            $sujet = $form['sujet']->getData();
            $message = $form['message']->getData();
            $raisonSociale = $form['raisonSociale']->getData();

            $contact->setPrenom($prenom);
            $contact->setNom($nom);
            $contact->setEmail($email);
            $contact->setTel($tel);
            $contact->setSujet($sujet);
            $contact->setMessage($message);
            $contact->setRaisonSociale($raisonSociale);

            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            $message = \Swift_Message::newInstance()
                ->setSubject($sujet)
                ->setFrom('bhyazaiez1@gmail.com')
                ->setTo($email)
                ->setBody($this->renderView('@Home/Default/sendemail.html.twig',array('prenom' => $prenom)),'text/html');
            $this->get('mailer')->send($message);
/// Notif
            $this->get('session')->getFlashBag()->add(
                'notice',
                'Contact Envoyé !'
            );
            return $this->redirectToRoute('contact_new');
        }

        return $this->render('contact/new.html.twig', array(
            'contact' => $contact,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing actualite entity.
     *
     * @Route("/{id}/mail", name="contact_mail")
     * @Method({"GET", "POST"})
     */
    public function mailAction(Request $request, Contact $contact)
    {
        $mail = new Mail();
        $mail->setPrenom($contact->getPrenom());
        $mail->setEmail($contact->getEmail());
        $mail->setNom($contact->getNom());
        $mail->setObjet('RE : ' . $contact->getSujet());
        $mailForm = $this->createForm('HomeBundle\Form\MailType', $mail);
        $mailForm->handleRequest($request);

        if ($mailForm->isSubmitted() && $mailForm->isValid()) {

            $mail->setPrenom($contact->getPrenom());
            $mail->setEmail($contact->getEmail());
            $mail->setNom($contact->getNom());

            $em = $this->getDoctrine()->getManager();
            $em->persist($mail);
            $em->flush();

            /// Notif
            $this->get('session')->getFlashBag()->add(
                'notice',
                'Mail envoyé !'
            );



           $msg = \Swift_Message::newInstance()
                ->setSubject($mail->getObjet())
                ->setFrom('bhyazaiez1@gmail.com')
                ->setTo($mail->getEmail())
                ->setBody($this->renderView('@Home/Default/emailAdmin.html.twig',array('message' => $mail)),'text/html');
                $this->get('mailer')->send($msg);

            return $this->redirectToRoute('dashboard_contact');
        }

        return $this->render('contact/edit.html.twig', array(
            'contact' => $contact,
            'mail_form' => $mailForm->createView(),
        ));
    }


}
