<?php
    include 'header.php';
?>

<style>
	.row-checkout {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}
.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container-checkout {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.checkout-btn {
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.checkout-btn:hover {
  background-color: #45a049;
}



hr {
  border: 1px solid lightgrey;
}
</style>

<main>
    <div class="checkout my-5">
        <div class="container-fluid">
        <div class="row">
            <?php
            if (isset($_SESSION["uid"])) {
                $sql = "SELECT * FROM user WHERE user_id='$_SESSION[uid]'";
                $query = mysqli_query($con,$sql);
                $row=mysqli_fetch_array($query);
                echo '
                <div class="col-75">
				<div class="container-checkout">
				<form id="checkout_form" action="checkout_process.php" method="POST" class="was-validated">

					<div class="row-checkout">
					
					<div class="col-50">
						<h3>Data Pembayaran</h3>
						<label for="name"><i class="fa fa-user" ></i> Nama Lengkap</label>
						<input type="text" id="name" class="form-control" name="name" pattern="^[a-zA-Z ]+$"  value="'.$row["nama"].'">
						<label for="email"><i class="fa fa-envelope"></i> Email</label>
						<input type="text" id="email" name="email" class="form-control" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$" value="'.$row["email"].'" required>
						<label for="alamat"><i class="fa fa-address-card-o"></i>Alamat</label>
						<input type="text" id="alamat" name="address1" class="form-control" value="'.$row["address1"].'" required>
                        <label for="kota"><i class="fa fa-address-card-o"></i>Kota</label>
						<input type="text" id="kota" name="address2" class="form-control" value="'.$row["address2"].'" required>

						<div class="row">
						<div class="col-50">

						</div>
						<div class="col-50">

						</div>
						</div>
					</div>
					
					
					<div class="col-50">
						<div class="icon-container">

						</div>
						
						<label for="cname">Atas Nama</label>
						<input type="text" id="cname" name="cardname" class="form-control" pattern="^[a-zA-Z ]+$" required>
						
						<div class="form-group" id="card-number-field">
                        <label for="cardnumber">Nomor Kartu</label>
                        <input type="text" class="form-control" id="cardnumber" name="cardnumber" required>
                    </div>
						
						

						<div class="row">
						
						<div class="col-50">
							<div class="form-group CVV">
								
						</div>
						</div>
					</div>
					</div>
					</div>
					<label><input type="CHECKBOX" name="q" class="roomselect" value="conform" required> Apakah Data diatas Telah Benar
					</label>';
					include 'db.php';
					$product_query = "SELECT * FROM products, cart WHERE product_id=p_id";
					$run_query = mysqli_query($con, $product_query);
					$subtotal = 0;
					$jumlah = 0;
					$i=1;
					if(mysqli_num_rows($run_query)) {
						while($row = mysqli_fetch_array($run_query)) {
							$pro_id = $row['product_id'];
							$pro_title = $row['product_title'];
							$pro_price = $row['product_price'];
							$pro_image = $row['product_image'];
							$cart_id = $row['cart_id'];
							$qty = $row['qty'];

							echo "	
							<input type='hidden' name='prod_id_$i' value='$pro_id'>
							<input type='hidden' name='prod_price_$i' value='".$pro_price * $qty."'>
							<input type='hidden' name='prod_qty_$i' value='$qty'>
							";
							$i++;
							
							$jumlah = $jumlah + $qty;
							$subtotal = $subtotal + ($pro_price * $qty);
						}
					}

                    
					
					
				echo'	
				<input type="hidden" name="jumlah" value="'.$jumlah.'">
					<input type="hidden" name="subtotal" value="'.$subtotal.'">
					
					<input type="submit" id="submit" value="Order" class="checkout-btn btn-success">
				</form>
				</div>
			</div>
			';
            }
            ?>
        </div>
        </div>
    </div>
</main>