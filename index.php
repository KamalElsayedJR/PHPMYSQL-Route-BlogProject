
<?php require_once 'inc/header.php' ?>
<?php require_once 'config.php' ?>

<!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
            <!-- <h4>Best Offer</h4> -->
            <!-- <h2>New Arrivals On Sale</h2> -->
          </div>
        </div>
        <div class="banner-item-02">
          <div class="text-content">
            <!-- <h4>Flash Deals</h4> -->
            <!-- <h2>Get your best products</h2> -->
          </div>
        </div>
        <div class="banner-item-03">
          <div class="text-content">
            <!-- <h4>Last Minute</h4> -->
            <!-- <h2>Grab last minute deals</h2> -->
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->
    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest Posts</h2>
              <!-- <a href="products.html">view all products <i class="fa fa-angle-right"></i></a> -->
            </div>
          </div>


          <?php

            $query = "select * from `posts`";
            $result = mysqli_query($conn,$query);
            if($result){
              while($row = mysqli_fetch_assoc($result )){
                ?>
                <div class="col-md-4">
                  <div class="product-item">
                    <a href="#"><img src="assets/images/postImage/<?php echo $row["image"]?>" alt=""></a>
                    <div class="down-content">
                      <a href="#"><h4><?php echo $row["title"]?></h4></a>
                      <h6><?php echo $row["created_at"]?></h6>
                      <p><?php echo $row["body"]?></p>
                      <!-- <ul class="stars">
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                      </ul>
                      <span>Reviews (24)</span> -->
                      <div class="d-flex justify-content-end">
                        <a href="viewPost.php?id=<?php echo $row["id"]?>" class="btn btn-info "> view</a>
                      </div>
                      
                    </div>
                  </div>
                </div>
                <?php
              }

            }
          ?>
          

        </div>
      </div>
    </div>

<?php require_once 'inc/footer.php' ?>
