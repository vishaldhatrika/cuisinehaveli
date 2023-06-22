<?php include("nav-bar.php"); ?>
<!-- main section starts Here  -->
<link rel="stylesheet" href="watchord.css">
<!-- fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

<main class="main">
	<div class="wrapper">
        <h1>Manage Orders</h1>
        <br><br>
        <?php 
            if(isset($_SESSION['updatedmsg']))
            {
                echo $_SESSION['updatedmsg'];
                unset($_SESSION['updatedmsg']);
            }
        ?>
            <?php 
                $sql="SELECT `order_id`,`customer_id`,`order_date`,`status`,`agent_name`,`address` 
                FROM tbl_order GROUP BY order_id ORDER BY order_date DESC";
                $res=mysqli_query($conn,$sql);
                $count=mysqli_num_rows($res);
                $sn=1;
                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        ?>
                        <section class='card'>
                                            <?php
                                            $id=$row['order_id'];
                                            $order_date=$row['order_date'];
                                            $status=$row['status'];
                                            $customer_id=$row['customer_id'];
                                            $agent_name=$row['agent_name'];
                                            $address=$row['address'];
                                            ?>
                        <div class="leftcard">
                            <div class="orderid"><b><?php echo '# '.$id;?></b></div>
                            <div class="orderdate"><?php echo $order_date;?></div>
                            <div class="customer_id"><?php echo 'Customer ID: '.$customer_id;?></div>
                            
                            
                                <?php
                                    $sql2="SELECT * FROM tbl_customer WHERE id=$customer_id";
                                    $res2=mysqli_query($conn,$sql2);
                                    $count2=mysqli_num_rows($res2);
                                    if($count2==1)
                                    {
                                    // echo "Here";
                                        $row2=mysqli_fetch_assoc($res2);
                                        $customer_name=$row2['first_name'].' '.$row2['last_name'];
                                        $customer_email=$row2['email'];
                                        $customer_contact=$row2['contact'];   
                                    }
                                ?>
                            <div class="customername"><b><?php echo $customer_name;?></b></div> 
                            <div class="address"><?php echo $address;?></div>
                            <div class="customeremail"><?php echo $customer_email;?></div> 
                            <div class="customercontact"><b><?php echo $customer_contact;?></b></div> 
                         </div>
                            <?php
                            $sql3="SELECT food_name,price,qty,total from tbl_order where order_id=$id";
                            $res3=mysqli_query($conn,$sql3);
                            $count3=mysqli_num_rows($res3);
                        if($count3>0)
                        {
                            ?>
                          <div class="midcard">  
                            <table>
                            <tr>
                                <th class="thcss">Name</th>
                                <th class="thcss">Price</th>
                                <th class="thcss">Quantity</th>
                                <th class="thcss">Total</th>
                            </tr>
                            <?php
                            $gtotal=0;
                            while($row=mysqli_fetch_assoc($res3))
                            {
                                $gtotal=$gtotal+$row['total'];
                             ?>
                             <tr>
                                 <td class='tdcss'><?php echo $row['food_name'];?></td>
                                 <td class='tdcss'><?php echo $row['price'];?></td>
                                 <td class='tdcss'><?php echo $row['qty'];?></td>
                                 <td class='tdcss'><?php echo $row['total'];?></td>
                             </tr>
                             <?php   
                            }
                            ?>
                            <tr>
                                <td class='tdcss' colspan='3'>Grand Total : </td>
                                <td class='tdcss'><?php echo $gtotal;?></td>
                            </tr>
                            </table>
                        </div>
                            <div class="rightcard">
                            <div class="status">
                            <form action="updatestatus.php?order_id=<?php echo $id;?>" method="POST">
                            Status :
                                <select class='<?php if($status=='Out For Delivery'){echo 'outfordelivery';} else { echo $status;} ?>' name='statusdropdown' onchange='this.form.submit()'>
                                <option value="" disabled selected><?php echo $status;?></option>
                                    <option value='Placed' >
                                        Placed
                                    </option>
                                    <option value='Accepted' >
                                        Accepted
                                    </option>
                                    <option value='Out For Delivery' >
                                        Out for Delivery
                                    </option>
                                    <option value='Delivered' >
                                        Delivered
                                    </option>
                                    <option value='Cancelled' >
                                        Cancelled
                                    </option>
                                </select>
                                <div class="agent_id">
                                    Agent Name: 
                                    <!-- <input type="text" name='agent' value=''> -->
                                    <select name='agent_name'>
                                        <option value='' selected disabled><?php echo $agent_name?></option>
                                    <?php
                                        $sql6="SELECT * FROM tbl_agents";
                                        $res6=mysqli_query($conn,$sql6) or die(mysqli_error($conn));
                                        $count6=mysqli_num_rows($res6);
                                        if($count6>0)
                                        {
                                            while($row6=mysqli_fetch_assoc($res6))
                                            {
                                                ?>
                                                <!-- <option value='' selected></option> -->

                                                    <option value="<?php echo $row6['agent_name'];?>"><?php echo $row6['agent_name'];?></option>
                                                <?php

                                            }
                                        }
                                        else
                                        {
                                            ?>
                                            <option value="No Agent is Available">No Agent is Available</option>
                                            <?php
                                        }


                                    ?>

                                        
                                    
                                    </select>
                                    <button onclick="this.form.submit()">Assign Agent</button>
                                </div>
                            </form>
                            
                        </div>
                       </div>
                       <div class="clearfix"></div>
                            <?php
                        }
                        ?>
                        </section>
                        <?php
                    }
                }
                else
                {
                    echo "<div class='noorders'>Orders Not Available.</div>";
                }
            ?>
    </div>
</main>
<?php include('../partials-front/footer.php') ?>