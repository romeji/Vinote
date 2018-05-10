<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\ViewHandler;
use FOS\RestBundle\View\View;
use AppBundle\Entity\Vin;

class VinController extends FOSRestController
{
    /**
     * @Rest\View()
     * @Rest\Get("vins")
     */
    public function getVinsAction()
    {
        $vins = $this->get('doctrine.orm.entity_manager')
                        ->getRepository('AppBundle:Vin')
                        ->findAll();
        
        $response = $this->get('jms_serializer')
                        ->serialize($vins, "json");
        
        return new Response($response);
    }

    /**
     * @Rest\View()
     * @Rest\Get("/vin/{vin_id}")
     */
    public function getVinAction(Request $request)
    {
        $vins = $this->get('doctrine.orm.entity_manager')
                        ->getRepository('AppBundle:Vin')
                        ->find($request->get("vin_id"));
        
        if (empty($vins)) {
            return new JsonResponse(['message' => 'Le vin n\'a pas été trouvé !'], Response::HTTP_NOT_FOUND);
        }
        
        $response = $this->get('jms_serializer')
                        ->serialize($vins, "json");
        
        return new Response($response);
    }
    
    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/vins")
     */
    public function postVinsAction(Request $request)
    {
        $vin = new Vin();
        $exposant = $this->get('doctrine.orm.entity_manager')
                        ->getRepository('AppBundle:Exposant')
                        ->find($request->get("exposant"));
        $vin->setAppellation($request->get('appellation'))
            ->setAnnee($request->get('annee'))
            ->setType($request->get('type'))
            ->setCepage($request->get('cepage'))
            ->setAlcool($request->get('alcool'))
            ->setPrix($request->get('prix'))
            ->setScore($request->get('score'))
            ->setDescription($request->get('description'))
            ->setAvis($request->get('avis'))
            ->setPhoto($request->get('photo'))
            ->setExposant($exposant);

        $db = $this->get('doctrine.orm.entity_manager');
        $db->persist($vin);
        $db->flush();

        return $vin;
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_NO_CONTENT)
     * @Rest\Delete("vins/{vin_id}")
     */
    public function deleteVinsAction(Request $request)
    {
        $db = $this->get('doctrine.orm.entity_manager');
        $vin = $db->getRepository('AppBundle:Vin')
            ->find($request->get('vin_id'));

        if ($vin) {
            $db->remove($vin);
            $db->flush();
        }
    }

    /**
     * @Rest\View()
     * @Rest\Put("vins/{vin_id}")
     */
    public function putVinsAction(Request $request) {
        $vins = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Vin')
            ->find($request->get('vin_id'));

        if (empty($vins)) {
            return new JsonResponse(['message' => 'Vin non trouvé'], Response::HTTP_NOT_FOUND);
        }
        
        $vins->setAppellation($request->get('appellation'))
            ->setAnnee($request->get('annee'))
            ->setType($request->get('type'))
            ->setCepage($request->get('cepage'))
            ->setAlcool($request->get('alcool'))
            ->setPrix($request->get('prix'))
            ->setScore($request->get('score'))
            ->setDescription($request->get('description'))
            ->setAvis($request->get('avis'))
            ->setPhoto($request->get('photo'));

        $db = $this->get('doctrine.orm.entity_manager');
        $db->merge($vins);
        $db->flush();
        return $vins;
    }

}

