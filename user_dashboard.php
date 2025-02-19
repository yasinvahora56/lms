<?php
session_start();
    function get_user_issue_book_count(){
        $connection = mysqli_connect("localhost","root","");
        $db=mysqli_select_db($connection,"lms");
        $user_issue_book_count = 0;
        $query = "select count(*) as user_issue_book_count from issued_books where student_id = $_SESSION[id]";
        $query_run =  mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($query_run)){
                $user_issue_book_count = $row['user_issue_book_count'];
        }
        return($user_issue_book_count);
    }
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Library Management System</title>
    <meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
    <script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Library Management System (LMS)</a>
            </div>
            <font style="color:white"><span><strong>Welcome: <?php 
            if (isset ($_SESSION['name'])){
                echo $_SESSION['name'];
            }
            ?></strong></span></font>
            <font style="color:white"><span><strong>Email: <?php 
            if (isset ($_SESSION['email'])){
                echo $_SESSION['email'];
            } 
            ?></strong></span></font>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" style=" margin-right:5px" ;>My Profile</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="view_profile.php">View Profile</a>
                        <a class="dropdown-item" href="edit_profile.php">Edit Profile</a>
                        <a class="dropdown-item" href="change_password.php">Change Password</a>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav><br><br><br>
    <div class="row" style ="margin-left:120px;">
    <div class="col-md-3">
            <div class="bg-light" style="width:280px">
                <div class="card-header" style="background-color:#e3f2fd"><b>Issued Books:</b></div>
                <div class="card-body" style="background-color:#e3f2fd">
                    <p class="Card-text">No. Of Issued Books:<?php echo get_user_issue_book_count();?></p>
                    <a href="view_issued_book.php" class="btn btn-secondary" style="background-color:#343A40">View Issued Books</a>
                </div>
            </div>
        </div>
        </div>
    </div>
</body>

</html>