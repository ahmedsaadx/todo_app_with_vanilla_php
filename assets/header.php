<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Todo App</title>
</head>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto"> <!-- Left-aligned items -->
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index?page=list_task">Tasks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index?page=create_task">Create Task</a>
                </li>
            </ul>
            <ul class="navbar-nav"> <!-- Right-aligned items -->
                <li class="nav-item">
                    <a class="nav-link" href="index?page=login">Login</a> <!-- Link to Login page -->
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index?page=signup">Signup</a> <!-- Link to Signup page -->
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Your content here -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> <!-- Bootstrap JS -->

