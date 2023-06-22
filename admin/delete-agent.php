<?php

include('../config/constants.php');
$agent_id=$_GET['id'];
$res=mysqli_query($conn,"DELETE FROM tbl_agents WHERE agent_id=$agent_id");
if($res)
{
    $_SESSION['delete']="<div class='success'>Agent Deleted Sucessfully.</div>";
    header('location:'.SITEURL.'admin/manage-agent.php');

}
else
{
    $_SESSION['delete']="<div class='error'>Unable to Delete Agent.</div>";
    header('location:'.SITEURL.'admin/manage-agent.php');

}


?>