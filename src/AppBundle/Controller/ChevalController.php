<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\Cachedate;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class ChevalController
 * @package AppBundle\Controller
 * @Route("/course/cheval")
 */
class ChevalController extends Controller
{
    /**
     * @Route("/{cheval}", name="ChevalIndex")
     */
    public function chevalAction(Cachedate $cheval)
    {
        $rep = $this->getDoctrine()->getRepository('AppBundle:Cachedate');

        $infoCheval = $rep->infoCheval($cheval->getIdche())[0];

        $reussiteJockey = $rep->reussiteParJockey($cheval->getIdche());

        return $this->render('AppBundle:Cheval:cheval.html.twig', array(
            'cheval' => $infoCheval
        ));
    }

}
