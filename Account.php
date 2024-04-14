<?php

session_start();

if(isset($_SESSION["logged_in"])){
    if(isset($_SESSION["username"]) && ($_SESSION["lname"] && ($_SESSION["email"]))){
        $textaccount = $_SESSION["username"];
        $lname = $_SESSION["lname"];
        $email = $_SESSION["email"];
    }else{
        $textaccount = "Account";
    }
}else{
    $textaccount = "Account";
}

include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_SESSION["email"];
    $old_password = $_POST["old_password"];
    $new_password = $_POST["new_password"];
    $result = $connection->query("SELECT password FROM account WHERE email = '$email'");
    $record = $result->fetch_assoc();
    $stored_password = $record["password"];
    if ($old_password == $stored_password) {
      $connection->query("UPDATE account SET password = '$new_password' WHERE email = '$email'");
      $_SESSION["success_message"] = "Password changed successfully";
    } else {
      $_SESSION["error_message"] = "Old password does not match";
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
    <div class="container-fluid">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
            <div class="container-fluid">
                <button class="btn btn-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><i class="bi bi-list"></i></button>
                <div class="offcanvas offcanvas-start bg-dark text-white" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
                <div class="offcanvas-header">
                <h5 class="offcanvas-title ms-3 mt-3" id="offcanvasWithBothOptionsLabel">The Blog</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
            <div class="offcanvas-body">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start ms-3" id="menu">
                    <li class="nav-item">
                    <a href="/MaryRoseAquino/Index.php" class="nav-item nav-link link-light mx-2 h5">BLOG</a>
                    </li>
                    <li>
                        <a href="/MaryRoseAquino/Account.php" class="nav-item nav-link link-light mx-2 h5">PROFILE</a>
                    </li>
                    <li>
                        <a href="/MaryRoseAquino/AboutMain.php" class="nav-item nav-link link-light mx-2 h5">WHO WE ARE</a>
                    </li>
                    <li>
                        <a href="/MaryRoseAquino/ContactMain.php" class="nav-item nav-link link-light mx-2 h5">GET IN TOUCH</a>
                    </li>
                    <li>
                        <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle px-4 ms-3" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php  echo $textaccount; ?>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="/MaryRoseAquino/SignOut.php">Logout</a></li>
                        </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
                
            <div class="container-fluid">

                <a href="/MaryRoseAquino/Index.php" class="navbar-brand fw-bold" style="font-family: Garamond, serif;">The Blog</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarCollapse">

                    <div class="navbar-nav ms-auto me-3">
                    </div>
                    
                </div>
            </div>
        </nav>
    </div>
    <br><br>
    <div class="container-fluid">
        <div class="card mt-5 mx-auto" style="width: 500px;">
            <div class="card-body m-3" style="font-family: Arial, Helvetica, sans-serif;">
                <h1 class="h4">Account</h1><hr>
                <pre class="fw-bold mt-4 h6">First Name:    <?php echo $textaccount; ?></pre>
                <pre class="fw-bold h6">Last Name:     <?php echo $lname; ?></pre>
                <pre class="fw-bold h6">Email:         <?php echo $email; ?></pre><hr>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <input type="password" class="form-control" name="old_password" placeholder="Old Password">
                        <?php
                        if (isset($_SESSION["success_message"])) {
                            echo "<label>" . $_SESSION["success_message"] . "</label>";
                            unset($_SESSION["success_message"]);
                        } elseif (isset($_SESSION["error_message"])) {
                            echo "<label>" . $_SESSION["error_message"] . "</label>";
                            unset($_SESSION["error_message"]);
                        }
                        ?>
                    </div>
                    <div class="mb-3 col-md-6">
                        <input type="password" class="form-control" name="new_password" placeholder="New Password">
                    </div>
                </div>
                <button class="btn btn-primary fw-bold text-white p-2   " href="Profile.php" value="Submit">Save Changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <br><br><br><br><br>
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