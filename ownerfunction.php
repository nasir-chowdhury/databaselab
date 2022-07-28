<?php

    Class ownerInfo{
      private $conn;

      public function __construct(){
          $databasehost = 'localhost';
          $databaseuser = 'root';
          $databasepass = "";
          $databasename = 'vehicleinfo';

          $this->conn = mysqli_connect($databasehost,$databaseuser,$databasepass,$databasename);

          if(!$this->conn){
            die("Database Connection Error!!");
          }
      }


      public function added_data($dataa){
        $own_name = $dataa['owner_name'];
        $own_address = $dataa['owner_address'];
        $vhcl_id = $dataa['vhcl_id'];

        $queryy = "INSERT INTO ownersss(owner_name,owner_address,vhcl_id) VALUE ('$own_name','$own_address','$vhcl_id')";

        if(mysqli_query($this->conn, $queryy)){
          return "Information Added Successfully";
        }
      }

      public function display_dataa(){
        $queryy = "SELECT * FROM ownersss";
        if(mysqli_query($this->conn,$queryy)){
          $returndataa = mysqli_query($this->conn, $queryy);
          return $returndataa;
        }
      }

      public function display_dataa_by_id($id){
        $queryy = "SELECT * FROM ownersss WHERE id=$id";
        if(mysqli_query($this->conn,$queryy)){
          $returndataa = mysqli_query($this->conn, $queryy);
          $ownerdataa = mysqli_fetch_assoc($returndataa);
          return $ownerdataa;
        }
      }
    
      public function update_dataaa($data){
        $ow_name = $data['u_owner_name'];
        $ow_address = $data['u_owner_address'];
        $vh_id = $data['u_vhcl_id'];
        $idd_no = $data['ow_id'];

        $queryy = "UPDATE ownersss SET owner_name='$ow_name', owner_address='$ow_address', vhcl_id='$vh_id' WHERE id=$idd_no";

        if(mysqli_query($this->conn, $queryy)){
          return "Updated Successfully!";
        }
      }

      public function dlt_data($id){
        $queryy = "DELETE FROM ownersss WHERE id=$id";
        if(mysqli_query($this->conn, $queryy)){
          return "Delete Successfully";
        }
      }
    }




?>