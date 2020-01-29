<?php
    session_start();
    if($_SESSION['flash']) {
       $flash = $_SESSION['flash'];
    } else {
        $flash = false;
    }
    unset($_SESSION['flash']);

    // redirect when no login
    if(!$_SESSION['user'])  {
        $_SESSION['flash'] = 'You need login for access';
        header('location: ./login.php');
    }
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
                <div class="alert alert-info mb-3 mt-2"><?=  $flash ?></div>
            <?php endif; ?>
                <div class="card ">
                    <div class="card-body">
                        <h1>Hello ;)</h1>
                        <div class="w-100 pt-5 clearif">
                            <a href="./process/logout.php" class="btn-link">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>