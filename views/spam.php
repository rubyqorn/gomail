<?php require_once __DIR__ . '/parts/header.php' ?>

<!-- Main content -->
<section class="mt-4" id="content">
    <div class="container-fluid">
        <div class="row">

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
                        <a href="/" class="sidebar-link active-link">
                            <i class="fas fa-inbox mt-1 mr-2 float-left"></i> Все
                        </a>
                    </li>
                <li class="sidebar-item montserrat-font">
                        <a href="/checked/page/1" class="sidebar-link">
                            <i class="fas fa-check mt-1 mr-2 float-left"></i> Отмеченные
                        </a>
                    </li>
                    <li class="sidebar-item montserrat-font">
                        <a href="/sent/page/1" class="sidebar-link">
                        <i class="far fa-paper-plane mt-1 mr-2 float-left"></i> Отправленные
                        </a>
                    </li>
                    <li class="sidebar-item montserrat-font">
                        <a href="/important/page/1" class="sidebar-link">
                        <i class="far fa-star mt-1 mr-2 float-left"></i> Важные
                        </a>
                    </li>
                    <li class="sidebar-item montserrat-font">
                        <a href="/spamed/page/1" class="sidebar-link">
                            <i class="fas fa-exclamation-circle mt-1 mr-2 float-left"></i> Спам
                        </a>
                    </li>
            </ul>

            <div class="col-lg-12 d-flex border-bottom pb-3" id="user-settings">
                <img src="/public/img/<?php echo $authUser['image']; ?>" alt="<?php echo $authUser['name']; ?>">
                <a role="button" class="dropdown-toggle ml-3 text-black-50 montserrat-font" data-toggle="dropdown">
                    <small>
                        <?php echo $authUser['name']; ?>
                    </small>
                </a>
                <div class="dropdown-menu">
                    
                        <div class="col-lg-12">
                            <img src="/public/img/<?php echo $authUser['image']; ?>" alt="<?php echo $authUser['name']; ?>">
                        </div>
                        <div class="col-lg-12">
                            <p class="text-black-50 montserrat-font">
                                <small>
                                    <?php echo $authUser['name'] . ' ' . $authUser['surname']; ?>
                                </small>
                            </p>
                            <p class="text-black-50 montserrat-font">
                                <small>
                                    <?php echo $authUser['email']; ?>
                                </small>
                            </p>
                            <a href="/settings" class="text-secondary montserrat-font float-right">
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
                        <form action="/spamed/replace" class="d-flex" method="post">
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
                            <!-- Block with all ID's which will be using for multiple deletion -->
                            <div id="messages" class="d-none">
                                <?php foreach($messages as $message): ?>
                                    <input type="checkbox" name="checkbox<?php echo $message['message_id'] ?>" class="checkbox" value="<?php echo $message['message_id']; ?>">
                                <?php endforeach; ?>
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
                                <button type="submit" class="trash-button" name="trash" id="trash">
                                    <i class="fas fa-trash text-secondary"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                
                <!-- Messages -->
                <div class="col-lg-12 mt-3" id="messages">

                    <?php if(!empty($messages)): ?>

                        <?php foreach($messages as $message): ?>

                        <div class="col-lg-12 p-0 d-flex bg-light-grey border-bottom border-top border-left pt-2 pb-1" id="message">
                            <div class="col-lg-3 d-flex">
                                <input type="checkbox" name="check" class="checkbox-item mt-1" value="<?php echo $message['message_id']; ?>">
                                <a role="button" data-toggle="modal" data-target="#show-message-<?php echo $message['message_id'] ?>" class="text-primary montserrat-font mt-3 ml-3">
                                    <?php echo $message['title'] ?>
                                </a>
                            </div>
                            <div class="col-lg-7">
                                <p class="text-black-50 montserrat-font">
                                    <small>
                                        <?php echo $message['content'] ?>
                                    </small>
                                </p>
                            </div>
                            <div class="col-lg-2 d-flex">
                                <form action="/spamed/replace-one" method="post">
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="<?php echo $message['message_id']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="trash" class="trash-button text-secondary" id="replace-in">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </form>
                                <form action="/spamed/replace-one" method="post">
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="<?php echo $message['message_id']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="star" class="star-button text-secondary" id="replace-in">
                                            <i class="far fa-star"></i>
                                        </button>
                                    </div>
                                </form>
                                <form action="/spamed/replace-one" method="post">
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="<?php echo $message['message_id']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="checked" class="checked-button text-secondary" id="replace-in">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </div>
                                </form>
                                <form action="/spamed/replace-one" method="post">
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="<?php echo $message['message_id']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="spam" class="spam-button text-secondary mr-1" id="replace-in">
                                            <i class="fas fa-exclamation-circle"></i>
                                        </button>
                                    </div>
                                </form>
                                <p class="text-secondary montserrat-font">
                                    <small>
                                        <?php echo date('M d', strtotime($message['created_at'])) ?>
                                    </small>
                                </p>
                                
                            </div>
                        </div>

                        <!-- Modal window with single message -->
                        <div class="modal fade" id="show-message-<?php echo $message['message_id']; ?>" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title montserrat-font text-muted">
                                            <?php echo $message['title']; ?>
                                        </h4>
                                        <button class="close" data-dismiss="modal">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="text-muted text-align-left">
                                            <?php echo $message['content']; ?>
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="/spamed/replace-one" method="post">
                                            <div class="form-group">
                                                <input type="hidden" name="id" value="<?php echo $message['message_id'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="trash" class="btn trash-button">
                                                    <i class="fas fa-trash text-secondary"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <div class="col-lg-12 text-center">
                            <p class="text-dark montserrat-font">
                                У вас нет новых сообщений
                            </p>
                        </div>

                    <?php endif;?>

                    <!-- Pagination -->
                    <div class="col-lg-12 p-2" id="box-pagination">
                        <ul class="pagination mt-4">
                            <?php echo $pagination; ?>
                        </ul>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>

<!-- Message window where we can write a message another user -->
<?php require_once  __DIR__ . '/parts/message-window.php'; ?>

<?php require_once __DIR__ . '/parts/footer.php' ?>