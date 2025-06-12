<?php
session_start();
$isLoggedIn = isset($_SESSION['user']);
$username = $isLoggedIn ? $_SESSION['user'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>WEB-DEV</title>

  <script>
     const isLoggedIn = <?php echo $isLoggedIn ? 'true' : 'false'; ?>;
    const username = <?php echo json_encode($username); ?>;
  </script>

  <link rel="stylesheet" href="../css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
</head>
<body class="bg-black">

<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-black">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
        <img src="../img/logo.png" alt="Logo" height="80" width="80">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <?php if ($isLoggedIn): ?>
          <li class="nav-item">
              <span class="nav-link text-white">👋 Welcome, <?php echo htmlspecialchars($username); ?></span>
            </li>
            <li class="nav-item">
              <a class="nav-link text-danger" href="logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
</header>

<div class="container-fluid my-img">
  <img src="../img/web1.jpg" class="w-100 responsive-banner-img" alt="Banner Image">
</div>
<br>
<div id="quizOverlay" class="quiz-overlay">
  <div class="quiz-box" onclick="event.stopPropagation()">
    <h2 class="text-center">Start Your Game</h2>
    <p class="text-center">Answer all the questions to test your Web Dev skills!</p>
    <div class="text-center">
      <button class="btn btn-success" onclick="startQuiz()">START</button>
      <button class="btn btn-danger" onclick="closeOverlay()">CLOSE</button>
    </div>
    </div>
</div>      

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="../js/script.js"></script>
</body>
</html>
