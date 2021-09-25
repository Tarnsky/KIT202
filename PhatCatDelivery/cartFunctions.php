<?php 
include ('db_conn.php');
include ('session.php');

function display_tb_restaurant() {
    global $mysqli;
    $query = "SELECT DISTINCT tb_restaurant FROM `tb_items`";
    $result = $mysqli->query($query);
    if( $row_cnt = $result->num_row >= 1 ) {
        echo "Choose a tb_restaurant:<ul>";
        while  ($row = $result->fetch_array(MYSQLI_ASSOC)){
            echo "<li><a href=item.php?
            tb_restaurant=".$row['tb_restaurant'].">".$row['tb_restaurant']."</li>";
        }
        echo "</ul>";
    }else{
        echo "Sorry no items available";
    }
}

function display_items($tb_restaurant){
    global $mysqli;
    $query = "SELECT item_id, ingredients, item_price, tb_restaurant FROM `tb_items` WHERE `tb_restaurant` LIKE '$tb_restaurant'"; 
    $result = $mysqli->query($query);
    $printKey = false;
    if( $row_cnt = $result->num_row >= 1 ) {
        echo "<form method='post'>";
        echo "<table border='1'>";
        while( $arr = $result->fetch_array(MYSQLI_ASSOC)) {
            if( !$printKey ) {
                print( "<tr>\r\n" );
                foreach( $arr as $key=>$value) {
                    printf( "<td>%s</td>\r\n",$key);
                }
                print( "<td></td>");
                print( "</tr>\r\n" );
                $printKey = true;
            }
            print( "<tr>\r\n" );
            foreach( $arr as $key=>$value) {
                printf( "<td>%s</td>\r\n",$arr[ $key ]);
            }
            print( "<td><a href='item.php?
            tb_restaurant=$tb_restaurant&added=".$arr['item_id']."'>add</a></td>");
            print( "</tr>\r\n" ); 
        }
        echo "</table>";
    }else{
        echo "Sorry, no items available";
    }
}
function addstock($item_id, $username){
    global $mysqli;
    $cart_id=checkCart($username);
    $query = "SELECT item_id, ordered_amount FROM `tb_orders` WHERE `cart_id` = $cart_id AND `item_id` = $item_id;";
    $result = $mysqli->query($query);

    if($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $amount=$row['ordered_amount']+1;
        editstock($item_id, $amount,$cart_id);
    }else{
        $now=date('Y-m-d H:i:s');
        $query = "INSERT INTO `tb_orders`(`item_id`, `ordered_amount`, 
        ordered_datetime`, `cart_id`) VALUES ($item_id, 1,'$now',$cart_id);";
        $mysqli->query($query);
    }
}

function checkCart($username){
    global $mysqli;
    //see if cart has been made 
    $query = "SELECT `cart_id`, `paid` FROM `tb_cart` WHERE `cust_id` LIKE '$username' AND `paid` = 'N';";
    $result = $mysqli->query($query);
    if($row=$result->fetch_array(MYSQLI_ASSOC)){
        $cart_id=$row['cart_id'];
        return $cart_id;
    }else{
        //create new cart
        $query = "INSERT INTO `tb_cart`(`cust_id`, `paid`) VALUES ('$username','N';";
        $mysqli->query($query);

        $query = "SELECT MAX(cart_id) FROM `tb_cart`;";
        $result = $mysqli->query($query);
        $row=$result->fetch_array(MYSQLI_NUM);
        $cart_id=$row[0];
        return $cart_id;
    }
}

function display_cart($cart_id){
    global $mysqli;
    $item_query = "SELECT item_id, ordered_amount FROM `tb_orders` WHERE `cart_id` = $cart_id";
    $item_result = $mysqli->query($item_query);
    $num = $item_result->num_row;
    if($num==0){
        echo "Your cart is empty";
    } else{
        echo "Your cart:";
        while( $row = $item_result->fetch_array(MYSQLI_ASSOC)) {
            $item_id=$row['item_id'];
            $amount=$row['ordered_amount'];
            $query = "SELECT item_id, ingredients, item_price, categoty FROM `tb_items` WHERE `item_id` 
            = $item_id";
            $result = $mysqli->query($query);
            while( $arr = $result->fetch_array(MYSQLI_ASSOC)) {
                if( !$printKey ) {
                    print( "<tr>\r\n" );
                    print( "<td></td>" );
                    foreach( $arr as $key->$value) {
                        printf( "<td>%s</td>\r\n",$key);
                    }
                    print( "<td>amount</td><td>Subtotal</td>");
                    print( "</tr>\r\n" );
                    $printKey = true;
                }
                print( "<tr>\r\n" );
                print( "<td><input type='radio' name='item_id' value='".$arr['item_id']."'></td>" );
                foreach( $arr as $key=>$value) {
                    printf( "<td>%s</td>\r\n", $arr[ $key ]);
                }
                $subtotal = $amount * $arr['item_price'];
                print( "<td><input type='text' name='amount".$arr['item_id']."' size='2')
                value='$amount'><input type='submit' name='submit' value='Edit'></td>
                <td>$subtotal</td>");
                print( "</tr>\r\n" );
                $total = $total + $subtotal;
            }
        }
        echo "<input type='hidden' name='Edit' value='true'>";
        echo "<tr><td colspan=5 align=right>Total</td><td>$total</td>";
        echo "</table></form>";
        echo "<a href='checkout.php'>Check out</a>";
    }
}

function editstock($item_id,$amount,$cart_id){
    global $mysqli;
    $amount = $mysqli->real_escape_string($amount);
    $query = "UPDATE `tb_orders` SET `ordered_amount`=$amount WHERE 
    `item_id` = $item_id AND `cart_id` = $cart_id;";
    $mysqli->query($query);
}

function display_checkout($cart_id,$username){

    $query = "SELECT account_balance FROM  `tb_customer` WHERE `customer_id` LIKE '$username'";
    $result = $mysqli->query($query);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    echo "<tr><td colspan=5 align=right>Your balance</td><td>".    
    $row['account_balance']."</td>";
    $after_balance=$row['account_balance']-$total;
    echo "<tr><td colspan=5 align=right>Your balance(after 
    transaction)</td><td>$after_balance</td>";
    if($after_balance<0){
        echo "<tr><td colspan=6 align=right>You do not have sufficient credit.</td></tr>";
    }
    echo "</table>";
    if($after_balance>=0){
        echo "<a href='checkout.php?paynow=true&afterbalance=$after_balance'>Pay Now</a><br/>";
    }
}

function complete_transaction($username,$after_balance,$cart_id){
    global $mysqli;
    $mysqli->query('SET autocommit = OFF;');
    $mysqli->query('START TRANSACTION;');
    $item_query = "SELECT tb_items.item_id, ordered_amount FROM `tb_items` 
    LEFT JOIN tb_orders ON tb_orders.item_id=tb_items.item_id WHERE 
    tb_orders.cart_id = $cart_id;";
    $item_result = $mysqli->query($item_query);
    while($row=$item_result->fetch_array(MYSQLI_ASSOC)){
    $item_id=$row['item_id'];
    }
    $query = "UPDATE `tb_customer` SET `account_balance`=$after_balance WHERE customer_id = 
    '$username';";
        if(!$result=$mysqli->query($query)){
        $mysqli->query('ROLLBACK;');
        exit;
        }
    $query = "UPDATE `tb_cart` SET `paid`='Y' WHERE cart_id=$cart_id;";
    $mysqli->query($query);
        if(!$result=$mysqli->query($query)){
            $mysqli->query('ROLLBACK;');
            exit;
        }else{
            $mysqli->query('COMMIT;');
    }
}
?>