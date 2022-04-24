<link rel="stylesheet" href="../css/personal_info.css">


<?php
    
    require 'vendor/autoload.php';

    use App\SQLiteConnection;

    $pdo = (new SQLiteConnection())->connect();
    // if ($pdo != null)
    //     echo 'Connected to the SQLite database successfully!';
    // else
    //     echo 'Whoops, could not connect to the SQLite database!';
    use App\Enums\PersonalInformation;
?>

<div class="container">
    <h1 class="title">Personal Information</h1>

    <table>
        <?php 
            // Loop throw the enum and print the values
            foreach (PersonalInformation::getConstants() as $key => $value) {
                echo "<tr>";
                echo "<td>$key</td>";
                echo "<td>$value</td>";
                echo "</tr>";
            }
        ?>
    </table>
    <?php
        $image_url = PersonalInformation::personalImageUrl;
        echo "<img src='$image_url' alt='' srcset='' >"
        // echo PersonalInformation::personalImageUrl;
    ?>
</div>

