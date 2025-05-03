const canvas = document.getElementById('stopwatch');
const ctx = canvas.getContext('2d');
const startBtn = document.getElementById('start');
const stopBtn = document.getElementById('stop');
const resetBtn = document.getElementById('reset');

let milliseconds = 0;
let seconds = 0;
let isRunning = false;
let lastTime = 0;
let animationId;

function formatTime(time, length) {
    return time.toString().padStart(length, '0');
}

function draw() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    
    ctx.font = '70px Arial';
    ctx.textAlign = 'center';
    ctx.textBaseline = 'center';
    
    ctx.fillStyle = '#00c507';
    ctx.fillText(formatTime(seconds, 3), canvas.width/2 - 75, canvas.height/2);
    
    ctx.fillStyle = 'black';
    ctx.fillText(':', canvas.width/2, canvas.height/2);
    
    ctx.fillStyle = '#f51c1c';
    ctx.fillText(formatTime(milliseconds, 2), canvas.width/2 + 55, canvas.height/2);
}

function update(timestamp) {
    if (!lastTime) lastTime = timestamp;
    const delta = timestamp - lastTime;
    
    if (delta >= 10) { 
        milliseconds++;
        
        if (milliseconds >= 100) {
            milliseconds = 0;
            seconds++;
        }
        
        draw();
        lastTime = timestamp;
    }
    
    if (isRunning) {
        animationId = requestAnimationFrame(update);
    }
}

startBtn.addEventListener('click', () => {
    if (!isRunning) {
        isRunning = true;
        lastTime = 0;
        animationId = requestAnimationFrame(update);
    }
});

stopBtn.addEventListener('click', () => {
    isRunning = false;
    cancelAnimationFrame(animationId);
});

resetBtn.addEventListener('click', () => {
    isRunning = false;
    cancelAnimationFrame(animationId);
    milliseconds = 0;
    seconds = 0;
    draw();
});

draw();