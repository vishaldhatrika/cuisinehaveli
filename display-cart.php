
<script src="JS/plusminus-total.js"></script>

<?php
include('user/nav-bar.php');
$user_id=$_SESSION['user_id'];
?>
<div class='main'>
<div class='wrapper'>
<form action='cart.php' method='POST'>



<?php
// $order_id=rand(00000,99999);
// $order_id=$user_id.str_pad($order_id,5,0,STR_PAD_LEFT);

$sql4="SELECT * FROM tbl_customer WHERE id=$user_id";
$res4=mysqli_query($conn,$sql4);
$count4=mysqli_num_rows($res4);
if($count4==1)
{
    $row4=mysqli_fetch_assoc($res4);
    $a1=$row4['primary_address'];
    
}
$gtotal=0;

$numofdistinctitems=0;

foreach ($_POST as $key => $value) {
    
    $food_id=$key;
    $qty=$value;

    

    $sql= "SELECT * FROM tbl_food WHERE id=$food_id";
    $res=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($res);
    if($count==1 AND $qty>0)
    {
        
        $f=0;
        $numofdistinctitems=$numofdistinctitems+1;
        $row=mysqli_fetch_assoc($res);
        $food_name=$row['title'];
        $price=$row['price'];
        $des=$row['description'];
        $image_name=$row['image_name'];
        $total=$price*$qty;
        $gtotal=$gtotal+$total;
        $order_date=date("Y-m-d H:i:s");

        ?>
        
        <div class="S">
                                <div class="Itemimg">
                                    <img src="<?php echo SITEURL.'media/food/'.$image_name;?>">
                                </div>
                                <div class="desc">
                                    <div class="itemname">
                                        <h3><?php echo $food_name?></h3>
                                    </div>
                                    <div class="itemprice">
                                    <h4>Rs: <?php echo $price;?> /-</h4>
                                    </div>
                                    <div class="itemdesc">
                                        <?php echo $des;?>
                                    </div>
                                    <div class='qty'>
                                    <div class='minus' onclick="minus(<?php echo $food_id;?>,<?php echo $price;?>)">-</div>
                                    <input class='qtyinp' id='<?php echo $food_id;?>' type='number' name='<?php echo $food_id;?>' value='<?php echo $qty;?>' min='0' max='20'>
                                    <div class='plus' onclick="plus(<?php echo $food_id;?><?php echo ','.$price;?>)">+</div>
                                    </div>
                                    <!-- <div class="qty"> Qty: <input type="number" min=0 max=10> </div> -->
                                    <!-- <div class="Order-btn">
                                        <a href="order-page.php?food_id=">
                                            Order Now
                                        </a>
                                    </div> -->
                                    
                                </div>
                            </div>







        

<?php
    }
    

}
if($numofdistinctitems==0){
    header('location:'.SITEURL.'order-food-after-login.php');
}

?>
<div class="clearfix"></div>
<style>

    .Gtotal{
        line-height: 3;
        text-align: right;
        position: relative;
        right:10%;
    }
    #gtotal{
        display:inline;
    }
    
    </style>
<div class='Gtotal'>
    Grand Total : ₹ 
    <p id='gtotal'><?php echo $gtotal;?></p>
    
    </div>
<input type='submit' class='btn-secondary' value='Confirm And Place your Order'>
</form>
    </div>
    </div>
<?php include('partials-front/footer.php');?>
