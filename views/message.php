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

   <div class="navbar-expand-lg bg-light p-3">
        <ul class="nav nav-fill">
            <li class="nav-item">
                <a href="/" class="nav-link text-dark montserrat-font">
                    <i class="fa fa-chevron-left fa-lg"></i>
                    Вернуться на главную
                </a>
            </li>
        </ul>
   </div>

   <div class="container-fluid">
    <div class="row">

    <?php if (!empty($ownMessages)): ?>

        <div class="col-lg-4 mt-3">
            <?php foreach($ownMessages as $message): ?>
                <div class="shadow bg-light rounded p-3 mt-2">
                    <a href="/messages/message/<?php echo $message['message_id'] ?>" class="text-muted montserrat-font">
                        <?php echo $message['title']; ?>
                    </a>
                    <div class="d-flex justify-content-end">
                        <p class="text-muted">
                            <small>
                                <?php echo 'От: ' . $message['name'] . ' ' . $message['surname']; ?>
                            </small>
                        </p>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>

    <?php else: ?>

        <div class="col-lg-4">
            <p class="text-muted montserrat-font">
                У вас нет новых сообщений
            </p>
        </div>

    <?php endif; ?>

        <div class="col-lg-7 full-height-border p-4" id="dialog">
            <h4 class="text-info montserrat-font text-center border-bottom pb-2"><?php echo $singleMessage['title'] ?></h4>
            <div class="col-lg-12 d-flex mb-4 mt-3" id="user-info">
                <img src="/public/img/<?php echo $singleMessage['image'] ?>" alt="<?php echo $singleMessage['image'] ?>">
                <p class="montserrat-font ml-2">
                    <small class="text-muted">
                        <?php echo $singleMessage['name']; ?>
                    </small>
                </p>
            </div>

            <p class="text-muted montserrat-font">
                <?php echo $singleMessage['content']; ?>
            </p>

            <form action="" method="post">
                <div class="form-group">
                    <textarea name="message" class="form-control" cols="20" rows="6" placeholder="Написать ответ"></textarea>
                </div>
                <div class="form-group">
                    <button class="text-uppercase btn btn-outline-info btn-block">
                        <small>
                            Отправить
                        </small>
                    </button>
                </div>
            </form>
        </div>

    </div>
   </div>
   

</body>
</html>