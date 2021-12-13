<?php
/**
 * Created by PhpStorm.
 * User: Brahim
 * Date: 09/12/2021
 * Time: 12:42
 */

namespace AppBundle\Controller;

use HomeBundle\Entity\actualite;
use HomeBundle\Entity\carriere;
use HomeBundle\Entity\contact;
use HomeBundle\Entity\newsletter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class backController extends Controller
{
    /**
     * @Route("/", name="dashboard")
     */
    public function dashboardAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('back.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * Finds and displays a actualite entity
     * @Route("/actualite", name="dashboard_actualite" )
     * @Method("GET")
     */
    public function show_actualiteAction()
    {
        $em = $this->getDoctrine()->getManager();

        $actualites = $em->getRepository('HomeBundle:actualite')->findAll();

        return $this->render('actualite/back_actualite.html.twig', array(
            'actualites' => $actualites,
        ));
    }


    /**
     * Deletes a actualite entity.
     *
     * @Route("/actualite/{id}/delete", name="dashboard_actualite_delete")
     * @Method("DELETE")
     */
    public function delete_actualiteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $actualite = $em->getRepository(actualite::class)->find($id);
        //var_dump($club);
        $em->remove($actualite);
        $em->flush();

        /// Notif
        $this->get('session')->getFlashBag()->add(
            'notice',
            'Actualité supprimée !'
        );
        return $this->redirectToRoute('dashboard_actualite');
    }



    /**
     * Finds and displays a carriere entity
     * @Route("/carriere", name="dashboard_carriere" )
     * @Method("GET")
     */
    public function show_carriereAction()
    {
        $em = $this->getDoctrine()->getManager();

        $carrieres = $em->getRepository('HomeBundle:carriere')->findAll();

        return $this->render('carriere/back_carriere.html.twig', array(
            'carrieres' => $carrieres,
        ));
    }


    /**
     * Deletes a carriere entity.
     *
     * @Route("/carriere/{id}/delete", name="dashboard_carriere_delete")
     * @Method("DELETE")
     */
    public function delete_carriereAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $carriere = $em->getRepository(carriere::class)->find($id);
        $em->remove($carriere);
        $em->flush();

        /// Notif
        $this->get('session')->getFlashBag()->add(
            'notice',
            'Carrière supprimée !'
        );
        return $this->redirectToRoute('dashboard_carriere');
    }


    /**
     * Finds and displays a contact entity
     * @Route("/contact", name="dashboard_contact" )
     * @Method("GET")
     */
    public function show_contactAction()
    {
        $em = $this->getDoctrine()->getManager();

        $contacts = $em->getRepository('HomeBundle:contact')->findAll();

        return $this->render('contact/back_contact.html.twig', array(
            'contacts' => $contacts,
        ));
    }


    /**
     * Deletes a contact entity.
     *
     * @Route("/contact/{id}/delete", name="dashboard_contact_delete")
     * @Method("DELETE")
     */
    public function delete_contactAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $contact = $em->getRepository(contact::class)->find($id);
        //var_dump($club);
        $em->remove($contact);
        $em->flush();


        /// Notif
        $this->get('session')->getFlashBag()->add(
            'notice',
            'Contact supprimé !'
        );

        return $this->redirectToRoute('dashboard_contact');
    }

    /**
     * Finds and displays a actualite entity
     * @Route("/newsletter", name="dashboard_newsletter" )
     * @Method("GET")
     */
    public function show_newsletterAction()
    {
        $em = $this->getDoctrine()->getManager();

        $newsletter = $em->getRepository('HomeBundle:newsletter')->findAll();

        return $this->render('newsletter/back_newsletter.html.twig', array(
            'newsletter' => $newsletter,
        ));
    }


    /**
     * Deletes a newsletter entity.
     *
     * @Route("/newsletter/{id}/delete", name="dashboard_newsletter_delete")
     * @Method("DELETE")
     */
    public function delete_newsletterAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $newsletter = $em->getRepository(newsletter::class)->find($id);
        //var_dump($club);
        $em->remove($newsletter);
        $em->flush();


        /// Notif
        $this->get('session')->getFlashBag()->add(
            'notice',
            'email supprimé !'
        );
        return $this->redirectToRoute('dashboard_newsletter');
    }

    /**
     * Displays a form to edit an existing actualite entity.
     *
     * @Route("newsletter/{id}/edit", name="newsletter_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $newsletter = $em->getRepository(newsletter::class)->find($id);

        if ($newsletter->getEnabled() == 1) {
            $newsletter->setEnabled(0);
            /// Notif
            $this->get('session')->getFlashBag()->add(
                'notice',
                'newsletter désactivée !'
            );
        }
        else{
            $newsletter->setEnabled(1);
            /// Notif
            $this->get('session')->getFlashBag()->add(
                'notice',
                'newsletter activée  !'
            );

        }
        $em->persist($newsletter);
        $em->flush();



            return $this->redirectToRoute('dashboard_newsletter');


    }

}