<?php
    include 'db_connect.php'; // Includes the connection and starts/resumes the session
    //session_start(); // Start the session at the beginning of your script
 
    //include the Sidebar Menu and Header
  include 'sideBarMenu.php';
?>


                <!-- Begin Page Content -->
                <div class="container-fluid">
                   

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">User Tables</h1>
                    <p class="mb-4">Query: Show All User Table Records.
                        </p>

                    <!-- COPY FROM HERE -->
                    <!-- COPY To Duplicate ENTIRE TABLE  -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">User Table</h6>
                        </div>
                       <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                         <tr>
                                            <th>UserID</th>
                                            <th>FisrtName</th>
                                            <th>LastName</th>
                                            <th>Email</th>
                                            <th>BirthDate</th>
                                            <th>Gender</th>
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

                                            

                                                $sql = "SELECT * FROM User"; //Query
                                                //Execute the Query
                                                $result = mysqli_query($conn, $sql);
                                                echo "<br> Total Rows: " . mysqli_num_rows($result);

                                                if (mysqli_num_rows($result) > 0) {
                                                // output data of each row
                                                while($row = mysqli_fetch_assoc($result)) {
                                                    //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                                                    
                                                    echo "<tr>";
                                                    echo "<td>".$row["UserID"]  ."</td>";
                                                    echo    "<td>".$row['FirstName']. "</td>";
                                                    echo   "<td>".$row['LastName']. "</td>";
                                                    echo   "<td>".$row['Email']. "</td>";
                                                    echo   "<td>".$row['BirthDate']. "</td>";
                                                    echo   "<td>".$row['Gender']. "</td>";
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