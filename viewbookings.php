<?php include('user/nav-bar.php');

if(!(isset($_SESSION['user_id']))){
    header('location:'.SITEURL.'login.php');
}
$user_id=$_SESSION['user_id'];

$sql="SELECT * from tbl_reservations WHERE customer_id=$user_id ORDER BY `date` DESC;";
$res=mysqli_query($conn,$sql);
$count=mysqli_num_rows($res);
?>


<main>
<link rel="stylesheet" href="styles/booking-style.css">
    <?php
if($count>0){
    ?>
    <div class="bookingcard">
        <h3 class="sectionsubtitle">Your Table reservation history</h3>
    <table class="bookingstable">
        <tr>
            <th>Booking ID</th>
            <th>Date</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Table</th>
        </tr>
    <?php
    while($row=mysqli_fetch_assoc($res)){
        
        ?>
        <tr>
            <td><?php echo $row['booking_id'] ;?></td>
            <td><?php echo $row['date'] ;?></td>
            <td><?php echo $row['start_time'] ;?></td>
            <td><?php echo $row['end_time'] ;?></td>
            <td><?php echo $row['table_id'] ;?></td>
        </tr>
        <?php
        
    }
    ?>
    </table>
    <?php 
}
else{
    ?>
    <div class="nobookingmsg"> Seems you haven't reserved a table at our restaurant.. 
        You should definitely save the hassle by planning with us ahead! 
    </div>
    </div>
    <?php
}
?>

</main>
    <?php include('partials-front/footer.php');?>