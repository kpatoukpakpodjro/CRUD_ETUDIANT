<?php
require_once "Etudiant.php";
class EtudiantTransaction{
    private $bdd;
    public function __construct(){
        try
        {
          $this->bdd = new pdo('mysql:host=localhost;dbname=mabase;charset=utf8', 'root', '');
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage()); 
        }      
    }
    public function save($etudiant){

        $req = $this->bdd->prepare('INSERT INTO etudiant(nom, prenom,age,cne ) VALUES(:nom, :prenom, :age,:cne)');
      
        $req->execute(array( 'nom' => $etudiant->getNom(),
        'prenom' => $etudiant->getPrenom(),
        'age' => $etudiant->getAge(),
        'cne' => $etudiant->getCne(),
        ));
        
        header('Location: http://localhost/kpat/Atelier_CRUD/index.php?action=etudiant');
      }
    public function delete($cne){
      $req=$this->bdd->prepare("DELETE FROM etudiant WHERE cne=:cne");
      $req->execute(array('cne'=>$cne));
      header('Location: http://localhost/kpat/Atelier_CRUD/index.php?action=etudiant');
  }

   public function getrow($cne){
    $req=$this->bdd->prepare("SELECT * FROM etudiant WHERE cne=:cne");
    $req->execute(array('cne'=>$cne));
    $row=$req->fetch(PDO::FETCH_ASSOC);
    return $row;
}
 
 public function update($cne){
    $req=$this->bdd->prepare("UPDATE etudiant SET nom=:nom,prenom=:prenom,age=:age,cne=:cne WHERE cne=:old_cne");

    $req->execute(array( 'nom' =>$_POST['nom'],
    'prenom' => $_POST['prenom'],
    'age' => $_POST['age'],
    'cne'=>$_POST['cne'],
    'old_cne'=>$cne
    ));
    header('Location: http://localhost/kpat/Atelier_CRUD/index.php?action=etudiant');
}
  
  public function getAll(){
    $reponse  = $this->bdd->query('select * from etudiant');
    $arrEtudiants =  array(); //$arrEtudiants =[]; tableau vide

    while ($donnees = $reponse->fetch()) {
        array_push($arrEtudiants, new Etudiant($donnees['nom'] , $donnees['prenom'] , $donnees['age']  , $donnees['cne']));
    }
    return $arrEtudiants;
  }

}
?>