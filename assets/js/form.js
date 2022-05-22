$(function () {

    // proverka formi
    $('#form').validator();

    // when the form is submitted
    $('#form').on('submit', function (e) {

        // if the validator does not prevent form submit
        if (!e.isDefaultPrevented()) {
            var url = "assets/php/post.php";

            // POST values in the background the the script URL
            $.ajax({
                type: "POST",
                url: url,
                data: $(this).serialize(),
                success: function (data)
                {
                    // data = JSON object that contact.php returns

                    // we recieve the type of the message: success x danger and apply it to the 
                    var messageAlert = 'alert-' + data.type;
                    var messageText = data.message;

                    // let's compose Bootstrap alert box HTML
                    var alertBox = '<div class="alert ' + messageAlert + ' alert-dismissable fade show"><button onclick="deleteAlert()" type="button" data-dismiss="alert" class="close" aria-hidden="true">&times;</button>' + messageText + '</div>';
                    
                    // If we have messageAlert and messageText
                    if (messageAlert && messageText) {
                        // inject the alert to .messages div in our form
                        $('#form').find('.messages').html(alertBox);
                        // empty the form
                        $('#form')[0].reset();
                    }
                }
            });
            return false;
        } else {
            var alertBox = '<div class="alert alert-danger alert-dismissable fade show"><button onclick="deleteAlert()" type="button" data-dismiss="alert" class="close" aria-hidden="true">&times;</button>Будь ласка, заповніть усі поля</div>';
            $('#form').find('.messages').html(alertBox);
        }
    })

    /*Маска для инпутa*/
	var telInp = $('input[type="telephone"]');
	telInp.each(function(){
		$(this).mask("+38 (999) 999 99 99");
	});

});