$( document ).ready(function() {
    let name =  $('input');
    let review =  $('textarea');
    let button = $('button');

    $('form').submit(function(e) {
        e.preventDefault();
        var form = $(this);
        $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: form.serialize()
        }).done(function(response) {
            let data = JSON.parse(response);

            if(data.success){
                name.val('');
                review.val('');
                console.log('name: ' + data.name);
                console.log('review: ' + data.review);
            }

            $('.alert').remove();
            name.closest('.form-group').after(data.name_msg);
            review.closest('.form-group').after(data.review_msg);
            button.closest('.form-group').after(data.success_msg);

        }).fail(function() {
            console.log('fail');
        });
    });
});