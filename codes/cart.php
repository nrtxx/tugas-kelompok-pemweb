<?php
    include 'header.php';
?>

    <main>
        <div class="container my-5">
            <div class="row">
                <h1>Keranjang</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include 'db.php';
                            $product_query = "SELECT * FROM products, cart WHERE product_id=p_id";
                            $run_query = mysqli_query($con, $product_query);
                            if(mysqli_num_rows($run_query)) {
                                while($row = mysqli_fetch_array($run_query)) {
                                $pro_id = $row['product_id'];
                                $pro_title = $row['product_title'];
                                $pro_price = $row['product_price'];
                                $pro_image = $row['product_image'];
                                $cart_id = $row['cart_id'];
                                $qty = $row['qty'];

                                echo"
                                <tr>
                                    <td>
                                        <img src='assets/img/$pro_image' width='100'>
                                    </td>
                                    <td>Rp $pro_price</td>
                                    <td>$qty</td>
                                    <td>Rp ".$pro_price * $qty." </td>
                                </tr>
                                ";
                                }
                            }
                        ?>
                        </tbody>
                </table>
                        <?php
                            include 'db.php';
                            $product_query = "SELECT * FROM products, cart WHERE product_id=p_id";
                            $run_query = mysqli_query($con, $product_query);
                            $subtotal = 0;
                            $jumlah = 0;
                            if(mysqli_num_rows($run_query)) {
                                while($row = mysqli_fetch_array($run_query)) {
                                $pro_id = $row['product_id'];
                                $pro_title = $row['product_title'];
                                $pro_price = $row['product_price'];
                                $pro_image = $row['product_image'];
                                $cart_id = $row['cart_id'];
                                $qty = $row['qty'];
                                
                                $jumlah = $jumlah + $qty;
                                $subtotal = $subtotal + ($pro_price * $qty);
                                }
                            }
                            echo'
                            <div class="col-xs-4 pull-center mt-1">
                                <h2>Total Harga</h2>
                                <table class="table table-bordered" cellspascing="0">
                                    <tr class="cart-subtotal">
                                        <th>Items :</th>
                                        <td>'.$jumlah.'</td>
                                    </tr>

                                    <tr class="shipping">
                                        <th>Biaya Ongkir</th>
                                        <td>Free Ongkir</td>
                                    </tr>

                                    <tr class="order-total">
                                        <th>Harga Total</th>
                                        <td>Rp '.$subtotal.'</td>
                                    </tr>
                                </table>
                                <a href="checkout.php" class="btn btn-warning fw-bold col-md-1 mb-4">Checkout</a>
                            </div>
                            ';
                        ?>
            </div>
        </div>
    </main>

