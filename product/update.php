<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/product.php';

$id           = isset($_GET['id'])           ? $_GET['id']           : null;
$naam         = isset($_GET['naam'])         ? $_GET['naam']         : null;
$beschrijving = isset($_GET['beschrijving']) ? $_GET['beschrijving'] : null;
$prijs        = isset($_GET['prijs'])        ? $_GET['prijs']        : null;
$categorie    = isset($_GET['categorie'])    ? $_GET['categorie']    : null;

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);

if($id == null || $naam == null || $beschrijving == null || $prijs == null || $categorie == null) {
    http_response_code(404);
    echo json_encode(array("message" => "product updaten mislukt, ik lust de invoer niet"));
}else{
    $product->update($id, $naam, $beschrijving, $prijs, $categorie);
    http_response_code(200);
    echo json_encode(array("message" => "product updaten gelukt"));
}
?>