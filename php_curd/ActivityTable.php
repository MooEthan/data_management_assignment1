<?php
    include 'db_connect.php'; // Includes the connection and starts/resumes the session
    //session_start(); // Start the session at the beginning of your script
 
    //include the Sidebar Menu and Header
    include 'sideBarMenu.php';
?>


                <!-- Begin Page Content -->
                <div class="container-fluid">
                   

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Extra Activity Tables</h1>
                    <p class="mb-4">Query: Show All Extra Activity Table Records.
                        </p>

                    <!-- COPY FROM HERE -->
                    <!-- COPY To Duplicate ENTIRE TABLE  -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Extra Activity Table</h6>
                        </div>
                       <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                        <tr>
                                            <th>ActivityID</th>
                                            <th>ActivityName</th>
                                            <th>StudentClubID</th>
                                            <th>TeacherID</th>
                                            <th>Status</th>  
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php /// Read data
                                    $sql =  "SELECT ex.activityID, ex.activityName, s.studentClubName, t.teacherName, 
                                    CASE
                                    WHEN ex.status = 1 THEN 'Active'
                                    WHEN ex.status = 2 THEN 'Inactive'
                                    END AS status
                                    FROM extra_activity ex JOIN student_club s ON ex.studentClubID = s.studentClubID JOIN teacher t ON ex.teacherID = t.teacherID WHERE ex.is_deleted = 0"; //Query
                                    //Execute the Query
                                    $result = mysqli_query($conn, $sql);
                                    echo "<br> Total Rows: " . mysqli_num_rows($result);

                                    if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    while($row = mysqli_fetch_assoc($result)) {
                                       
                                        echo "<tr>";
                                                    echo    "<td>".$row['activityID']. "</td>";
                                                    echo "<td>".$row["activityName"]  ."</td>";
                                                    echo "<td>".$row["studentClubName"]  ."</td>";
                                                    echo    "<td>".$row['teacherName']. "</td>";
                                                    echo    "<td>".$row['status']. "</td>";
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