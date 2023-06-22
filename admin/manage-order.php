<?php include("nav-bar.php"); ?>



<!-- main section starts Here  -->

<main class="main">



	<div class="wrapper" >

        <h1>Manage Orders</h1>
        <br><br>

        <?php 
            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);

            }
        ?>

        <table class='tbl-full'>
            <tr>
                <th>S.N. </th>
                <th>Order ID</th>
                <th>Food</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Total</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Customer Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
            <?php 
                $sql="SELECT * FROM tbl_order ORDER BY sn DESC";
                $res=mysqli_query($conn,$sql);
                $count=mysqli_num_rows($res);
                $sn=1;
                if($count>0)
                {
                    

                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id=$row['order_id'];
                        $food=$row['food_name'];
                        $price=$row['price'];
                        $qty=$row['qty'];
                        $total=$row['total'];
                        $order_date=$row['order_date'];
                        $status=$row['status'];
                        $customer_id=$row['customer_id'];
                        $sql2="SELECT * FROM tbl_customer WHERE id=$customer_id";
                        $res2=mysqli_query($conn,$sql2);
                        $count2=mysqli_num_rows($res2);
                        if($count2==1)
                        {
                            // echo "Here";
                            $row2=mysqli_fetch_assoc($res2);
                            $customer_name=$row2['first_name'].' '.$row2['last_name'];
                            $customer_email=$row2['email'];
                            $customer_address=$row2['primary_address'];
                            $customer_contact=$row2['contact'];
                            // $customer_contact=$row2['customer_contact'];
                        }
                        
                        ?>
                            <tr>
                            <td><?php echo $sn++;?> </td>
                            <td><?php echo $id;?></td>
                            <td><?php echo $food;?></td>
                            <td><?php echo $price;?></td>
                            <td><?php echo $qty;?></td>
                            <td><?php echo $total;?></td>
                            <td><?php echo $order_date;?></td>

                            <td>
                                <?php
                                if($status=='Order Placed')
                                {
                                    echo "<label>$status</label>";
                                }
                                if($status=='Ordered')
                                {
                                    echo "<label>$status</label>";
                                }
                                elseif($status=="On Delivery")
                                {
                                    echo "<label style='color: orange'>$status</label>";
                                }
                                elseif($status=='Delivered')
                                {
                                    echo "<label style='color: green'>$status</label>";
                                }
                                elseif($status=='Cancelled')
                                {
                                    echo "<label style='color: red'>$status</label>";
                                }
                                ?>
                            </td>

                            <td><?php echo $customer_name;?></td>
                            <td><?php echo $customer_contact;?></td>
                            <td><?php echo $customer_email;?></td>
                            <td><?php echo $customer_address;?></td>
                            <td>
                                <a href='<?php echo SITEURL;?>admin/update-order.php?id=<?php echo $id?>&food_name=<?php echo $food;?>' class='btn-secondary'>Update Order</a>
                            </td>
                            </tr>


                        <?php

                    }

                }
                else
                {
                    echo "<tr><td colspan='12' class='error'>Orders Not Available.</td></tr>";
                }


            ?>
            
        </table>

    
        
        
    </div>


</main>

<?php include('../partials-front/footer.php') ?>