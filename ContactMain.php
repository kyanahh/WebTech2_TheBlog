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

<body>
     
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
        <div class="ms-5" style="font-family: Helvetica, sans-serif">
            <h2 class="mt-5 h4">Contact Us</h2>
            <p class="mt-4">Having trouble accessing or deleting your account?</p>
            <p class="mt-4">Send us a message via the following:</p>
            <a class="mt-5 link-dark text-decoration-none" href="https://www.facebook.com/maryroseaquino99"><i class="bi bi-facebook me-2"></i>Mary Rose Aquino</a>
            <p></p>
            <a class="mt-5 link-dark text-decoration-none" href="http://m.me/maryroseaquino99"><i class="bi bi-messenger me-2"></i>Mary Rose Aquino</a>
        </div>

    </div>

    <br><br><br><br><br><br><br><br><br><br>
    <hr class="mt-4">
    <footer>
        <div class="container-fluid row m-2">

            <div class="col-md-6">
                <p>Copyright &copy; 2023 Mary Rose Aquino</p>
            </div>

        </div>
    </footer>

</body>
</html>