<?php

include("connection.php");

session_start();

if (!isset($_SESSION["username"]) || !isset($_SESSION["email"])) {
    header("location: SignIn.php");
    exit();
}

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

$username = $_SESSION["username"];
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';

if (empty($email)) {
    $errorMessage = "Email parameter is missing.";
} else {
    $sql = "SELECT account.fname, blog.posts, blog.blogid
    FROM posts 
    INNER JOIN account ON account.account = blog.accountid
    WHERE account.firstname = '$username'";
}

// Retrieve the user's bookings
$sql = "SELECT account.fname, blog.posts, blog.blogid
        FROM blog 
        INNER JOIN account ON account.accountid = blog.accountid
        WHERE account.fname = '$username'";
$result = mysqli_query($connection, $sql);

$posts = $successMessage = $errorMessage = "";

// Handle the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $posts = mysqli_real_escape_string($connection, $_POST["posts"]);

    // Check if any field is empty
    if (empty($posts)) {
        $errorMessage = "Field is empty!";
    } else {
        // Retrieve the accountid based on the username
        $username = $_SESSION['username'];
        $query = "SELECT accountid FROM account WHERE fname = '$username'";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);
        $accountid = $row['accountid'];

        // Insert the blog into the database
        $blog = "INSERT INTO blog (accountid, posts) 
                    VALUES ('$accountid', '$posts')";
        if (mysqli_query($connection, $blog)) {
            $_SESSION["success_message"] = "Post added successfully";
            header("location: Index.php");
            exit();
        } else {
            $_SESSION["error_message"] = "Error: " . mysqli_error($connection);
        }
    }
}


// Handle delete button click
if(isset($_POST['delete'])) {
    $blogid = mysqli_real_escape_string($connection, $_POST['blogid']);

    // Delete booking from database
    $sql = "DELETE FROM blog WHERE blogid='$blogid'";
    if(mysqli_query($connection, $sql)) {
        $_SESSION['success_message'] = "Post deleted successfully";
        header("location: Index.php");
        exit();
    } else {
        $_SESSION['error_message'] = "Error deleting booking: " . mysqli_error($connection);
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

    

    <div class="container-fluid bg-image p-5 text-center text-white" style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('https://images.unsplash.com/photo-1518655048521-f130df041f66?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mjd8fGJsb2d8ZW58MHx8MHx8&w=1000&q=80');
    height: 70vh; background-repeat: no-repeat; background-position: center; background-size: cover;">
        <h1 class="fs-6 mt-5 pt-5">WELCOME TO</h1>
        <h1 class="display-2 fw-bold" style="font-family: Times New Roman, serf;">THE BLOG</h1>
        <h2 class="fs-6">By Mary Rose B. Aquino</h2>
    </div>

    <br>

    <div class="container-fluid row text-center mb-5">

        <div class="card col m-2" style="width: 300px;">
            <img class="card-img-top mt-3 p-2" src="https://www.traveloffpath.com/wp-content/uploads/2022/05/Travel-Demand-is-Back-to-Pre-Pandemic-Levels-and-What-it-Means-To-You-This-Summer.jpg" alt="Travel">
            <div class="card-body text-center">
                <h5 class="card-title mt-3">Travel</h5>
                <p class="card-text">“The world is a book and those who do not travel read only one page.”</p>
            </div>
        </div>

        <div class="card col m-2" style="width: 300px;">
            <img class="card-img-top mt-3 p-2" src="https://buildingontheword.org/files/2014/12/family.jpg" alt="Family">
            <div class="card-body text-center">
                <h5 class="card-title">Family</h5>
                <p class="card-text">“Family is not an important thing. It's everything.” — Michael J. Fox.</p>
            </div>
        </div>

        <div class="card col m-2" style="width: 300px;">
            <img class="card-img-top mt-3 p-2" src="https://static.toiimg.com/thumb/resizemode-4,width-1200,height-900,msid-70500973/70500973.jpg" alt="Friends">
            <div class="card-body text-center">
                <h5 class="card-title">Friends</h5>
                <p class="card-text">“In the sweetness of friendship let there be laughter, for in the dew of little things the heart finds its morning and is refreshed.” — Khalil Gibran</p>
            </div>
        </div>

        <div class="card col m-2" style="width: 300px;">
            <img class="card-img-top mt-3 p-2" src="https://www.berkeleywellbeing.com/uploads/1/9/4/8/19481349/what-is-love_orig.jpg" alt="Love">
            <div class="card-body text-center">
                <h5 class="card-title mt-3">Love</h5>
                <p class="card-text">”A purpose of human life, no matter who is controlling it, is to love whoever is around to be loved.” — Kurt Vonnegut</p>
            </div>
        </div>
    </div>
    <hr>
    <div class="container-fluid my-5 px-5">
        <div class="card" style="height: 500px;">
            <div class="card-body p-5">
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
                <form method="POST" action="<?php htmlspecialchars("SELF_PHP"); ?>">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="What's up?" name="posts">
                    <div class="input-group-append">
                      <button class="btn btn-primary px-5" type="submit" href="/MaryRoseAquino/Index.php">Post</button>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search" name="search" id="myInput" onkeyup="myFunction()">
                </div>
                </form>
                <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">
                <table class="text-center table align-middle table-borderless" id="myTable">
                    <thead class="px-5 text-center">
                            <tr>
                                <th>Posts</th>
                                <th>Action</th>
                            </tr>

                    </thead>
                    <tbody class="table align-middle">
                    <?php
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr><td>" . $row["posts"] . "</td><td>
                                <form method='POST'>
                                    <button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#exampleModal'>Delete</button>
                                    <input type='hidden' name='blogid' value='" . $row['blogid'] . "'>

                                    
                                    <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                      <div class='modal-dialog'>
                                        <div class='modal-content'>
                                          <div class='modal-header'>
                                            <h5 class='modal-title' id='exampleModalLabel'>Confirm Delete</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                          </div>
                                          <div class='modal-body'>
                                            Are you sure you want to delete this booking?
                                          </div>
                                          <div class='modal-footer'>
                                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                                            <button type='submit' name='delete' class='btn btn-danger'>Delete</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </form>
                              </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

    <hr>
    <footer>
        <div class="container-fluid row m-2">

            <div class="col-md-6">
                <p>Copyright &copy; 2023 Mary Rose Aquino</p>
            </div>

        </div>
    </footer>

    <script>
        function myFunction() {
            var input, filter, table, tr, td, i, j, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those that don't match the search query
            for (i = 0; i < tr.length; i++) {
                var display = false;
                // Loop through all table columns, and check if any column matches the search query
                for (j = 0; j < tr[i].getElementsByTagName("td").length; j++) {
                td = tr[i].getElementsByTagName("td")[j];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    display = true;
                    break;
                    }
                }
                }
                // Set the row display style based on whether any column matches the search query
                if (display) {
                tr[i].style.display = "";
                } else {
                tr[i].style.display = "none";
                }
            }

            // If the search field is empty, show all rows
            if (filter.length === 0) {
                for (i = 0; i < tr.length; i++) {
                tr[i].style.display = "";
                }
            }
        }

    </script>

</body>
</html>