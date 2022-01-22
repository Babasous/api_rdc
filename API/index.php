<?php

include("./api.php");

//www.monsite.cd/provinces => www.monsite.cd/index.php?demande=provinces
//www.monsite.cd/provinces/:territoire (TSHOPO ITURI...)
//www.monsite.cd/province/:id (2,3)

try{
   if(!empty($_GET['demande'])){
        $url = explode("/", filter_var($_GET["demande"], FILTER_SANITIZE_URL));
        switch($url[0]){
            case "provinces" : 
                if(empty($url[1])){
                    getTerritoires();
                }else{
                    getTerritoiresByProvince(($url[1]));
                }
            break;
            case "province" : 
                if(!empty($url[1])){
                    getTerritoireById($url[1]);
                }else{
                    throw new Exception ("Vous n'avez pas renseigné le numéro de la province");
                }
            break;
            default : throw new Exception ("La demande n'est pas valide, vérifiez l'url");
        };
    }else{
        throw new Exception("Problème de récupération des données.");
    } 
}catch(Exception $e){
    $erreur = [
        "message" => $e->getMessage(),
        "code" => $e->getCode()
    ];
    print_r($erreur);
}
    