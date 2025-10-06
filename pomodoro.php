<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pomodoro Timer - FocusZen</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="light">

<header>
    <h1>FocusZen</h1>
    <nav>
        <a href="index.php">Home</a>
        <a href="pomodoro.php">Pomodoro</a>
        <a href="sounds.php">Ambient Sounds</a>
        <a href="todo_page.php">To-Do List</a>
    </nav>
    <button id="themeToggle">🌙</button>
</header>

<section class="timer-box card">
    <h2>Pomodoro Timer</h2>
    <div id="time">25:00</div>
    <div class="controls">
        <button id="startBtn">Start</button>
        <button id="pauseBtn">Pause</button>
        <button id="resetBtn">Reset</button>
    </div>
</section>

<script src="assets/js/theme.js"></script>
<script>
let timeDisplay = document.getElementById('time');
let startBtn = document.getElementById('startBtn');
let pauseBtn = document.getElementById('pauseBtn');
let resetBtn = document.getElementById('resetBtn');

let totalSeconds = 25 * 60;
let interval = null;

function updateTime(){
    let minutes = Math.floor(totalSeconds/60);
    let seconds = totalSeconds % 60;
    timeDisplay.textContent = `${minutes.toString().padStart(2,'0')}:${seconds.toString().padStart(2,'0')}`;
}

function startTimer(){
    if(interval) return;
    interval = setInterval(()=>{
        if(totalSeconds <= 0){
            clearInterval(interval);
            interval = null;
            alert("Pomodoro Completed! Take a break.");
            totalSeconds = 25*60;
            updateTime();
        } else {
            totalSeconds--;
            updateTime();
        }
    },1000);
}

function pauseTimer(){
    clearInterval(interval);
    interval = null;
}

function resetTimer(){
    clearInterval(interval);
    interval = null;
    totalSeconds = 25*60;
    updateTime();
}

startBtn.addEventListener('click', startTimer);
pauseBtn.addEventListener('click', pauseTimer);
resetBtn.addEventListener('click', resetTimer);

updateTime();
</script>

</body>
</html>
