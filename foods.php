<?php
include('partials-front/menu.php');



   ?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.html" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
            //display foods 
            $sql = "SELECT * FROM tbl_food WHERE active='Yes'";
            //execute the query
            $res = mysqli_query($conn, $sql);

            //count rows
            $count = mysqli_num_rows($res);

            //check whether the food is available or not
            if($count>0)
            {
                //foods available
                while($row=mysqli_fetch_assoc($res))
                {
                    //get the values
                    $id = $row['id'];
                    $title = $row['title'];
                    $description = $row['description'];
                    $price = $row['price'];
                    $image_name = $row['image_name'];

                    ?>
                    <div class="food-menu-box">
              <div class="food-menu-img">
                  <?php
                     //check image is available or not
                     if($image_name == "")
                     {
                         //display message 
                         echo "<div class = 'error'>Image not available</div>";
                     }
                     else
                     {
                         // image is available 
                           ?>
                     <img src="<?php echo SIEURS; ?>images/food/<?php echo $image_name;  ?>" alt="Pizza" class="img-responsive img-curve" width="100px">

                         <?php
                     }

                  ?>
              </div>

              <div class="food-menu-desc">
                  <h4><?php echo $title; ?></h4>
                  <p class="food-price"><?php echo $price; ?></p>
                  <p  class="food-detail">
                    <?php echo $description; ?>
              </p>
                    <br>

                  <a href="<?php echo SIEURS;?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
              </div>
          </div>
          <?php
                }
            }
                else
                {
                    //food is not available
                    echo "<div class= 'error'>Food Is Not Available.</div>";
                }
    



                 
           
            ?>

          

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->
    <?php
include('partials-front/footer.php');



   ?>