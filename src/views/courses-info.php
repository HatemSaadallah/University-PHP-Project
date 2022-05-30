<?php
include("../components/navbar.php");
?>

<link rel="stylesheet" href="../css/courses_info.css">

<div class="courses-info">
    <h1>All Courses Information</h1>
    <table class="courses-table-info">
        <tr class="head-row-courses-info">
            <th>#</th>
            <th>Course Name</th>
            <th>Total Hours</th>
            <!-- th with colspan 2 -->
            <th colspan="2">
                Date
                <!-- add subheading with two cells -->
                <table class="sub-head-row-courses-info">
                    <tr>
                        <th>Start</th>
                        <th>End</th>
                    </tr>
                </table>
            </th>
            <th>Institution</th>
            <th>Attachment</th>
            <th>Nots</th>
        </tr>
        <?php
        require_once realpath(__DIR__ . '/../../vendor/autoload.php');
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();

        $db = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE']) or die("Unable to connect to database");
        $query = "SELECT * FROM courses_info";
        $result = $db->query($query);
        $courses = $result->fetch_all(MYSQLI_ASSOC);
        foreach ($courses as $course) {
            $course_to_date_edited = date('d/m/Y', strtotime($course['to_date']));
            $course_from_date_edited = date('d/m/Y', strtotime($course['from_date']));
            // If course_id is odd add class odd_table_color
            // convert to int
            // $course_id = (int)$course['course_id'];
            if ((int)$course['id'] % 2 == 1) {
                echo "<tr class='odd_table_color centralized'>";
            } else {
                echo "<tr class='centralized'>";
            }
            echo "<td>" . $course['id'] . "</td>";
            echo "<td>" . $course['course_name'] . "</td>";
            echo "<td>" . $course['total_hours'] . "</td>";
            echo "<td>" . $course_to_date_edited . "</td>";
            echo "<td>" . $course_from_date_edited . "</td>";
            echo "<td>" . $course['institution_name'] . "</td>";
            echo "<td>" . $course['attachment'] . "</td>";
            echo "<td>" . $course['notes'] . "</td>";
            echo "</tr>";
        }
        ?>

    </table>

</div>