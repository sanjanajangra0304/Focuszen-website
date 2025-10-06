let timer;
let isPaused = true;
let timeLeft = 25 * 60; // 25 minutes

const timeDisplay = document.getElementById("time");
const startBtn = document.getElementById("startBtn");
const pauseBtn = document.getElementById("pauseBtn");
const resetBtn = document.getElementById("resetBtn");

function updateDisplay() {
    const minutes = String(Math.floor(timeLeft / 60)).padStart(2, "0");
    const seconds = String(timeLeft % 60).padStart(2, "0");
    timeDisplay.textContent = `${minutes}:${seconds}`;
}

startBtn.addEventListener("click", () => {
    if (isPaused) {
        isPaused = false;
        timer = setInterval(() => {
            if (timeLeft > 0) {
                timeLeft--;
                updateDisplay();
            } else {
                clearInterval(timer);
                alert("Session Complete! Time for a 5-minute break.");
                timeLeft = 5 * 60;
                updateDisplay();
            }
        }, 1000);
    }
});

pauseBtn.addEventListener("click", () => {
    isPaused = true;
    clearInterval(timer);
});

resetBtn.addEventListener("click", () => {
    isPaused = true;
    clearInterval(timer);
    timeLeft = 25 * 60;
    updateDisplay();
});

updateDisplay();
