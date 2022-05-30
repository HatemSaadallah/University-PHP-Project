<?php
include("../components/navbar.php");
?>


<?php
// Get Data from post request and insert it into the db
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category = $_POST['category'];
    $experience_title = $_POST['experience_title'];
    $start_month = $_POST['start_month'];
    $end_month = $_POST['end_month'];
    $institution_name = $_POST['institution_name'];
    $description = $_POST['description'];
    require_once realpath(__DIR__ . '/../../vendor/autoload.php');
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
    $dotenv->load();
    $db = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE']) or die("Unable to connect to database");

    $query = "INSERT INTO experience_info  (job_title, place_of_training, experience_category, start_month, end_month, description) 
    VALUES ('$experience_title', '$institution_name', '$category', '$start_month', '$end_month', '$description')";

    $result = mysqli_query($db, $query);
    try {
        if ($result) {
            echo "<script>alert('Experience added successfully')</script>";
        } else {
            echo "<script>alert('Experience not added')</script>";
        }
    } catch (Exception $e) {
        echo $e;
    }
}
?>

<div>
    <form action="add-experience.php" method="post">
        <!-- Add dropdown select -->
        <label>Experiences Category</label>
        <select aria-label="Default select example" name="category">
            <option selected>Open this select menu</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>

        <br /><br />

        <label>Experience Title</label>
        <input type="text" name="experience_title" placeholder="Experience Title">

        <br /><br />

        <label>Start Month</label>
        <input type="date" name="start_month"">

        <br /><br />

        <label>End Month</label>
        <input type=" date" name="end_month">

        <br /><br />

        <label>Institution</label>
        <input type="text" name="institution_name" placeholder="Institution">

        <br /> <br />

        <label>Description</label>
        <textarea name="description" id="" cols="30" rows="10"></textarea>

        <br /><br />

        <input type="submit" value="Submit">

        <!-- Reset -->
        <input type="reset" value="Reset">
    </form>
</div>