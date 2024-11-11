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
                        $sql1 = "SELECT n.notificationID, c.courseName, n.notificationName, n.notificationDetail, n.timeOfNextClass, n.dateOfNextClass FROM class_time_notification n JOIN courses c ON n.courseID = c.courseID WHERE notificationID IN (SELECT notificationID FROM class_time_notification WHERE notificationName LIKE '%class%') ";
                        $queryTitle1 = "Query-1";
                        $queryDescription1 = "Retrieve notifications with class written in the name of the notification ";
                        //CALL FUNCTION to generate table
                        generate_table($conn, $sql1, $queryTitle1, $queryDescription1);

                        //***************************** */
                        // Example Query 2
                        $sql2 = "SELECT t.teacherName, COUNT(a.announcementID) AS NumAnnouncementsLast24Hrs FROM teacher t, announcement a WHERE t.teacherID = a.teacherID AND a.created_date >= DATE_SUB(NOW(), INTERVAL 1 DAY) GROUP BY t.teacherID";
                        $queryTitle2 = "Query-2";
                        $queryDescription2 = "Counts the number of announcements made by a teacher in the last 24 hours";

                        //CALL FUNCTION to generate table
                        generate_table($conn, $sql2, $queryTitle2, $queryDescription2);

                        //***************************** */
                        // Example Query 3
                        $sql3 = "SELECT s.studentClubName, COUNT(w.workshopID) AS WorkshopsLastMonth FROM student_club s, workshop w WHERE s.studentClubID = w.studentClubID AND w.created_date >= DATE_SUB(NOW(), INTERVAL 1 MONTH) GROUP BY s.studentClubID; ";
                        $queryTitle3 = "Query-3";
                        $queryDescription3 = "Counts the number of workshops created by a student club during last month ";

                        //CALL FUNCTION to generate table
                        generate_table($conn, $sql3, $queryTitle3, $queryDescription3);

                        //***************************** */
                        // Example Query 4
                        $sql4 = "SELECT s.studentID, a.assignmentName, SUM(a.grades) AS AssignmentScores FROM student s, assignment a WHERE s.studentID = a.studentID GROUP BY s.studentID ORDER BY AssignmentScores DESC ";
                        $queryTitle4 = "Query-4";
                        $queryDescription4 = "Sorts the scores of students' assignments from highest to lowest. ";

                        //CALL FUNCTION to generate table
                        generate_table($conn, $sql4, $queryTitle4, $queryDescription4);

                        //***************************** */
                        // Example Query 5
                        $sql5 = "SELECT nationality FROM student UNION SELECT nationality FROM teacher ORDER BY FIELD(nationality, 'Malaysia' ) DESC; ";
                        $queryTitle5 = "Query-5";
                        $queryDescription5 = "Finds the nationality from both tables of student and teacher and sorts from Malaysia first. ";

                        //CALL FUNCTION to generate table
                        generate_table($conn, $sql5, $queryTitle5, $queryDescription5);

                        //***************************** */
                        // Example Query 6
                        $sql6 = "SELECT studentName FROM student GROUP BY studentName ORDER BY studentName ";
                        $queryTitle6 = "Query-6";
                        $queryDescription6 = "Find all student name in the school ";

                        //CALL FUNCTION to generate table
                        generate_table($conn, $sql6, $queryTitle6, $queryDescription6);

                        //***************************** */
                        // Example Query 7
                        $sql7 = "SELECT a.appointmentID, s.studentName, t.teacherName, 
                        CASE
                        WHEN a.status = 0 THEN 'Pending'
                        WHEN a.status = 1 THEN 'Approved'
                        WHEN a.status = 2 THEN 'Rejected'
                        END AS status
                        ,purpose FROM appointment a JOIN student s ON a.studentID = s.studentID JOIN teacher t ON a.teacherID = t.teacherID WHERE a.status = '2' ";
                        $queryTitle7 = "Query-7";
                        $queryDescription7 = "Choose all appointment which has been rejected ";

                        //CALL FUNCTION to generate table
                        generate_table($conn, $sql7, $queryTitle7, $queryDescription7);

                        //***************************** */
                        // Example Query 8
                        $sql8 = "SELECT studentID, studentName, year FROM student WHERE year = '2024' ORDER BY studentName ";
                        $queryTitle8 = "Query-8";
                        $queryDescription8 = "Choose all the student that enrol in year 2024 ";

                        //CALL FUNCTION to generate table
                        generate_table($conn, $sql8, $queryTitle8, $queryDescription8);

                        //***************************** */
                        // Example Query 9
                        $sql9 = "SELECT teacherID, teacherName, position FROM teacher WHERE position = 'Senior Lecturer' ORDER BY teacherID ";
                        $queryTitle9 = "Query-9";
                        $queryDescription9 = "Choose all teacher who are assigned as senior lecturer ";

                        //CALL FUNCTION to generate table
                        generate_table($conn, $sql9, $queryTitle9, $queryDescription9);

                        //***************************** */
                         // Example Query 10
                         $sql10 = "SELECT e.examID, s.studentID, s.studentName, c.courseID, c.courseName, grades FROM exams e JOIN student s ON e.studentID = s.studentID JOIN courses c ON e.courseID = c.courseID WHERE e.student_status = 2 ORDER BY examID ";
                         $queryTitle10 = "Query-10";
                         $queryDescription10 = "Check the details of an exam, students and its course who retake the test before  ";
 
                         //CALL FUNCTION to generate table
                         generate_table($conn, $sql10, $queryTitle10, $queryDescription10);

                         //***************************** */
                         // Example Query 11
                         $sql11 = "SELECT studentID, overallGrades FROM performance WHERE overallGrades >= 3.5 ORDER BY studentID ";
                         $queryTitle11 = "Query-11";
                         $queryDescription11 = "Check which students has overall grade that are more than 3.5";
 
                         //CALL FUNCTION to generate table
                         generate_table($conn, $sql11, $queryTitle11, $queryDescription11);

                         //***************************** */
                         // Example Query 12
                         $sql12 = "SELECT e.examID, s.studentName, e.exam_datetime FROM exams e JOIN student s ON e.studentID = s.studentID WHERE e.exam_datetime BETWEEN '2024-12-01' AND '2024-12-31' ORDER BY e.examID ";
                         $queryTitle12 = "Query-12";
                         $queryDescription12 = "Check all the exams and student involving it that took place in December 2024 ";
 
                         //CALL FUNCTION to generate table
                         generate_table($conn, $sql12, $queryTitle12, $queryDescription12);

                         //***************************** */
                         // Example Query 13
                         $sql13 = "SELECT studentID, studentName, address FROM student WHERE address LIKE '%Taman Bukit Indah%' ORDER BY address ";
                         $queryTitle13= "Query-13";
                         $queryDescription13 = "Choose all student who lived in Taman Bukit Indah ";
 
                         //CALL FUNCTION to generate table
                         generate_table($conn, $sql13, $queryTitle13, $queryDescription13);

                         //***************************** */
                         // Example Query 14
                         $sql14 = "SELECT e.examID, c.courseName, e.exam_datetime FROM exams e JOIN courses c ON e.courseID = c.courseID WHERE e.status = 1 AND e.exam_datetime BETWEEN NOW() AND NOW() + INTERVAL 1 WEEK ORDER BY examID ASC; ";
                         $queryTitle14= "Query-14";
                         $queryDescription14 = "Select all the upcoming exams within a week ";
 
                         //CALL FUNCTION to generate table
                         generate_table($conn, $sql14, $queryTitle14, $queryDescription14);

                         //***************************** */
                         // Example Query 15
                         $sql15 = "SELECT w.workshopID, w.workshopName, s.studentClubID, s.studentClubName, w.workshopDate FROM workshop w JOIN student_club s ON w.studentClubID = s.studentClubID WHERE w.workshopDate > NOW() ORDER BY w.workshopDate; ";
                         $queryTitle15 = "Query-15";
                         $queryDescription15 = "Search the detail of all upcoming workshop ";
 
                         //CALL FUNCTION to generate table
                         generate_table($conn, $sql15, $queryTitle15, $queryDescription15);

                         //***************************** */
                         // Example Query 16
                         $sql16 = "SELECT a.activityID, a.activityName, s.studentClubID, s.studentClubName, t.teacherID, t.teacherName FROM extra_activity a JOIN student_club s ON a.studentClubID = s.studentClubID JOIN teacher t ON a.teacherID = t.teacherID WHERE a.status = 1 ORDER BY a.activityID; ";
                         $queryTitle16 = "Query-16";
                         $queryDescription16 = "Search the active activity as well as its student leader and teacher in charge ";
 
                         //CALL FUNCTION to generate table
                         generate_table($conn, $sql16, $queryTitle16, $queryDescription16);

                         //***************************** */
                         // Example Query 17
                         $sql17 = "SELECT a.assignmentID, a.assignmentName, s.studentID, s.studentName, a.grades, c.courseID, c.courseName FROM assignment a JOIN student s ON a.studentID = s.studentID JOIN courses c ON a.courseID = c.courseID WHERE a.grades > 0 AND a.status = 2 ORDER BY a.assignmentID ";
                         $queryTitle17 = "Query-17";
                         $queryDescription17 = "Search all the assignment and their corresponding student and course of those grades which are greater than 0 and submitted ";
 
                         //CALL FUNCTION to generate table
                         generate_table($conn, $sql17, $queryTitle17, $queryDescription17);

                         //***************************** */
                         // Example Query 18
                         $sql18 = "SELECT courseID, courseName, creditHours FROM courses WHERE creditHours >= 15 ORDER BY courseID ";
                         $queryTitle18 = "Query-18";
                         $queryDescription18 = "Search all course that has credit hours more than 15 hours ";
 
                         //CALL FUNCTION to generate table
                         generate_table($conn, $sql18, $queryTitle18, $queryDescription18);

                         //***************************** */
                         // Example Query 19
                         $sql19 = "SELECT studentID, studentName, 
                         CASE
                         WHEN status = 0 THEN 'Active'
                         WHEN status = 1 THEN 'Inactive'
                         END AS status
                         FROM student WHERE status = 1 ORDER BY studentID ";
                         $queryTitle19 = "Query-19";
                         $queryDescription19 = "Select all inactive student ";
 
                         //CALL FUNCTION to generate table
                         generate_table($conn, $sql19, $queryTitle19, $queryDescription19);

                         //***************************** */
                         // Example Query 20
                         $sql20 = "SELECT s.studentID, s.studentName, 
                         CASE 
                         WHEN a.submission = 1 THEN 'Pending'
                         WHEN a.submission = 2 THEN 'Received'
                         WHEN a.submission = 3 THEN 'overdue'
                         END AS submission
                         FROM assignment a JOIN student s ON s.studentID = a.studentID WHERE submission = '3' ORDER BY studentID ";
                         $queryTitle20 = "Query-20";
                         $queryDescription20 = "Select all student where they failed to submit the assignment in given time ";
 
                         //CALL FUNCTION to generate table
                         generate_table($conn, $sql20, $queryTitle20, $queryDescription20);



                        // Add more queries as needed...
                        ?>

                </div> 
                <!-- /.container-fluid -->

<?php

//include the FOOTER Content and END of FILE DATA
include 'footer.php';

?>

<?php
/// *** NO NEED TO CHANGE ANYTHING BELOW THIS LINE *** ///

// Function to execute the query and generate the table
function generate_table($conn, $sql, $queryTitle, $queryDescription) {
    echo '<div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">' . $queryTitle . '</h6>
                <p class="mb-4">' . $queryDescription . '</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">';
    
    // Execute the Query
    $result = mysqli_query($conn, $sql);

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
