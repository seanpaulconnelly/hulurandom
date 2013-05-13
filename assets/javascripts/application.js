/*jslint browser: true*/
/*global $, jQuery, moment*/
// This is a manifest file that'll be compiled into application.min.js
(function () {
    var hulu = {
        init: function () {
            hulu.registerEvents();
        },

        registerEvents: function () {
            // Handles all form submissions
            $('body').on('submit', 'form', function (e) {
                e.preventDefault();

                var responseContainer = $(this).siblings('.response_container'),
                    codeContainer = $(this).siblings('.code_snippet'),
                    codeTemplate = $(codeContainer.data('template')).html(),
                    selectFields = $(this).find('input'),
                    loader = $(this).find('.loader'),
                    requestParams = {},
                    templateData = {
                        method: codeContainer.data('method'),
                        params: []
                    };

                // Retrieve all form options
                for (var i = 0;i < selectFields.length;i += 1) {
                    var key = $(selectFields[i]).attr('name'),
                        value = $(selectFields[i]).val();

                    // Only push parameters if the value isn't empty
                    if (value !== '') {
                        requestParams[key] = value;
                        templateData.params.push({key: key, value: value});
                    }
                }

                // Show the loader
                loader.removeClass('hide');

                // Make the request to api.php!
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'GET',
                    data: requestParams,
                    success: function (response) {
                        // Hide the loader
                        loader.addClass('hide');
                        // Render the response and display it in the response container
                        console.log(response)
                        responseContainer.html(response);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus);
                        console.log(errorThrown);
                    }
                });
            });
        }
    };

    $(document).ready(hulu.init);
}());