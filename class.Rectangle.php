<html><?php
/**
 * Created by PhpStorm.
 * User: jeromesuhard
 * Date: 05/11/2018
 * Time: 14:02
 */
//Creation de la classe Rectangle
class Rectangle
{
//    attributs privés longueur & largeur
    private $longueur;
    private $largeur;

//    Methode

    public function __construct($la, $lo) {
        $this->longueur = $lo;
        $this->largeur = $la;
    }

    public function CalculAire() {
        return $this->longueur * $this->largeur;
    }

    public function CalculPerimetre() {
        return ($this-> longueur + $this-> largeur) * 2;
    }

}

$rect = new Rectangle(12, 4);

echo $rect->CalculAire();
?>
<br/>
<?php
echo $rect->CalculPerimetre();

?>

</html>