<?php
session_start();
include_once "../classes/user.php";
$user = new User;

$user_details = $user->getUser($_GET['user_id']);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>Edit User</title>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand">
                <h1 class="h3">The Company</h1>
            </a>
            <div class="ms-auto">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="profile.php" class="nav-link"><?=$_SESSION['username']?></a></li>
                    <li class="nav-item"><a href="../actions/logout.php" class="nav-link text-danger">Log out</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div style="height:100vh" class="bg-light">
        <div class="row h-100 m-0">
            <div class="card">
                <div class="card-header bg-white border-0">
                    <h1 class="text-center">Edit User</h1>
                </div>
                <div class="card-body">
                    <form action="../actions/edit-user.php" method="post">
                        <input type="hidden" name="user_id" value="<?=$user_details['user_id']?>" >

                        <label for="first-name" class="form-label"> First Name</label>
                        <input type="text" name="first_name" id="first-name" class="form-control mb-2" value="<?=$user_details['first_name']?>" required autofocus>
 
                        <label for="last-name" class="form-label" > Last Name</label>
                        <input type="text" name="last_name" id="last-name" class="form-control mb-2" value="<?=$user_details['last_name']?>" required>

                        <label for="username" class="form-label"> Username</label>
                        <input type="text" name="username" id="username" class="form-control mb-2 fw-bold" value="<?=$user_details['username']?>" maxlength="15" required>


                        <button type="submit" class="btn btn-primary w-100">SAVE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>