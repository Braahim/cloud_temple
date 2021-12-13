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
 * @Route("/services")
 */
class staticController extends  Controller
{

    /**
     *
     *
     * @Route("/cloud", name="home_cloud")
     * @Method({"GET", "POST"})
     */
    public function cloudAction()
    {
        return $this->render('@Home/cloud.html.twig');
    }

    /**
     *
     *
     * @Route("/infogerance", name="home_infogerance")
     * @Method({"GET", "POST"})
     */
    public function infogeranceAction()
    {
        return $this->render('@Home/infoGerance.html.twig');
    }

    /**
     *
     *
     * @Route("/data_center", name="home_dataCenter")
     * @Method({"GET", "POST"})
     */
    public function dataCenterAction()
    {
        return $this->render('@Home/dataCenter.html.twig');
    }


}