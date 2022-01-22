<?php

function getTerritoires(){
    $pdo = getConnexion();
    $req = "SELECT t.id, t.libelle, t.description, t.superficie, p.libelle as 'province' FROM territoire t inner join province p on t.province_id = p.id";
    $stmt = $pdo->prepare($req);
    $stmt->execute();
    $territoires = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    sendJSON($territoires);
}

function getTerritoiresByProvince($territoire){
    $pdo = getConnexion();
    $req = "SELECT t.id, t.libelle, p.libelle as 'province' FROM territoire t inner join province p on t.province_id = p.id WHERE p.libelle =:territoire";
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":territoire",$territoire,PDO::PARAM_STR);
    $stmt->execute();
    $territoires = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    sendJSON($territoires);
}

function getTerritoireById($id){
    $pdo = getConnexion();
    $req = "SELECT t.id, t.libelle, p.libelle as 'province' FROM territoire t inner join province p on t.province_id = p.id WHERE t.id =:id";
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":id",$id,PDO::PARAM_INT);
    $stmt->execute();
    $territoires = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    sendJSON($territoires);
}

function getConnexion(){
    return new PDO("mysql:host=localhost;dbname=rdc;charset=utf8","root","");
}

function sendJSON($infos){
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    echo json_encode($infos, JSON_UNESCAPED_UNICODE);
}