<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
include "db.php";

// untuk signup
if(isset($_POST["signup"])) {
    $nama = $_POST["nama"];
    $mobile = $_POST["mobile"];
    $address1 = $_POST["address1"];
    $address2 = $_POST["address2"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT user_id FROM user WHERE email = 'email' LIMIT 1";
    $check_query = mysqli_query($con, $sql);
    $count_email = mysqli_num_rows($check_query);
    if($count_email > 0) {
        echo "
            <div class='alert alert-danger'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <b>Email telah digunakan Coba email lainnya</b>
            </div>
        ";
        exit();
    } else {
        $sql = "INSERT INTO `user`
        (`nama`, `mobile`, `address1`, `address2`, `email`, `password`)
        VALUES ('$nama', '$mobile', '$address1', '$address2', '$email', '$password')";
        $run_query = mysqli_query($con, $sql);
        $_SESSION["uid"] = mysqli_insert_id($con);
        $_SESSION["nama"] = $nama;
        $ip_add = getenv("REMOTE_ADDR");
        $sql = "UPDATE cart SET user_id = '$_SESSION[uid]' WHERE ip_add='$ip_add' AND user_id = -1";
		if(mysqli_query($con,$sql)){
			echo "register_success";
			echo "<script> location.href='index.php'; </script>";
            exit;
		} 
    }
}

// untuk login
if(isset($_POST["login"])) {
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $password = $_POST["password"];
    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $run_query = mysqli_query($con, $sql);
    $count = mysqli_num_rows($run_query);
    $row = mysqli_fetch_array($run_query);
    $_SESSION["uid"] = $row["user_id"];
    $_SESSION["name"] = $row["nama"];
    $ip_add = getenv("REMOTE_ADDR");

    if($count == 1) {
        if(isset($_COOKIE["product_list"])) {
            $p_list = stripcslashes($_COOKIE["product_list"]);
            //konversi json cookie menjadi array
            $product_list = json_decode($p_list, true);
            for($i=0; $i<count($product_list); $i++) {
                //sesudah mendapatkan user_id dari database kemudian dicek cart nya apakah sudah ada isinya atau belum
                $verify_cart = "SELECT cart_id FROM cart WHERE user_id='$_SESSION[uid]' AND product_id=".$product_list[$i];
                $result = mysqli_query($con, $verify_cart);
                if(mysqli_num_rows($result) < 1) {
                    //jika user pertama kali menambahkan product ke cart maka akan user_id dengan cart_id yg valid
                    $update_cart = "UPDATE cart SET user_id='$_SESSION[uid]' WHERE ip_add='$ip_add' AND user_id=-1";
                    mysqli_query($con, $update_cart);
                } else {
                    //jika sudah ada maka hapus record tersebut
                    $delete_existing_product = "DELETE FROM cart WHERE user_id=-1 AND ip_add='$ip_add' AND p_id=".$product_list[$i];
                    mysqli_query($con, $delete_existing_product);
                }
            }
            //hapus cookie
            setcookie("product_list", "", strtotime("-1 day"), "/");
            echo "cart_login";
            exit();
        }
        echo "login_suskes";
        $backToMyPage = $_SERVER['HTTP_REFERER'];
        if(!isset($backToMyPage)) {
            header('Location: '.$backToMyPage);
            echo"<script type='text/javascript'>
					
				</script>";
        } else {
            header('Location: index.php');
        }
    }
}

if (isset($_GET["pid"])) {
    $pid = $_GET["pid"];
    if(isset($_SESSION["uid"])){
        $user_id = $_SESSION["uid"];
        $sql = "INSERT INTO `cart`
            (`p_id`, `ip_add`, `user_id`, `qty`) 
            VALUES ('$pid','$ip_add','$user_id','1')";
        mysqli_query($con,$sql);
        unset($_GET["pid"]);
    }
}

//Count User cart item
if (isset($_POST["count_item"])) {
	//When user is logged in then we will count number of item in cart by using user session id
	if (isset($_SESSION["uid"])) {
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE user_id = $_SESSION[uid]";
	}else{
		//When user is not logged in then we will count number of item in cart by using users unique ip address
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE ip_add = '$ip_add' AND user_id < 0";
	}
	
	$query = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($query);
	echo $row["count_item"];
	exit();
}

if (isset($_POST["sendMessage"])) {
    $nama = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $sql = "INSERT INTO `report`
        (`nama`, `email`, `subject`, `message`)
        VALUES ('$nama', '$email', '$subject', '$message')";
        $run_query = mysqli_query($con, $sql);
    echo "
    <script>
            alert('Pesan telah dikirim');
    </script>
    ";
}
?>