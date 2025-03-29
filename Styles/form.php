<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technical Tasks Library</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">

    <h1 class="text-center mb-4">Technical Tasks Library</h1>

    <form action="Create_tasks.php" method="post">
       
        <div class="mb-3">
            <label for="taskDescription" class="form-label">Task Description</label>
            <textarea id="taskDescription" class="form-control" rows="3" placeholder="Describe the task..."></textarea>
        </div>

       
        <div class="mb-3">
            <label class="form-label">Difficulty Level</label>
            <select class="form-select">
                <option value="easy">Easy</option>
                <option value="medium">Medium</option>
                <option value="hard">Hard</option>
            </select>
        </div>

       
        <div class="mb-3">
            <label for="requirements" class="form-label">Requirements</label>
            <input type="text" id="requirements" class="form-control" placeholder="Enter task requirements">
        </div>

     
        <div class="mb-3">
            <label class="form-label">Required Knowledge Guide</label>
            <ul class="list-group">
                <li class="list-group-item">Topics: <input type="text" class="form-control"></li>
                <li class="list-group-item">Sources: <input type="text" class="form-control"></li>
                <li class="list-group-item">Books: <input type="text" class="form-control"></li>
                <li class="list-group-item">Videos: <input type="text" class="form-control"></li>
                <li class="list-group-item">Tutorials: <input type="text" class="form-control"></li>
            </ul>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Completion Status</label>
            <select id="status" class="form-select">
                <option value="not_started">Not Started</option>
                <option value="in_progress">In Progress</option>
                <option value="completed">Completed</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="solution" class="form-label">Solutions</label>
            <textarea id="solution" class="form-control" rows="2" placeholder="Provide possible solutions..."></textarea>
        </div>

      
        <div class="mb-3">
            <label for="timeLimit" class="form-label">Time Limit (in hours)</label>
            <input type="number" id="timeLimit" class="form-control" min="1" placeholder="e.g., 2 hours">
        </div>

       
        <div class="mb-3">
            <label for="customSolution" class="form-label">Add Custom Solution</label>
            <textarea id="customSolution" class="form-control" rows="2" placeholder="Suggest your own solution..."></textarea>
        </div>

       
        <div class="mb-3">
            <label for="relatedTasks" class="form-label">Related Tasks</label>
            <input type="text" id="relatedTasks" class="form-control" placeholder="Enter related task names">
        </div>

        <button type="submit" class="btn btn-primary">Submit Task</button>
    </form>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
