const form = document.getElementById("todoForm");
const input = document.getElementById("taskInput");
const list = document.getElementById("taskList");

async function loadTasks() {
    try {
        const res = await fetch("backend/tasks.php");
        const tasks = await res.json();
        list.innerHTML = "";
        tasks.forEach(t => {
            const li = document.createElement("li");
            li.innerHTML = `
                <input type="checkbox" data-id="${t.id}" ${t.completed ? "checked" : ""}>
                <span class="${t.completed ? "done" : ""}">${t.title}</span>
                <button data-id="${t.id}">Delete</button>
            `;
            list.appendChild(li);
        });
    } catch (e) {
        list.innerHTML = "<li>Failed to load tasks</li>";
    }
}

form.addEventListener("submit", async e => {
    e.preventDefault();
    const title = input.value.trim();
    if (!title) return;

    await fetch("backend/tasks.php", {
        method: "POST",
        headers: {"Content-Type":"application/json"},
        body: JSON.stringify({title})
    });
    input.value = "";
    loadTasks();
});

list.addEventListener("change", async e => {
    if (e.target.matches("input[type='checkbox']")) {
        const id = e.target.dataset.id;
        const completed = e.target.checked ? 1 : 0;
        await fetch("backend/tasks.php", {
            method: "PUT",
            headers: {"Content-Type":"application/json"},
            body: JSON.stringify({id, completed})
        });
        loadTasks();
    }
});

list.addEventListener("click", async e => {
    if (e.target.tagName === "BUTTON") {
        const id = e.target.dataset.id;
        await fetch("backend/tasks.php", {
            method: "DELETE",
            headers: {"Content-Type":"application/json"},
            body: JSON.stringify({id})
        });
        loadTasks();
    }
});

loadTasks();
