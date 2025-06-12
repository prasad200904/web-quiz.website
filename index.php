<?php
session_start();
include 'config.php';
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
  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
</head>
<body class="bg-black">
<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-black">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
        <img src="img/logo.png" alt="Logo" height="80" width="80">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <?php if (!$isLoggedIn): ?>
            <li class="nav-item">
              <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#registerModal">
                <i class="bi bi-person-fill"></i> Sign Up
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">
                <i class="bi bi-box-arrow-in-right"></i> Login
              </a>
            </li>
          <?php else: ?>
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
  <img src="img/web1.jpg" class="w-100 responsive-banner-img" alt="Banner Image">
</div>

<div id="overlay" onclick="off()">
  <div class="overlay-content" onclick="event.stopPropagation()">
    <h2>📝 Web Development Test – Marks & Scoring System</h2>
    <ul>
      <li>The test contains <strong>10 questions</strong> with a total of <strong>10 marks</strong>.</li>
      <li>It is a single section covering general web development concepts.</li>
      <li>Each question carries <strong>1 mark</strong>.</li>
      <li>✅ Correct answers receive full marks.</li>
      <li>❌ No negative marking for wrong answers.</li>
      <li>🔁 Unanswered questions receive 0 marks.</li>
      <li>🧲 Final score is based on the number of correct answers (max 10).</li>
    </ul>
    <div class="foot">
      <?php if ($isLoggedIn): ?>
        <a href="dashboard/dashboard.php"><button class="btn-my">GAME ON</button></a>
      <?php else: ?>
        <button class="btn-my" data-bs-toggle="modal" data-bs-target="#loginModal">GAME ON</button>
      <?php endif; ?>
    </div>
  </div>
</div>

<br><br>

<div class="container text-center my-4">
  <button type="button" class="my-btn" onclick="on()">MISSION START</button>
</div>

<!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registerModalLabel">Register</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form action="register.php" method="POST">
        <div class="modal-body">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
        </div>
        <div class="modal-footer d-flex gap-2 col-12 mx-auto">
          <button type="submit" class="btn btn-dark">Register</button>
          <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login to Your Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form action="login.php" method="POST">
        <div class="modal-body">
          <div class="mb-3">
            <label for="emailLogin" class="form-label">Email address</label>
            <input type="email" class="form-control" id="emailLogin" name="email" required autocomplete="email">
          </div>
          <div class="mb-3">
            <label for="passwordLogin" class="form-label">Password</label>
            <input type="password" class="form-control" id="passwordLogin" name="password" required autocomplete="current-password">
          </div>
        </div>
        <div class="modal-footer d-grid gap-2">
          <button type="submit" class="btn btn-dark">Login</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
