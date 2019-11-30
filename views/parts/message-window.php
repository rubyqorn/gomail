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
        <form action="/send" method="post">
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
