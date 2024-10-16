<?php
$query = "SELECT * FROM tasks WHERE user_id = :user_id";
$stmt = $pdo->prepare($query);
$user_id = $_SESSION['user_id'];
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
route_protected();

?>

<div class="container mt-4">
    <!-- Success messages -->
    <?php if(isset($_SESSION['success_delete_task'])):?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['success_delete_task']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif?>
    <?php if(isset( $_SESSION['errors']['no_task_found'])):?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['errors']['no_task_found']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif?>
    
    <?php if(isset($_SESSION['update_task'])):?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['update_task']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif?>

    <div class="row">
        <?php $i = 1; foreach($tasks as $row) : ?>
            <div class="col-md-4 mb-4"> <!-- 3 cards per row for medium screens -->
                <div class="card h-100 shadow-sm border-0 rounded">
                    <div class="card-body d-flex flex-column">
                        <!-- Task Title with Number -->
                        <h5 class="card-title mb-3">
                            <span class="badge bg-primary me-2"><?php echo $i++; ?></span> <!-- Task number as badge -->
                            <?php echo htmlspecialchars($row["name"]); ?>
                        </h5>
                        <!-- Task Description -->
                        <p class="card-text mb-4 text-muted">
                            <?php echo htmlspecialchars($row["description"]); ?>
                        </p>
                        <!-- Due Date -->
                        <p class="card-text mb-4">
                            <small class="text-muted">
                                <i class="bi bi-calendar-event"></i> <!-- Icon for better UX -->
                                Due Date: <?php echo htmlspecialchars($row["due_date"]); ?>
                            </small>
                        </p>
                       
                        <div class="mt-auto d-flex justify-content-between">
                            
                            <a href="../controllers/update_task.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                            <p class="mb-2">
                            <?php if ($row["status"] == 'pending'): ?>
                                <span class="badge bg-warning">Pending</span>
                            <?php elseif ($row["status"] == 'in-progress'): ?>
                                <span class="badge bg-info">In Progress</span>
                            <?php elseif ($row["status"] == 'completed'): ?>
                                <span class="badge bg-success">Completed</span>
                            <?php endif; ?>
                        </p>
                            <a href="../controllers/delete_task.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this task?');">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Clean up session variables after displaying messages -->
<?php
if (isset($_SESSION['success_delete_task'])){
    unset($_SESSION['success_delete_task']);
}
if (isset($_SESSION['update_task'])){
    unset($_SESSION['update_task']);
}
if (isset( $_SESSION['errors']['no_task_found'])){
   
    unset($_SESSION['errors']['no_task_found']);
}
?>

<!-- Include Bootstrap JS and Popper.js for functionality -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
