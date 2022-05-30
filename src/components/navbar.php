<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link href="../css/navbar.css" rel="stylesheet">

<?php
  // Get link 
  $link = $_SERVER['REQUEST_URI'];
  $link = explode('/', $link);
  $link = end($link);
  $link = explode('.', $link);
  $link = $link[0];
?>
<nav class="navbar navbar-expand-lg navbar-light ">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item" >
          <a class=<?php if ($link == 'home') { echo '"nav-link active color-white"'; } else { echo '"nav-link active"'; } ?> href="/">Personal Information</a>
        </li>
        <li class="nav-item">
          <a class=<?php if ($link == 'courses-info') { echo '"nav-link active color-white"'; } else { echo '"nav-link active"'; } ?> href="courses-info.php">Course Information</a>
        </li>
        <li class="nav-item">
          <a class=<?php if ($link == 'experience-info') { echo '"nav-link active color-white"'; } else { echo '"nav-link active"'; } ?> href="experience-info.php">Experience Information</a>
        </li>
        <li class="nav-item">
          <a class=<?php if ($link == 'add-course') { echo '"nav-link active color-white"'; } else { echo '"nav-link active"'; } ?>   href="add-course.php">Add Course</a>
        </li>
        <li class="nav-item">
          <a class=<?php if ($link == 'add-experience') { echo '"nav-link active color-white"'; } else { echo '"nav-link active"'; } ?> href="add-experience.php">Add Experience</a>
        </li>
      </ul>
    </div>
  </div>
</nav>