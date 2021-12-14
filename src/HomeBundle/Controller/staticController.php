<?php
/**
 * Created by PhpStorm.
 * User: Brahim
 * Date: 11/12/2021
 * Time: 15:36
 */

namespace HomeBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


/**
 * static controller
 *
 * @Route("/")
 */
class staticController extends  Controller
{

    /// CLOUD SERVICES :

    /**
     *
     *
     * @Route("/services/cloud", name="home_cloud")
     * @Method({"GET", "POST"})
     */
    public function cloudAction()
    {
        return $this->render('@Home/static/cloud/cloud.html.twig');
    }

    /**
     *
     *
     * @Route("/services/cloud/strategie", name="home_cloud_strategie")
     * @Method({"GET", "POST"})
     */
    public function strategieAction()
    {
        return $this->render('@Home/static/cloud/strategie.html.twig');
    }

    /**
     *
     *
     * @Route("/services/cloud/souverain", name="home_cloud_souverain")
     * @Method({"GET", "POST"})
     */
    public function souverainAction()
    {
        return $this->render('@Home/static/cloud/souverain.html.twig');
    }
    /**
     *
     *
     * @Route("/services/cloud/souverain/partenaires", name="home_cloud_souverain_partners")
     * @Method({"GET", "POST"})
     */
    public function partnerAction()
    {
        return $this->render('@Home/static/cloud/souverain_partner.html.twig');
    }

    /**
     *
     *
     * @Route("/services/cloud/public", name="home_cloud_public")
     * @Method({"GET", "POST"})
     */
    public function publicAction()
    {
        return $this->render('@Home/static/cloud/public.html.twig');
    }

    /**
     *
     *
     * @Route("/services/cloud/public/azure", name="home_cloud_public_azure")
     * @Method({"GET", "POST"})
     */
    public function public_azureAction()
    {
        return $this->render('@Home/static/cloud/public_azure.html.twig');
    }

    /**
     *
     *
     * @Route("/services/cloud/public/amazon", name="home_cloud_public_amazon")
     * @Method({"GET", "POST"})
     */
    public function public_amazonAction()
    {
        return $this->render('@Home/static/cloud/public_amazon.html.twig');
    }

    //// END CLOUD


    /**
     *
     *
     * @Route("/services/infogerance", name="home_infogerance")
     * @Method({"GET", "POST"})
     */
    public function infogeranceAction()
    {
        return $this->render('@Home/static/infoGerance.html.twig');
    }

    /**
     *
     *
     * @Route("/services/data_center", name="home_dataCenter")
     * @Method({"GET", "POST"})
     */
    public function dataCenterAction()
    {
        return $this->render('@Home/static/dataCenter.html.twig');
    }

    /**
     *
     *
     * @Route("/about", name="home_about")
     * @Method({"GET", "POST"})
     */
    public function aboutAction()
    {
        return $this->render('@Home/static/about.html.twig');
    }


}