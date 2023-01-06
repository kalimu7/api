<?php
require_once '../travel.php';
    ini_set('display_errors', 1);
    // die(print('hgbk'));
    header("Access-Control-Allow-Origin: *");
    header("Content-type: application/json; charset=utf-8");
   
    
    $tr = new travel();
    $result = $tr->read();
    $num = $result->rowCount();
    if($num > 0){
        $travel_arr = array();
        $travel_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $travel_items = array(
                'id' => $id,
                'destination' => $destination,
                'description' => $description,
                'price' =>$price,
                'image'=>$image
            );
            array_push($travel_arr['data'],$travel_items);

        }

        echo json_encode($travel_arr);

    }else{
        echo json_encode(
            array('message' => 'No destination Found')
        );
    }


?>