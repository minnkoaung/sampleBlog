$(document).ready(function() {

    /**
     * Delete a user
     */
    $('.btn-delete-user').click(function() {
        window.location.href = "http://localhost/minnkoaung/public/admin/users/delete/" + $(this).attr('data-id');
    });


    /**
     * Delete a Personal
     */
    $('.btn-delete-personal').click(function() {
        window.location.href = "http://localhost/minnkoaung/public/admin/personals/delete/" + $(this).attr('data-id');
    });

    /**
     * Delete a Personal
     */
    $('.btn-delete-portfilio').click(function() {
        window.location.href = "http://localhost/minnkoaung/public/admin/portfilios/delete/" + $(this).attr('data-id');
    });

    


});
