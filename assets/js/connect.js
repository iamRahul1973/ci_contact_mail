/**
 * Created by user on 09-02-2019.
 */

$(document).ready(function () {
    // Contact Form
    var contactForm = $('form#connectMail');

    contactForm.on('submit', function (event) {
        event.preventDefault();
        var formData = new FormData(this);
        var url = $(this).attr('action');

        /* ------------------------------------------
         * VALIDATING THE FORM
         * ------------------------------------------ */

        contactForm.validate({
            debug: true,
            rules: {
                first_name: {
                    required: true
                },
                last_name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true
                },
                message: {
                    required: true
                }
            },
            messages: {
                first_name: 'Specify your first name',
                last_name: 'Specify your last name'
            },
            invalidHandler: function () {
                alert('Invalid form submitted !');
            }
        });

        /* ------------------------------------------
         * CHECKING IF THE FORM IS VALID OR NOT
         * ------------------------------------------ */

        if (contactForm.valid()) {
            submitContactForm(formData, url);
        }
    });

    /* ------------------------------------------
     * SENDING DATA TO THE SERVER
     * ------------------------------------------ */

    var submitContactForm = function (formData, url) {
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            dataType: 'JSON',
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {
                console.log('Request sent !');
                loadSpinner();
            },
            complete: function () {
                console.log('Request Complete !');
                removeSpinner();
            }
        }).done(function (data) {
            console.log(data);
            if (data.status === true) {
                toastr.success(data.response);
                // Clearing the form
                contactForm.trigger('reset');
            } else {
                toastr.error(data.response);

                // Logging the validation errors to the console.
                if (data.message !== undefined) {
                    $.each(data.message, function (index, value) {
                        console.warn(index + ' : ' + value);
                    });
                }
            }
        }).fail(function (jqXHR, textStatus, errorThrown) {
            toastr.error('OOPS ! Something gone wrong !');
            console.warn(jqXHR);
            console.warn(textStatus);
            console.warn(errorThrown);
        });
    };

    /* ------------------------------------------
     * LOAD SPINNER
     * ------------------------------------------ */

    var loadSpinner = function () {
        var loader = '<div class="overlay-spinner">' +
            '<div class="lds-roller">' +
            '<div></div>' +
            '<div></div>' +
            '<div></div>' +
            '<div></div>' +
            '<div></div>' +
            '<div></div>' +
            '<div></div>' +
            '<div></div>' +
            '</div>' +
            '</div>';

        contactForm.append(loader);
    };

    /* ------------------------------------------
     * REMOVE SPINNER
     * ------------------------------------------ */

    var removeSpinner = function () {
        var loader = contactForm.find('.overlay-spinner');
        loader.remove();
    }
});