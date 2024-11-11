<?php
    include 'db_connect.php'; // Includes the connection and starts/resumes the session
    //session_start(); // Start the session at the beginning of your script
 
    //include the Sidebar Menu and Header
    include 'sideBarMenu.php';
?>


                <!-- Begin Page Content -->
                <div class="container-fluid">
                   

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Assignment Tables</h1>
                    <p class="mb-4">Query: Show All Assignment Table Records.
                        </p>

                    <!-- COPY FROM HERE -->
                    <!-- COPY To Duplicate ENTIRE TABLE  -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Assignment Table</h6>
                        </div>
                       <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                        <tr>
                                            <th>AssignmentID</th>
                                            <th>AssignmentRemark</th>
                                            <th>StudentID</th>
                                            <th>CourseID</th>
                                            <th>AssignmentName</th>
                                            <th>Grades</th>
                                            <th>Status</th>
                                            <th>AssignmentDocument</th>
                                            <th>Submission</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php /// Read data
                                    $sql = "SELECT * FROM assignment"; //Query
                                    //Execute the Query
                                    $result = mysqli_query($conn, $sql);
                                    echo "<br> Total Rows: " . mysqli_num_rows($result);

                                    if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    while($row = mysqli_fetch_assoc($result)) {
                                        
                                        echo "<tr>";
                                        echo "<td>".$row["assignmentID"]  ."</td>";
                                        echo "<td>".$row["assignmentRemark"]  ."</td>";
                                        echo "<td>".$row['studentID']. "</td>";
                                        echo "<td>".$row['courseID']. "</td>";
                                        echo "<td>".$row['assignmentName']. "</td>";
                                        echo "<td>".$row['grades']. "</td>";
                                        echo "<td>".$row['status']. "</td>";
                                        echo "<td>".$row['assignmentDoc']. "</td>";
                                        echo "<td>".$row['submission']. "</td>";
                                                    
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