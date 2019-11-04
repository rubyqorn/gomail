<?php require_once __DIR__ . '/parts/header.php' ?>

<section id="register">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 col-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center text-black-50 montserrat-font text-uppercase">
                            <small>
                                Регистрация
                            </small>
                        </h4>
                    </div>
                    <div class="card-body p-4">

                        <?php include __DIR__ . '/parts/alerts.php'; ?>

                        <form action="/register" method="post">

                            <div class="col d-none">
                                <div class="alert alert-dismissible alert-danger fade show">
                                    <button class="close" data-dismiss="alert">
                                        <span>&times;</span>
                                    </button>
                                    <strong>error</strong>
                                </div>
                            </div>

                            <div class="form-row">

                                <div class="col">
                                    <label for="name" class="sr-only">Name</label>
                                    <input type="text" id="name" class="form-control mr-2 mr-sm-2 mt-3" name="name" placeholder="John" required>
                                    <small class="text-muted">
                                        Ваше имя
                                    </small>
                                </div>

                                <div class="col">
                                    <label for="surname" class="sr-only">Surname</label>
                                    <input type="text" id="surname" name="surname" class="form-control mt-3 mr-2 mr-sm-2" placeholder="Doe" required>
                                    <small class="text-muted">
                                        Ваше фамилия
                                    </small>
                                </div>

                            </div>

                            
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control mt-3 mb-2 mr-sm-2" placeholder="your@email.com" required>
                            <small class="text-muted">
                                Ваша почта
                            </small>
                        
                        
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" class="form-control mt-3 mb-2 mr-sm-2" name="password" id="password" placeholder="Password" required>
                            <small class="text-muted">
                                Ваш пароль
                            </small>
                            

                            <div class="form-row">
                                <a href="/login" class="h6 mt-4 text-primary font-weight-bold">
                                    Войти
                                </a>

                                <button type="submit" class="ml-2 ml-sm-2 mt-3 btn btn-outline-primary text-uppercase montserrat-font" id="reg-btn">
                                    <small>
                                        Зарегистрироваться
                                    </small>
                                </button>
                            </div>
                            

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/parts/footer.php'; ?>