<?php
    session_start();
    if($_SESSION['flash']) {
       $flash = $_SESSION['flash'];
    } else {
        $flash = false;
    }
    session_unset($_SESSION['flash']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-5     mx-auto mt-5">
            <?php
                if($flash):
            ?>
                <div class="alert alert-warning"><?=  $flash ?></div>
            <?php endif; ?>
            <div class="card ">
            <div class="card-header">
                <h5 class="mb-0">login</h5>
            </div>
                <div class="card-body">
                    <form method="post" action="./process/login.php">
                        <div class="form-group">
                            <label for="email" class="col-form-label">Email</label>
                            <input type="email" required name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-form-label">Password</label>
                            <input type="password" required name="password" class="form-control">
                        </div>

                        <div class="w-100 clearfix">
                            <button class="btn btn-info px-4 float-right">Login</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
</body>
</html>