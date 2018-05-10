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
use AppBundle\Entity\Exposant;


class ExposantController extends FOSRestController
{
    /**
     * @Rest\View()
     * @Rest\Get("exposants")
     */
    public function getExposantsAction()
    {
        $exposants = $this->get('doctrine.orm.entity_manager')
                        ->getRepository('AppBundle:Exposant')
                        ->findAll();
        
        $response = $this->get('jms_serializer')
                        ->serialize($exposants, "json");
        
        return new Response($response);
    }

    /**
     * @Rest\View()
     * @Rest\Get("/exposant/{exposant_id}")
     */
    public function getExposantAction(Request $request)
    {
        $exposants = $this->get('doctrine.orm.entity_manager')
                        ->getRepository('AppBundle:Exposant')
                        ->find($request->get("exposant_id"));
        
        if (empty($exposants)) {
            return new JsonResponse(['message' => 'L\'exposant n\'a pas été trouvé !'], Response::HTTP_NOT_FOUND);
        }
        
        $response = $this->get('jms_serializer')
                        ->serialize($exposants, "json");
        
        return new Response($response);
    }
    
    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/exposants")
     */
    public function postExposantsAction(Request $request)
    {
        $exposant = new Exposant();
        $exposant->setEmplacement($request->get('emplacement'))
            ->setNom($request->get('nom'))
            ->setPrenom($request->get('prenom'))
            ->setEmail($request->get('email'))
            ->setPassword($request->get('password'))
            ->setDomaine($request->get('domaine'))
            ->setDescription($request->get('description'))
            ->setAdresse($request->get('adresse'))
            ->setCp($request->get('cp'))
            ->setVille($request->get('ville'))
            ->setRegion($request->get('region'))
            ->setSiteweb($request->get('siteweb'))
            ->setPhoto($request->get('photo'));

        $db = $this->get('doctrine.orm.entity_manager');
        $db->persist($exposant);
        $db->flush();

        return $exposant;
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_NO_CONTENT)
     * @Rest\Delete("exposants/{exposant_id}")
     */
    public function deleteExposantsAction(Request $request)
    {
        $db = $this->get('doctrine.orm.entity_manager');
        $exposant = $db->getRepository('AppBundle:Exposant')
            ->find($request->get('exposant_id'));

        if ($exposant) {
            $db->remove($exposant);
            $db->flush();
        }
    }

    /**
     * @Rest\View()
     * @Rest\Put("exposants/{exposant_id}")
     */
    public function putExposantsAction(Request $request) {
        $exposants = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Exposant')
            ->find($request->get('exposant_id'));

        if (empty($exposants)) {
            return new JsonResponse(['message' => 'exposant non trouvé'], Response::HTTP_NOT_FOUND);
        }
        
        $exposants->setEmplacement($request->get('emplacement'))
            ->setNom($request->get('nom'))
            ->setPrenom($request->get('prenom'))
            ->setEmail($request->get('email'))
            ->setPassword($request->get('password'))
            ->setDomaine($request->get('domaine'))
            ->setDescription($request->get('description'))
            ->setAdresse($request->get('adresse'))
            ->setCp($request->get('cp'))
            ->setVille($request->get('ville'))
            ->setRegion($request->get('region'))
            ->setSiteweb($request->get('siteweb'))
            ->setPhoto($request->get('photo'));

        $db = $this->get('doctrine.orm.entity_manager');
        $db->merge($exposants);
        $db->flush();
        return $exposants;
    }

}
