<?php
    include("vehiclefunction.php");
    $objvehicleinfoAdmin = new vehicleinfo();

    if(isset($_POST['add_info'])){
       $return_msg = $objvehicleinfoAdmin->add_data($_POST);
    }

    $vehicles = $objvehicleinfoAdmin->display_data();

    if(isset($_GET['status'])){
      if($_GET['status']='delete'){
        $delete_id= $_GET['id'];
        $objvehicleinfoAdmin->delete_data($delete_id);
      }
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

    <title>Vehicles Information</title>
  </head>
  <body>
    


    <div class="container my-4 p-4 shadow">

        <h2><a style="text-align:center;" href="vehicleindex">Vehicles Info</a></h2>
        <form class="form" action="" method="post">

          <?php if(isset($return_msg)){echo $return_msg;} ?>
          
          <input class="form-control mb-2" type="text" name="vhcl_model" placeholder="Vehicle Model Name">
          <input class="form-control mb-2" type="number" name="vhcl_model_year" placeholder="Vehicle Model Year">
          <input class="form-control mb-2" type="number" name="vhcl_engine" placeholder="Vehicle Engine">
          <input class="form-control mb-2" type="text" name="vhcl_tax_token" placeholder="Vehicle Tax Token">
          <input class="form-control mb-2" type="number" name="vhcl_cc" placeholder="Vehicle CC">
          <input class="form-control mb-2" type="text" name="vhcl_trasmission" placeholder="Vehicle Transmission">
          <input class="form-control mb-2" type="text" name="vhcl_fuel_type" placeholder="Vehicle Fuel Type">
          <input class="form-control mb-2" type="number" name="vhcl_reg_year" placeholder="Vehicle Registration Year">
          <input type="submit" value="Add Info" name="add_info" class="form-control bg-warning">
        </form>

    </div>


    <div class="container my-4 p-4 shadow">

        <table class="table table-bordered table-hover text-center">
             <thead class="thead-info">
                 <tr>
                     <th>Vehicle ID</th>
                     <th>Vehicle Model Name</th>
                     <th>Vehicle Model Year</th>
                     <th>Vehicle Engine</th>
                     <th>Vehicle Tax Token</th>
                     <th>Vehicle CC</th>
                     <th>Vehicle Transmission</th>
                     <th>Vehicle Fuel Type</th>
                     <th>Vehicle Registration Year</th>
                     <th>Action</th>
                 </tr>
             </thead>
             <tbody>
              <?php while($vehicle=mysqli_fetch_assoc($vehicles)){ ?>
                <tr>
                    <td><?php echo $vehicle['id'] ?></td>
                    <td><?php echo $vehicle['vhcl_model'] ?></td>
                    <td><?php echo $vehicle['vhcl_model_year'] ?></td>
                    <td><?php echo $vehicle['vhcl_engine'] ?></td>
                    <td><?php echo $vehicle['vhcl_tax_token'] ?></td>
                    <td><?php echo $vehicle['vhcl_cc'] ?></td>
                    <td><?php echo $vehicle['vhcl_transmission'] ?></td>
                    <td><?php echo $vehicle['vhcl_fuel_type'] ?></td>
                    <td><?php echo $vehicle['vhcl_reg_year'] ?></td>
                    <td>
                        <a class="btn btn-success mb-1" href="vehicleedit.php?status=edit&&id=<?php echo $vehicle['id'] ?>">Edit</a>
                        <a class="btn btn-warning" href="?status=delete&&id=<?php  echo $vehicle['id']?>">Delete</a>
                    </td>
                </tr>
                <?php } ?>
             </tbody>
        </table>

    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>