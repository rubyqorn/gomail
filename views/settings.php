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
                <img src="/img/avatar.png" alt="">
            </div>
        </div>
    </div>

    <div class="container mt-4 mb-4" id="user-settings">
        <div class="row">
            <div class="col-lg-6">
                <button class="btn edit-btn text-secondary" id="edit">
                    <i class="fas fa-edit"></i>
                </button>

                <form action="/" class="mt-4" method="post">
                    <div class="form-group">
                        <label for="name" class="control-label font-weight-bold text-secondary montserrat-font">
                            Имя
                        </label>
                        <input type="text" name="name" id="name" class="form-control montserrat-font" disabled value="John" required>
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label font-weight-bold text-secondary montserrat-font">
                            Фамилия
                        </label>
                        <input type="text" name="surname" id="surname" class="form-control montserrat-font" disabled value="Doe" required>
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label font-weight-bold text-secondary montserrat-font">
                            Почта
                        </label>
                        <input type="text" name="email" id="email" class="form-control montserrat-font" disabled value="antonhideger1337@gmail.com" required>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="country" class="control-label text-secondary font-weight-bold montserrat-font">
                                Страна
                            </label>
                            <input type="text" name="country" id="country" class="form-control montserrat-font" value="">
                        </div>
                        <div class="col">
                            <label for="city" class="control-label text-secondary font-weight-bold montserrat-font">
                                Город
                            </label>
                            <input type="text" name="city" id="city" class="form-control montserrat-font" value="">
                        </div>
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

    <div class="col-lg-3 col-md-3 col-3 d-none float-right" id="success-message">
        <div class="alert alert-success alert-dismissible fade show">
            <button class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            <strong>Success!</strong>
        </div>
    </div>