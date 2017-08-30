<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\Data;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('default/index.html.twig', []);
    }

    /**
     * @Route("/show", name="show")
     */
     public function showAction(Request $request)
     {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery("SELECT a FROM AppBundle:Data a");
        $datas = $query->getArrayResult();

        return new JsonResponse($datas);
     }
}
