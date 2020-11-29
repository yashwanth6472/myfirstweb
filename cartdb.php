<?php 


class Cart{
    public $db = null;

    public function __construct(DBController $db){
        if(!isset($db->con)) return null;
        $this->db = $db;
    }
//insert into cart table
    public function insertIntoCart($para = null, $table = 'cart'){
       if($this->db->con != null){
           if($para != null){
               //insert into cart

               $coloumn = implode(',', array_keys($para));

               $value = implode(',', array_values($para));
   

               $query = sprintf("INSERT INTO %s(%s) VALUES (%s)", $table, $coloumn, $value);
            $result = $this->db->con->query($query);

            return $result;
           }
       }
    }

    //to get

    public function addToCart($user, $item){
        if(isset($user) && isset($item)){
            $para = array(
                "userId" => $user,
                "id" => $item
            );

            $result = $this->insertIntoCart($para);

            if($result){
                 header("Location:".$_SERVER["PHP_SELF"]);
            }
        }
    }

   public function add($arr){
       if(isset($arr)){
        $sum = 0;
           foreach($arr as $iteams){
           $sum += $iteams[0];
           
           }

           return $sum;
       }
   }
//delete iteam
   public function deleteCart($item_id = null, $table='cart'){
       if($item_id != null){
       $result = $this->db->con->query("DELETE FROM {$table} WHERE id={$item_id}");

       if($result){
           header("Location:".$_SERVER["PHP_SELF"]);
       }
       }
       return $result;
   }


 
}

?>