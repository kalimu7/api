<?php
    
    require_once 'Database.php';
    // protected $conn;
    // protected $table = 'travel';
    
    // public $destination;
    // public $price;
    // public $description;
    
    class travel extends Database{
        // public $id;
        public function read(){
                
                $connection = $this->connect();

                $stm = $connection->prepare('SELECT *FROM travel');
                $stm->execute();
                return $stm;
                
        }
        
        public function read_single($id){
            
            $conn = $this->connect();
            $stm = $conn->prepare('SELECT *FROM travel WHERE id = :idd');
            // $id = 13;
            $stm->BindParam(':idd',$id);
            $stm->execute();
            $row = $stm->fetch(PDO::FETCH_ASSOC);
            return $row;
        }
        public function add($destination,$price,$description,$image){
            $conn = $this->connect();
            $stm = $conn->prepare('INSERT INTO `travel`(`destination`, `price`, `description`, `image`) VALUES (:dest , :price , :desc , :imag )');
            $stm->BindParam(':dest',$destination);
            $stm->BindParam(':price',$price);
            $stm->BindParam(':desc',$description);
            $stm->BindParam(':imag',$image);
            $check = $stm->execute();
            if($check){
                return true;
            }else{
                return false;
            }
        }

        public function update($destination,$price,$description,$image,$id){
            $conn = $this->connect();
            $stm = $conn->prepare('UPDATE `travel` SET `destination`= :dest ,`price`= :price,`description`= :desc,`image`=:imag WHERE id = :idd');
            $stm->BindParam(':dest',$destination);
            $stm->BindParam(':price',$price);
            $stm->BindParam(':desc',$description);
            $stm->BindParam(':imag',$image);
            $stm->BindParam(':idd',$id);
            $stm->execute();
            if($stm->execute()){
                return true;
            }else{
                return false;
            }
        }
        public function delete($id){
            $conn = $this->connect();
            $stm = $conn->prepare('DELETE FROM travel WHERE id = :idd');
            $stm->BindParam(':idd',$id);
            $stm->execute();
            if($stm->execute()){
                return true;
            }else{
                return false;
            }
        }

    }
    



?>