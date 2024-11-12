<?php
    include 'db_connect.php'; // Includes the connection and starts/resumes the session
    //session_start(); // Start the session at the beginning of your script
 
    //include the Sidebar Menu and Header
    include 'sideBarMenu.php';
?>


                <!-- Begin Page Content -->
                <div class="container-fluid">
                   

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Class Time Notification Tables</h1>
                    <p class="mb-4">Query: Show All Class Time Notification Table Records.
                        </p>

                    <!-- COPY FROM HERE -->
                    <!-- COPY To Duplicate ENTIRE TABLE  -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Class Time Notification Table</h6>
                        </div>
                       <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                        <tr>
                                            <th>NotificationID</th>
                                            <th>CourseID</th>
                                            <th>NotificationName</th>
                                            <th>NotificationDetails</th>
                                            <th>TimeOfNextClass</th>
                                            <th>DateOfNextClass</th>   
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php /// Read data
                                    $sql = "SELECT n.notificationID, c.courseName, n.notificationName, n.notificationDetail, n.timeOfNextClass, n.dateOfNextClass FROM class_time_notification n JOIN courses c ON n.courseID = c.courseID WHERE n.is_deleted = 0"; //Query
                                    //Execute the Query
                                    $result = mysqli_query($conn, $sql);
                                    echo "<br> Total Rows: " . mysqli_num_rows($result);

                                    if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    while($row = mysqli_fetch_assoc($result)) {
                                       
                                        echo "<tr>";
                                                    echo "<td>".$row["notificationID"]  ."</td>";
                                                    echo    "<td>".$row['courseName']. "</td>";
                                                    echo "<td>".$row["notificationName"]  ."</td>";
                                                    echo    "<td>".$row['notificationDetail']. "</td>";
                                                    echo    "<td>".$row['timeOfNextClass']. "</td>";
                                                    echo    "<td>".$row['dateOfNextClass']. "</td>";
                                                    echo "</tr>";
                                       
                                    }
                                    } else {
                                    echo "0 results";
                                    }
                                 ?>
                                    
                                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- END COPY OF TABLE -->

            
                </div> 
                <!-- /.container-fluid -->

           

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    
<?php

//include the FOOTER Content and END of FILE DATA
include 'footer.php';

?>