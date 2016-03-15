<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <title>Opinions</title>
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="/MyPhpProject/content/style.css">
    <link rel="shortcut icon" href="/MyPhpProject/favicon.ico" type="image/x-icon"/>

</head>
<body>
<header class="layout">
    <div id="logo">
        <a href="/MyPhpProject/"><img src="http://unicefchallenge.com/wp-content/uploads/comments-icon-01.png"></a>
        <p>Opinions</p>
    </div>
    <ul class="menu">
        <li><a href="/MyPhpProject/home/listColumnists">Home</a></li>
        <?php if(!isLoggedIn() && !isAdmin()):?>
        <li><a href="/MyPhpProject/home/login">Login</a></li>
        <li><a href="/MyPhpProject/home/register">Register</a></li>
        <?php endif ?>
        <?php if(isAdmin()):?>
            <li><a href="/MyPhpProject/admin/addColumnist">AddColumnist</a></li>
            <li><a href="/MyPhpProject/admin/addOpinion">AddOpinion</a></li>
        <?php endif ?>
    </ul>

    <?php if(isset($_SESSION['username'])):?>
    <div id="loggedIn">
        <span>Hello, <?= $_SESSION['username']?></span>
        <form method="POST">
            <input type="submit" name="logout" value="Logout">
        </form>
    </div>
    <?php endif ?>
    <?php
        if(isset($_POST['logout'])){
            unset($_SESSION['username']);
            unset($_SESSION['admin']);
            $this->redirect('/MyPhpProject');
        }
    ?>
</header>
<div id="wrapper">
