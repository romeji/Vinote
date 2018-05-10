<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Exposant;

class LoadExposantData extends AbstractFixture implements OrderedFixtureInterface {
    
    public function load(ObjectManager $manager){
        
        $exposant1 = new Exposant();
        $exposant1->setEmplacement("E101");
        $exposant1->setNom("de Rotschild");
        $exposant1->setPrenom("Phillipe");
        $exposant1->setEmail("p-rotschild@chateau-mouton-rothschild.com");
        $exposant1->setPassword("protschild");
        $exposant1->setDomaine("Château Mouton Rotschild");
        $exposant1->setDescription("Château Mouton Rothschild est un domaine viticole réputé du Médoc, situé sur la commune de Pauillac. Il produit l'un des vins de Bordeaux les plus prestigieux, en appellation pauillac. Château Mouton Rothschild est un « premier grand cru classé » selon la Classification officielle des vins de Bordeaux de 1855. Il partage cette rare distinction avec Château Margaux, Château Latour, Château Lafite Rothschild et Château Haut-Brion.

Propriété de la branche anglaise de la famille Rothschild depuis 1853, Mouton Rothschild est particulièrement célèbre pour deux raisons (outre l'excellence de ses vins) : chaque année depuis 1945, l'étiquette illustrée par un artiste célèbre (parmi lesquels Chagall, Miro, Picasso…) ; Mouton fut promu au rang de « premier grand cru classé » en 1973 par le ministère de l'Agriculture.
L'emblème du Château est le bélier.");
        $exposant1->setAdresse("Château Mouton Rothschild");
        $exposant1->setCp(33250);
        $exposant1->setVille("PAUILLAC");
        $exposant1->setRegion("Bordeaux");
        $exposant1->setSiteweb("http://www.chateau-mouton-rothschild.com/?lang=fr");
        
        
        $exposant2 = new Exposant();
        $exposant2->setEmplacement("E102");
        $exposant2->setNom("de Villaine");
        $exposant2->setPrenom("Edmond Gaudin");
        $exposant2->setEmail("eg-villaine@romanee-conti.fr");
        $exposant2->setPassword("egvillaine");
        $exposant2->setDomaine("Domaine de la Romanée-Conti");
        $exposant2->setDescription("Le Domaine de la Romanée-Conti ou DRC est un des plus prestigieux domaine viticole du monde avec 25,5 hectares en majeure partie à Vosne-Romanée sur la route des Grands Crus dans le vignoble de la côte de Nuits du vignoble de Bourgogne (baptisé du nom du clos de la Romanée-conti de 1,8 hectares, un des grands crus mythiques les plus prestigieux du monde). La société civile du même nom est fondée en 1942 par Edmond Gaudin de Villaine. Elle est cogérée à ce jour, pour leur famille héritière, par les viticulteurs co-héritiers Aubert de Villaine et Henry-Frédéric Roch.");
        $exposant2->setAdresse("1 Place de l'Église");
        $exposant2->setCp(21700);
        $exposant2->setVille("VOSNE-ROMANÉE");
        $exposant2->setRegion("Bourgogne");
        $exposant2->setSiteweb("www.romanee-conti.fr");
        
        $exposant3 = new Exposant();
        $exposant3->setEmplacement("E103");
        $exposant3->setNom("Coche-Dury");
        $exposant3->setPrenom("Jean-François");
        $exposant3->setEmail("jean-françois@coche-dury.fr");
        $exposant3->setPassword("jfcoche-dury");
        $exposant3->setDomaine("Coche-Dury");
        $exposant3->setDescription("Jean-François Coche-Dury, secondé par son fils Raphaël, produit des vins que les amateurs de chardonnay du monde entier s'arrachent. Son domaine couvre plus de 10, 5 hectares dont 9 à Meursault. Reconnaissables entre tous, ses vins sont droits et ont des arômes typiques qui rappellent la noisette. Ils bénéficient généralement d'une longueur exceptionnelle. Les crus les plus prestigieux sont élevés dans des fûts neufs à hauteur de 50%. Contrairement à la plupart des autres domaines de Bourgogne, les blancs sont élevés plus longuement que les rouges (20 contre 18 mois en moyenne). Ils sont mis en bouteille à la main sans filtration préalable. Difficile de trancher parmi les Meursault de J-F Coche-Dury pour établir quel est le meilleur. Ils sont tous très recherchés, mais c'est probablement le Corton-Charlemagne du domaine qui fait le plus rêver ses aficionados. Le rouges, bien que moins courus, sont d'excellente facture.");
        $exposant3->setAdresse("25 Rue Charles Giraud");
        $exposant3->setCp(33250);
        $exposant3->setVille("Meursault");
        $exposant3->setRegion("Bourgogne");
        $exposant3->setSiteweb("https://www.lesgrappes.com/vignerons/u/domaine-jean-francois-coche-dury");
        
        $exposant4 = new Exposant();
        $exposant4->setEmplacement("E104");
        $exposant4->setNom("Prunier");
        $exposant4->setPrenom("Pascal");
        $exposant4->setEmail("pascal-prunier@gmail.com");
        $exposant4->setPassword("pprunier");
        $exposant4->setDomaine("Domaine Prunier-Bonheur");
        $exposant4->setDescription("Pascal PRUNIER appartient à la cinquième génération de viticulteurs dans la famille.
Il a créé sa propre exploitation en 1983 sur une superficie initiale de 3 ha, la totalité en fermage.
En 1999 il épouse Christine BONHEUR. L'association des 2 noms sonnant agréablement à l'oreille, le domaine suit le mouvement !
L'exploitation s'étend aujourd’hui sur 8 ha répartis sur plusieurs communes de la Côte de Beaune ce qui permet de présenter une gamme d’appellations variée.");
        $exposant4->setAdresse("23 Rue des Plantes");
        $exposant4->setCp(21190);
        $exposant4->setVille("Meursault");
        $exposant4->setRegion("Bourgogne");
        $exposant4->setSiteweb("vincod.com/1765D1D1BD");
        
        $manager->persist($exposant1);
        $manager->persist($exposant2);
        $manager->persist($exposant3);
        $manager->persist($exposant3);
        
        $manager->flush();
        
        $this->addReference("mouton-rotschild", $exposant1);
        $this->addReference("romanee-conti", $exposant2);
        $this->addReference("coche-dury", $exposant3);
        $this->addReference("auxey-duresses", $exposant3);
    }
    
    
    public function getOrder() {
        
        return 1;
        
    }
}

?>