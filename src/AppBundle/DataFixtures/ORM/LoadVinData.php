<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Vin;

class LoadVinData extends AbstractFixture implements OrderedFixtureInterface {
    
    public function load(ObjectManager $manager){
        
        $vin1 = new Vin();
        $vin1->setAppellation("Château Mouton Rothschild");
        $vin1->setAnnee(1991);
        $vin1->setType("Rouge");
        $vin1->setCepage("Médoc");
        $vin1->setAlcool(13);
        $vin1->setPrix(524);
        $vin1->setScore(97);
        $vin1->setDescription("This is the third most highly rated Pauillac wine (based on critic scores): the 2015 vintage was given a score of 98 by The Wine Advocate and the 2015 vintage was given a score of 19/20 by Jancis Robinson.
Ranked among the top 10 wines from this region with respect to number of prizes won: This wine has won the Guide Hachette des Vins 3 Stars Coup De Coeur award for the 2011 vintage and the 2010 vintage.
This is France's most sought-after wine (as measured by user searches).");
        $vin1->setAvis("Decanted for 3 hours, this 1991 Mouton is a powerhouse - a young, gorgeous wine at its prime. This vintage is the epitome of the power, voluptuousness and sweet sensuality that Mouton can possess in the best years. Long, supple full bodied with a persistent finish. At 20 years old, it is still a teenager.");
        $vin1->setExposant($this->getReference("mouton-rotschild"));
        
        $vin2 = new Vin();
        $vin2->setAppellation("Le Petit Mouton de Mouton Rothschild");
        $vin2->setAnnee(1994);
        $vin2->setType("Rouge");
        $vin2->setCepage("Médoc");
        $vin2->setAlcool(13);
        $vin2->setPrix(171);
        $vin2->setScore(93);
        $vin2->setDescription("Second label of Chateau Mouton-Rothschild. Labeled as 'le second vin de Mouton Rothschild' for 1993 vintage only.
Several important critics have rated this Pauillac wine highly: Jancis Robinson gave the 2010 vintage a score of 18/20; and Wine Spectator gave the 2012 vintage a score of 90.
Priced in the top 20% for red wines from Pauillac. Over the past two years the price has been trending upwards.
One of the more sought-after wines from the region. This wine has increased in popularity over the past year.");
        $vin2->setAvis("Vibrant and fresh, this full bodied Petit Mouton has lifted cassis and blackberry notes. A wonderful second wine of Mouton, perhaps their best over the past decade. An intense quite concentrated red with a fairly long finish.");
        $vin2->setExposant($this->getReference("mouton-rotschild"));
        
        $vin3 = new Vin();
        $vin3->setAppellation("Romanée-Conti Grand Cru");
        $vin3->setAnnee(1965);
        $vin3->setType("Rouge");
        $vin3->setCepage("Pinot noir");
        $vin3->setAlcool(13);
        $vin3->setPrix(11340);
        $vin3->setScore(99);
        $vin3->setDescription("Critics have rated this as the best available among Vosne-Romanee wines: the 2013 vintage was given a score of 96 by The Wine Advocate and the 2013 vintage was given a score of 19/20 by Jancis Robinson.
Ranked fifth for number of awards won among wines from this region: the Guide Hachette des Vins awarded the 2013 vintage 3 Stars and the 2012 vintage 3 Stars Coup De Coeur.
This is the third highest-priced red wine from Burgundy. Over the past year the price has been trending upwards.");
        $vin3->setAvis("An amazing symphony of flavors that are seamless and fine with a core acid-tannin tension that runs through the wine even though it is nearly 50 years old. It is an impressive Romane-Conti that shows how majestic, refined and classy this wine is at its peak. Showing hardly any signs of being tired; if the wine is kept in good condition it should drink well for another decade or two.");
        $vin3->setExposant($this->getReference("romanee-conti"));
        
        $vin4 = new Vin();
        $vin4->setAppellation("La Tache Grand Cru Monopole");
        $vin4->setAnnee(2013);
        $vin4->setType("Rouge");
        $vin4->setCepage("Pinot noir");
        $vin4->setAlcool(13);
        $vin4->setPrix(2497);
        $vin4->setScore(97);
        $vin4->setDescription("Many critics score this Vosne-Romanee wine highly: The Wine Advocate gave the 2013 vintage a score of 97 and Jancis Robinson gave the 2013 vintage a score of 19/20.
Ranked second for number of awards won among wines from this region: This wine has won the Guide Hachette des Vins 3 Stars award for the 2013 vintage and the 2012 vintage.
One of the most expensive red wines from Vosne-Romanee (top 10). The price has been rising over the last year.");
        $vin4->setAvis("A big, full bodied La Tache with intense savory herbs, black tea leaf and dark spices on the palate. The fruit barely peers out from the firm structure of tannins and acidity but after an hour, there is depth and an expansiveness that was missing in the beginning. An intense, powerful Burgundy that needs some time after it is first opened.");
        $vin4->setExposant($this->getReference("romanee-conti"));;
        
        $vin5 = new Vin();
        $vin5->setAppellation("Coche-Dury Meursault");
        $vin5->setAnnee(2002);
        $vin5->setType("Blanc");
        $vin5->setCepage("Chardonnay");
        $vin5->setAlcool(12);
        $vin5->setPrix(386);
        $vin5->setScore(95);
        $vin5->setDescription("Several important critics have rated this Meursault wine highly: Jancis Robinson gave the 1999 vintage a score of 18/20; and Wine Spectator gave the 1994 vintage a score of 90.
This is the most sought-after wine from the region (as measured by user searches). This wine has been climbing in popularity during the year.
This is among the highest-priced wines produced from Chardonnay in Meursault. Furthermore, the price has been increasing over the past year.");
        $vin5->setAvis("Amazing clarity and intensity on this Meursault. Ripe nectarines and peaches on the palate along with firm acidity and layers of stone and mixed nuts. This white combines power with finesse and longevity. While the wine is at its peak, it can still be enjoyed over the next 10 years.");
        $vin5->setExposant($this->getReference("coche-dury"));
        
        $vin6 = new Vin();
        $vin6->setAppellation("Auxey-Duresses");
        $vin6->setAnnee(2006);
        $vin6->setType("Blanc");
        $vin6->setCepage("Chardonnay");
        $vin6->setAlcool(13);
        $vin6->setPrix(456);
        $vin6->setScore(90);
        $vin6->setDescription("This is among the top 10 most highly rated Auxey-Duresses wines (based on critic scores): the 2006 vintage was given a score of 90 by Stephen Tanzer.
This is the third highest price wine produced from Chardonnay in Auxey-Duresses. Moreover, the price has been increasing over the past year.
This is the third most sought-after wine from the region (in terms of user searches). This wine has increased in popularity over the past year.");
        $vin6->setAvis("When to drink: 2016 to 2020.");
        $vin6->setExposant($this->getReference("auxey-duresses"));
        
        
        $manager->persist($vin1);
        $manager->persist($vin2);
        $manager->persist($vin3);
        $manager->persist($vin4);
        $manager->persist($vin5);
        $manager->persist($vin6);
        
        $manager->flush();
        
        $this->addReference("vin-mouton-rotschild", $vin1);
        $this->addReference("vin-petit-mouton", $vin2);
        $this->addReference("vin-romannee-conti-grand-cru", $vin3);
        $this->addReference("vin-la-tache", $vin4);
        $this->addReference("vin-coche-dury", $vin5);
        $this->addReference("vin-auxey-duresses", $vin6);
    }
    
    
    public function getOrder() {
        
        return 3;
        
    }
}

?>