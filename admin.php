<?php
$title = "Administration section";
require_once "./template/header.php";
?>

<html>
<head>
    <script src="validation.js"></script>

</head>

<body>
<div class="container">
    <form name="loginForm" class="form-horizontal" role="form" method="POST" action="login_query.php" onsubmit='return validateForm()'>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2>Please Login</h2>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="form-group has-danger">
                    <label class="sr-only" for="username">Username</label>
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
                        <input type="text" name="username" class="form-control" id="username"
                               placeholder="Username" onblur="usernameValidation(this.username,event)">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="sr-only" for="password">Password</label>
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                        <input type="password" name="password" class="form-control" id="password"
                               placeholder="Password">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6" style="padding-top: .35rem">
                <div class="form-check mb-2 mr-sm-2 mb-sm-0">
                    <label class="form-check-label">
                        <input class="form-check-input" name="remember"
                               type="checkbox" >
                        <span style="padding-bottom: .15rem">Remember me</span>
                    </label>
                </div>
            </div>
        </div>
        <div class="row" style="padding-top: 1rem">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <button name="login" type="submit" class="btn btn-success"><i class="fa fa-sign-in"></i> Login</button>
                <a class="btn btn-link" href="admin.php">Forgot Your Password?</a>
            </div>
        </div>
    </form>
</div>
</body>

<?php
require_once "./template/footer.php";
?>


