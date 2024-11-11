<?php
    include 'db_connect.php'; // Includes the connection and starts/resumes the session
    //session_start(); // Start the session at the beginning of your script
    

    //include the Sidebar Menu and Header
    include 'sideBarMenu.php';
?>


                <!-- Begin Page Content -->
                <div class="container-fluid">
                   

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Analytical Queries</h1>
                    <p class="mb-4">All Analytical Queries and Their results will be shown here From WEEK-5 Lab Handout.
                        </p>
                    
                        <?php
                        //***************************** */
                        // Example Query 1
                        $sql1 = "SELECT * FROM student"; //Query
                        $queryTitle1 = "STUDENT Table";
                        $queryDescription1 = "Show All student Table Records";
                        //CALL FUNCTION to generate table
                        generate_table($conn, $sql1, $queryTitle1, $queryDescription1);

                        //***************************** */
                        // Example Query 2
                        $sql2 = "SELECT * FROM teacher"; //Query
                        $queryTitle2 = "Teacher Table";
                        $queryDescription2 = "Show All Teacher Table Records";

                        //CALL FUNCTION to generate table
                        generate_table($conn, $sql2, $queryTitle2, $queryDescription2);

                        //***************************** */
                        // Example Query 3
                        $sql3 = "SELECT * FROM courses"; //Query
                        $queryTitle3 = "Course Posts Table";
                        $queryDescription3 = "Show All Course Posts Table Records";
                        //CALL FUNCTION to generate table
                        generate_table($conn, $sql3, $queryTitle3, $queryDescription3);

                        //***************************** */
                        // Example Query 4
                        $sql4 = "SELECT * FROM Exams"; //Query
                        $queryTitle4 = "Exams Table";
                        $queryDescription4 = "Show All Exams Table Records";

                        //CALL FUNCTION to generate table
                        generate_table($conn, $sql4, $queryTitle4, $queryDescription4);

                        //***************************** */
                        // Example Query 5
                        $sql5 = "SELECT * FROM Performance"; //Query
                        $queryTitle5 = "Performance Table";
                        $queryDescription5 = "Show All Performance Table Records";

                        //CALL FUNCTION to generate table
                        generate_table($conn, $sql5, $queryTitle5, $queryDescription5);

                        // Example Query 6
                        $sql6 = "SELECT * FROM appointment"; //Query
                        $queryTitle6 = "Appointment Table";
                        $queryDescription6 = "Show All Appointment Table Records";

                        //CALL FUNCTION to generate table
                        generate_table($conn, $sql6, $queryTitle6, $queryDescription6);

                        // Example Query 7
                        $sql7 = "SELECT * FROM announcement"; //Query
                        $queryTitle7 = "Announcement Table";
                        $queryDescription7 = "Show All Announcement Table Records";

                        //CALL FUNCTION to generate table
                        generate_table($conn, $sql7, $queryTitle7, $queryDescription7);

                        // Example Query 8
                        $sql8 = "SELECT * FROM assignment"; //Query
                        $queryTitle8 = "Assignment Table";
                        $queryDescription8 = "Show All Assignment Table Records";

                        //CALL FUNCTION to generate table
                        generate_table($conn, $sql8, $queryTitle8, $queryDescription8);

                        // Example Query 9
                        $sql9 = "SELECT * FROM certificates"; //Query
                        $queryTitle9 = "Certificates Table";
                        $queryDescription9 = "Show All Certificates Table Records";

                        //CALL FUNCTION to generate table
                        generate_table($conn, $sql9, $queryTitle9, $queryDescription9);

                        // Example Query 10
                        $sql10 = "SELECT * FROM class_time_notification"; //Query
                        $queryTitle10 = "Class time notifications Table";
                        $queryDescription10 = "Show All class time notifications Table Records";

                        //CALL FUNCTION to generate table
                        generate_table($conn, $sql10, $queryTitle10, $queryDescription10);

                        // Example Query 11
                        $sql11 = "SELECT * FROM extra_activity"; //Query
                        $queryTitle11 = "Extra activity Table";
                        $queryDescription11 = "Show All extra activity Table Records";

                        //CALL FUNCTION to generate table
                        generate_table($conn, $sql11, $queryTitle11, $queryDescription11);

                        // Example Query 12
                        $sql12 = "SELECT * FROM student_club"; //Query
                        $queryTitle12 = "Student club Table";
                        $queryDescription12 = "Show All student club Table Records";

                        //CALL FUNCTION to generate table
                        generate_table($conn, $sql12, $queryTitle12, $queryDescription12);

                        // Example Query 13
                        $sql13 = "SELECT * FROM transcripts"; //Query
                        $queryTitle13 = "Transcripts Table";
                        $queryDescription13 = "Show All transcript Table Records";

                        //CALL FUNCTION to generate table
                        generate_table($conn, $sql13, $queryTitle13, $queryDescription13);
                        
                        // Example Query 14
                        $sql14 = "SELECT * FROM workshop"; //Query
                        $queryTitle14 = "Workshop Table";
                        $queryDescription14 = "Show All workshop Table Records";

                        //CALL FUNCTION to generate table
                        generate_table($conn, $sql14, $queryTitle14, $queryDescription14);


                        // Add more queries as needed...
                        ?>   
                </div> 
                <!-- /.container-fluid -->

<?php

//include the FOOTER Content and END of FILE DATA
include 'footer.php';

?>

<?php
// Function to execute the query and generate the table
function generate_table($conn, $sql, $queryTitle, $queryDescription) {
    echo '<div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">' . $queryTitle . '</h6>
                <p class="mb-4">' . $queryDescription . '</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">';

    // Check if the connection is valid before executing the query
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Execute the Query
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    // Display the number of rows
    echo "<br> Total Rows: " . mysqli_num_rows($result);

    if (mysqli_num_rows($result) > 0) {
        // Display table header with column names dynamically
        echo "<table border='1' class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>";
        echo "<tr>";

        $firstRow = mysqli_fetch_assoc($result);
        // Loop through and print all column names
        foreach ($firstRow as $columnName => $value) {
            echo "<th>" . htmlspecialchars($columnName) . "</th>";
        }
        echo "</tr>";

        // Reset the pointer to the first row
        mysqli_data_seek($result, 0);

        // Output data of each row dynamically
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            foreach ($row as $columnValue) {
                echo "<td>" . htmlspecialchars($columnValue) . "</td>";
            }
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "0 results";
    }

    echo '    </div>
            </div>
        </div>';
}
?>
