$(document).ready(function() {

    // Delete messages
    $('#trash').click(function(event) {
        event.preventDefault();
        
        $('.checkbox-item:checked').fadeOut('slow', function() {
            const col = this.parentNode;
            const container = col.parentNode;

            $.ajax({
                url: './views/auth/parts/ajax.php',
                type: 'POST',
                data: {
                    id: $(this).val()
                },
            }).done(function(data) {
                $('#success-message').removeClass('d-none');
            }).fail(function() {
                $('#error-message').removeClass('d-none');
            })

            $(container).remove();
        })

    });

    // Replace items into spam section
    $('#spam').click(function(event) {
        event.preventDefault();

        $('.checkbox-item:checked').fadeOut('slow', function() {

            const col = this.parentNode;
            const container = col.parentNode

            $.ajax({
                url: './views/auth/parts/ajax.php',
                type: 'POST',
                data: {
                    id: $(this).val()
                }
            }).done(function(data) {
                $('#success-message').removeClass('d-none');
            }).fail(function() {
                $('#error-message').removeClass('d-none');
            });

            $(container).remove();
        })
    });

    // Insert into spam section single record
    $('#message #replace-in').click(function(event) {
        event.preventDefault();

        const formGroup = this.parentNode;
        const form = formGroup.parentNode;
        const col = form.parentNode;
        const container = col.parentNode;
        const checkbox = $(container).find('.checkbox-item');
        
        $.ajax({
            url: './views/auth/parts/ajax.php',
            type: 'POST',
            data: {
                buttonName: $(this).attr('name'),
                id: $(checkbox).val(),
            }
        }).done(function(data) {
            $(container).fadeOut('slow', function() {
                $(this).remove();
                $('#success-message').removeClass('d-none');
            })
        })
    })

    $('#tools .select-all').click(function(event) {
        
        if ($('#main-content #trash')) {
            $('#main-content #trash').click(function() {
                $('.checkbox-item:checked').fadeOut('slow', function() {
                    $('#messages #message').remove();
                })
            });

        } else if($('#main-content #spam')) {
            $('#main-content #spam').click(function() {
                $('.checkbox-item:checked').fadeOut('slow', function() {
                    $('#messages #message').remove();
                })
            });
        }

    });

    // Send message from chat window
    $('#send-message').click(function(event) {
        event.preventDefault();
        $.ajax({
            url: './views/auth/parts/ajax.php',
            type: 'POST',
            data: {
                email: $('#email').val(),
                title: $('#title').val(),
                message: $('#message-content').val(),
            },
            beforeSend: function() {
                $('#content').wrap('<div class="overlay"></div>');
            }
        })
        .done(function(data) {
            $('#success-message').removeClass('d-none');
            $('#content').unwrap();
        })
        .fail(function() {
            $('#error-message').removeClass('d-none');
        })
    });

    // Registration
    $('#register #reg-btn').click(function(event) {
        event.preventDefault();

        $.ajax({
            url: '/register',
            type: 'POST',
            data: {
                name: $('#register #name').val(),
                surname: $('#register #surname').val(),
                email: $('#register #email').val(),
                password: $('#register #password').val(),
            },
        }).done(function(data) {
            console.log(data);
        });
    });

    // Authentification
    $('#login #login-btn').click(function(event) {
        event.preventDefault();

        $.ajax({
            url: './views/auth/parts/ajax.php',
            type: 'POST',
            data: {
                email: $('#login #email').val(),
                password: $('#login #password').val(),
            },
        }).done(function(data) {
            window.location.href = 'http://www.gomail.com/';
        });
    })

    // Searching
    $('#searching .search-button').click(function(event) {
        event.preventDefault();

        $.ajax({
            url: './views/auth/parts/ajax.php',
            type: 'POST',
            data: {
                title: $('#searching #search').val(),
            },
            beforeSend: function() {
                $('#main-content').wrap('<div class="overlay"></div>');
            }
        }).done(function(data) {
            $('#main-content').unwrap();
        })
    })

    $('#user-settings #save').click(function(event) {
        event.preventDefault();

        $.ajax({
            url: './views/auth/parts/ajax.php',
            type: 'POST',
            data: {
                name: $('#user-settings #name').val(),
                surname: $('#user-settings #surname').val(),
                email: $('#user-settings #email').val(),
                country: $('#user-settings #country').val(),
                city: $('#user-settings #city').val(),
            }
        }).done(function(data) {
            console.log(data);
            $('#success-message').removeClass('d-none');
        })
    })

});