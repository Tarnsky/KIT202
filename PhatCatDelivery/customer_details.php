<!-- This page will allow the system manager to see staff list and change them
 (only system manger will have access to this page) Not sure if we need this page or can just
use the editstaff page -->



<?php
include ('db_conn.php');
include ('session.php');

if($session_id == ""){
     echo "<script type='text/javascript'>alert('You need to login!!');
    window.location='index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Staff</title>
    <link rel="stylesheet" href="style.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  </head>
  <body>
    <header>
      <!-- Navbar -->

      <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
      <div class="container-fluid">
        <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarExample01"
        aria-controls="navbarExample01"
        aria-expanded="false"
        aria-label="Toggle navigation"
        >
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarExample01">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item active">
            <a class="nav-link" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="#" data-toggle="modal" data-target="#regiModal">Registration</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="account.html">Account</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="#" data-toggle="modal" data-target="#PartnerregiModal">Become a Partner Restaurant</a>
          </li>
        </ul>

  <!-- Search Bar -->

      </div>
        <nav class="navbar navbar-light bg-white justify-content-between">
        <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="restaurant" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
        </nav>
    </div>
    <?php if ($session_id == ""){ ?>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a type = "button" class="nav-link float-right"data-toggle="modal" data-target="#loginModal">Login</a>
        </li>

      </ul>
      </div>
   <?php } else {?>
     <div class="collapse navbar-collapse">
       <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       <li class="nav-item">
         <a type = "button" class="nav-link float-right" href = "logout.php">Logout</a>
       </li>
     </ul>
     </div>
  <?php  }?>
  </nav>
   </header>
  <div class="content">
    <?php
    if ($session_id == "3"){
    $query = "SELECT * FROM tb_customers";
    $result=$mysqli->query($query);
    ?>
    <div class="table-responsive p-4">
      <h1>Participant List</h1>

      <button class = "btn btn-primary float-right" data-toggle="modal" data-target="#regiModal">Add </button>
      <table class="table table-bordered table-striped">
        <thead>
          <th>ID</th>
          <th>Name</th>
          <th>address</th>
          <th>Email</th>
          <th>mobile number</th>
          <th>account balance</th>
          <th colspan = "2">Action</th>
        </thead>
        <tbody>
          <?php
          while($row = mysqli_fetch_array($result)){
            ?>
            <tr>
              <td><?php echo $row ['customer_id'] ;?></td>
              <td><?php echo $row['first_name']." , ".$row['last_name'] ;?></td>
              <td><?php echo $row['address'];?></td>
              <td><?php echo $row['email'];?></td>
              <td><?php echo $row['mobile_number'];?></td>
              <td><?php echo $row['account_balance'];?></td>
              <td><a href = #edit_modal class="btn  btn-dark open-edit" id="<?= $row['customer_id']; ?>">Edit</td>
              <td><a href="process.php?delete=<?php echo $row['customer_id']; ?>" class = "btn btn-danger"> Delete</a></td>
            </tr>
          <?php };
            ?>
        </tbody>
      </table>
    </div>
  <?php } else {
    $query = "SELECT * FROM tb_customers WHERE customer_id = '$session_id'";
    $result=$mysqli->query($query);
    while($row = mysqli_fetch_array($result)){

    ?>
    <div class="table-responsive p-4">
      <h3>Your details</h3>
      <table class="table table-bordered table-striped">
        <tr>
          <th>Name</th>
          <th><?php echo $row['first_name']." , ".$row['last_name'] ;?></th>
        </tr>
        <tr>
          <th>Email</th>
          <th><?php echo $row['email'];?></th>
        </tr>
        <tr>
          <th>Password</th>
          <th><?php echo $row['password'];?></th>
        </tr>
          <tr>
              <th>address</th>
              <th><?php echo $row['address'];?></th>
          </tr>

        <tr>
          <th>account balance</th>
          <th><?php echo $row['account_balance'];?></th>
            <th>
                <form action="#" method="post">
                    <select name="selected[]">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <input type="submit" name="submit" value="Submit" />
                </form>
            </th>
        </tr>

      </table>

    </div>

  <?php }} ?>
      <?php
      if(isset($_POST['submit'])) {
          foreach ($_POST['selected'] as $select)
          {
              #$add=$_POST['selected'];
              #$query = "SELECT account_balance FROM tb_customers WHERE customer_id = '$session_id'";
              #$result=$mysqli->query($query);
              $result =$mysqli->query("SELECT account_balance FROM tb_customers WHERE customer_id = '$session_id'")->fetch_object()->account_balance;
              #echo $add;
              $new_bal=(int)$result+(int)$select;

              $mysqli->query("UPDATE tb_customers SET account_balance = $new_bal WHERE customer_id = '$session_id'");
              echo $new_bal;
              header("Refresh:0");
              # $mysqli->query("UPDATE account_balance set count = count + $count where id = $session_id");
          }

      }
      ?>
  </div>
 <?php
 include('editstaff.php');
 ?>

  <!-- Registration Modal Form -->
  <div class="modal fade" id="regiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Marathon Registration</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form role = "form" class="regiForm" action = "register_engine.php" method = "post">
            <table class = "responsive">
              <tr class="form-group">
                <td style = "width: 40%"><label for="fname">First Name</label></td>
                <td><input class = "form-control" type="text" id="fname" name ="fname" ></td>
              </tr>

              <tr class="form-group">
                <td>Last Name</td>
                <td><input  class = "form-control" type="text" id="lname" name = "lname" ></td>
              </tr>

              <tr class="form-group">
                <td>Gender</td>
                <td><input  type="radio" id="gender" name = "gender" value = "female" >Female
                  <input   type="radio" id="gender" name = "gender" value = "male">Male
                  <input   type="radio" id="gender" name = "gender" value = "other">Other
                </td>
              </tr>

              <tr class="form-group">
                <td>Select a race</td>
                <td><select  class = "form-control" name="race" id="race" >
                  <option  class = "form-control" value = "" hidden disabled selected = "selected">Select your race</option>
                  <option  class = "form-control" value="5k">Fun Run 5k</option>
                  <option  class = "form-control" value="half">Half Marathon</option>
                  <option  class = "form-control"  value="full">Full Marathon</option>

                </select>
              </td>
            </tr>

            <tr class="form-group">
              <td>Email</td>
              <td><input  class = "form-control" type="email" id="email" name ="email" ></td>
            </tr>

            <tr class="form-group">
              <td>Password</td>
              <td><input class = "form-control"  type="password" id="password" name = "password" pattern = "(?=.*\d)(?=.*[A-Za-z]).{6,8}" title = "Must contain at least one number, one letters and between 6 and 8 characters"  ></td>
            </tr>

            <tr class="form-group">
              <td>Confirm Password</td>
              <td><input class = "form-control"  type="password" id="confirm_password" name = "confirm_password"></td>
            </tr>

            <tr class="form-group">
              <td>Age Group</td>
              <td><select  class = "form-control"  name="division" id="division" >
                <option value = "" hidden disabled selected = "selected">Select your age group</option>
                <option class = "form-control" value="kids">under 18</option>
                <option  class = "form-control" value="ya">18-30</option>
                <option  class = "form-control"  value="adults">30-50</option>
                <option  class = "form-control" value="seniors">50+</option>
              </select>
            </td>
          </tr>


        </table>
        <p><span id = "msg"></span></p>

        <button class = "btn btn-danger float-right" type = "submit" id = "register" name = "register">Register</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </form>


    </div>
    <div class="modal-footer">
    </div>
  </div>
  </div>
  </div>



  </body>
</html>
