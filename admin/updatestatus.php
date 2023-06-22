<?php 
include('../config/constants.php');

foreach ($_POST as $key => $value) {
    echo $key." ".$value;

}

$order_id=$_GET['order_id'];
// echo $order_id;

if(isset($_POST['statusdropdown']))
{
    $status=$_POST['statusdropdown'];
    $sql="UPDATE tbl_order SET 
    `status`='$status' WHERE `order_id`='$order_id'";
    $res=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    // $count=mysqli_num_rows($res);
    // if($count>0){
    //     header('location:'.SITEURL.'admin/watch_orders.php');
    // }
    // else{
    //     header('location:'.SITEURL.'admin/watch_orders.php');
    // }

}



// $agent_id=$_POST['agent'];
// if(isset($_POST['statusdropdown']))
// {
//     $status=$_POST['statusdropdown'];
//     $sql4="SELECT * FROM tbl_order WHERE `order_id`='$order_id'";
//     $res4=mysqli_query($conn,$sql4);
//     $count4=mysqli_num_rows($res4);
//     if($count4==1)
//     {
//         $row4=mysqli_fetch_assoc($res4);
//         $agent_name=$row4['agent_name'];
    
//         if($status=='Delivered')
//         {
//         $res3=mysqli_query($conn,"UPDATE tbl_agents SET agent_status='Available' WHERE agent_name='$agent_name'");
    
//         }
//     }
    
//     $sql="UPDATE tbl_order SET 
//     `status`='$status' WHERE `order_id`='$order_id'";
//     $res=mysqli_query($conn,$sql);
//     $count=mysqli_num_rows($res);
//     if($count>0){
//         header('location:'.SITEURL.'admin/watch_orders.php');
//     }
//     else{
//         header('location:'.SITEURL.'admin/watch_orders.php');
//     }
    
// }

if(isset($_POST['agent_name']))
{
    $agent_name=$_POST['agent_name'];
    // $res3=mysqli_query($conn,"UPDATE tbl_agents SET agent_status='Not Available' WHERE agent_name='$agent_name'");

    $sql2="UPDATE tbl_order SET 
    agent_name='$agent_name' WHERE `order_id`='$order_id'";
    $res2=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
    // $count2=mysqli_num_rows($res2);
    // if($count2>0){
    //     header('location:'.SITEURL.'admin/watch_orders.php');
    // }
    // else{
    //     header('location:'.SITEURL.'admin/watch_orders.php');
    // }

}



    header('location:'.SITEURL.'admin/watch_orders.php');


?>