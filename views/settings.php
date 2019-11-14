<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title; ?></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome icons -->
    <link text-black-50 rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <!-- Custom css -->
    <link rel="stylesheet" href="./public/css/app.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <a href="/" class="navbar-brand text-uppercase montserrat-font">
            <small>
                GoMail
            </small>
        </a>
        <button class="navbar-toggler" data-target="#navbar" data-toggle="collapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="/" class="nav-link">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container" id="account">
        <div class="row justify-content-center">
            <div class="col-lg-3 text-center">
                <img src="./public/img/<?php echo $settings['image'] ?>" alt="<?php echo $settings['image'] ?>">
            </div>
        </div>
    </div>

    <div class="container mt-4 mb-4" id="user-settings">
        <div class="row">
            <div class="col-lg-6">
                <button class="btn edit-btn text-secondary" id="edit">
                    <i class="fas fa-edit"></i>
                </button>

                <form action="/settings/edit" class="mt-4" method="post">
                    <div class="form-group">
                        <label for="name" class="control-label font-weight-bold text-secondary montserrat-font">
                            Имя
                        </label>
                        <input type="text" name="name" id="name" class="form-control montserrat-font" disabled value="<?php echo $settings['name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label font-weight-bold text-secondary montserrat-font">
                            Фамилия
                        </label>
                        <input type="text" name="surname" id="surname" class="form-control montserrat-font" disabled value="<?php echo $settings['surname']; ?>" required>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="country" class="control-label text-secondary font-weight-bold montserrat-font">
                                Страна
                            </label>
                            <input type="text" name="country" id="country" class="form-control montserrat-font" value="<?php echo $settings['country'] ?>">
                        </div>
                        <div class="col">
                            <label for="city" class="control-label text-secondary font-weight-bold montserrat-font">
                                Город
                            </label>
                            <input type="text" name="city" id="city" class="form-control montserrat-font" value="<?php echo $settings['city'] ?>">
                        </div>
                    </div>
                    <div class="custom-file mt-4">
                        <label for="image" class="custom-file-label montserrat-font" id="image">
                            Фотография
                        </label>
                        <input type="file" name="image" id="image" class="custom-file-input">
                    </div>
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-outline-info text-uppercase" id="save">
                            <small>
                                Сохранить
                            </small>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php if(isset($_SESSION['success'])): ?>
        <!-- Success message -->
        <div class="col-lg-3 col-md-3 col-4" id="success-message">
            <div class="alert alert-success fade show alert-dismissible">
                <strong class="text-dark">
                    <?php echo $_SESSION['success']; ?>
                </strong>
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
            </div> 
        </div>
    <?php elseif(isset($_SESSION['error'])): ?>
        <!-- Error message -->
        <div class="col-lg-3 col-md-3 col-3" id="error-message">
            <div class="alert alert-danger alert-dismissible fade show">
                <strong>
                    <?php echo $_SESSION['error']; ?>
                </strong>
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
            </div>
        </div>
    <?php endif; ?>
    
    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <!-- Bootstrap 4  -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> 
    <!-- Custom scripts -->
    <script src="./public/js/app.js"></script>
</body>
</html>