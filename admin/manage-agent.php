<?php include("nav-bar.php"); ?>



<!-- main section starts Here  -->

<main class="main">



	<div class="wrapper" >

        <h1>Manage Agent</h1>
        <br>
        <br>

        <?php   
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

        ?>
        <br>
        <br>
        <br>

        <!-- Button to add Admin  -->
        <a href="add-agent.php" class="btn-primary"> Add Agent</a>

        <br>
        <br>
        <table class="tbl-full">
        <tr>

            <th>S.N</th>
            <th>Full Name</th>
            <th>Contact</th>
            <th>Actions</th>

        </tr>



        <?php  
            $sql = "SELECT * FROM tbl_agents";
            
            $res= mysqli_query($conn,$sql);
            $sn=1;
            if($res)
            {
                //Count rows
                $count= mysqli_num_rows($res);

                if($count>0)
                {
                    
                    //we have data in database
                    while($rows = mysqli_fetch_assoc($res))
                    {
                        $id =$rows['agent_id'];
                        $agent_name=$rows['agent_name'];
                        $agent_contact=$rows['agent_contact'];

                        ?>

                        <tr>
                            <td><?php echo $sn++;?> </td>
                            <td><?php echo $agent_name;?></td>
                            <td><?php echo $agent_contact;?></td>
                            <td>
                            <a href="delete-agent.php?id=<?php echo $id; ?>" class="btn-danger">Delete Agent</a>
                            </td>

                        </tr>

                            


                    <?php

                    }
                }
                else
                {
                    //we dont have data in database

                }
            }
        ?>
       

        </table>

    </div>


</main>


<?php include('../partials-front/footer.php') ?>