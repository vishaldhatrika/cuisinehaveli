<?php include('user/nav-bar.php');?>
<link rel="stylesheet" href="styles/booking-style.css">
        <script type="text/javascript">
            function showSlots(){
                document.getElementsByClassName('hide').style.display='block';
                document.getElementById('slotsheading').style.display='block';
                document.getElementById('slotstable').style.display='block';
                document.getElementById('slotsSubmitBtn').style.display='block';

            }
        </script>
    <main>

    <form action="" method="GET">
    <div class="bookingcard">   
    <div class="msg">
        <p>You cannot make bookings later than 10 days from today.
        Also, please select a time slot after selecting the required date to see which tables are available.</p>
    </div>
        <input type="date" name="day" id="day" 
        min="<?= date('Y-m-d'); ?>"  
        value="<?= date('Y-m-d'); ?>"  
        max="<?= date('Y-m-d',strtotime("+10 day")); ?>"><br>
        <label for="slot1">
            <input type="radio" id="slot1" value="1" name="slot">
        10:00 am - 12:00pm</label>
        <label for="slot2">
            <input type="radio" id="slot2" value="2" name="slot">
        12:00 pm - 02:00pm</label>
        <label for="slot3">
            <input type="radio" id="slot3" value="3" name="slot">
            02:00 pm - 04:00pm</label>
        <label for="slot4">
            <input type="radio" id="slot4" value="4" name="slot">
            04:00 pm - 06:00pm</label>
        <label for="slot5">
            <input type="radio" id="slot5" value="5" name="slot">
            06:00 pm - 08:00pm</label>
        <label for="slot6">
            <input type="radio" id="slot6" value="slot6" name="slot">
            08:00 pm - 10:00pm</label>

    
    <input type="submit" value="Check!" class="checkSlotsBtn">
    </div>
</form>
<?php

    $reqdate=date('Y-m-d');
    if(isset($_GET['day'])){
        $reqdate=date('Y-m-d',strtotime($_GET['day']));
    }


    $reqstart_time="00:00:00";
    $reqend_time="00:00:00";
    $readable_time="(Please Select)";
if(isset($_GET['slot'])){

    if($_GET['slot']=="1"){
        $reqstart_time="10:00:00";
        $reqend_time="12:00:00";
        $readable_time="10:00 am - 12:00pm";
    }
    if($_GET['slot']=="2"){
        $reqstart_time="12:00:00";
        $reqend_time="14:00:00";
        $readable_time="12:00 pm - 02:00pm";
    }
    if($_GET['slot']=="3"){
        $reqstart_time="14:00:00";
        $reqend_time="16:00:00";
        $readable_time="02:00 pm - 04:00pm";
    }
    
    if($_GET['slot']=="4"){
        $reqstart_time="16:00:00";
        $reqend_time="18:00:00";
        $readable_time="04:00 pm - 06:00pm";
    }
    
    if($_GET['slot']=="5"){
        $reqstart_time="18:00:00";
        $reqend_time="20:00:00";
        $readable_time="06:00 pm - 08:00pm";
    }
    
    if($_GET['slot']=="6"){
        $reqstart_time="20:00:00";
        $reqend_time="22:00:00";
        $readable_time="08:00 pm - 10:00pm";
    }
}
    
    // $sql="SELECT * FROM reserved WHERE (date='$reqdate' AND 
    // start_time='$reqstart_time'  AND end_time='$reqend_time')";
    // $res=mysqli_query($conn,$sql);
    
    $sql2="SELECT * from tbl_tabledata WHERE table_id
    NOT IN (SELECT table_id FROM tbl_reservations WHERE (date='$reqdate' AND 
    start_time='$reqstart_time'  AND end_time='$reqend_time'))";
    

    $res2=mysqli_query($conn,$sql2);
    if(isset($_GET['slot'])){
    echo "You selected date : ".$reqdate;
    echo"<br>You selected time slot : ".$readable_time."<br>";
    }

    
    if(mysqli_num_rows($res2)==0){
        ?>
                <div class='tblsnotfree'>No tables available for the selected time and date!! 
                Please choose some other date/time</div>
          <?php
    }

    else{
        ?>

    <h3 id='slotsheading'>Available tables for the slot are : </h3>
    <form action='booking_status.php' method='POST'>
    
    <div class="bookingcard">
            <?php 
            while($row = mysqli_fetch_assoc($res2)){

            ?>
     
            <div class="tbl">
                <div class="tblid"># <?php $tableid=(int)$row['table_id']; echo $row['table_id'];?></div>
                <div class="tblimg">
                    <img src="<?php 
                if($tableid>=1 and $tableid<=5){
                    echo 'media/4tbl.png';
                }
                else if($tableid==6 or $tableid==7){
                    echo 'media/6tbl.png';
                }
                else if($tableid==8 or $tableid==9){
                    echo 'media/8tbl.png';
                }
                else{
                    echo 'media/10tbl.png';
                }
                ?>" alt="" height="80px"></div>
                
                <div class="tblsel"><input type='checkbox' id='<?php echo $row['table_id'];?>' name='<?php echo $row['table_id'];?>'>
                <label for='<?php echo $row['table_id']?>'>Select</label>
                </div>
            

            </div>
            <?php
            }
            ?>
    </div>
    <input type='text' class="hide" name='reqstart_time' value='<?php echo $reqstart_time?>'>
         <input  type='text' class="hide" name='reqend_time' value='<?php echo $reqend_time?>'>
         <input  type='text'  class="hide" name='reqdate' value='<?php echo $reqdate;?>'>
     <input type='submit' id='slotsSubmitBtn' class='slotsSubmitBtn' value='Book Selected Tables'> 
</form>
    <?php 
}
?>

    </main>

    <?php include('partials-front/footer.php');?>