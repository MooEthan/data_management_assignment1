<?php
    include 'db_connect.php'; // Includes the connection and starts/resumes the session
    //session_start(); // Start the session at the beginning of your script
 
    //include the Sidebar Menu and Header
    include 'sideBarMenu.php';
?>


                <!-- Begin Page Content -->
                <div class="container-fluid">
                   

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Exams Tables</h1>
                    <p class="mb-4">Query: Show All Exams Table Records.
                        </p>

                    <!-- COPY FROM HERE -->
                    <!-- COPY To Duplicate ENTIRE TABLE  -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Exams Table</h6>
                        </div>
                       <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                        <tr>
                                            <th>ExamID</th>
                                            <th>StudentID</th>
                                            <th>CourseID</th>
                                            <th>Grades</th>
                                            <th>ExamDateTime</th>
                                            <th>Year</th>
                                            <th>Status</th>
                                            <th>ExamPaper</th>
                                            <th>StudentStatus</th>
                                            <th>StudentExamNumber</th>   
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php /// Read data
                                    $sql = "SELECT * FROM exams"; //Query
                                    //Execute the Query
                                    $result = mysqli_query($conn, $sql);
                                    echo "<br> Total Rows: " . mysqli_num_rows($result);

                                    if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    while($row = mysqli_fetch_assoc($result)) {
                                       
                                        echo "<tr>";
                                                    echo    "<td>".$row['examID']. "</td>";
                                                    echo    "<td>".$row['studentID']. "</td>";
                                                    echo    "<td>".$row['courseID']. "</td>";
                                                    echo "<td>".$row["grades"]  ."</td>";
                                                    echo "<td>".$row["exam_datetime"]  ."</td>";
                                                    echo    "<td>".$row['year']. "</td>";
                                                    echo    "<td>".$row['status']. "</td>";
                                                    echo    "<td>".$row['exam_paper']. "</td>";
                                                    echo "<td>".$row["student_status"]  ."</td>";
                                                    echo "<td>".$row["student_seats"]  ."</td>";
                                                    echo "<td>".$row["student_exam_no"]  ."</td>";
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