<?php
spl_autoload_register(function ($class) {
    require_once "../src/$class.php";
});
include "../includes/config.inc.php";
use Model\GraphicCard;

$des1 = "La carte graphique MSI GeForce RTX 3060 VENTUS 2X 12G OC LHR embarque 12 Go de mémoire vidéo de nouvelle génération GDDR6. Ce modèle bénéficie de fréquences de fonctionnement élevées.";
$des2 = "La carte graphique NVIDIA GeForce RTX 4080 offre une rapidité extrême pour les joueurs comme pour les créateurs. Avec des performances hors norme et des capacités graphiques améliorées par Intelligence Artificielle.";
$des3 = "Grâce au DLSS 3, au ray tracing à haute vitesse et aux performances accélérées par IA, la carte graphique Gainward GeForce RTX 4070 Ghost vous permet d'obtenir une qualité graphique exceptionnelle.";

$graphicCards = [
    (new GraphicCard())
        ->setName("MSI GeForce RTX 3060 VENTUS 2X 12G OC LHR")
        ->setBrand("MSI")
        ->setDescription($des1)
        ->setPrice(399)
        ->setPcType("fixe")
        ->setIsArchived(false)
        ->setChipset("NVIDIA GeForce RTX 3060")
        ->setMemory("12Go"),
    (new GraphicCard())
        ->setName("Gigabyte GeForce RTX 4080 GAMING OC 16G")
        ->setBrand("Gigabyte")
        ->setDescription($des2)
        ->setPrice(1249)
        ->setPcType("fixe")
        ->setIsArchived(false)
        ->setChipset("NVIDIA GeForce RTX 4080")
        ->setMemory("16Go "),
    (new GraphicCard())
        ->setName("Gainward GeForce RTX 4070 Ghost")
        ->setBrand("Gainward")
        ->setDescription($des3)
        ->setPrice(649)
        ->setPcType("fixe")
        ->setIsArchived(false)
        ->setChipset("NVIDIA GeForce RTX 4070")
        ->setMemory("12Go"),
];


$sqlParent = "INSERT INTO component (name,brand,description,price,pcType,isArchived) VALUES (:name,:brand,:description,:price,:pcType,false)";
$sqlChild = "INSERT INTO GraphicCard (idComponent,chipset,memory) VALUES (:idComponent,:chipset,:memory)";


foreach ($graphicCards as $graphicCard) {
    $db->beginTransaction();
    $statement = $db->prepare($sqlParent);
    $statement->bindValue(":name", $graphicCard->getName());
    $statement->bindValue(":brand", $graphicCard->getBrand());
    $statement->bindValue(":description", $graphicCard->getDescription());
    $statement->bindValue(":price", $graphicCard->getPrice());
    $statement->bindValue(":pcType", $graphicCard->getPrice());
    $statement->execute();

    $id = $db->lastInsertId();
    $id = intval($id);
    $statement = $db->prepare($sqlChild);
    $statement->bindValue(":idComponent", $id);
    $statement->bindValue(":chipset", $graphicCard->getChipset());
    $statement->bindValue(":memory", $graphicCard->getMemory());
    $statement->execute();
    $db->commit();
}