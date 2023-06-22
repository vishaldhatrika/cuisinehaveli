
      <?php include('user/nav-bar.php');
    //  include('config/constants.php');

    if(!(isset($_POST['reqend_time']))){
      header('location:'.SITEURL.'reserve.php');
    }

      $user=$_SESSION['user_id'];
      $reqdate=$_POST['reqdate'];
      $reqstart_time=$_POST['reqstart_time'];
      $reqend_time=$_POST['reqend_time'];

      ?>
      <link rel="stylesheet" href="styles/booking-style.css">
      <div class="msgcard">
      <p class="bookmsg">Booking on <?php echo $reqdate;?> at <?php echo $reqstart_time;?> to <?php echo $reqend_time;?> for tables :</p> 

    <?php
      $c=1;
      while($c<11)
      {
          if(isset($_POST[$c]))
          {
        //    echo "entered";
            // echo "Table : ".$c."<br>";
             

            $sql3="INSERT INTO `tbl_reservations`(`table_id`, `customer_id`, `date`, `start_time`, `end_time`) 
            VALUES 
            ($c,$user,'$reqdate','$reqstart_time','$reqend_time')";


            //  $sql3="INSERT INTO tbl_reservations 
            //  SET table_id=$c,
            //  customer_id=$user,
            //  date=$reqdate,
            //  start_time=$reqstart_time,
            //  end_time=$reqend_time";

             $response=mysqli_query($conn,$sql3);// or die(mysqli_error($conn));
             
            //  echo $response;

             if($response){
             ?>
             <div class="booksuccessmsg">Table : 
             <?php echo $c;?> Booked Successfully<br></div>
             <?php
             }
             else{
               ?>
               <div class="bookfailuremsg">Error ! Try again.<br></div>
               <?php
             }

          }
          $c++;
      }
      ?>
      </div>
      <?php
      include('partials-front/footer.php');
      ?>