<?php
session_start();
include_once "../classes/user.php";

$user = new User;
$user_list = $user->getAllUsers($_SESSION['user_id']) ;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand">
                <h1 class="h3"> The Company</h1>
            </a>
            <div class="ms-auto">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="profile.php" class="nav-link"><?=$_SESSION['username']?></a></li>
                    <li class="nav-item"><a href="../actions/logout.php" class="nav-link text-danger">Log out</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="container" style="padding-top:80px">
            <h2 class="text-muted display-6">User List</h2>
            <table class="table table-hover">
                <thead class="table-secondary">
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="lead">
                    <?php
                        while($user_details = $user_list->fetch_assoc())
                        {
                    ?>
                        <tr>
                            <td><?=$user_details['user_id']?></td>
                            <td><?=$user_details['first_name']?></td>
                            <td><?=$user_details['last_name']?></td>
                            <td><?=$user_details['username']?></td>
                            <td>
                                <a href="edit-user.php?user_id=<?=$user_details['user_id']?>" class="btn btn-outline-warning"><i class="fas fa-pencil-alt"></i></a>
                                <a href="delete-user.php?user_id=<?=$user_details['user_id']?>" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
                            
                            </td>


                        </tr>
                    <?php
                        }
                        ?>

                    
                </tbody>
            </table>
        
    </main>

    
</body>
</html>