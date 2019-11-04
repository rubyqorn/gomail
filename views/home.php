<?php require_once __DIR__ . '/parts/header.php'; ?>

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
        <a href="/" class="btn btn-outline-primary btn-sm text-uppercase ml-2">
            <small>
                Logout
            </small>    
        </a>
    </div>

</nav>

<!-- Main content -->
<section class="mt-4" id="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12 text-center">
            <div class="spinner-border text-primary" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            </div>

            <!-- Sidebar content -->
            <div class="col-lg-3 col-md-3 col-4 p-2" id="sidebar">
            
                <div class="col-lg-12 col-12 col-md-12">
                    <a role="button" class="btn btn-outline-primary btn-sm text-uppercase montserrat-font" data-toggle="chat">
                        <small>
                            Написать
                        </small>
                    </a>
                </div>

            <ul class="sidebar-menu col-lg-12 col-12 col-md-12 border-top border-bottom" id="sidebar-menu">
                <li class="sidebar-item montserrat-font">
                        <a href="#index" class="sidebar-link active-link">
                            <i class="fas fa-inbox mt-1 mr-2 float-left"></i> Все
                        </a>
                    </li>
                <li class="sidebar-item montserrat-font">
                        <a href="#check" class="sidebar-link">
                            <i class="fas fa-check mt-1 mr-2 float-left"></i> Отмеченные
                        </a>
                    </li>
                    <li class="sidebar-item montserrat-font">
                        <a href="#sent" class="sidebar-link">
                        <i class="far fa-paper-plane mt-1 mr-2 float-left"></i> Отправленные
                        </a>
                    </li>
                    <li class="sidebar-item montserrat-font">
                        <a href="#important" class="sidebar-link">
                        <i class="far fa-star mt-1 mr-2 float-left"></i> Важные
                        </a>
                    </li>
                    <li class="sidebar-item montserrat-font">
                        <a href="#spam" class="sidebar-link">
                            <i class="fas fa-exclamation-circle mt-1 mr-2 float-left"></i> Спам
                        </a>
                    </li>
            </ul>

            <div class="col-lg-12 d-flex border-bottom pb-3" id="user-settings">
                <img src="./public/img/avatar.png" alt="">
                <a role="button" class="dropdown-toggle ml-3 text-black-50 montserrat-font" data-toggle="dropdown">
                    <small>
                        Anton
                    </small>
                </a>
                <div class="dropdown-menu">
                    <div class="col-lg-12">
                        <img src="./public/img/avatar.png" alt="">
                    </div>
                    <div class="col-lg-12">
                        <p class="text-black-50 montserrat-font">
                            <small>
                                Anton Hideger
                            </small>
                        </p>
                        <p class="text-black-50 montserrat-font">
                            <small>
                            antonhideger1337@gmail.com
                            </small>
                        </p>
                        <a href="/settings.php" class="text-secondary montserrat-font float-right">
                            <i class="fas fa-cog"></i>
                        </a>
                    </div>
                </div>
            </div>

            </div>
            <!-- Content -->
            <div class="col-lg-8 col-md-8 col-8 p-0" id="main-content">

                <div class="col-lg-12 d-flex border-bottom" id="tools">
                        <div class="col-lg-3">
                        <form action="test.php" class="d-flex" method="post">
                            <!-- Select all button -->
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="select-all" id="select-all">
                                    <label for="select-all" class="select-all custom-control-label text-black-50 montserrat-font">
                                        <small>
                                            Выделить все
                                        </small>
                                    </label>
                                </div>
                            </div>
                            <!-- Refresh button -->
                            <div class="form-group">
                                <a href="/" class="text-secondary ml-4" title="Перезагрузка">
                                    <i class="fas fa-redo-alt"></i>
                                </a>
                            </div>
                        </div>
                        <!-- Trash and spam buttons -->
                        <div class="col-lg-9 d-flex" id="additional-tools">
                            <div class="form-group">
                                <button type="submit" class="spam-button mr-2" name="spam" id="spam">
                                    <i class="fas fa-exclamation-circle text-secondary"></i>
                                </button>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="trash-button" name="trash" id="trash">
                                    <i class="fas fa-trash text-secondary"></i>
                                </button>
                                <input type="hidden" name="id" value="1">
                            </div>
                        </div>
                    </form>
                </div>
                
                <!-- Messages -->
                <div class="col-lg-12 mt-3" id="messages">

                    <div class="col-lg-12 p-0 d-flex bg-light-grey border-bottom border-top border-left pt-2 pb-1" id="message">
                        <div class="col-lg-3 d-flex">
                            <input type="checkbox" name="check" class="checkbox-item mt-1" value="1">
                            <p class="text-black-50 montserrat-font ml-3 mt-3">
                                GoMail
                            </p>
                        </div>
                        <div class="col-lg-7">
                            <p class="text-black-50 montserrat-font">
                                <small>
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptate, assumenda!
                                </small>
                            </p>
                        </div>
                        <div class="col-lg-2 d-flex">
                            <form action="/" method="post">
                                <div class="form-group">
                                    <button type="submit" name="trash" class="trash-button text-secondary" id="replace-in">
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
                                    <button type="submit" name="spam" class="spam-button text-secondary mr-1" id="replace-in">
                                        <i class="fas fa-exclamation-circle"></i>
                                    </button>
                                </div>
                            </form>
                            <p class="text-secondary montserrat-font">
                                <small>
                                    Sep 13
                                </small>
                            </p>
                            
                        </div>
                    </div>

                    <div class="col-lg-12 p-0 d-flex bg-light-grey border-bottom border-top border-left pt-2 pb-1" id="message">
                        <div class="col-lg-3 d-flex">
                            <input type="checkbox" name="check" class="checkbox-item mt-1" value="2">
                            <p class="text-black-50 montserrat-font ml-3 mt-3">
                                GoMail
                            </p>
                        </div>
                        <div class="col-lg-7">
                            <p class="text-black-50 montserrat-font">
                                <small>
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptate, assumenda!
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
                                    Sep 13
                                </small>
                            </p>
                            
                        </div>
                    </div>

                    <div class="col-lg-12 p-0 d-flex bg-light-grey border-bottom border-top border-left pt-2 pb-1" id="message">
                        <div class="col-lg-3 d-flex">
                            <input type="checkbox" name="check" class="checkbox-item mt-1" value="3">
                            <p class="text-black-50 montserrat-font ml-3 mt-3">
                                GoMail
                            </p>
                        </div>
                        <div class="col-lg-7">
                            <p class="text-black-50 montserrat-font">
                                <small>
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptate, assumenda!
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
                                    Sep 13
                                </small>
                            </p>
                            
                        </div>
                    </div>

                    <div class="col-lg-12 p-0 d-flex bg-light-grey border-bottom border-top border-left pt-2 pb-1" id="message">
                        <div class="col-lg-3 d-flex">
                            <input type="checkbox" name="check" class="checkbox-item mt-1" value="4">
                            <p class="text-black-50 montserrat-font ml-3 mt-3">
                                GoMail
                            </p>
                        </div>
                        <div class="col-lg-7">
                            <p class="text-black-50 montserrat-font">
                                <small>
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptate, assumenda!
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
                                    Sep 13
                                </small>
                            </p>
                            
                        </div>
                    </div>

                    <div class="col-lg-12 p-0 d-flex bg-light-grey border-bottom border-top border-left pt-2 pb-1" id="message">
                        <div class="col-lg-3 d-flex">
                            <input type="checkbox" name="check" class="checkbox-item mt-1" value="5">
                            <p class="text-black-50 montserrat-font ml-3 mt-3">
                                GoMail
                            </p>
                        </div>
                        <div class="col-lg-7">
                            <p class="text-black-50 montserrat-font">
                                <small>
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptate, assumenda!
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
                                    Sep 13
                                </small>
                            </p>
                            
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="col-lg-12 p-2" id="pagination">
                        <ul class="pagination mt-4">
                            <li class="page-item"><a href="/" class="page-link"><small><</small></a></li>
                            <li class="page-item active"><a href="/index.php?page=1" class="page-link"><small>1</small></a></li>
                            <li class="page-item"><a href="/index.php?page=2" class="page-link"><small>2</small></a></li>
                            <li class="page-item"><a href="/index.php?page=3" class="page-link"><small>3</small></a></li>
                            <li class="page-item"><a href="/" class="page-link"><small>></small></a></li>
                        </ul>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>

    <!-- Success message -->
    <div class="col-lg-3 col-md-3 col-4 d-none" id="success-message">
        <div class="alert alert-success fade show alert-dismissible">
            <strong class="text-dark">
                Success!
            </strong>
            <button class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div> 
    </div>

    <!-- Error message -->
    <div class="col-lg-3 col-md-3 col-3 d-none" id="error-message">
        <div class="alert alert-danger alert-dismissible fade show">
            <strong>
                Error!
            </strong>
            <button class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
    </div>

<!-- Write new message -->
<div class="chat-content col-lg-5 col-md-5 col-8 p-0 d-none" id="write-message">
    <div class="chat-header w-100 border-bottom d-flex">

    <!-- Title -->
    <div class="col-lg-6">
        <h6 class="text-left text-white montserrat-font">
            <small>
                Новое сообщение
            </small>
        </h6>
    </div>

    <!-- Close button for chat -->
    <div class="col-lg-6 text-right">
        <button class="close-button">
            <span class="text-white">&times;</span>
        </button>
    </div>

</div>
    <div class="chat-body bg-white">
        <!-- Main form -->
        <form action="/" method="post">
            <div class="form-group">
                <input type="email" name="email" class="form-control border-bottom montserrat-font" id="email" placeholder="Кому"  required>
            </div>
            <div class="form-group">
                <input type="text" name="title" class="form-control border-bottom montserrat-font" id="title" placeholder="Заголовок"  required>
            </div>
            <div class="form-group">
                <textarea name="message" class="form-control" id="message-content" cols="30" rows="10" required></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-outline-primary text-uppercase btn-sm" id="send-message">
                    <small>
                        Отправить
                    </small>
                </button>
            </div>
        </form>
    </div>
</div>


<?php require_once __DIR__ . '/parts/footer.php'; ?>