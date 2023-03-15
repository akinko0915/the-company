<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <div class="bg-light">
        <div style="height: 100vh;">
            <div class="row h-100 m-0">
                <div class="card w-25 my-auto mx-auto">
                    <div class="card-header bg-white border-0 py-3">
                        <h1 class="text-center">Login</h1>
                    </div>
                    <div class="card-body">
                        <form action="../actions/login-action.php" method="post" autocomplete="off">
                            <input type="text" name="username" id="username" class="form-control mb-2" placeholder="USERNAME" required autofocus>
                            <input type="password" name="password" class="form-control mb-5" id="password" placeholder="PASSWORD" required></input>

                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </form>
                        <p class="text-center mt-3 small"><a href="../views/register.php">Create Account</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>