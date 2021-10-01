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
    <title>Account Details</title>
    <link rel="stylesheet" href="account.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   <!-- Popper JS -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- icons library-->
    <script src="https://kit.fontawesome.com/6d293d14e1.js" crossorigin="anonymous"></script>
</head>
<header>

  <!-- Navbar -->

    <nav class="navbar navbar-expand-lg navbar-light bg-white top">
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
          <a type = "button" class="nav-link float-right" href="cart.php">Viewcart</a>
        </li>
        <li class="nav-item">
          <a type = "button" class="nav-link float-right"data-toggle="modal" data-target="login.php">Login</a>
        </li>
      </ul>
      </div>
   <?php } else {?>
     <div class="collapse navbar-collapse">
       <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       <li class="nav-item">
          <a type = "button" class="nav-link float-right" href="cart.php">Viewcart</a>
        </li>
       <li class="nav-item">
         <a type = "button" class="nav-link float-right" href = "logout.php">Logout</a>
       </li>
     </ul>
     </div>
  <?php  }?>
  
<!-- Background image -->

<div class="p-5 text-center bg-image header-background" >
  <div class="mask">
    <div class="d-flex justify-content-center align-items-center h-100">
      <div class="text-white">
        <h1 class="mb-3">Phatcat Delivery</h1>
        <a class="btn btn-outline-light btn-lg" href="#" data-toggle="modal" data-target="index.php" role="button">Home</a>
      </div>
    </div>
  </div>
</div>
</header>
  </nav>
  

<!-- Tabs created for account -->
    <div class="tabs">
      <div class="tab-header">
        <div class="active"> 
          Account Details
        </div>
        <div>
          Transaction History
        </div>
        <div>
          Balance
        </div>
      </div>
      <?php 
            $query = "SELECT * FROM tb_users WHERE customer_id = '$session_id'";
            $result=$mysqli->query($query);
            while($row = mysqli_fetch_array($result)){
      ?>

<!-- Tab content for defualt active page  which is the account details -->
      <div class="tab-content">
        <div class="active">
          <table>
            <tr>
              <td>Name: </td>
              <td><?php echo $row['first_name']." , ".$row['last_name'] ;?></td>
            </tr>
            <tr>
              <td>Mobile Number: </td>
              <td><?php echo $row['mobile_number'];?></td>
            </tr>
            <tr>
              <td>Password: </td>
              <td><?php echo $row['password'];?></td>
            </tr>
            <tr>
              <td>Address: </td>
              <td><?php echo $row['address'];?></td>
            </tr>
            <tr>
              <td>Customer ID: </td>
              <td><?php echo $row['customer_id'];?></td>
            </tr>
            <tr><td><a href="user_details.php">Edit</a></td></tr>
          </table>
        </div>
<!-- tab content for balance history -->
        <div>
          <table>
            <tr>
              <th>Date</th>
              <th>Description</th>
              <th>Amount</th>
              <th>Balance</th>
            </tr>
            <tr>
              <td>11/11/21 </td>
              <td>KFC</td>
              <td>-$13.99</td>
              <td>$1164.34</td>
            </tr>
            <tr>
              <td>10/11/21: </td>
              <td>Pizza House</td>
              <td>-$10.00</td>
              <td>$1154.34</td>
            </tr>
            <tr>
              <td>7/11/21</td>
              <td>Deposit +$100</td>
              <td>+$100</td>
              <td>$1254.34</td>
            </tr>
          </table>
        </div>
<!-- Tab contents for account balance -->
        <div>
          <table>
            <tr>
              <td>
                Current Balance:
              </td>
              <td>
              $<?php echo $row['account_balance'];?>
              </td>
            </tr>
          </table>
            <th>
                <form action="reload_account.php" method="post">
                    <select name="selected[]">
                        <option value="5">$5</option>
                        <option value="10">$10</option>
                        <option value="20">$20</option>
                        <option value="50">$50</option>
                        <option value="100">$100</option>
                    </select>
                    <input type="submit" name="submit" value="ADD FUNDS" />
                </form>
            </th>
        </div>
      </div>
    </div>
    <?php
    if(isset($_POST['submit'])) {
        foreach ($_POST['selected'] as $select)
        {
            $result =$mysqli->query("SELECT account_balance FROM tb_users WHERE customer_id = '$session_id'")->fetch_object()->account_balance;
            $new_bal=(int)$result+(int)$select;
            $mysqli->query("UPDATE tb_users SET account_balance = $new_bal WHERE customer_id = '$session_id'");
            header('Location: reload_account.php');
        }

    }
    ?>
    <script>
      <?php } ?> 
//script for tab headers and tab contents, query the selector through class 
// and assignt it to tabHeaders and tabcontents variables
      let tabHeaders = document.querySelectorAll(".tabs .tab-header >div");
      let tabContents = document.querySelectorAll(".tabs .tab-content > div");
      
      //Loop through tab headers, once the tab header is click it will change
      // the class to active and show the active tab content
      for (let i = 0; i < tabHeaders.length; i++) {
        tabHeaders[i].addEventListener("click",function() {
          document.querySelector(".tabs .tab-header > .active").classList.remove("active");
          tabHeaders[i].classList.add("active");
          document.querySelector(".tabs .tab-content > .active").classList.remove("active");
          tabContents[i].classList.add("active");
        })
      }
    </script>

<!-- Footer -->


  <?php include ('login.php'); ?>

<script type="text/javascript" src = "script.js"></script>
</body>
</html>