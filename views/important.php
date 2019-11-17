    <?php if(!empty($messages)): ?>
    
        <?php foreach($messages as $message): ?>

            <div class="col-lg-12 p-0 d-flex bg-light-grey border-bottom border-top border-left pt-2 pb-1" id="message">
                <div class="col-lg-3 d-flex">
                    <input type="checkbox" name="check" class="checkbox-item mt-1" value="<?php echo $message['id'] ?>">
                    <p class="text-black-50 montserrat-font ml-3 mt-3">
                        <?php echo $message['title'] ?>
                    </p>
                </div>
                <div class="col-lg-7">
                    <p class="text-black-50 montserrat-font">
                        <small>
                            <?php echo $message['content'] ?>
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
                            <?php echo date('M d', strtotime($message['important_at'])) ?>
                        </small>
                    </p>
                    
                </div>
            </div>

        <?php endforeach; ?>

    <?php else: ?>

        <div class="col-lg-12 text-center">
            <p class="text-black-50 montserrat-font">
                У вас нет важных сообщений
            </p>
        </div> 

    <?php endif; ?>

    <!-- Pagination -->
    <div class="col-lg-12 p-2" id="pagination">
        <ul class="pagination mt-4">
            <li class="page-item"><a href="/" class="page-link"><small><</small></a></li>
            <li class="page-item"><a href="/" class="page-link"><small>1</small></a></li>
            <li class="page-item"><a href="/" class="page-link"><small>2</small></a></li>
            <li class="page-item"><a href="/" class="page-link"><small>3</small></a></li>
            <li class="page-item"><a href="/" class="page-link"><small>></small></a></li>
        </ul>
    </div>