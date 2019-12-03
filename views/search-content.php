<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Font Awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"><!-- Bootstrap 4 -->
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/public/css/app.css">
    <title><?php echo $title; ?></title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="/" class="text-uppercase text-black-50 montserrat-font navbar-brand">
            <i class="fas fa-chevron-left">
            </i>
        </a>
    </nav>

    <div class="contaner mt-4">
        <div class="row justify-content-center">

            <div class="col-lg-8 col-md-8 col-sm-8">
                <h4 class="text-left text-black-50 montsrrat-font">
                    Сообщения по запросу <strong><?php echo $_POST['search']; ?></strong>
                </h4>
                <hr>
            </div>
            
            <?php if (isset($searchContent) && !empty($searchContent)): ?>

                <?php foreach($searchContent as $content): ?>

                    <div class="col-lg-8 p-0 d-flex bg-light-grey border-bottom border-top border-left mt-2 mb-2 pt-2 pb-1" id="message">
                        <div class="col-lg-3 d-flex">
                            <input type="checkbox" name="check" class="checkbox-item mt-1" value="<?php echo $content['message_id']; ?>">
                            <p class="text-decoration-none text-black-50 montserrat-font ml-3 mt-3">
                                <?php echo $content['title']; ?>
                            </p>
                        </div>
                        <div class="col-lg-7">
                            <p class="text-black-50 montserrat-font">
                                <small>
                                    <?php echo $content['content'] ?>
                                </small>
                            </p>
                        </div>
                        <div class="col-lg-2 d-flex">
                            <form action="/" method="post">
                                <div class="form-group">
                                    <button type="submit" class="trash-button text-secondary" id="replace-in">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </form>
                            <form action="/" method="post">
                                <div class="form-group">
                                    <button type="submit" class="star-button text-secondary" id="replace-in">
                                        <i class="far fa-star"></i>
                                    </button>
                                </div>
                            </form>
                            <form action="/" method="post">
                                <div class="form-group">
                                    <button type="submit" class="spam-button text-secondary mr-1" id="replace-in">
                                        <i class="fas fa-exclamation-circle"></i>
                                    </button>
                                </div>
                            </form>
                            <p class="text-secondary montserrat-font">
                                <small>
                                    <?php echo date('M d', strtotime($content['created_at'])) ?>
                                </small>
                            </p>
                            
                        </div>
                    </div>

                <?php endforeach; ?>  

                <?php elseif(!isset($searchContent) || empty($searchContent)): ?>

                    <div class="col-lg-12 text-center">
                        <p class="text-black-50 mountserrat-font">
                            Записи по вашему запросу не найдены
                        </p>
                    </div>

            <?php endif; ?>
            
        </div>
    </div>

   

</body>
</html>