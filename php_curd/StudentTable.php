<?php
    include 'db_connect.php'; // Includes the connection and starts/resumes the session
    //session_start(); // Start the session at the beginning of your script
 
    //include the Sidebar Menu and Header
    include 'sideBarMenu.php';
?>


                <!-- Begin Page Content -->
                <div class="container-fluid">
                   

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Student Tables</h1>
                    <p class="mb-4">Query: Show All Student Table Records.
                        </p>

                    <!-- COPY FROM HERE -->
                    <!-- COPY To Duplicate ENTIRE TABLE  -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Student Table</h6>
                        </div>
                       <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                         <tr>
                                            <th>studentID</th>
                                            <th>studentName</th>
                                            <th>Gender</th>
                                            <th>Date of Birth</th>
                                            <th>Nationality</th>
                                            <th>email</th>
                                            <th>Password</th>
                                            <th>Cell Number</th>
                                            <th>Emergency Number</th>
                                            <th>Address</th>
                                            <th>CourseID</th>
                                            <th>Year</th>

                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                <?php /// Read data
                                                // Create connection
                                                 $conn = mysqli_connect($servername, $username, $password, $dbname);
                                                // Check connection
                                                if (!$conn) {
                                                die("Connection failed: " . mysqli_connect_error());
                                                }
                                                else {
                                                    echo "Database Connected successfully";
                                                }

                                            

                                                $sql = "SELECT * FROM student"; //Query
                                                //Execute the Query
                                                $result = mysqli_query($conn, $sql);
                                                echo "<br> Total Rows: " . mysqli_num_rows($result);

                                                if (mysqli_num_rows($result) > 0) {
                                                // output data of each row
                                                while($row = mysqli_fetch_assoc($result)) {
                                                    
                                                    echo "<tr>";
                                                    echo "<td>".$row["studentID"]  ."</td>";
                                                    echo    "<td>".$row['studentName']. "</td>";
                                                    echo   "<td>".$row['gender']. "</td>";
                                                    echo   "<td>".$row['dob']. "</td>";
                                                    echo   "<td>".$row['nationality']. "</td>";
                                                    echo   "<td>".$row['email']. "</td>";
                                                    echo   "<td>".$row['password']. "</td>";
                                                    echo   "<td>".$row['cell_number']. "</td>";
                                                    echo   "<td>".$row['emergency_number']. "</td>";
                                                    echo   "<td>".$row['address']. "</td>";
                                                    echo   "<td>".$row['courseID']. "</td>";
                                                    echo   "<td>".$row['year']. "</td>";

                                                    echo "</tr>";
                                                    //echo $row["count(*)"];
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