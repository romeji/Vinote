<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Note;

class LoadData extends AbstractFixture implements OrderedFixtureInterface {
    
    public function load(ObjectManager $manager){
        
        $note1 = new Note();
        $note1->setTimestamp(1485775800);
        $note1->setCommentaire("Très bon vin !");
        $note1->setNote(5);
        $note1->setInvite($this->getReference("jpcoffe"));
        $note1->setVin($this->getReference("vin-mouton-rotschild"));
        
        $note2 = new Note();
        $note2->setTimestamp(1485777600);
        $note2->setCommentaire("Fin en bouche, une très belle robe, je recommande, chapeau l'artiste !");
        $note2->setNote(5);
        $note2->setInvite($this->getReference("jrobuchon"));
        $note2->setVin($this->getReference("vin-mouton-rotschild"));
        
        $note3 = new Note();
        $note3->setTimestamp(1485777650);
        $note3->setCommentaire("C'est d'la merde !!!");
        $note3->setNote(1);
        $note3->setInvite($this->getReference("jpcoffe"));
        $note3->setVin($this->getReference("vin-petit-mouton"));
        
        $note4 = new Note();
        $note4->setTimestamp(1485779400);
        $note4->setCommentaire("Bon… 2497 euros là ? Ce que j'ai bu, là ? Enfin ce que j'ai essayé de boire, 2497 euros ? Franchement c'est du foutage de gueule !");
        $note4->setNote(2);
        $note4->setInvite($this->getReference("petchebest"));
        $note4->setVin($this->getReference("vin-la-tache"));
        
        $note5 = new Note();
        $note5->setTimestamp(1485783000);
        $note5->setCommentaire("Laissez vieillir encore un peu et ce sera parfait.");
        $note5->setNote(3);
        $note5->setInvite($this->getReference("petchebest"));
        $note5->setVin($this->getReference("vin-coche-dury"));
        
        $note6 = new Note();
        $note6->setTimestamp(1485784800);
        $note6->setCommentaire("Spécial dédicace à Alexandre Goby");
        $note6->setNote(4);
        $note6->setInvite($this->getReference("jlpetitrenaud"));
        $note6->setVin($this->getReference("vin-auxey-duresses"));
        
        
        $manager->persist($note1);
        $manager->persist($note2);
        $manager->persist($note3);
        $manager->persist($note4);
        $manager->persist($note5);
        $manager->persist($note6);
        
        $manager->flush();
    }
    
    
    public function getOrder() {
        
        return 4;
        
    }
}

?>