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
use AppBundle\Entity\Note;

class NoteController extends FOSRestController
{
    /**
     * @Rest\View()
     * @Rest\Get("notes")
     */
    public function getNotesAction()
    {
        $notes = $this->get('doctrine.orm.entity_manager')
                        ->getRepository('AppBundle:Note')
                        ->findAll();
        
        $response = $this->get('jms_serializer')
                        ->serialize($notes, "json");
        
        return new Response($response);
    }
    
    /**
     * @Rest\View()
     * @Rest\Get("/notes/vin/{vin_id}")
     */
    public function getNotesVinAction(Request $request)
    {
        $notes = $this->get('doctrine.orm.entity_manager')
                        ->getRepository('AppBundle:Note')
                        ->findAll();
        
        $notesVin = array();
        foreach ($notes as $currentNote){
            if ($currentNote->getVin()->getId() == $request->get("vin_id")){
                $notesVin[] = $currentNote;
            }
        }
            
        $response = $this->get('jms_serializer')
                        ->serialize($notesVin, "json");
        
        return new Response($response);
    }

    /**
     * @Rest\View()
     * @Rest\Get("/note/{note_id}")
     */
    public function getNoteAction(Request $request)
    {
        $notes = $this->get('doctrine.orm.entity_manager')
                        ->getRepository('AppBundle:Note')
                        ->find($request->get("note_id"));
        
        if (empty($notes)) {
            return new JsonResponse(['message' => 'La note n\'a pas été trouvé !'], Response::HTTP_NOT_FOUND);
        }
        
        $response = $this->get('jms_serializer')
                        ->serialize($notes, "json");
        
        return new Response($response);
    }
    
    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/notes")
     */
    public function postNotesAction(Request $request)
    {
        $note = new Note();
        $note->setTimestamp($request->get('timestamp'))
            ->setCommentaire($request->get('commentaire'))
            ->setNote($request->get('note'));
            
        $db = $this->get('doctrine.orm.entity_manager');
        $db->persist($note);
        $db->flush();

        return $note;
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_NO_CONTENT)
     * @Rest\Delete("notes/{note_id}")
     */
    public function deleteNotesAction(Request $request)
    {
        $db = $this->get('doctrine.orm.entity_manager');
        $note = $db->getRepository('AppBundle:Note')
            ->find($request->get('note_id'));

        if ($note) {
            $db->remove($note);
            $db->flush();
        }
    }

    /**
     * @Rest\View()
     * @Rest\Put("notes/{note_id}")
     */
    public function putNotesAction(Request $request) {
        $notes = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Note')
            ->find($request->get('note_id'));

        if (empty($notes)) {
            return new JsonResponse(['message' => 'Note non trouvé'], Response::HTTP_NOT_FOUND);
        }
        
        $notes->setTimestamp($request->get('timestamp'))
            ->setCommentaire($request->get('commentaire'))
            ->setNote($request->get('note'));

        $db = $this->get('doctrine.orm.entity_manager');
        $db->merge($notes);
        $db->flush();
        return $notes;
    }

}

