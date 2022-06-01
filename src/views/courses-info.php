<?php
include("../components/navbar.php");
?>

<link rel="stylesheet" href="../css/courses_info.css">


<script type="text/javascript">
    function redirectWithPostRequest() {
        var form = document.createElement('form');
        document.body.appendChild(form);
        form.method = 'post';
        form.action = 'course-details.php';
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'course_id';
        var data = document.getElementById('courseId');
        var id_to_pass = data.getAttribute('course_id');
        input.value = id_to_pass;
        form.appendChild(input);
        form.submit();
    }
</script>

<div class="courses-info">
    <h1>All Courses Information</h1>
    <table cellpadding="3" style="border-radius: 8px;" cellspacing="0" class="courses-table-info">
        <tr class="head-row-courses-info">
            <th rowspan="2" colspan="1">#</th>
            <th rowspan="2" colspan="2">Course Name</th>
            <th rowspan="2" colspan="2">Total Hours</th>
            <!-- th with colspan 2 -->
            <th rowspan="1" colspan="2">
                Date
            </th>
            <th rowspan="2" colspan="2">Institution</th>
            <th rowspan="2" colspan="2">Attachment</th>
            <th rowspan="2" colspan="2">Nots</th>
        </tr>
        <tr class="head-row-courses-info">
            
            <th width="100px">From</th>
            <th width="100px">To</th>
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
            $course_id = $course['id'];
            // If course_id is odd add class odd_table_color
            // convert to int
            // $course_id = (int)$course['course_id'];
            if ((int)$course['id'] % 2 == 1) {
                echo "<tr class='odd_table_color centralized'>";
            } else {
                echo "<tr class='centralized'>";
            }
            echo "<td>" . $course['id'] . "</td>";
            echo "<td colspan='2'>" . $course['course_name'] . "</td>";
            echo "<td colspan='2'>" . $course['total_hours'] . "</td>";
            echo "<td>" . $course_to_date_edited . "</td>";
            echo "<td>" . $course_from_date_edited . "</td>";
            echo "<td colspan='2'>" . $course['institution_name'] . "</td>";
            echo "<td colspan='2'> <a course_id='$course_id' id='courseId' target='_blank' onClick='redirectWithPostRequest()' >View</td>";
            echo "<td>" . $course['notes'] . "</td>";
            echo "</tr>";
        }
        ?>

    </table>

</div>