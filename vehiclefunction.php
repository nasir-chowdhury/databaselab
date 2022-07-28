<?php

     Class vehicleinfo{
         private $conn;

         public function __construct()
         {
           $dbhost = 'localhost';
           $dbuser = 'root';
           $dbpass = "";
           $dbname = 'vehicleinfo';

           $this->conn= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

           if(!$this->conn){
             die("Database Connection Error!!");
           }
         }

         public function add_data($data){
              $vhcl_model = $data['vhcl_model'];
              $vhcl_model_year = $data['vhcl_model_year'];
              $vhcl_engine = $data['vhcl_engine'];
              $vhcl_tax_token = $data['vhcl_tax_token'];
              $vhcl_cc = $data['vhcl_cc'];
              $vhcl_trasmission = $data['vhcl_trasmission'];
              $vhcl_fuel_type = $data['vhcl_fuel_type'];
              $vhcl_reg_year = $data['vhcl_reg_year'];
              
              $query = "INSERT INTO vehicls(vhcl_model,vhcl_model_year,vhcl_engine,vhcl_tax_token	,vhcl_cc,vhcl_transmission,vhcl_fuel_type,vhcl_reg_year) VALUE ('$vhcl_model',$vhcl_model_year,$vhcl_engine,'$vhcl_tax_token',$vhcl_cc,'$vhcl_trasmission','$vhcl_fuel_type',$vhcl_reg_year)";

              if(mysqli_query($this->conn, $query)){
                return "Information Added Successfully";
              }
         }

         public function display_data(){
           $query = "SELECT * FROM vehicls";
           if(mysqli_query($this->conn, $query)){
             $returndata = mysqli_query($this->conn, $query);
             return $returndata;
           }
         }

         public function display_data_by_id($id){
          $query = "SELECT * FROM vehicls WHERE id=$id";
          if(mysqli_query($this->conn, $query)){
            $returndata = mysqli_query($this->conn, $query);
            $vehicledata = mysqli_fetch_assoc($returndata);
            return $vehicledata;
          }
        }

        public function update_data($data){
          $u_vhcl_model = $data['e_vhcl_model'];
          $u_vhcl_model_year = $data['e_vhcl_model_year'];
          $u_vhcl_engine = $data['e_vhcl_engine'];
          $u_vhcl_tax_token = $data['e_vhcl_tax_token'];
          $u_vhcl_cc = $data['e_vhcl_cc'];
          $u_vhcl_trasmission = $data['e_vhcl_trasmission'];
          $u_vhcl_fuel_type = $data['e_vhcl_fuel_type'];
          $u_vhcl_reg_year = $data['e_vhcl_reg_year'];
          $idno = $data['vhcl_id'];

          $query = "UPDATE vehicls SET vhcl_model='$u_vhcl_model',vhcl_model_year='$u_vhcl_model_year', vhcl_engine='$u_vhcl_engine',vhcl_tax_token ='$u_vhcl_tax_token', vhcl_cc='$u_vhcl_cc',vhcl_trasmission='$u_vhcl_trasmission',vhcl_fuel_type='$u_vhcl_fuel_type',vhcl_reg_year='$u_vhcl_reg_year' WHERE id=$id";

          if(mysqli_query($this->conn, $query)){
            return "Information Updated Successfully!";
          }
        }

        public function delete_data($id){
          $query = "DELETE FROM vehicls WHERE id=$id";
          if(mysqli_query($this->conn, $query)){
            return "Delete Succesfully";
          }
        }


                     
         
     }









?>