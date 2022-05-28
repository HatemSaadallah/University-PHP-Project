<?php
    include("src/components/navbar.php");
?>

<link rel="stylesheet" href="../css/personal_info.css">


<?php

    use App\Enums\PersonalInformation;
    require_once realpath(__DIR__ . '/../../vendor/autoload.php');
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
    $dotenv->load();

    $db = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE']) or die("Unable to connect to database");

    $user_id = 1;
    $query = "SELECT * FROM users WHERE id = '$user_id'";
    $result = $db->query($query);
    $users = $result->fetch_assoc();

    // $first_name = $row['first_name'];
    // $middle_name = $row['middle_name'];
    // $last_name = $row['last_name'];
    // $gender = $row['gender'];
    // $nationality = $row['nationality'];
    // $place_of_birth = $row['place_of_birth'];
    // $job_title = $row['job_title'];
    // $years_of_experience = $row['years_of_experience'];
?>

<div class="container">
    <h1 class="title">Personal Information</h1>

    <table>
        <?php 
            // Loop throw the enum and print the values
            $users['years_of_experience'] = $users['years_of_experience'] == null ? 'No Experience' : $users['years_of_experience'] . ' Years';
            foreach (PersonalInformation::getConstants() as $key => $value) {
                echo "<tr>";
                echo "<td>".$key."</td>";
                echo "<td>".$users[$value]."</td>";
                echo "</tr>";
            }
        ?>
    </table>
    <!-- <?php
        $image_url = $users[0]['personal_image_url'];
        echo "<img src='$image_url' alt='' srcset='' >"
        // echo PersonalInformation::personalImageUrl;
    ?> -->
</div>

