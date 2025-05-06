const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');
const ball = {
  radius: 20,
  x: 0 + 10, 
  y: canvas.height / 2,
  dx: 1,
  dy: 1,
  direction: 'right' 
};

function drawBall() {
  ctx.beginPath();
  ctx.arc(ball.x, ball.y, ball.radius, 0, Math.PI * 2);
  ctx.fillStyle = 'white';

  ctx.fill();
  ctx.closePath();
}

function clearCanvas() {
  ctx.clearRect(0, 0, canvas.width, canvas.height);
}

function updateBall() {
  if (!canvas.width || !canvas.height) {
    console.warn("Ukuran canvas belum siap saat updateBall dijalankan.");
  }

  switch (ball.direction) {
    case 'right':
      ball.x += ball.dx;
      if (ball.x + ball.radius >= canvas.width) {
        ball.direction = 'down';
      }
      break;
    case 'down':
      ball.y += ball.dy;
      if (ball.y + ball.radius >= canvas.height) {
        ball.direction = 'left';
      }
      break;
    case 'left':
      ball.x -= ball.dx;
      if (ball.x + ball.radius <= 0) {
        ball.direction = 'done'; 
      }
      break;
    case 'done':
      cancelAnimationFrame(animationId);
      return;
  }
}
let animationId;

function animate() {
  clearCanvas();
  if (ball.direction !== 'done') {
    drawBall();
    updateBall();
    animationId = requestAnimationFrame(animate);
  }
}
animationId = requestAnimationFrame(animate);