<?php

namespace HomeBundle\Controller;

use HomeBundle\Entity\carriere;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Carriere controller.
 *
 * @Route("carriere")
 */
class carriereController extends Controller
{
    /**
     * Lists all carriere entities.
     *
     * @Route("/", name="carriere_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $carrieres = $em->getRepository('HomeBundle:carriere')->findAll();

        return $this->render('@Home/carriere.html.twig', array(
            'carrieres' => $carrieres,
        ));
    }

    /**
     * Creates a new carriere entity.
     *
     * @Route("/new", name="carriere_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $carriere = new Carriere();
        $form = $this->createForm('HomeBundle\Form\carriereType', $carriere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($carriere);
            $em->flush();
            /// Notif
            $this->get('session')->getFlashBag()->add(
                'notice',
                'Carrière Ajoutée !'
            );

            return $this->redirectToRoute('dashboard_carriere', array('id' => $carriere->getId()));

        }

        return $this->render('carriere/new.html.twig', array(
            'carriere' => $carriere,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a carriere entity.
     *
     * @Route("/{id}", name="carriere_show")
     * @Method("GET")
     */
    public function showAction(carriere $carriere)
    {
        $deleteForm = $this->createDeleteForm($carriere);

        return $this->render('carriere/show.html.twig', array(
            'carriere' => $carriere,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing carriere entity.
     *
     * @Route("/{id}/edit", name="carriere_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, carriere $carriere)
    {
        $editForm = $this->createForm('HomeBundle\Form\carriereType', $carriere);
        $editForm->handleRequest($request);

        $deleteForm = $this->createDeleteForm($carriere);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            /// Notif
            $this->get('session')->getFlashBag()->add(
                'notice',
                'Carrière Modifiée !'
            );

            return $this->redirectToRoute('dashboard_carriere', array('id' => $carriere->getId()));
        }

        return $this->render('carriere/edit.html.twig', array(
            'carriere' => $carriere,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a carriere entity.
     *
     * @Route("/{id}", name="carriere_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, carriere $carriere)
    {
        $form = $this->createDeleteForm($carriere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($carriere);
            $em->flush();



        }


        return $this->redirectToRoute('dashboard_carriere');
    }

    /**
     * Creates a form to delete a carriere entity.
     *
     * @param carriere $carriere The carriere entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(carriere $carriere)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('carriere_delete', array('id' => $carriere->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
