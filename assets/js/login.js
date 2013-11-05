var Login = function () {
    var runLoginButtons = function () {
        $('.register').bind('click', function () {
           alert("Hey dude! Do you really think that we can help you? Go and learn how to use faceook.");
        });
    };

    return {
        //main function to initiate template pages
        init: function () {
            runLoginButtons();
        }
    };
}();