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
                        $sql1 = "SELECT s.studentID, s.studentName, s.gender, s.dob, c.courseName, s.nationality, s.email, s.password, s.cell_number, s.emergency_number, s.address, s.year, 
                        CASE 
                        WHEN s.status = 0 THEN 'Active' 
                        WHEN s.status = 1 THEN 'Inactive' 
                        END AS status
                        FROM student s JOIN courses c on s.courseID = c.courseID WHERE s.is_deleted = 0"; //Query
                        $queryTitle1 = "STUDENT Table";
                        $queryDescription1 = "Show All student Table Records";
                        //CALL FUNCTION to generate table
                        generate_table($conn, $sql1, $queryTitle1, $queryDescription1);

                        //***************************** */
                        // Example Query 2
                        $sql2 = "SELECT t.teacherID, t.teacherName, c.courseName, t.gender, t.email, t.password, t.CellNumber, t.nationality, t.position, t.dob, t.address,
                        CASE
                        WHEN t.status = 0 THEN 'Active'
                        WHEN t.status = 1 THEN 'Inactive'
                        END AS status
                        FROM teacher t JOIN courses c ON t.courseID = c.courseID WHERE t.is_deleted = 0"; //Query
                        $queryTitle2 = "Teacher Table";
                        $queryDescription2 = "Show All Teacher Table Records";

                        //CALL FUNCTION to generate table
                        generate_table($conn, $sql2, $queryTitle2, $queryDescription2);

                        //***************************** */
                        // Example Query 3
                        $sql3 = "SELECT c.courseID, c.courseName, c.Desc, c.creditHours, c.CourseCode, c.year, t.teacherName FROM courses c JOIN teacher t on c.teacherID = t.teacherID WHERE c.is_deleted = 0"; //Query
                        $queryTitle3 = "Course Posts Table";
                        $queryDescription3 = "Show All Course Posts Table Records";
                        //CALL FUNCTION to generate table
                        generate_table($conn, $sql3, $queryTitle3, $queryDescription3);

                        //***************************** */
                        // Example Query 4
                        $sql4 = "SELECT e.examID, s.studentName, c.courseName, e.grades, e.exam_datetime, e.year, e.exam_paper, 
                        CASE
                        WHEN e.student_status = 1 THEN 'First Time'
                        WHEN e.student_status = 2 THEN 'Retake'
                        END AS studentStatus,
                         e.student_seats, e.student_exam_no,
                        CASE
                        WHEN e.status = 1 THEN 'Upcoming'
                        WHEN e.status = 2 THEN 'Ongoing'
                        WHEN e.status = 3 THEN 'Finished'
                        END AS status
                        FROM exams e JOIN student s ON e.studentID = s.studentID JOIN courses c ON e.courseID = c.courseID WHERE e.is_deleted = 0"; //Query
                        $queryTitle4 = "Exams Table";
                        $queryDescription4 = "Show All Exams Table Records";

                        //CALL FUNCTION to generate table
                        generate_table($conn, $sql4, $queryTitle4, $queryDescription4);

                        //***************************** */
                        // Example Query 5
                        $sql5 = "SELECT p.performanceID, s.studentName, c.courseName, p.overallGrades FROM performance p JOIN student s ON p.studentID = s.studentID JOIN courses c ON p.courseID = c.courseID WHERE p.is_deleted = 0"; //Query
                        $queryTitle5 = "Performance Table";
                        $queryDescription5 = "Show All Performance Table Records";

                        //CALL FUNCTION to generate table
                        generate_table($conn, $sql5, $queryTitle5, $queryDescription5);

                        // Example Query 6
                        $sql6 = "SELECT a.appointmentID, s.studentName, c.courseName, t.teacherName, a.purpose, a.location, 
                        CASE
                        WHEN a.status = 0 THEN 'Pending'
                        WHEN a.status = 1 THEN 'Approved'
                        WHEN a.status = 2 THEN 'Rejected'
                        END AS status
                        FROM appointment a JOIN student s ON a.studentID = s.studentID JOIN courses c ON a.courseID = c.courseID JOIN teacher t ON a.teacherID = t.teacherID WHERE a.is_deleted = 0"; //Query
                        $queryTitle6 = "Appointment Table";
                        $queryDescription6 = "Show All Appointment Table Records";

                        //CALL FUNCTION to generate table
                        generate_table($conn, $sql6, $queryTitle6, $queryDescription6);

                        // Example Query 7
                        $sql7 = "SELECT a.announcementID, a.announcementTitle, a.announcementDesc, t.teacherName, s.studentName FROM announcement a JOIN teacher t ON a.teacherID = t.teacherID JOIN student s ON a.studentID = s.studentID WHERE a.is_deleted = 0"; //Query
                        $queryTitle7 = "Announcement Table";
                        $queryDescription7 = "Show All Announcement Table Records";

                        //CALL FUNCTION to generate table
                        generate_table($conn, $sql7, $queryTitle7, $queryDescription7);

                        // Example Query 8
                        $sql8 = "SELECT a.assignmentID, a.assignmentRemark, s.studentName, c.courseName, a.assignmentName, a.grades,a.assignmentDoc,
                        CASE
                        WHEN a.submission = 1 THEN 'Pending'
                        WHEN a.submission = 2 THEN 'Received'
                        WHEN a.submission = 3 THEN 'Rejected'
                        END AS submission,
                        CASE
                        WHEN a.status = 1 THEN 'Pending'
                        WHEN a.status = 2 THEN 'Approved'
                        WHEN a.status = 3 THEN 'Rejected'
                        END AS status
                        FROM assignment a JOIN student s ON a.studentID = s.studentID JOIN courses c ON a.courseID = c.courseID WHERE a.is_deleted = 0"; //Query
                        $queryTitle8 = "Assignment Table";
                        $queryDescription8 = "Show All Assignment Table Records";

                        //CALL FUNCTION to generate table
                        generate_table($conn, $sql8, $queryTitle8, $queryDescription8);

                        // Example Query 9
                        $sql9 = "SELECT ce.certificateID, s.studentName, co.courseName, ce.cert_image FROM certificates ce JOIN student s ON ce.studentID = s.studentID JOIN courses co ON ce.courseID = co.courseID WHERE ce.is_deleted = 0"; //Query
                        $queryTitle9 = "Certificates Table";
                        $queryDescription9 = "Show All Certificates Table Records";

                        //CALL FUNCTION to generate table
                        generate_table($conn, $sql9, $queryTitle9, $queryDescription9);

                        // Example Query 10
                        $sql10 = "SELECT n.notificationID, c.courseName, n.notificationName, n.notificationDetail, n.timeOfNextClass, n.dateOfNextClass FROM class_time_notification n JOIN courses c ON n.courseID = c.courseID WHERE n.is_deleted = 0"; //Query
                        $queryTitle10 = "Class time notifications Table";
                        $queryDescription10 = "Show All class time notifications Table Records";

                        //CALL FUNCTION to generate table
                        generate_table($conn, $sql10, $queryTitle10, $queryDescription10);

                        // Example Query 11
                        $sql11 = "SELECT ex.activityID, ex.activityName, s.studentClubName, t.teacherName, 
                        CASE
                        WHEN ex.status = 1 THEN 'Active'
                        WHEN ex.status = 2 THEN 'Inactive'
                        END AS status
                        FROM extra_activity ex JOIN student_club s ON ex.studentClubID = s.studentClubID JOIN teacher t ON ex.teacherID = t.teacherID WHERE ex.is_deleted = 0"; //Query
                        $queryTitle11 = "Extra activity Table";
                        $queryDescription11 = "Show All extra activity Table Records";

                        //CALL FUNCTION to generate table
                        generate_table($conn, $sql11, $queryTitle11, $queryDescription11);

                        // Example Query 12
                        $sql12 = "SELECT sc.studentClubID, sc.studentClubName, s.studentName, t.teacherName, sc.studentClubDesc FROM student_club sc JOIN student s ON sc.studentID = s.studentID JOIN teacher t ON sc.teacherID = t.teacherID WHERE sc.is_deleted = 0"; //Query
                        $queryTitle12 = "Student club Table";
                        $queryDescription12 = "Show All student club Table Records";

                        //CALL FUNCTION to generate table
                        generate_table($conn, $sql12, $queryTitle12, $queryDescription12);

                        // Example Query 13
                        $sql13 = "SELECT t.transcriptID, s.studentName, c.courseName, t.transcript_image FROM transcripts t JOIN student s ON t.studentID = s.studentID JOIN courses c ON t.courseID = c.courseID WHERE t.is_deleted = 0"; //Query
                        $queryTitle13 = "Transcripts Table";
                        $queryDescription13 = "Show All transcript Table Records";

                        //CALL FUNCTION to generate table
                        generate_table($conn, $sql13, $queryTitle13, $queryDescription13);
                        
                        // Example Query 14
                        $sql14 = "SELECT w.workshopID, w.workshopName, w.workshop_desc, sc.studentClubName, w.workshopDate, w.workshopTime, t.teacherName, s.studentName,
                        CASE 
                        WHEN w.status = 1 THEN 'Approved'
                        WHEN w.status = 2 THEN 'Rejected'
                        END AS status
                        FROM workshop w JOIN student_club sc ON w.studentClubID = sc.studentClubID JOIN teacher t ON w.teacherID = t.teacherID JOIN student s ON w.studentID = s.studentID WHERE w.is_deleted = 0"; //Query
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
