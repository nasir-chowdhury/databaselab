<?php
     include("ownerfunction.php");

     $objOwnerInfo = new ownerInfo();

     if(isset($_POST['add_info'])){
        $return_msgg = $objOwnerInfo->added_data($_POST);
     }

     $ownerrs = $objOwnerInfo->display_dataa();

     if(isset($_GET['status'])){
      if($_GET['status']='delete'){
        $dlt_id = $_GET['id'];
        $objOwnerInfo->dlt_data($dlt_id);
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

    <title>Owner Information</title>
  </head>
  <body>
    


    <div class="container my-4 p-4 shadow">

        <h2><a style="text-align:center;" href="vehicleindex">Vehicle's Owner Info</a></h2>
        <form class="form" action="" method="post">

          <?php if(isset($return_msgg)){echo $return_msgg;} ?>
          
          
          <input class="form-control mb-2" type="text" name="owner_name" placeholder="Vehicle's Owner name">
          <input class="form-control mb-2" type="text" name="owner_address" placeholder="Vehicle's Owner Address">
          <input class="form-control mb-2" type="number" name="vhcl_id" placeholder="Vehicle's Id">
          <input type="submit" value="Add Info" name="add_info" class="form-control bg-warning">
        </form>

    </div>


    <div class="container my-4 p-4 shadow">

        <table class="table table-bordered table-hover text-center">
             <thead class="thead-info">
                 <tr>
                     <th>Owner ID</th>
                     <th>Owner Name</th>
                     <th>Owner Address</th>
                     <th>Vehicle Id</th>
                     <th>Action</th>
                 </tr>
             </thead>
             <tbody>
              <?php while($ownerr=mysqli_fetch_assoc($ownerrs)){ ?>
                <tr>
                    <td><?php echo $ownerr['id'] ?></td>
                    <td><?php echo $ownerr['owner_name'] ?></td>
                    <td><?php echo $ownerr['owner_address'] ?></td>
                    <td><?php echo $ownerr['vhcl_id'] ?></td>
                    <td>
                        <a class="btn btn-success mb-1" href="owneredit.php?status=edit&&id=<?php echo $ownerr['id'] ?>">Edit</a>
                        <a class="btn btn-warning" href="?status=delete&&id=<?php echo $ownerr['id'] ?>">Delete</a>
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