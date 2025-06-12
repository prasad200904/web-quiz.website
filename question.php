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

  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
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
  <img src="img/web1.jpg" class="w-100 responsive-banner-img" alt="Banner Image">
</div>
<br>
</div>      
<div id="scrollOverlay" class="scroll-overlay">
  <div class="scroll-content" onclick="event.stopPropagation()">
     <h2 class="text-center mb-4">📝 Web Development Quiz</h2>

    <form id="quizForm" onsubmit="submitQuiz(event)">
      <div class="question-box mb-4" data-qid="1">
        <p>1. What does HTML stand for?</p>
        <div><label><input type="radio" name="q1" value="A"> A. Hyper Text Markup Language</label></div>
        <div><label><input type="radio" name="q1" value="B"> B. Home Tool Markup Language</label></div>
        <div><label><input type="radio" name="q1" value="C"> C. Hyperlinks and Text Markup Language</label></div>
        <div><label><input type="radio" name="q1" value="D"> D. None of the above</label></div>
      </div>

      <div class="question-box mb-4" data-qid="2">
        <p>2. What is the correct CSS syntax to change the background color?</p>
        <div><label><input type="radio" name="q2" value="A"> A. background-color: red;</label></div>
        <div><label><input type="radio" name="q2" value="B"> B. color-background: red;</label></div>
        <div><label><input type="radio" name="q2" value="C"> C. bg-color: red;</label></div>
        <div><label><input type="radio" name="q2" value="D"> D. backgroundColor: red;</label></div>
      </div>
         <div class="question-box" data-qid="3">
          <p>3. What is the correct HTML element for inserting a line break?</p>
          <input type="radio" name="q3" value="a"> &lt;lb&gt;<br>
          <input type="radio" name="q3" value="b"> &lt;br&gt;<br>
          <input type="radio" name="q3" value="c"> &lt;break&gt;<br>
        </div>

        <div class="question-box" data-qid="4">
          <p>4. Inside which HTML element do we put the JavaScript?</p>
          <input type="radio" name="q4" value="a"> &lt;js&gt;<br>
          <input type="radio" name="q4" value="b"> &lt;script&gt;<br>
          <input type="radio" name="q4" value="c"> &lt;javascript&gt;<br>
        </div>

        <div class="question-box" data-qid="5">
          <p>5. Which is the correct CSS syntax?</p>
          <input type="radio" name="q5" value="a"> body:color=black;<br>
          <input type="radio" name="q5" value="b"> {body;color:black;}<br>
          <input type="radio" name="q5" value="c"> body { color: black; }<br>
        </div>

        <div class="question-box" data-qid="6">
          <p>6. How do you write "Hello World" in an alert box?</p>
          <input type="radio" name="q6" value="a"> msg("Hello World");<br>
          <input type="radio" name="q6" value="b"> alertBox("Hello World");<br>
          <input type="radio" name="q6" value="c"> alert("Hello World");<br>
        </div>

        <div class="question-box" data-qid="7">
          <p>7. Which HTML attribute is used to define inline styles?</p>
          <input type="radio" name="q7" value="a"> style<br>
          <input type="radio" name="q7" value="b"> class<br>
          <input type="radio" name="q7" value="c"> font<br>
        </div>

        <div class="question-box" data-qid="8">
          <p>8. Which is the correct way to comment in CSS?</p>
          <input type="radio" name="q8" value="a"> // comment<br>
          <input type="radio" name="q8" value="b"> # comment<br>
          <input type="radio" name="q8" value="c"> /* comment */<br>
        </div>

        <div class="question-box" data-qid="9">
          <p>9. What does DOM stand for?</p>
          <input type="radio" name="q9" value="a"> Document Object Model<br>
          <input type="radio" name="q9" value="b"> Data Object Management<br>
          <input type="radio" name="q9" value="c"> Digital Ordinance Model<br>
        </div>

        <div class="question-box" data-qid="10">
          <p>10. Which event occurs when the user clicks on an HTML element?</p>
          <input type="radio" name="q10" value="a"> onmouseclick<br>
          <input type="radio" name="q10" value="b"> onclick<br>
          <input type="radio" name="q10" value="c"> onchange<br>
        </div>

    <div class="text-center mt-3">
      <button class="btn btn-success" onclick="submitQuiz()">Submit</button>
      <button class="btn btn-danger" type="submit" onclick="closeScrollOverlay()">Close</button>

    </div>
    </form>        
  </div>
</div>
<div id="scoreOverlay" style="display: none; position: fixed; top: 0; left: 0; 
  width: 100%; height: 100%; background-color: rgba(0,0,0,0.8); 
  color: #5dd62c; text-align: center; padding-top: 100px; z-index: 9999;  justify-content: center;
  align-items: center;">
  <div style=" padding: 20px; border-radius: 10px; display: inline-block;">
    <h2 id="scoreText"></h2>
    <button onclick="closeScoreOverlay()" class="btn mt-3 my-home">Home</button>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/script.js"></script>
</body>
</html>
