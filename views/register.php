<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Register</title>
</head>
<body>
    <div class="bg-light">
        <div style="height: 100vh;">
            <div class="row h-100 m-0">
                <div class="card w-25 my-auto mx-auto">
                    <div class="card-header bg-white border-0 py-3">
                        <h1 class="text-center">Register</h1>
                    </div>
                    <div class="card-body">
                        <form action="../actions/register-action.php" method="post" auto
                        ="off">
                            <div class="mb-3">
                                <label for="first-name" class="form-label">First Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" required autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="last-name" class="form-label">Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" required>
                            </div>

                            <!-- Bold for emphasis -->
                            <div class="mb-3">
                                <label for="username" class="form-label fw-bold">Username</label>
                                <input type="text" name="username" id="username" class="form-control fw-bold" required>
                            </div>
                            <div class="mb-5">
                                <label for="password" class="form-label fw-bold">Password</label>
                                <input type="password" name="password" id="password" class="form-control fw-bold" minlength="8" aria-describedby="password-info" required>
                                <div class="form-text" id="password-info">
                                    Password must be at least 8 characters long.
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success w-100" name="btn_register">Register</button>
                        </form>
                        <p class="text-center mt-3 small">Registered Already? <a href="../views">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>