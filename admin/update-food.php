<?php include('nav-bar.php'); ?>

<link rel="stylesheet" href="../styles/inputboxes.css">
<?php 
    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        $sql2="SELECT * FROM tbl_food WHERE id=$id";
        $res2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_assoc($res2);

        $title=$row2['title'];
        $title=mysqli_real_escape_string($conn,$title);
       
        $description=$row2['description'];
        // echo $description;
        $price=$row2['price'];
        $current_image=$row2['image_name'];
        $current_category=$row2['category_id'];
        $featured=$row2['featured'];
        $active=$row2['active']; 


    }
    else
    {
        header('location:'.SITEURL.'/admin/manage-food.php');
    }

            if(isset($_POST['submit']))
            {
                // echo "button Clicked";
                $id=$_POST['id'];
                $title=$_POST['title'];
                $title=mysqli_real_escape_string($conn,$title);
       
                $description=$_POST['description'];
                $description=mysqli_real_escape_string($conn,$description);
       
                $price=$_POST['price'];
                $current_image=$_POST['current_image'];
                $category=$_POST['category'];
                $active=$_POST['active'];
                $featured=$_POST['featured'];

                if(isset($_FILES['image']['name']))
                {
                    $image_name=$_FILES['image']['name'];
                    $st=explode('.',$image_name);
                    $image_name=$st[0].rand(000,999).'.'.$st[1];
                    if($image_name!="")
                    {
                        $src=$_FILES['image']['tmp_name'];
                        $dest="../media/food/".$image_name;
                        $upload=move_uploaded_file($src,$dest);
                        if($upload==false)
                        {
                            $_SESSION['upload']="<div class='error'> Failed re uplaod Image.</div>";
                            header('location:'.SITEURL.'admin/manage-food.php');
                            die();
                        }

                        if($current_image!="")
                        {
                            $remove_path="../media/food/".$current_image;
                            if(file_exists($remove_path))
                                $remove=unlink($remove_path);
                            if($remove==false)
                            {
                                $_SESSION['remove-failed']="<div class='error'>Failed to remove Current Image</div>";
                                header('location:'.SITEURL.'admin/manage-food.php');
                                die();
                            }

                        }

                        
                    }


                }
                else
                {
                    $image_name=$current_image;
                }

                $sql3="UPDATE tbl_food SET 
                title='$title',
                description='$description',
                price='$price',
                image_name='$image_name',
                category_id='$category',
                featured='$featured',
                active='$active' 
                WHERE id=$id
                ";

                $res3=mysqli_query($conn,$sql3);

                if($res3)
                {
                    $_SESSION['update']="<div class='success'>Updated Food Succesfully</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');


                }
                else
                {
                    $_SESSION['update']="<div class='error'>Failed to update food.</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');

                }

            }
            else
            {

            }


        ?>

<div class='main'>
    <div class="wrapper">
        <h1>Update Food</h1>
        <br>
        <br>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name='description' cols="30" rows="5"  ><?php echo $description;?></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price" value="<?php echo $price; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Current Image:  </td>
                    <td>
                        <?php 
                        if($current_image=="")
                        {
                            echo "<div class'error'>Image not Available.</div>";

                        }
                        else{
                            ?>
                            <img width="85px" src='<?php echo SITEURL;?>media/food/<?php echo $current_image;?>' alt="<?php echo "Image Not Avialabel";?>">

                            <?php

                        }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>Select New Image:  </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category">

                        <?php 
                        $sql="SELECT * FROM tbl_category WHERE active='Yes'";
                            $res=mysqli_query($conn,$sql);
                            $count=mysqli_num_rows($res);
                            if($count>0)
                            {
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    $category_title=$row['title'];
                                    $category_id=$row['id'];
                                    // echo "<option value='$category_id'>$category_title</option>";
                                    ?>
                                    <option <?php if($current_category==$category_id){echo "selected";}?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>

                                    <?php
                                }

                            }
                            else
                            {
                                echo "<option value='0'>Category Not Available</option>";

                            }



                        ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input <?php if($featured=='Yes'){echo "checked";}?> type="radio" name="featured" value="Yes">Yes
                        <input <?php if($featured=='No'){echo "checked";}?> type="radio" name="featured" value="No">No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input <?php if($active=='Yes'){echo "checked";}?> type="radio" name="active" value="Yes">Yes
                        <input <?php if($active=='No'){echo "checked";}?> type="radio" name="active" value="No">No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
                        <input type="submit" name="submit" class="btn-secondary" value="Update Food">
                    </td>
                </tr>
            </table>
        </form>


        
    </div>
</div>
<?php include('../partials-front/footer.php') ?>