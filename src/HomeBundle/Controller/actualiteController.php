<?php

namespace HomeBundle\Controller;

use HomeBundle\Entity\actualite;
use HomeBundle\Entity\newsletter;
use http\Env\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


/**
 * actualite controller.
 *
 * @Route("actualite")
 */
class actualiteController extends Controller
{
    /**
     * Lists all actualite entities.
     *
     * @Route("/", name="actualite_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $actualites = $em->getRepository('HomeBundle:actualite')->order_date_desc();

        return $this->render('actualite/index.html.twig', array(
            'actualites' => $actualites,
        ));
    }

    /**
     * Creates a new actualite entity.
     *
     * @Route("/new", name="actualite_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request )
    {

        $actualite = new actualite();
        $newsletter = new newsletter();
        $form = $this->createForm('HomeBundle\Form\actualiteType', $actualite);
        $form_newsLetter = $this->createForm('HomeBundle\Form\newsletterType', $newsletter);

        $form->handleRequest($request);
        $newsletters = $this->getDoctrine()->getRepository(newsletter::class)->findAll();
        $emails = [];
        foreach ($newsletters as $newsletter) {
            if ($newsletter->getEnabled() == 1) {
                $emails[$newsletter->getEmail()] = $newsletter->getEmail();
            }
        }
        if ($form->isSubmitted() && $form->isValid()) {

            /**
             * @var UploadedFile $file
             *
             */
            $file=$actualite->getPhoto();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move(
                $this->getParameter('image_directory'),$fileName
            );
            $actualite->setPhoto($fileName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($actualite);
            $em->flush();

            $msg = \Swift_Message::newInstance()
                ->setSubject('Un nouvel article a été ajouté')
                ->setFrom('bhyazaiez1@gmail.com')
                ->setBcc($emails)
                ->setBody(
                    $this->renderView(
                        'actualite/show_actualite_mail.html.twig',array(
                        'actualite' => $actualite,'form' => $form_newsLetter->createView())
                    ),
                    'text/html'
                )
            ;
            $this->get('mailer')->send($msg);
            $this->addFlash('article', 'L\'article a bien été ajouté');

            /// Notif
            $this->get('session')->getFlashBag()->add(
                'notice',
                'Actualité Ajoutée !'
            );
            return $this->redirectToRoute('dashboard_actualite', array('id' => $actualite->getId() ));
        }

        return $this->render('actualite/new.html.twig', array(
            'actualite' => $actualite,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a actualite entity.
     *
     * @Route("/{id}", name="actualite_show")
     * @Method("GET")
     */
    public function showAction(actualite $actualite)
    {
        $recent = $this->getDoctrine()->getManager()->getRepository('HomeBundle:actualite')->recently_added();

        return $this->render('actualite/show.html.twig', array(
            'actualite' => $actualite,
            'recent' => $recent,
        ));
    }



    /**
     * Displays a form to edit an existing actualite entity.
     *
     * @Route("/{id}/edit", name="actualite_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, actualite $actualite)
    {
        $deleteForm = $this->createDeleteForm($actualite);
        $img = $actualite->getPhoto();
        $editForm = $this->createForm('HomeBundle\Form\actualiteType', $actualite);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            /**
             * @var UploadedFile $file
             *
             */
            $file=$actualite->getPhoto();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move(
                $this->getParameter('image_directory'),$fileName
            );
            $actualite->setPhoto($fileName);
            //$actualite->setPhoto($img);



            $this->getDoctrine()->getManager()->flush();

            /// Notif
            $this->get('session')->getFlashBag()->add(
                'notice',
                'Actualité modifiée !'
            );
            return $this->redirectToRoute('dashboard_actualite', array('id' => $actualite->getId()));
        }

        return $this->render('actualite/edit.html.twig', array(
            'actualite' => $actualite,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a actualite entity.
     *
     * @Route("/{id}/delete", name="actualite_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, actualite $actualite)
    {
        $form = $this->createDeleteForm($actualite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($actualite);
            $em->flush();
            /// Notif
            $this->get('session')->getFlashBag()->add(
                'notice',
                'Actualité supprimée !'
            );
        }

        return $this->redirectToRoute('dashboard_actualite');
    }

    /**
     * Creates a form to delete a actualite entity.
     *
     * @param actualite $actualite The actualite entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(actualite $actualite)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('actualite_delete', array('id' => $actualite->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }
}
