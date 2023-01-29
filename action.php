<?php 
    session_start();
    include 'includes/dbh.inc.php';
    
    if(isset($_POST['pid'])){
        $pid = $_POST['pid'];
        $pname = $_POST['pname'];
        $pprice = $_POST['pprice'];
        $pimage = $_POST['pimage'];
        $pcode = $_POST['pcode'];
        $pqty = 1;
    

    $stmt = $conn->prepare("SELECT product_code FROM cart WHERE product_code=?");
    $stmt->bind_param("s", $pcode);
    $stmt->execute();
    $res = $stmt->get_result();
    $r = $res->fetch_assoc();
    $code = $r['product_code'] ?? 0;
   
    if(!$code){
        $query = $conn->prepare("INSERT INTO cart (product_name, product_price, product_image, qty, total_price, product_code) 
        VALUES (?,?,?,?,?,?)");
        $query->bind_param("sssiss", $pprice, $pprice, $pimage, $pqty, $pprice, $pcode);
        $query->execute();
        
        echo '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Item added to your cart!</strong>
            </div>';

        } else {

        echo '<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Item already added to your cart!</strong>
            </div>';
        }
    }
    
    // Get no.of items available in the cart table
    if(isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item'){
        $stmt = $conn->prepare("SELECT * FROM cart");
        $stmt->execute();
        $stmt->store_result();
        $rows = $stmt->num_rows;

        echo $rows;
    }
?>