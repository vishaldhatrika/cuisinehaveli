<?php include('user/nav-bar.php');

// if((isset($_SESSION['user_id']))){
//     header('location:'.SITEURL.'login.php');
// }
$user_id=$_SESSION['user_id'];

$sql="SELECT `order_id`,`order_date`,`status`,`customer_id`,`agent_name`,`address` from tbl_order WHERE customer_id=$user_id  GROUP BY `order_id` ORDER BY `order_date` DESC";
$res=mysqli_query($conn,$sql) or die(mysqli_error($conn));
$count=0;
if($res){
$count=mysqli_num_rows($res);
}

?>


<main>
    <br><br><br>
<link rel="stylesheet" href="styles/booking-style.css">
<link rel="stylesheet" href="watchord.css">
    <?php
if($count>0){
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
                        <div class="rightcard">Give Review
                        </div>
                        <div class='status'>
                            <?php echo $status;?>
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
                    echo "<div class='bookingcard'><div class='sectionsubtitle'>You haven't placed any order with us! You definitely should try our food!</div></div>";
                }
            ?>
            </main>
<?php include("partials-front/footer.php");?>

