function markComplete(todoId) {
    const todoItem = document.getElementById(`todo-${todoId}`);
    
    // Add completed class to the todo item
    todoItem.classList.add('completed');
    
    // Send AJAX request to update the status in the database
    const xhr = new XMLHttpRequest();
    xhr.open("GET", `todo.php?complete=${todoId}`, true);
    xhr.send();
}