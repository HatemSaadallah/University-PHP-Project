<?php
include("../components/navbar.php");
?>

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $course_id =  $_POST['course_id'];
        echo $course_id;
        // Get Data from DB
        require_once realpath(__DIR__ . '/../../vendor/autoload.php');
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();
        $db = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE']) or die("Unable to connect to database");
        $query = "SELECT * FROM courses_info WHERE id = '$course_id'";
        $result = $db->query($query);
        $course = $result->fetch_assoc();
        $course_name = $course['course_name'];
        $total_hours = $course['total_hours'];
        $from_date = $course['from_date'];
        // Convert to format 
        $from_date = date("d/m/Y", strtotime($from_date));
        $to_date = $course['to_date'];
        $to_date = date("d/m/Y", strtotime($to_date));
        $institution_name = $course['institution_name'];
        $attachment = $course['attachment'];
        $notes = $course['notes'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $course_name?></title>
</head>
<body>
    <h1>Course "<?php echo $course_name ?>"</h1>
    <p>from <?php echo $to_date ?> to <?php echo $from_date ?>, totally <?php echo $total_hours ?> training hours</p>
    <p>Institution was "<?php echo $institution_name ?>" </p>

    <img src="<?php echo $attachment ?>" alt="Attachment link invalid">
</body>
</html>