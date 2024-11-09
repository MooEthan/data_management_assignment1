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
                        $sql13 = "SELECT * FROM courses"; //Query
                        $queryTitle1 = "Course Posts Table";
                        $queryDescription1 = "Show All Course Posts Table Records";
                        //CALL FUNCTION to generate table
                        generate_table($conn, $sql1, $queryTitle1, $queryDescription1);

                        //***************************** */
                        // Example Query 4
                        $sql4 = "SELECT * FROM Exams"; //Query
                        $queryTitle2 = "Exams Table";
                        $queryDescription2 = "Show All Exams Table Records";

                        //CALL FUNCTION to generate table
                        generate_table($conn, $sql2, $queryTitle2, $queryDescription2);

                        //***************************** */
                        // Example Query 5
                        $sql5 = "SELECT * FROM Performance"; //Query
                        $queryTitle2 = "Performance Table";
                        $queryDescription2 = "Show All Performance Table Records";

                        //CALL FUNCTION to generate table
                        generate_table($conn, $sql2, $queryTitle2, $queryDescription2);

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
