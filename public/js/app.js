$(document).ready(function() {

    // Toggle d-none class for write-message section 
    $('[data-toggle="chat"]').click(function() {
        $('#write-message').removeClass('d-none').show('slow');
    });

    $('#sidebar-menu .sidebar-link').click(function(event) {
        event.preventDefault();

        $('#sidebar-menu .sidebar-link').removeClass('active-link');
        $(this).addClass('active-link');

        const href = $(this).attr('href');
        const link = './views/' + href.substring(1) + '.php';

        if (link == './views/home.php') {    
            $('#messages').load(link + ' #messages');
        } else {
            $('#messages').load(link);
        }
        
    })

    // Close button for chat section
    $('.close-button').click(function() {
        $('#write-message').toggle(500);
    });

    // Select all button
    $('#select-all').click(function() {
        if (this.checked) {
            $(':checkbox').each(function() {
                this.checked = true;
            });

        } else {
            $(':checkbox').each(function() {
                this.checked = false;
            });

        }
    });


    // Pagination for main page
    $('#pagination .page-item').click(function(event) {
        event.preventDefault();

        const link = $(this).find('.page-link');
        const url = $(link).attr('href');

        $('#messages').load(url + ' #messages');

        $('#pagination .page-item').removeClass('active');
        $(this).addClass('active');

     });

    // Edit button
    $('#user-settings #edit').click(function(event) {
        
        $('#user-settings input').prop('disabled', false);

    });

});
