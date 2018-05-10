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
use AppBundle\Entity\Invite;

class InviteController extends FOSRestController
{
    /**
     * @Rest\View()
     * @Rest\Get("invites")
     */
    public function getInvitesAction()
    {
        $invites = $this->get('doctrine.orm.entity_manager')
                        ->getRepository('AppBundle:Invite')
                        ->findAll();
        
        $response = $this->get('jms_serializer')
                        ->serialize($invites, "json");
        
        return new Response($response);
    }

    /**
     * @Rest\View()
     * @Rest\Get("/invite/{invite_id}")
     */
    public function getInviteAction(Request $request)
    {
        $invites = $this->get('doctrine.orm.entity_manager')
                        ->getRepository('AppBundle:Invite')
                        ->find($request->get("invite_id"));
        
        if (empty($invites)) {
            return new JsonResponse(['message' => 'L\'invité n\'a pas été trouvé !'], Response::HTTP_NOT_FOUND);
        }
        
        $response = $this->get('jms_serializer')
                        ->serialize($invites, "json");
        
        return new Response($response);
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/invites")
     */
    public function postInvitesAction(Request $request)
    {
        $invite = new Invite();
        $invite->setNom($request->get('nom'))
            ->setPrenom($request->get('prenom'))
            ->setEmail($request->get('email'))
            ->setPassword($request->get('password'))
            ->setPhoto($request->get('photo'));

        $db = $this->get('doctrine.orm.entity_manager');
        $db->persist($invite);
        $db->flush();

        return $invite;
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_NO_CONTENT)
     * @Rest\Delete("invites/{invite_id}")
     */
    public function deleteInvitesAction(Request $request)
    {
        $db = $this->get('doctrine.orm.entity_manager');
        $invite = $db->getRepository('AppBundle:Invite')
            ->find($request->get('invite_id'));

        if ($invite) {
            $db->remove($invite);
            $db->flush();
        }
    }

    /**
     * @Rest\View()
     * @Rest\Put("invites/{invite_id}")
     */
    public function putInvitesAction(Request $request) {
        $invites = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Invite')
            ->find($request->get('invite_id'));

        if (empty($invites)) {
            return new JsonResponse(['message' => 'L\'invité n\'a pas été trouvé !'], Response::HTTP_NOT_FOUND);
        }
        
        $invites->setNom($request->get('nom'))
            ->setPrenom($request->get('prenom'))
            ->setEmail($request->get('email'))
            ->setPassword($request->get('password'))
            ->setPhoto($request->get('photo'));

        $db = $this->get('doctrine.orm.entity_manager');
        $db->merge($invites);
        $db->flush();
        return $invites;
    }

}
