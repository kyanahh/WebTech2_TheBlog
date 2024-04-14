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

<body style="background-color: #777777;">
<br><br>
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

    <div class="container-fluid">
        <div class="card mx-auto mt-5" style="width: 700px;">
            <div class="card-body m-2" style="font-family: Times New Roman, serf;">
                <p class="fw-bold fw-bold">THE BLOG</p>
                <p></p>
                <p class="fw-bold h4">The Blog is a website.</p>
                <p>Social media? No, it's a network of mycelium.</p>
                <p>It's balanced chaos.</p>
                <p>Your phone's gay users are what it is.</p>
                <p>Your angel is here. Your devil is it.</p>
                <p>The Blog can be anything that you want it to be.</p>
                <p>And influencers, too? Never enter this area. You own this space. 
                    You are solely responsible for every video you discover, quote you reblog, 
                    tag you curate, and waterfall GIF that you secretly find fascinating. 
                    The explorer is you. All we are is a map that you guys keep drawing. 
                    Welcome back. Greetings from weird. Give it your all.</p>
                <p>#YouOnlyLiveOnce #YOLO</p>
                <p>#ThisIsNotARealPost</p>
                <p class="fw-bold" style="font-family: Arial, Helvetica, sans-serif;"><i class="bi bi-hand-thumbs-up me-2"></i>50,654 likes</p>
            </div>
        </div>
    </div>
    <br><br>
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