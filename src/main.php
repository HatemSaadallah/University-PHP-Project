<?php
    include("components/navbar.php");
?>

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    


    <link rel="stylesheet" href="src/css/personal_info.css">
</head>

<h1>Personal Information</h1>

<?php
    
    require 'vendor/autoload.php';

    use App\SQLiteConnection;

    $pdo = (new SQLiteConnection())->connect();
    if ($pdo != null)
        echo 'Connected to the SQLite database successfully!';
    else
        echo 'Whoops, could not connect to the SQLite database!';
?>