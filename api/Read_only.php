<?php
    require_once '../travel.php';

    require_once '../travel.php';
    ini_set('display_errors', 1);
    // die(print('hgbk'));
    header("Access-Control-Allow-Origin: *");
    header("Content-type: application/json; charset=utf-8");

    // public $id;
    // public $destination;
    // public $price;
    // public $description;
    // public $image;
    $tr = new travel();
    $id = isset($_GET['id']) ? $_GET['id'] : 13;  
    $result = $tr->read_single($id);

    $travel_arr = array();

    extract($result);
        $travel_items = array(
            'id' => $id,
            'destination' => $destination,
            'description' => $description,
            'price' =>$price,
            'image'=>$image
    );

    print_r(json_encode($travel_items));

    // $this->id = $result['id'];
    // $this->destination = $result['destination'];
    // $this->price = $result['price'];
    // $this->description = $result['description'];
    // $this->image = $result['image'];

    



    


?>