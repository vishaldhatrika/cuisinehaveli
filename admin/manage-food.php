<?php include("nav-bar.php"); ?>



<!-- main section starts Here  -->

<main class="main">



	<div class="wrapper" >

        <h1>Manage Food</h1>
        <br>
        <br>

        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

            if(isset($_SESSION['remove']))
            {
                echo $_SESSION['remove'];
                unset($_SESSION['remove']);
            }

            if(isset($_SESSION['unauthorize']))
            {
                echo $_SESSION['unauthorize'];
                unset($_SESSION['unauthorize']);
            }

            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }


        ?>
        <br><br>

        <!-- Button to add Admin  -->
        <a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn-primary"> Add Food</a>

        <br>
        <br>
        <table class="tbl-full">
        <tr>

            <th>S.N</th>
            <th>Title</th>
            <th>Price</th>
            <th>Image</th>
            <th>Featured</th>
            <th>Active</th>
            <th>Actions</th>

        </tr>

        <?php 
            $sql5="SELECT * FROM tbl_food";

            $res5=mysqli_query($conn,$sql5);
            $count=mysqli_num_rows($res5);
            $sn=1;
            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res5))
                {
                    $id=$row['id'];
                    $title=$row['title'];
                    $price=$row['price'];
                    $image_name=$row['image_name'];
                    $featured=$row['featured'];
                    $active=$row['active'];

                    ?>

                        <tr>
                        <td><?php echo $sn++;?></td>
                        <td><?php echo $title?></td>
                        <td>₹<?php echo $price?></td>
                        <td>
                            <?php
                                if($image_name=="")
                                {
                                    echo "<div class='error'>Image not Added.</div>";
                                }
                                else
                                {
                                    ?>
                                    <img src="<?php echo SITEURL; ?>media/food/<?php echo $image_name; ?>" width='85px'>
                                    

                                    <?php
                                }
                                // echo $image_name
                            
                            ?>
                        </td>
                        <td><?php echo $featured?></td>
                        <td><?php echo $active?></td>
                        <td>
                        <a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id?>" class="btn-secondary">Update Food</a>
                        <a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id?>&image_name=<?php echo $image_name?>" class="btn-danger">Delete Food</a>
                        </td>

                    </tr>



                    <?php

                }

            }
            else
            {
                echo "<tr><td colspan='7' class='error'>Food not Added Yet.</tr>";

            }



        ?>


        

        </table>


    
        
        
    </div>


</main>


<?php include("../partials-front/footer.php");?>