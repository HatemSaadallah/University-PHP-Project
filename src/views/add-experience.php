<?php
include("../components/navbar.php");
?>

<link rel="stylesheet" href="../css/add_experience.css">
<?php
// Get Data from post request and insert it into the db
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category = $_POST['category'];
    $experience_title = $_POST['experience-title'];
    $start_month = $_POST['start_month'];
    $end_month = $_POST['end_month'];
    $institution_name = $_POST['institution-name'];
    $description = $_POST['description'];
    require_once realpath(__DIR__ . '/../../vendor/autoload.php');
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
    $dotenv->load();
    $db = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE']) or die("Unable to connect to database");

    $query = "INSERT INTO experience_info  (title, category, start_date, end_date, institution, description) 
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
<main>
    <div class="container">
        <div class="AddExp">
            <form action="add-experience.php" method="post">
                <table>
                    <tr>
                        <td>
                            <label for="cName">Experience Category:</label>
                        </td>
                        <td>
                            <select name="category" id="cName" class="form-inputs">
                                <option value="job">Category</option>
                                <option value="job">Job</option>
                                <option value="freelancer">Freelancer</option>
                                <option value="self-learning">Self Learning</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="experience-title">Experience Title:</label>
                        </td>
                        <td>
                            <input type="text" id="experience-title" name="experience-title" class="form-inputs" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="toDate">State Date:</label>
                        </td>
                        <td>
                            <input type="date" name="start_month" id="sDate" class="form-inputs" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="fromDate">End Date:</label>
                        </td>
                        <td>
                            <input type="date" name="end_month" id="eDate" class="form-inputs" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="institution">Institution:</label>
                        </td>
                        <td>
                            <input type="text" id="ins" name="institution-name" class="form-inputs" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="note">Description:</label>
                        </td>
                        <td>
                            <textarea id="description" name="description" class="form-inputs" ></textarea>
                        </td>
                    </tr>
                </table>
                <input type="submit" value="Save">
                <input type="reset" value="Reset">
            </form>
            <div class="image exp">
                <img src="../../static/imgs/experience.jpg" alt="Course">
            </div>
        </div>
    </div>
</main>