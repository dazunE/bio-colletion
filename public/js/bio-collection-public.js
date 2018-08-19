(function ($) {
    'use strict';

    /**
     * All of the code for your public-facing JavaScript source
     * should reside in this file.
     *
     * Note: It has been assumed you will write jQuery code here, so the
     * $ function reference has been prepared for usage within the scope
     * of this function.
     *
     * This enables you to define handlers, for when the DOM is ready:
     *
     */

    $(function () {
        $('[data-toggle="datepicker"]').datepicker({
            autoHide: true,
            zIndex: 2048,
            format: 'yyyy-mm-dd'
        });
    });

    /*
      Bio Submissions
     */

    $('.bio-submit form').submit(function (e) {



        $('.loading-text').css('display','block');
        $('.bio-submit h2').empty();

        e.preventDefault();

        var inputData = e.currentTarget;

        var formData = {
            'personName': inputData[0].value,
            'birthDate': inputData[1].value,
            'deathDate': inputData[2].value,
            'personBio': inputData[3].value,
            'user': parseInt(inputData[4].value)
        };

        $.ajax({
            type: 'POST',
            url: bioAjax.ajaxUrl,
            data: {
                action:'submit_bio',
                formData: formData
            },
            success: function ( response ) {
                e.target.reset();
                setTimeout( function () {
                    $('.loading-text').hide();
                    $('.bio-submit').append('<h2> Thank you for submission</h2>');
                },3000)

            }
        })

    });


})(jQuery);
