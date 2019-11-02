<?php

require_once __DIR__ . '/bootstrap/app.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-6">

                <?php if(isset($_SESSION['error'])): ?>

                    <div class="col-lg-12 alert alert-danger alert-dismissible show fade">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        <?php echo $_SESSION['error'] ?>
                    </div>

                <?php elseif(isset($_SESSION['success'])): ?>

                    <div class="col-lg-12 alert alert-success alert-dismissible show fade">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        <?php echo $_SESSION['success'] ?>
                    </div>

                <?php endif; ?>

                <form action="/login" method="post">
                    <div class="form-group">
                        <label for="email" class="control-label col-xs-2 text-dark">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label col-xs-2 text-dark">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-outline-info" type="submit">send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>