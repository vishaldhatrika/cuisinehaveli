<?php 

// echo "Food Menu";
include('partials-front/nav-bar.php'); ?>

<main>
    <?php $key=$_POST['search'];
    $key=mysqli_real_escape_string($conn,$_POST['search']);
    ?>
        <section class="foodsearch" id="food-search">
            <h1 style="color:white; shadow: 2px 2px 5px grey;" class='sectionsubtitle'>Your Search Results for <?php echo $key ?> are:</h1>
        </section>
<section class='food-menu'>
        <?php
                
                // echo $key;
                $sql="SELECT * FROM tbl_food WHERE title like '%$key%' OR description like '%$key%'";
                $res3=mysqli_query($conn,$sql);
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
                                    <!-- <div class="qty"> Qty: <input type="number" min=0 max=10> </div>
                                    <div class="Order-btn">
                                        <a href="<?php //echo SITEURL?>order-page.php?food_id=<?php //echo $fid;?>">
                                            Order Now
                                        </a>
                                    </div> -->
                                </div>
                            </div>

                            
                            <?php
                        // }

                }
                ?>
                <div class='clearfix'></div>
                <?php
            }
                else
                {
                    echo "<div class='error'><h3>No Food items found related to $key.</h3></div>";


                }
           


?>
    </section>



</main>



<?php include('partials-front/footer.php'); ?>