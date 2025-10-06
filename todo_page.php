<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FocusZen - To-Do List</title>
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

<section class="todo-box card">
    <h2>To-Do List</h2>
    <div class="input-group">
        <input type="text" id="taskInput" placeholder="New task...">
        <button id="addBtn">Add</button>
    </div>
    <ul id="taskList"></ul>
</section>

<script src="assets/js/theme.js"></script>
<script>
const taskInput = document.getElementById('taskInput');
const addBtn = document.getElementById('addBtn');
const taskList = document.getElementById('taskList');

function loadTodos(){
    fetch('todo.php')
    .then(res=>res.json())
    .then(data=>{
        taskList.innerHTML = '';
        data.forEach(todo=>{
            const li = document.createElement('li');
            li.className = todo.completed ? 'completed' : '';
            li.innerHTML = `
                <input type="checkbox" ${todo.completed? 'checked':''} onchange="toggleTodo(${todo.id}, this.checked)">
                <span>${todo.title}</span>
                <button class="delete-btn" onclick="deleteTodo(${todo.id})">Delete</button>
            `;
            taskList.appendChild(li);
        });
    });
}

function addTodo(){
    const title = taskInput.value.trim();
    if(!title) return;
    const formData = new FormData();
    formData.append('action','add');
    formData.append('title',title);
    fetch('todo.php',{method:'POST',body:formData})
    .then(()=>{taskInput.value=''; loadTodos();});
}

function toggleTodo(id,completed){
    const formData = new FormData();
    formData.append('action','toggle');
    formData.append('id',id);
    formData.append('completed',completed?1:0);
    fetch('todo.php',{method:'POST',body:formData})
    .then(()=>loadTodos());
}

function deleteTodo(id){
    const formData = new FormData();
    formData.append('action','delete');
    formData.append('id',id);
    fetch('todo.php',{method:'POST',body:formData})
    .then(()=>loadTodos());
}

addBtn.addEventListener('click',addTodo);
window.onload = loadTodos;
</script>
</body>
</html>
