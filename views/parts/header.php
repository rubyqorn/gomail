<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap 4 -->
    <link text-black-50 rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome icons -->
    <link text-black-50 rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <!-- Google Fonts -->
    <link text-black-50 href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <!-- Custom CSS -->
    <link text-black-50 rel="stylesheet" href="/public/css/app.css">
    <title><?php echo $title; ?></title>
</head>
<body>

    <!-- Navigation panel -->
    <nav class="navbar navbar-expand-lg navbar-white bg-light  border-bottom" id="navigation-panel">

        <!-- Logo -->
        <a href="/" class="h3 montserrat-font text-uppercase">
            <small>
                GOMAIL
            </small>
        </a>

        <!-- Searching -->
        <div class="col-lg-10 d-flex justify-content-center" id="searching">
            <form action="/" class="w-50">
                <div class="form-group mt-1 d-flex">
                    <button type="submit" class="search-button">
                        <i class="fas fa-search fa-lg"></i>
                    </button>
                    <input type="search" class="form-control montserrat-font border-bottom" id="search" name="search" placeholder="Поиск по записям">
                </div>
            </form>
        </div>

        <!-- Main navbar-content -->
        <div class="col-lg-1 col-md-1 col-2 d-flex justify-content-right" id="navbar-content">
            <a href="/logout" class="btn btn-outline-primary btn-sm text-uppercase ml-2">
                <small>
                    Logout
                </small>    
            </a>
        </div>

    </nav>

    <!-- Error and success messages -->
    <?php require_once __DIR__ . '/alerts.php' ?>