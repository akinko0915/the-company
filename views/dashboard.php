<?php
    //In order for us to use the session varibles
    //we need to start the session
    session_start();

    if(!isset($_SESSION['id'])){
        // echo "You are not allowed to access this page. Please login.";
        header("location: ../views");  //login page --> index.php
    }

    require "../classes/User.php";

    #Instantiate an object
    $user = new User;

    #Call the getAllUsers method
    $all_users= $user->getAllUsers();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Dashboard</title>
</head>
<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark" style="margin-buttom: 80px;">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand">
                <h1 class="h3">The Company</h1>
            </a>
            <div class="navbar-nav">
                <span class="navbar-text"><?= $_SESSION['fullname']?></span>
                <form action="../actions/logout-action.php" method="post" class="d-flex ms-2">
                    <button type="submit" class="text-danger bg-transparent border-0">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Start of main content -->
    <main class="row justify-content-center gx-0">
        <div class="col-6">
            <h2 class="text-center">User List</h2>

            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>ID</th>
                        <th>FIRSTNAME</th>
                        <th>LASTNAME</th>
                        <th>USERNAME</th>
                        <th></th>
                    </tr>  
                </thead>
                <tbody>
                    <?php
                    while ($user =  $all_users->fetch_assoc()){
                    ?>
                        <tr>
                            <td>
                                <?php
                                    if($user['photo']){
                                ?>
                                    <img src="../assets/images/<?=$user['photo'] ?>" alt="<?=$user['photo'] ?>" class="d-block mx-auto dashboard-photo">
                                <?php
                                    } else {
                                ?>

                                    <i class="fa-solid fa-user text-secondary d-block text-center dashboard-icon"></i>

                                <?php
                                    }
                                ?>
                            </td>
                            <td><?=$user['id']?></td>
                            <td><?=$user['first_name']?></td>
                            <td><?=$user['last_name']?></td>
                            <td><?=$user['username']?></td>
                            <td>
                                <!--Show the action button only to the user who is logged-in  -->
                                <?php
                                    if($_SESSION['id'] == $user['id']){
                                ?>

                                    <a href="edit-user.php" class="btn btn-outline-warning" title="Edit">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    <a href="delete-user.php" class="btn btn-outline-danger" title="Delete">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>

                                <?php
                                    }
                                ?>
                            </td>
                        </tr>
                    
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </main>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>