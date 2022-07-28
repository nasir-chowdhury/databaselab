<?php
    include("vehiclefunction.php");
    $objvehicleinfoAdmin = new vehicleinfo();

    

    $vehicles = $objvehicleinfoAdmin->display_data();

    if(isset($_GET['status'])){
      if($_GET['status']='edit'){
        $id = $_GET['id'];
        $returndata = $objvehicleinfoAdmin->display_data_by_id($id);
      }
    }
    if(isset($_POST['edit_btn'])){
       $msg = $objvehicleinfoAdmin->update_data($_POST);
    }


?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    


    <div class="container my-4 p-4 shadow">

        <h2><a style="text-align:center;" href="vehicleindex">Vehicles Info</a></h2>
        <form class="form" action="" method="post">

          <?php if(isset($msg)){echo $msg;} ?>
          
          <input class="form-control mb-2" type="text" name="e_vhcl_model" value = "<?php echo $returndata['vhcl_model']; ?>">
          <input class="form-control mb-2" type="number" name="e_vhcl_model_year" value = "<?php echo $returndata['vhcl_model_year']; ?>">
          <input class="form-control mb-2" type="number" name="e_vhcl_engine" value = "<?php echo $returndata['vhcl_engine']; ?>">
          <input class="form-control mb-2" type="text" name="e_vhcl_tax_token" value = "<?php echo $returndata['vhcl_tax_token']; ?>">
          <input class="form-control mb-2" type="number" name="e_vhcl_cc" value = "<?php echo $returndata['vhcl_cc']; ?>">
          <input class="form-control mb-2" type="text" name="e_vhcl_trasmission" value = "<?php echo $returndata['vhcl_transmission']; ?>">
          <input class="form-control mb-2" type="text" name="e_vhcl_fuel_type" value = "<?php echo $returndata['vhcl_fuel_type']; ?>">
          <input class="form-control mb-2" type="number" name="e_vhcl_reg_year" value = "<?php echo $returndata['vhcl_reg_year']; ?>">
          <input type="hidden" name = "vhcl_id" value = "<?php echo $returndata['id']; ?>">
          <input type="submit" value="Update Info" name="add_info" class="e_form-control bg-warning">
        </form>

    </div>


    


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>