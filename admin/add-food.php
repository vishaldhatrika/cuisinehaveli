<?php include('nav-bar.php');?>
<link rel="stylesheet" href="../styles/inputboxes.css">
<div class="main">

    <div class="wrapper">
        <h1> Add Food</h1>
        <br><br>

        <?php
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }

            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_POST['submit']))
            {
                // echo "Clicked";
                $title=$_POST['title'];
                $title=mysqli_real_escape_string($conn,$title);
                $description=$_POST['description'];
                $description=mysqli_real_escape_string($conn,$description);
       
                $price=$_POST['price'];
                $category=$_POST['category'];
                if(isset($_POST['featured']))
                {
                    $featured=$_POST['featured'];
                }
                else
                {
                    $featured='No';
                }

                if(isset($_POST['active']))
                {
                    $active=$_POST['active'];
                }
                else
                {
                    $active='No';
                }


                if(isset($_FILES['image']['name']))
                {
                    $image_name=$_FILES['image']['name'];
                    $st=explode('.',$image_name);
                    $image_name=$st[0].rand(000,999).'.'.$st[1];
                    if($image_name!="")
                    {
                        
                        // $ext=end(explode('.',$image_name));
                        // $image_name="Food-Name".rand(0000,9999).".".$ext;

                        $src=$_FILES['image']['tmp_name'];
                        $dest="../media/food/".$image_name;
                        $upload=move_uploaded_file($src,$dest);

                        if($upload==false)
                        {
                            $_SESSION['upload']="<div class='error'>Failed To upload Image.</div>";
                            header('location:'.SITEURL.'admin/add-food.php');
                            die();
                        }

                    }

                }
                else
                {
                    $image_name="";
                }


                // $sql3="INSERT INTO tbl_food VALUES(123,'Paneer','fresh paneer',111,'basil_soup.jpg',658,'no','no') ";
                $sql3="INSERT INTO tbl_food VALUES(NULL,'$title','$description',$price,'$image_name',$category,'$featured','$active') ";
                // $sql3="INSERT INTO tbl_food SET title='$title',description='$description', price=$price, image_name='$image_name', category_id=$category, featured='$featured' active='$active'";
                // echo $sql3;

                $res3=mysqli_query($conn,$sql3) or die(mysqli_error($conn));
                if($res3)
                {
                    $_SESSION['add']="<div class='success'>Food Added Succesfully.</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');


                    
                }
                else
                {
                    $_SESSION['add']="<div class='error'>Failed to Add Food.</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                    

                }






            }
?>

        <form action="" method="POST" enctype="multipart/form-data">
        <table class="tbl-30">

            <tr>
                <td>Title:</td>
                <td>
                    <input type="text" name="title" placeholder="Title of the food">
                </td>
            </tr>

            <tr>
                <td>Description:</td>
                <td>
                    <textarea name="description" cols="30" rows="5"  placeholder="Description of the food".></textarea>
                </td>
            </tr>

            <tr>
                <td>Price:</td>
                <td>
                    <input type="number" name="price">
                </td>
            </tr>

            <tr>
                <td>Select Image:</td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>

            <tr>
                <td>category:</td>
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
                                    $id=$row['id'];
                                    $title=$row['title'];
                                    ?>
                                    <option value="<?php echo $id; ?>"><?php echo $title;?></option>

                                    <?php

                                }


                            }
                            else
                            {
                                ?>
                                <option value="0">No active Categories</option>

                                <?php
                            }

                        ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Featured:</td>
                <td>
                    <input type="radio" name="featured" value='Yes'>Yes
                    <input type="radio" name="featured" value='No'>No
                </td>
            </tr>

            <tr>
                <td>Active: </td>
                <td>
                    <input type="radio" name="active" value='Yes'>Yes
                    <input type="radio" name="active" value='No'>No
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Food Item" class="btn-secondary">
                </td>
            </tr>

        </table>

        </form>

        
</div>

</div>

<?php include('../partials-front/footer.php') ?>