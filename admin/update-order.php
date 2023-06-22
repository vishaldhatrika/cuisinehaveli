<?php include('nav-bar.php');?>
<link rel="stylesheet" href="../styles/inputboxes.css">
<div class='main'>
    <div class='wrapper'>
        <h1>Update Order</h1>
        <br>
        <br>
        

        <?php   

            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
                $food=$_GET['food_name'];
                $sql="SELECT * FROM tbl_order WHERE order_id=$id AND food_name='$food'";
                $res=mysqli_query($conn,$sql);
                $count=mysqli_num_rows($res);
                if($count==1)
                {
                    $row=mysqli_fetch_assoc($res);
                    $price=$row['price'];
                    $qty=$row['qty'];
                    $status=$row['status'];
                    $customer_id=$row['customer_id'];

                    $sql5="SELECT * FROM tbl_customer WHERE id=$customer_id";
                    $res5=mysqli_query($conn,$sql5);
                    $count5=mysqli_num_rows($res5);
                    if($count5==1)
                    {
                        // echo "Here";
                        $row5=mysqli_fetch_assoc($res5);
                        $customer_name=$row5['first_name'].' '.$row5['last_name'];
                        $customer_email=$row5['email'];
                        $customer_address=$row5['primary_address'];
                        $customer_contact=$row5['contact'];
                        // $customer_contact=$row2['customer_contact'];
                    }

                }
                else
                {
                    header('location:'.SITEURL.'admin/manage-order.php');

                }

            }
            else
            {
                header('location:'.SITEURL.'admin/manage-order.php');
            }
            

 
            if(isset($_POST['submit']))
            {
                // echo "clicked";
                $id=$_POST['id'];
                $price=$_POST['price'];
                $qty=$_POST['qty']; 
                $total=$price*$qty;
                $status=$_POST['status'];
                // $customer_name=$_POST['customer_name'];
                // $customer_email=$_POST['customer_email'];
                // $customer_contact=$_POST['customer_contact'];
                // $customer_address=$_POST['customer_address'];

                $sql2="UPDATE tbl_order SET 
                qty=$qty,
                total=$total,
                status='$status' 
                WHERE order_id=$id AND food_name='$food'
                ";
                
            

            $res=mysqli_query($conn,$sql2) or die(mysqli_error($conn));

            if($res)
            {
                $_SESSION['update']="<div class='success'>Order Updated Sucessfully.</div>";
                header('location:'.SITEURL.'admin/manage-order.php');

            }
            else
            {
                $_SESSION['update']="<div class='error'>Failed to Update Order.</div>";
                header('location:'.SITEURL.'admin/manage-order.php');
                
            }
        }
            

        ?>

        <form action="" method="POST">
            <table class='tbl-30'>
                <tr>
                    <td>Order ID</td>
                    <td><b><?php echo $id; ?></b></td>
                </tr>

                <tr>
                    <td>Food Name</td>
                    <td><b><?php echo $food; ?></b></td>
                </tr>

                <tr>
                    <td>Price</td>
                    <td><b><?php echo $price; ?></b></td>
                </tr>

                <tr>
                    <td>Qty:</td>
                    <td>
                        <input type='number' name='qty' value='<?php echo $qty; ?>'>
                    </td>
                </tr>

                <tr>
                    <td>Status</td>
                    <td>
                        <select name='status'>
                            <option <?php if($status=='Ordered'){ echo 'selected';}?> value='Ordered'>Ordered</option>
                            <option <?php if($status=='On Delivery'){ echo 'selected';}?> value='On Delivery'>On Delivery</option>
                            <option <?php if($status=='Delivered'){ echo 'selected';}?> value='Delivered'>Delivered</option>
                            <option <?php if($status=='Cancelled'){ echo 'selected';}?> value='Cancelled'>Cancelled</option>
                        </select>
                    </td>

                </tr>

                <tr>
                    <td>Customer Name</td>
                    <td>
                        <input disabled type="text" name="customer_name" value="<?php echo $customer_name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Customer Contact</td>
                    <td>
                        <input disabled type="text" name="customer_contact" value="<?php echo $customer_contact; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Customer Email</td>
                    <td>
                        <input disabled type="text" name="customer_email" value="<?php echo $customer_email; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Customer Address</td>
                    <td>
                        <textarea disabled name="customer_address" rows="5" cols="30" ><?php echo $customer_address; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type='hidden' name='id' value='<?php echo $id;?>'>
                        <input type='hidden' name='price' value='<?php echo $price;?>'>
                         <input type="submit" class='btn-secondary' name="submit" value="Update Order">
                    </td>
                </tr>
            </table>
        </form>

        

    </div>
</div>


<?php include('../partials-front/footer.php') ?>


