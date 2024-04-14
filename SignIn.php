<?php

include("connection.php");

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    
    $query = "SELECT * FROM account WHERE email='$email' AND password='$password'";
    $result = mysqli_query($connection, $query);
    
    if (mysqli_num_rows($result) == 1) {
        header('Location: /MaryRoseAquino/Index.php');
        exit();
    } else if (mysqli_num_rows($result) == 0) {
        echo '<p class="text-danger">Incorrect email or password.</p>';
        exit();
    }
    
    mysqli_close($connection);
}

?>

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body style="background-color: #777777;">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="/MaryRoseAquino/Landingpage.php" class="navbar-brand fw-bold ms-4" style="font-family: Garamond, serif;">The Blog</a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto me-3">
                    <a href="/MaryRoseAquino/Landingpage.php" class="nav-item nav-link active fw-bold mx-2">BLOG</a>
                    <a href="/MaryRoseAquino/AboutOutside.php" class="nav-item nav-link active fw-bold mx-2">WHO WE ARE</a>
                    <a href="/MaryRoseAquino/ContactMeOutside.php" class="nav-item nav-link active fw-bold mx-2">GET IN TOUCH</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="card mt-5 mx-auto" style="width: 400px;">
            <div class="card-body" style="font-family: 'Helvetica';">
                <p class="mt-3 text-center"><i class="bi bi-pencil-square"></i></p>
                <p class="text-center fw-bold">Log in to The Blog</p>

                <form method="POST" action="connect.php">
                    <div class="row">
                        <div class="mb-3 col-sm-12">
                            <input type="email" class="form-control" id="email" placeholder="Email Address" name="email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-sm-12">
                            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                        </div>
                    </div>
                    <div class="ms-auto">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary fw-bold p-2" value="Submit">Sign in</button>
                            <p class="text-center">Not a The Blog member? <a href="/MaryRoseAquino/SignUp.php" class="text-center mt-1 mb-0 text-decoration-none">Sign up here.</a></p>
                        </div>
                    </div>
                </form>
                

            </div>
        </div>
    </div>

    <br><br><br><br><br>
    <hr class="mt-4">
    <footer>
        <div class="container-fluid row m-2 text-white">

            <div class="col-md-6">
                <p>Copyright &copy; 2023 Mary Rose Aquino</p>
            </div>

        </div>
    </footer>

</body>
</html>