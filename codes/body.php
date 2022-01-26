<main>
    <div id="carouselExampleDark"
      class="carousel carousel-dark shadow slide col-md-8 offset-2 mt-5 d-flex justify-content-center justify-content-lg-start"
      data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="5000">
          <img src="assets/img/banner1.jpg" class="d-block w-100 rounded-3" alt="Vegetables">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="5000">
          <img src="assets/img/banner2.jpg" class="d-block w-100 rounded-3" alt="Discount">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>


    <div class="album py-5">
      <div class="container">
        <h1 class="jumbotron-heading" id="title-page">Latest Products</h1>
        <div class="row">
              <?php
              include 'db.php';

              $product_query = "SELECT * FROM products, categories WHERE product_cat=cat_id";
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