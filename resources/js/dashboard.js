$(document).ready(function(){
    $('.dropdown-toggle').each(function(){
        $(this).click(function(){
           $(this).next('ul').slideToggle();
        })
    });
    // navbar hamburger toggle https://bulma.io/documentation/components/navbar/#navbar-burger
    // Check for click events on the navbar burger icon
    $('.navbar-burger').click(function() {
        // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
        $('#'+$(this).data('target')).toggleClass('is-active')
        $(this).toggleClass('is-active');
    });
    // make workgroup tile clickable and link to workgroup page
    $('.workgroup-tile').dblclick(function(){
        $(this).find('form').submit();
    });
    $('.reply-btn').click(function(){
        console.log($(this).data('response'));
        $('#response-to-'+$(this).data('response')).slideToggle();
    });
    $('.toggle').click(function(){
        $('#'+$(this).data('target')).slideToggle();
    });
    // show / hide forum post field
    $('.toggle-forumpost-field').click(function(){
        $('#forum-post').slideToggle();
    });

    $('.message-row').click(function(){
        $route = $(this).data('target');
        window.location.href = $route;
    }).hover(function(){
        if($(this).is(":hover")) {
            $(this).addClass('is-selected');
        } else {
            $(this).removeClass('is-selected');
        }
    });

    $('.prevent-default').click(function(event){
        event.preventDefault;
    });

    $('.workgroup-button').click(function () {
       window.location.href = $(this).attr('href');
    });

    $('#toggle-edit-profile').click(function(){
        $('.profile-field').toggleClass('is-hidden').prev().toggleClass('is-hidden');
    });

    $('.file-input').change(function(event){
        var filename = $(this).val().split('\\').pop();
        $('.file-name').html(filename);
        var newFilePath = URL.createObjectURL(event.target.files[0])
        $('#profile-image').attr('src', newFilePath);
    });

    // text editor
    if(document.querySelector( '.editor' )) {
        ClassicEditor.create( document.querySelector( '.editor' ) )
            .then( editor => {
                // console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    }



});
