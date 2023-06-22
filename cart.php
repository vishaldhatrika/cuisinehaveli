
<?php
include('user/nav-bar.php');
$user_id=$_SESSION['user_id'];
$order_id=rand(00000,99999);
$order_id=$user_id.str_pad($order_id,5,0,STR_PAD_LEFT);

$sql4="SELECT * FROM tbl_customer WHERE id=$user_id";
$res4=mysqli_query($conn,$sql4);
$count4=mysqli_num_rows($res4);
if($count4==1)
{
    $row4=mysqli_fetch_assoc($res4);
    $a1=$row4['primary_address'];
    
}

foreach ($_POST as $key => $value) {

    $food_id=$key;
    $qty=$value;
    $sql= "SELECT title,price FROM tbl_food WHERE id=$food_id";
    $res=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($res);
    if($count==1 AND $qty>0)
    {
        $f=0;
        $row=mysqli_fetch_assoc($res);
        $food_name=$row['title'];
        $price=$row['price'];
        $total=$price*$qty;
        $order_date=date("Y-m-d H:i:s");

        $sql2="INSERT INTO tbl_order 
        SET 
        order_id='$order_id',
        customer_id=$user_id,
        food_id=$food_id,
        food_name='$food_name',
        price=$price,
        qty=$qty,
        total=$total,
        order_date='$order_date',
        address='$a1'
        ";
        $res2=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
        if($res2)
        {
            $f=1;

        }
        else
        {
            $f=0;
            

        }

    }
    

    

}
    if($f==1)
    {
        ?>
            <div class='OrderSuccess'>
            
            <h2>Your Order placed Successfully. Your Order ID is <?php echo $order_id;?></h2>
            </div>

        <?php
    }
    else
    {
        ?>
            <div class='OrderFailed'>
                <h2>Your Order Failed. Please Try Again. </h2>
            </div>

        <?php
        
    }


?>

