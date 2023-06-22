<?php include("nav-bar.php"); ?>
<link rel="stylesheet" href="../styles/booking-style.css">
<main>
    <?php
    $today = date('Y-m-d');
    $sql = "SELECT * FROM tbl_reservations WHERE `date`>='$today' ORDER BY `date` ASC";

    $res = mysqli_query($conn, $sql);
    if ($res) {
        $count = mysqli_num_rows($res);
        if ($count > 0) {
    ?><br><br>
            <h3 class='sectionsubtitle'>Bookings for the upcoming 10 days</h3>
            <div class='bookingcard'>
                <table style='margin:20px auto; text-align:center;'>
                    <tr>
                        <th>Date</th>
                        <th>Customer ID</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Table ID</th>
                        <th>Booking ID</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_assoc($res)) {

                    ?>
                        <tr>
                            <td><?php echo $row['date'] ?></td>
                            <td><?php echo $row['customer_id'] ?></td>
                            <td><?php echo $row['start_time'] ?></td>
                            <td><?php echo $row['end_time'] ?></td>
                            <td><?php echo $row['table_id'] ?></td>
                            <td><?php echo $row['booking_id'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        <?php
        } else {
        ?>
            <br><br>
            <div class='bookingcard'>
                <h3 class="sectionsubtitle">No reservations for the coming 10 days.</h3>
            </div>
            <br><br>


            <?php
            $sql2 = "SELECT * FROM tbl_reservations";
            $res2 = mysqli_query($conn, $sql2);
            if ($res2) {
                $count2 = mysqli_num_rows($res2);
                if ($count2 > 0) {
            ?>

                    <div class='bookingcard'>
                        <h3 class="sectionsubtitle">Older reservations below</h3>
                        <table style='margin:20px auto; text-align:center;'>
                            <tr>
                                <th>Date</th>
                                <th>Customer ID</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Table ID</th>
                                <th>Booking ID</th>
                            </tr>
                            <?php
                            while ($row2 = mysqli_fetch_assoc($res2)) {

                            ?>
                                <tr>
                                    <td><?php echo $row2['date'] ?></td>
                                    <td><?php echo $row2['customer_id'] ?></td>
                                    <td><?php echo $row2['start_time'] ?></td>
                                    <td><?php echo $row2['end_time'] ?></td>
                                    <td><?php echo $row2['table_id'] ?></td>
                                    <td><?php echo $row2['booking_id'] ?></td>
                                </tr>
                            <?php
                            }

                            ?>
                        </table>

                    </div>


    <?php
                }
            }
        }
    }


    ?>


</main>

<?php include('../partials-front/footer.php') ?>