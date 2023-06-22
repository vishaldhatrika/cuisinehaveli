<?php

        include('partials-front/nav-bar.php');

        if(isset($_SESSION['user_id']))
        {
            header('location:'.SITEURL.'order-food-after-login.php');
        }
        
         ?>


    <main>
    <script src="JS/script.js"></script>

        <!-- main content starts -->

        <!-- Search section starts -->
        <section class="foodsearch" id="food-search">
            <form action="<?php echo SITEURL?>search-food-menu.php" method="POST">
                <input type="searchitem" name="search" placeholder="Search for food Items">
                <input type="submit" name="submit" value="Search" class="btn">
            </form>
        </section>
        <!-- Search section ends -->

        <!-- Category section starts -->
        <section class="category">
        <p class="alerttext">Click on Categories to view food items</p>
         <?php 
            $sql="SELECT * FROM tbl_category";
            $res=mysqli_query($conn,$sql);
            $count=mysqli_num_rows($res);
            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $name=$row['title'];
                    $id=$row['id'];

                    $image_name=$row['image_name'];

                    ?>
                    <a id="<?php echo $name;?>" onclick="fun(this.id)">
                <div class="Starters cat float-responsive">
                    <?php
                             if($image_name=="")
                            {   
                                echo "<div> class='error' >Image Not available</div>";
                            }
                            else
                            {
                                ?>
                                <img src="<?php echo SITEURL;?>/media/category/<?php echo $image_name ?>" alt="<?php echo $name;?>">

                                <?php
                            }
                                ?>
                    
                    <h3 class="float-text text-white"><?php echo $name;?></h3>
                </div>
            </a>

            <?php 
                }

            }
            else
            {
                echo "<div class='error'>No Category Added</div>";
            }
            ?>
            <div class="clearfix">
            </div>
        </section>
        <!-- Category section ends -->




        <!-- Food Item section starts -->

    <section id="food-menu" class="food-menu" onload="hideOnPageLoad()" >
            <h1>Food Menu</h1>
            <?php 
            $sql4="SELECT * FROM tbl_category";
            $res4=mysqli_query($conn,$sql4);
            $count4=mysqli_num_rows($res4);
            if($count4>0)
            {
                while($row4=mysqli_fetch_assoc($res4))
                {
                    $id=$row4['id'];
                    $title=$row4['title'];
                    // echo $id;
                    $sql3="SELECT * FROM tbl_food where category_id=$id";
                $res3=mysqli_query($conn,$sql3);
                ?>
                <div id="<?php echo $title?>Scroll" class="sub-cat">

                <div onclick="fun('<?php echo $title?>')" class="Cat-button">
                    <h1><?php echo $title?></h1>
                </div>
                <?php
                $count3=mysqli_num_rows($res3);
                if($count3>0)
                {
                    while($row3=mysqli_fetch_assoc($res3))
                        {
                            $ftitle=$row3['title'];
                            $fid=$row3['id'];
                            $des=$row3['description'];
                            $price=$row3['price'];
                            $image_name=$row3['image_name'];
                            ?>
                            <div class="S">
                                <div class="Itemimg">
                                    <img src="<?php echo SITEURL.'media/food/'.$image_name;?>">
                                </div>
                                <div class="desc">
                                    <div class="itemname">
                                        <h3><?php echo $ftitle?></h3>
                                    </div>
                                    <div class="itemprice">
                                    <h4>Rs: <?php echo $price;?> /-</h4>
                                    </div>
                                    <div class="itemdesc">
                                        <?php echo $des;?>
                                    </div>
                                    
                                </div>
                            </div>
                            <?php
                        // }

                }
            }
                else
                {
                    echo "<div class='error'><h3>No Food Items Available in the $title Category</h3></div>";
                }
                ?>
                </div>
                <div class="clearfix">
                </div>
                <?php
                }
            }
            ?>
            <h3 class='sectionsubtitle'>Please Register or Login to Order</h3>
            </section>
    </main>
