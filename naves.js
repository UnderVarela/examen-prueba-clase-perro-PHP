const canvas = document.querySelector('canvas');
const ctx = canvas.getContext('2d');

let x = canvas.width / 2;
let y = canvas.height / 2;
let dx = 2;
let dy = -2;
let score = 0;
let ballRadius = 10;
let ballColor = "#0095DD";
let speed = 1;

canvas.addEventListener('mousedown', function(event) {
  const rect = canvas.getBoundingClientRect();
  const mouseX = event.clientX - rect.left;
  const mouseY = event.clientY - rect.top;
  if (mouseX >= x - ballRadius && mouseX <= x + ballRadius && mouseY >= y - ballRadius && mouseY <= y + ballRadius) {
    score++;
    ballRadius = 20;
    ballColor = "red";
    setTimeout(function() {
      ballRadius = 10;
      ballColor = "#0095DD";
      x = Math.random() * canvas.width;
      y = Math.random() * canvas.height;
      speed += 0.2;
    }, 500);
  }
});

function drawBall() {
  ctx.beginPath();
  ctx.arc(x, y, ballRadius, 0, Math.PI*2);
  ctx.fillStyle = ballColor;
  ctx.fill();
  ctx.closePath();
}

function drawScore() {
  ctx.font = "16px Arial";
  ctx.fillStyle = "#0095DD";
  ctx.fillText("Aciertos: " + score, 8, 20);
}

function draw() {
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  drawScore();
  drawBall();
  x += dx * speed;
  y += dy * speed;
  if(x + dx > canvas.width-ballRadius || x + dx < ballRadius) {
    dx = -dx;
  }
  if(y + dy > canvas.height-ballRadius || y + dy < ballRadius) {
    dy = -dy;
  }
}

setInterval(draw, 10);
