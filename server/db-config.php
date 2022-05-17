<?php

class db_config{
    private $conn='';
    private $db_name='';
    private $username='';
    private $passowrd='';

    // Constructor creating connection with DB
    function __construct()
    {
        try
        {
            $this->db_name = 'mysql:host=localhost;dbname=hash_db;';
            $this->username = 'root';
            $this->password = '';
            $this->conn = new PDO($this->db_name, $this->username, $this->password); 
        } catch (PDOException $exception) {$error = $exception->getMessage();}
    }

    // Check if Row Already Exist it Requires user id as an argument 
    function isRowExist($value)
    {
         try 
         {
            $sql = $this->conn->prepare("SELECT * FROM users_info where sno=?");
            $sql->execute([$value]);
            $result = $sql->fetch(PDO::FETCH_ASSOC);
           
            if (isset($result))
                return true;
            return false;
        } catch (PDOException $exc) { $exc->getMessage();}
    }

    // Update Existing Row by accepting an argument of user info array 
    function updateRow($value)   
    {
    //      $sql = $conn->prepare("UPDATE users_info SET sno = ? WHERE `users_info`.`sno` = ".$value[':sno'].";");
    //   $sql->execute([$image]);
    }

    // Insert New Row into User_info table
    function insert_user_row($value) 
    {
         try 
         {    
            $sql = $this->conn->prepare("INSERT INTO `users_info` (`sno`, `name`, `phone`, `email` , `provider`,     `reseller`, `activated_on`, `renewed_on`, `system_exp`, `mac_address`, `user`, `status`, `bf_months`,   `bal_months`, `bf_dollar`, `payment_status`, `comments`, `paid_till`, `box_price`, `actual_renew`,    `months_bought`) VALUES  (:sno, :name, :phone,:email,:provider,:reseller,:activated_on,:renewed_on,    :system_exp,:mac_address,:user,:status,:bf_months,:bal_months,:bf_dollar,:payment_status,:comments, :paid_till,:box_price,:actual_renew,:months_bought);");
            $sql->execute($value);
         } catch (PDOException $exc) {echo 'Error '.$exc->getMessage();}
    }

    // Insert new row into user months paid status 
    function insert_user_paid_row($value) 
    { 
        try
        { 
           $sql = $this->conn->prepare("INSERT INTO `user_paid_stats` (`user_id`, `day_1`,`day_2`,`day_3`,`day_4`,`day_5`,`day_6`,`day_7`,`day_8`,`day_9`,`day_10`,`day_11`,`day_12`,`day_13`,`day_14`,`day_15`,`day_16`,`day_17`,`day_18`,`day_19`,`day_20`,`day_21`,`day_22`,`day_23`,`day_24`,`day_25`,`day_26`,`day_27`,`day_28`,`day_29`,`day_30`,`day_31`) VALUES  (:sno, :paid_on_1, :paid_on_2,:paid_on_3,:paid_on_4,:paid_on_5,:paid_on_6,:paid_on_7,:paid_on_8,:paid_on_9,:paid_on_10,:paid_on_11,:paid_on_12,:paid_on_13,:paid_on_14,:paid_on_15,:paid_on_16,:paid_on_17,:paid_on_18,:paid_on_19,:paid_on_20,:paid_on_21,:paid_on_22,:paid_on_23,:paid_on_24,:paid_on_25,:paid_on_26,:paid_on_27,:paid_on_28,:paid_on_29,:paid_on_30,:paid_on_31);");
           $sql->execute($value);
         } catch (PDOException $exc) { echo 'Error '.$exc->getMessage();}

    }

    // Insert new row into user total stats 
    function insert_user_total_row($value) 
    { 
         try 
         { 
           $sql = $this->conn->prepare("INSERT INTO `total_stats` (`user_id`, `total`,`renewed`,`balance`,`remarks`) VALUES  (:sno, :total, :renewed,:balance,:remarks);");
           $sql->execute($value);
         } catch (PDOException $exc) { echo 'Error '.$exc->getMessage();}
    }

    // Get User Info from dB
    function get_userInfo(){
         try {
        $sql = $this->conn->prepare("SELECT * FROM users_info;");
        $sql->execute();
        $result=NULL;
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        if ($result != NULL) {
          
            return $result;
        } else {
            return null;
        }
    } catch (PDOException $exc) {
        $exc->getMessage();
    }
    }
}

?>