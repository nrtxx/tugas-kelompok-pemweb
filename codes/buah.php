<?php
    include 'header.php';
?>

<main>
    <div class="album py-5">
      <div class="container">
        <h1 class="jumbotron-heading" id="title-page">Buah</h1>
        <div class="row">
              <?php
              include 'db.php';

              $product_query = "SELECT * FROM products WHERE product_cat='1'";
              $run_query = mysqli_query($con, $product_query);
              if(mysqli_num_rows($run_query)) {
                while($row = mysqli_fetch_array($run_query)) {
                  $pro_id = $row['product_id'];
                  $pro_cat = $row['product_cat'];
                  $pro_title = $row['product_title'];
                  $pro_price = $row['product_price'];
                  $pro_image = $row['product_image'];
                  $pro_desc = $row['product_desc'];

                  echo "
                  <div class='col-md-4'>
                    <div class='card mb-4 shadow'>
                      <img class='card-img-top' src='assets/img/$pro_image' style='height: 310px;' alt='Card image cap'>
                      <div class='card-body'>
                        <h5 class='card-name'>$pro_title</h5>
                        <p class='card-desc'>$pro_desc</p>
                        <p class='card-price fw-bold'>Rp $pro_price</p>
                        <div class='d-flex justify-content-between align-items-center'>
                          <div class='btn-group'>
                            <a href='cart.php?pid=$pro_id' class='btn btn-sm btn-primary'>Add to cart</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  ";
                }
              }
              
              ?>
        </div>
      </div>
    </div>
</main>

<?php
    include 'footer.php';
?>