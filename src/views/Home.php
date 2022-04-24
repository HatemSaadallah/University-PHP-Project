<link rel="stylesheet" href="../css/personal_info.css">


<?php
 

    require 'vendor/autoload.php';

    use App\SQLiteConnection;

    $pdo = (new SQLiteConnection())->connect();
    $pdo->exec("select * from users");

    $stmt = $pdo->prepare("select * from users where id=1");
    $stmt->execute();
    $users = $stmt->fetchAll();
    $stmt->closeCursor();
    // print_r($users[0]);
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
            $users[0]['years_of_experience'] = $users[0]['years_of_experience'] == null ? 'No Experience' : $users[0]['years_of_experience'] . ' Years';
            foreach (PersonalInformation::getConstants() as $key => $value) {
                echo "<tr>";
                echo "<td>".$key."</td>";
                echo "<td>".$users[0][$value]."</td>";
                echo "</tr>";
            }
            // foreach ($users[0] as $key => $value) {
            //     $num++;
            //     // if($num % 2 == 0) continue;
            //     echo "<tr>";
            //     echo "<td>$key</td>";
            //     echo "<td>$value</td>";
            //     echo "</tr>";
            // }
        ?>
    </table>
    <?php
        $image_url = $users[0]['personal_image_url'];
        echo "<img src='$image_url' alt='' srcset='' >"
        // echo PersonalInformation::personalImageUrl;
    ?>
</div>

