<?php

class Etudiant{
    private $id_Etudiant;
    private $nom;
    private $prenom;
    private $age;
    private $cne;
public function __construct ( $nom=Null, $prenom=NULL, $age=NULL ,  $cne=Null){

    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->age =  $age; 
    $this->cne = $cne;
}

public function getId() {
    return $this->id_Etudiant; 
}
public function getNom() {
    return $this->nom; 
}
public function getPrenom() {
    return $this->prenom; 
}

public function getAge() {
    return $this->age; 
}
public function getCne() {
    return $this->cne; 
}
public function setId($id) {
    $id_Etudiant = (int) $id; 
} 

public function setNom($nom) {
    if (is_string($nom)) {
        $this->nom = $nom; 
    } 
}
public function setPrenom($prenom) {
    if (is_string($prenom)) {
        $this->prenom = $prenom; 
    }
}
public function setAge($age) {
    $age = (int) $age;    
}
public function setCne($cne) {
    $this->cne = $cne;    
}
}
?>