<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<?php
include("../components/navbar.php");
?>

<link rel="stylesheet" href="../css/add_course.css">

<!-- Check if request is post and add to the database -->
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $course_name = $_POST['course_name'];
    $total_hours = $_POST['total_hours'];
    // Cast to int
    $total_hours = (int)$total_hours;
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];
    $institution_name = $_POST['institution_name'];
    $attachment = $_POST['attachment'];
    $notes = $_POST['notes'];

    if (isset($_FILES['image'])) {
        $errors = array();
        $file_name = $_FILES['image']['name'];
        echo $file_name;
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_ext = strtolower(end(explode('.', $file_name)));

        $extensions = array("jpeg", "jpg", "png");

        // if (in_array($file_ext, $extensions) === false) {
        //     $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        // }

        // if ($file_size > 2097152) {
        //     $errors[] = 'File size must be less than 2 MB';
        // }

        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, "../images/" . $file_name);
            echo "Success";
        } else {
            print_r($errors);
        }
    }

    // echo $from_date;
    // echo $to_date;
    require_once realpath(__DIR__ . '/../../vendor/autoload.php');
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
    $dotenv->load();

    $conn = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE']) or die("Unable to connect to database");

    $query = "INSERT INTO courses_info (course_name, total_hours, from_date, to_date, institution_name, attachment, notes) VALUES ('$course_name', $total_hours, $from_date, $to_date, '$institution_name', '$attachment', '$notes')";


    // $result = mysqli_query($conn, $query);
    // try {
    //     if ($result) {
    //         echo "<script>alert('Course added successfully')</script>";
    //     } else {
    //         echo "<script>alert('Course not added')</script>";
    //     }
    // } catch (Exception $e) {
    //     echo $e;
    // }
}
?>
<main>
    <div class="container">
        <div class="AddCourses">
            <form action="add-course.php" method="post" enctype="multipart/form-data">
                <table cellspacing="30">
                    <tr>
                        <td>
                            <label for="cName">Course Name:</label>
                        </td>
                        <td>
                            <input type="text" name="course_name" id="cName" class="form-inputs">
                        </td>
                    </tr>
                    <tr style="height: 1em;">
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="noHours">Number of Hours:</label>
                        </td>
                        <td>
                            <input type="number" name="total_hours" id="noHours" class="form-inputs">
                        </td>
                    </tr>
                    <tr style="height: 1em;">
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="sDate">Start Date:</label>
                        </td>
                        <td>
                            <input type="date" name="from_date" id="sDate" class="form-inputs">
                        </td>
                    </tr>
                    <tr style="height: 1em;">
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="eDate">End Date:</label>
                        </td>
                        <td>
                            <input type="date" name="to_date" id="eDate" class="form-inputs">
                        </td>
                    </tr>
                    <tr style="height: 1em;">
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="ins">Institution:</label>
                        </td>
                        <td>
                            <input type="text" name="institution_name" id="ins" class="form-inputs">
                        </td>
                    </tr>
                    <tr style="height: 1em;">
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            Attachment:
                        </td>
                        <td>
                            <input type="radio" name="attach">File
                            <input type="radio" name="attach" class="urlRadio">URL
                        </td>
                    </tr>
                    <tr style="height: 1em;">
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="url">URL:</label>
                        </td>
                        <td>
                            <input type="url" name="attachment" id="url" class="form-inputs">
                        </td>
                    </tr>
                    <tr style="height: 1em;">
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="file">File:</label>
                        </td>
                        <td>
                            <input type="file" name="image" id="file">
                        </td>
                    </tr>
                    <tr style="height: 1em;">
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="note">Note:</label>
                        </td>
                        <td>
                            <textarea name="notes" id="note" class="form-inputs"></textarea>
                        </td>
                    </tr>
                    <tr style="height: 1em;">
                        <td></td>
                        <td></td>
                    </tr>
                </table>
                <input type="submit" value="Save">
                <input type="reset" value="Reset">
            </form>
            <div class="image course">
                <img src="../../static/imgs/add-course-main.png" alt="Course">
            </div>
        </div>
    </div>
</main>