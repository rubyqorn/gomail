$(document).ready(function() {

    // Toggle d-none class for write-message section 
    $('[data-toggle="chat"]').click(function() {
        $('#write-message').removeClass('d-none').show('slow');
    });

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
    $('#box-pagination .page-link').click(function(event) {
        event.preventDefault();

        const link = $(event.target).attr('href');

        $('#messages').load(link + ' #messages');
    });

     // Checked page pagination
     $('#check-pagination .page-item').click(function(event) {
        event.preventDefault();

        const pageLink = $(this).find('.page-link');
        const href = '/check/page/' + $(pageLink).attr('href');

        $('#messages').load(href + ' #messages');
     });

     // Important page pagination
     $('#important-pagination .page-item').click(function(event) {
        event.preventDefault();

        const link = $(this).find('.page-link');
        const url = '/important/page/' + $(link).attr('href');
        
        $('#messages').load(url + ' #messages');

     });

     // Sent page pagination
     $('#sent-pagination .page-item').click(function(event) {
        event.preventDefault();

        const pageLink = $(this).find('.page-link');
        const href = '/sent/page/' + $(pageLink).attr('href');

        $('#messages').load(href + ' #messages');
     });

     // Spam page pagination
     $('#spam-pagination .page-item').click(function(event) {
         event.preventDefault();

         const pageLink = $(this).find('.page-link');
         const href = '/spam/page/' + $(pageLink).attr('href');

         $('#messages').load(href + ' #messages');
     })

    // Edit button
    $('#user-settings #edit').click(function(event) {
        
        $('#user-settings input').prop('disabled', false);

    });

});
