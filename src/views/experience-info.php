<?php
include("../components/navbar.php");
?>

<link rel="stylesheet" href="../css/experience_info.css" />

<div class="experience-container">
    <h1 class="experience-title">All Experiences Information</h1>

    <?php
    require_once realpath(__DIR__ . '/../../vendor/autoload.php');
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
    $dotenv->load();

    $db = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE']) or die("Unable to connect to database");
    $query = "SELECT * FROM experience_info";
    $result = $db->query($query);
    $experiences = $result->fetch_all(MYSQLI_ASSOC);

    foreach ($experiences as $experience) {
        echo "<div class='experience-info-container'>";
            echo "<span class='job_title'>" . $experience['title'] . "</span>";
            echo "<span class='place_of_training'>" . $experience['institution'] . "</span>";
            echo ' / ';
            echo "<span class='experience_category' >" . $experience['category'] . "</span>";
            echo "<br />";
            echo "<span class='date'>from " . $experience['start_date'] . " to " . $experience['end_date'] . "</span>";

            echo "<p class='description' >" . $experience['description'] . "</p>";
        echo "</div>";
    }
    ?>

</div>