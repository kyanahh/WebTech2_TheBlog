<?php

include("connection.php");

$fname  = $lname = $email = $password = $errorMessage = $successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($fname) || empty($lname) || empty($email) || empty($password)) {
        $errorMessage = "All fields are required";
    } else {
        $result = $connection->query("INSERT INTO account (fname, lname, email, password) VALUES('$fname', '$lname', '$email', '$password')");

        if (!$result) {
            $errorMessage = "Invalid query " . $connection->error;
        } else {
            $successMessage = "Client added successfully";
            header("location: /MaryRoseAquino/SignIn.php");
            exit;
        }
    }
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
                <?php
                if (!empty($errorMessage)) {
                    echo "
                    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>$errorMessage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                    ";
                }
                ?>
                <p class="text-center fw-bold">Sign Up for The Blog</p>

                <form method="POST" action="<?php htmlspecialchars("SELF_PHP"); ?>">
                    <div class="row">
                        <div class="mb-3 col-sm-12">
                            <input type="text" class="form-control" id="fname" placeholder="First Name" name="fname" value="<?php echo $fname; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-sm-12">
                            <input type="text" class="form-control" id="lname" placeholder="Last Name" name="lname" value="<?php echo $lname; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-sm-12">
                            <input type="email" class="form-control" id="email" placeholder="Email Address" name="email" value="<?php echo $email; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-sm-12">
                            <input type="password" class="form-control" id="password" placeholder="Password" name="password" value="<?php echo $password; ?>">
                        </div>
                    </div>
                    <div class="ms-auto">
                        <div class="d-grid gap-2">
                        <?php

                            if (!empty($successMessage)) {
                                echo "
                                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                    <strong>$successMessage</strong>
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>
                                ";
                            }

                            ?>
                            <button type="submit" class="btn btn-primary fw-bold p-2" href="/MaryRoseAquino/SignIn.php" value="Submit">Sign Up</button>
                            <p class="text-center h6" style="color: #949494;">By signing up, you agree with The Blog's Terms of Services and Privacy Policy.</p>
                            <p class="text-center">Already a The Blog member? <a href="/MaryRoseAquino/SignIn.php" class="text-center mt-1 mb-0 text-decoration-none">Log in here.</a></p>
                        </div>
                    </div>
                </form>
                

            </div>
        </div>
    </div>

    <br><br><br>
    <hr>
    <footer>
        <div class="container-fluid row m-2 text-white">

            <div class="col-md-6">
                <p>Copyright &copy; 2023 Mary Rose Aquino</p>
            </div>

        </div>
    </footer>

</body>
</html>