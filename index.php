<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FocusZen - Home</title>
<link rel="stylesheet" href="assets/css/style.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body class="light">

<!-- Header / Navigation -->
<header>
    <div class="logo">
         <img src="assets/images/logo.png" alt="FocusZen Logo">
        <span>FocusZen</span>
    </div>
    <nav>
        <a href="index.php">Home</a>
        <a href="pomodoro.php">Pomodoro</a>
        <a href="sounds.php">Ambient Sounds</a>
        <a href="todo_page.php">To-Do List</a>
    </nav>
    <button id="themeToggle">🌙</button>
</header>

<!-- Hero / Quote Section -->
<section class="quote-box card">
    <p id="quoteText">Loading quote...</p>
    <small id="quoteAuthor"></small>
</section>

<!-- Features Section -->
<section class="features-box">
    <h2 style="text-align:center; margin-top:40px;">Explore FocusZen Features</h2>
    <div class="feature-cards">
        <div class="feature-card card">
            <h3>Pomodoro Timer ⏱</h3>
            <p>Boost your productivity with a 25/5 minute timer. Start, pause, or reset anytime.</p>
            <a href="pomodoro.php" class="btn-link">Try Now</a>
        </div>

        <div class="feature-card card">
            <h3>Ambient Sounds 🎵</h3>
            <p>Focus with calming sounds like Rain, Forest, Fireplace, Water, and Wind. Play/pause easily.</p>
            <a href="sounds.php" class="btn-link">Explore Sounds</a>
        </div>

        <div class="feature-card card">
            <h3>To-Do List 📝</h3>
            <p>Organize your tasks, mark them complete, or delete. Supports dynamic updates and persistence.</p>
            <a href="todo_page.php" class="btn-link">Manage Tasks</a>
        </div>

        <div class="feature-card card">
            <h3>Dark / Light Mode 🌗</h3>
            <p>Toggle between dark and light themes for comfortable browsing anytime.</p>
        </div>
    </div>
</section>

<script src="assets/js/theme.js"></script>
<script src="assets/js/quote.js"></script>
</body>
</html>
