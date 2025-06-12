window.addEventListener('DOMContentLoaded', () => {
  if (!isLoggedIn) {
    const myModal = new bootstrap.Modal(document.getElementById('registerModal'));
    myModal.show();
  } else {
    const quizOverlay = document.getElementById('quizOverlay');
    if (quizOverlay) quizOverlay.style.display = 'flex';
  }
});

function on() {
  document.getElementById("overlay").style.display = "flex";
}

function off() {
  document.getElementById("overlay").style.display = "none";
}

function goDashboard() {
  if (isLoggedIn === true || isLoggedIn === 'true') {
    window.location.href = "dashboard/dashboard.php";
  } else {
    const loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
    loginModal.show();
  }
}

function showQuizOverlay() {
  document.getElementById("quizOverlay").style.display = "flex";
}

function closeOverlay() {
  document.getElementById("quizOverlay").style.display = "none";
  window.location.href = "../index.php";
}

function startQuiz() {
  window.location.href = "../question.php";
}

 window.addEventListener('DOMContentLoaded', () => {
    document.getElementById('scrollOverlay').style.display = 'flex';
    document.body.style.overflow = 'hidden'; // Prevent background scrolling
  });
function closeScrollOverlay() {
  document.getElementById("scrollOverlay").style.display = "none";
  window.location.href = "dashboard/dashboard.php";
}

function closeScoreOverlay() {
  document.getElementById("scoreOverlay").style.display = "flex";
  window.location.href = "index.php";
}

function submitQuiz(event) {
  event.preventDefault();

  const answers = {
    q1: "A",
    q2: "A",
    q3: "b",
    q4: "b",
    q5: "c",
    q6: "c",
    q7: "a",
    q8: "c",
    q9: "a",
    q10: "b"
  };

  let score = 0;
  const total = Object.keys(answers).length;

  for (let q in answers) {
    const selected = document.querySelector(`input[name="${q}"]:checked`);
    if (selected && selected.value.toLowerCase() === answers[q].toLowerCase()) {
      score++;
    }
  }

  fetch("submit_score.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: `score=${score}&total=${total}`,
  })
    .then(response => response.json())
    .then(data => {
      if (data.status === "success") {
        console.log("Score saved to DB");
      } else {
        console.log("Failed to save score");
      }
    })
    .catch(error => {
      console.error("Error saving score:", error);
    });

  document.getElementById("scrollOverlay").style.display = "none";
  document.getElementById("scoreOverlay").style.display = "flex";
  document.getElementById("scoreText").textContent = `🎉 You scored ${score} out of ${total}!`;
}
