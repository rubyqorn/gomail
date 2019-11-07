<?php  require_once __DIR__ . '/parts/header.php'; ?>

<section id="login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 col-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center text-black-50 montserrat-font text-uppercase">
                            <small>
                                Войти
                            </small>
                        </h4>
                    </div>
                    <div class="card-body p-4">
                    
                        <?php include __DIR__ . '/parts/alerts.php'; ?>
                        
                        <form action="/auth" method="post">
                            <div class="form-row">
                                
                                <div class="col">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" class="form-control mb-2 mr-sm-2" placeholder="your@email.com" required>
                                    <small class="text-muted">
                                        Почта
                                    </small>
                                </div>

                                <div class="col">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="password" class="form-control mb-2 mr-sm-2" placeholder="Password" required>
                                    <small class="text-muted">
                                        Пароль
                                    </small>
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-check mt-4">
                                    <input type="checkbox" name="check" id="check" class="form-check-input">
                                    <label for="check" class="form-check-label">
                                        Remember me
                                    </label>
                                </div>

                                <button type="submit" class="ml-2 ml-sm-2 mt-3 btn btn-outline-primary text-uppercase montserrat-font" id="login-btn">
                                    <small>
                                        Войти
                                    </small>
                                </button>
                            </div>

                            <a href="/" class="text-primary float-right">
                                <small>
                                    Забыли пароль?
                                </small>
                            </a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/parts/footer.php'; ?>