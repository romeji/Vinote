<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Invite;

class LoadInviteData extends AbstractFixture implements OrderedFixtureInterface {
    
    public function load(ObjectManager $manager){
        
        $invite1 = new Invite();
        $invite1->setNom("Robuchon");
        $invite1->setPrenom("Joël");
        $invite1->setEmail("jrobuchon@michelin.com");
        $invite1->setPassword("jrobuchon");
        $invite1->setPhoto("https://pbs.twimg.com/profile_images/593878607614898176/8JQexczn.jpg");
        
        
        $invite2 = new Invite();
        $invite2->setNom("Coffe");
        $invite2->setPrenom("Jean-Pierre");
        $invite2->setEmail("cdelamerd@hotmail.fr");
        $invite2->setPassword("jpcoffe");
        $invite2->setPhoto("http://www.tangermagazine.com/wp-content/uploads/2016/03/Coffe_1_13.jpg");
        
        $invite3 = new Invite();
        $invite3->setNom("Petitrenaud");
        $invite3->setPrenom("Jean-Luc");
        $invite3->setEmail("escapades-gourmandes@france5.fr");
        $invite3->setPassword("jlpetitrenaud");
        $invite3->setPhoto("http://www.tangermagazine.com/wp-content/uploads/2016/03/Coffe_1_13.jpg");
        
        $invite4 = new Invite();
        $invite4->setNom("Etchebest");
        $invite4->setPrenom("Philippe");
        $invite4->setEmail("top-chef-etchebest@m6.fr");
        $invite4->setPassword("petchebest");
        $invite4->setPhoto("https://upload.wikimedia.org/wikipedia/commons/3/3e/Philippe_Etchebest.png");
        
        
        $manager->persist($invite1);
        $manager->persist($invite2);
        $manager->persist($invite3);
        $manager->persist($invite4);
        
        $manager->flush();
        
        $this->addReference("jrobuchon", $invite1);
        $this->addReference("jpcoffe", $invite2);
        $this->addReference("jlpetitrenaud", $invite3);
        $this->addReference("petchebest", $invite4);
    }
    
    
    public function getOrder() {
        
        return 2;
        
    }
}

?>