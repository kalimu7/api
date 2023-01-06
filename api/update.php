<?php
    ini_set('display_errors', 1);
    // die(print('hgbk'));
    header("Access-Control-Allow-Origin: *");
    header("Content-type: application/json; charset=utf-8");
    header("Access-Control-Allow-Methods:PUT");
    header("Access-Control-Allow-Headers:Access-Control-Allow-Origin,Content-type: application/json;    charset=utf-8,Access-Control-Allow-Methods,Authorization,X-Requested-With");
    require_once '../travel.php';
    $tr = new travel();
    $data = json_decode(file_get_contents("php://input"));
    $destination = $data->destination;
    $price = $data->price;
    $description = $data->description;
    $image = $data->image;
    $id = $data->id;
    // $tr->update($destination,$price,$description,$image,$id);
    if($tr->update($destination,$price,$description,$image,$id)){
        echo 'updated successfully';
    }else{
        echo 'not updated';
    }

?>
