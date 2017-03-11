$(function () {
/** FOR CONTACT FORM **/

    $('#contact-form').on('submit', function (e) {
        if (!e.isDefaultPrevented()) {
            var url = "sendemail.php";

            $.ajax({
                type: "POST",
                url: 'sendemail.php',
                data: $(this).serialize(),
                success: function (data)
                {
                    var messageAlert = 'alert-' + data.type;
                    var messageText = data.message;
                    var alertBox = '<div class="alert ' + messageAlert + ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + messageText + '</div>';
                    if (messageAlert && messageText) {
                        $('#contact-form').find('.messages').html(alertBox);
                        $('#contact-form')[0].reset();
                    }
                }
            });
            return false;
        }
    })
/** END CONTACT FORM **/
/** HERO BAR CAROUSEL **/
    $("#myCarousel").carousel({
         interval : 9000,
         pause: false
     });
/** HERO BAR CAROUSEL **/
/** DATE PICKER **/
    $('.input-daterange').datepicker({
    });
/** DATE PICKER **/
/** SELECT ROOMS **/
    // $('#cameratagete').click(function(){
    //     $('#sel2 option[value="Camera Tagete"]').attr('selected', true);
    //     });
    // $('#cameraoleandro').click(function(){
    //     $('#sel2 option[value="Camera Oleandro"]').attr('selected', true);
    //     });
    // $('#cameragelsomino').click(function(){
    //     $('#sel2 option[value="Camera Gelsomino"]').attr('selected', true);
    //     });
/** END SELECT ROOMS **/
});