<?php
require_once 'Model/Etudiant.php'; 
require_once 'Model/EtudiantTransaction.php';
require_once 'view/view.php'; 

class ControllerEtudiant{
    private $etudiant;
    private $etudiantTransaction;

public function __construct(){
$this->etudiant = new Etudiant();
$this->etudiantTransaction= new EtudiantTransaction();
}

// cette sera appelee pour lister les étudiant qui existent déja
public function getEtus() {
    $etudiants = $this->etudiantTransaction->getAll(); 
    $view = new view("etudiant"); 
    $view->generer(array('etudiants' => $etudiants));
}

//cette méthode sera appelée si on veut  ajouter un nouvel étudiant.
public function addE() {
     
     
    $view = new view("addE");        
    $view->generer(array());
} 

// cette méthode sera appelee pour enregistrer un etudiant.
public function saveE() {    
    $etudiant=$this->etudiant =new Etudiant($_POST['nom'],$_POST['prenom'],$_POST['age'],$_POST['cne']) ;
    $this->etudiantTransaction->save($this->etudiant);
    $this->getEtus();
}

//cette méthode pour supprimer un etudiant
public function deleteE(){
    $this->etudiantTransaction->delete($_POST['cne_delete']);
}

//cette méthode pour modifier un etudiant .
public function updateE($cne){
    $this->etudiantTransaction->update($cne);
}
public function getOne($cne) {
   $row = $this->etudiantTransaction->getrow($cne); 
   $view = new view("update"); 
   $view->generer(array('row' => $row));
} 
}
?>