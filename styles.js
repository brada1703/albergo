$(function () {
/************************** FOR CONTACT FORM***************************/

    $('#contact-form').on('submit', function (e) {
        if (!e.isDefaultPrevented()) {
            var url = "contact.php";

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
/************************** FOR CONTACT FORM***************************/
/************************** HERO BAR CAROUSEL *************************/
    $("#myCarousel").carousel({
         interval : 9000,
         pause: false
     });
/************************** HERO BAR CAROUSEL *************************/
/************************** ROOM MODALS - L'altra Camera **************/
    $(".openModalClassicDoubleRoom").click(function(){
        $("#myModal").modal();
        });
    $(".modal-transparent").on('show.bs.modal', function () {
      setTimeout( function() {
        $(".modal-backdrop").addClass("modal-backdrop-transparent");
        }, 0);
        });
    $(".modal-transparent").on('hidden.bs.modal', function () {
        $(".modal-backdrop").addClass("modal-backdrop-transparent");
        });
    $(".modal-fullscreen").on('show.bs.modal', function () {
        setTimeout( function() {
        $(".modal-backdrop").addClass("modal-backdrop-fullscreen");
      }, 0);
        });
    $(".modal-fullscreen").on('hidden.bs.modal', function () {
        $(".modal-backdrop").addClass("modal-backdrop-fullscreen");
        });
    $('.selectLaltraCamera').on('click', function(){
        $('#sel2').val('L\'altra Camera');
        })
/************************** ROOM MODALS - L'altra Camera END **********/
/************************** ROOM MODALS - La Camera Rosa **************/

    $(".openModalLaCameraRosa").click(function(){
        $("#modalCameraRosa").modal();
    });

    $(".modal-transparent").on('show.bs.modal', function () {
      setTimeout( function() {
        $(".modal-backdrop").addClass("modal-backdrop-transparent");
      }, 0);
    });
    $(".modal-transparent").on('hidden.bs.modal', function () {
      $(".modal-backdrop").addClass("modal-backdrop-transparent");
    });

    $(".modal-fullscreen").on('show.bs.modal', function () {
      setTimeout( function() {
        $(".modal-backdrop").addClass("modal-backdrop-fullscreen");
      }, 0);
    });
    $(".modal-fullscreen").on('hidden.bs.modal', function () {
      $(".modal-backdrop").addClass("modal-backdrop-fullscreen");
    });
        $('[data-toggle="tooltip"]').tooltip();
    $('.selectCameraRosa').on('click', function(){
        $('#sel2').val('La Camera Rosa');
        })
/************************** ROOM MODALS - La Camera Rosa END **********/
/************************** ROOM MODALS - La Camera Gialla ************/
    $(".openModalCameraGialla").click(function(){
        $("#modalCameraGialla").modal();
        });
    $(".modal-transparent").on('show.bs.modal', function () {
      setTimeout( function() {
        $(".modal-backdrop").addClass("modal-backdrop-transparent");
        }, 0);
        });
    $(".modal-transparent").on('hidden.bs.modal', function () {
        $(".modal-backdrop").addClass("modal-backdrop-transparent");
        });
    $(".modal-fullscreen").on('show.bs.modal', function () {
      setTimeout( function() {
        $(".modal-backdrop").addClass("modal-backdrop-fullscreen");
      }, 0);
        });
    $(".modal-fullscreen").on('hidden.bs.modal', function () {
      $(".modal-backdrop").addClass("modal-backdrop-fullscreen");
        });
    $('.selectCameraGialla').on('click', function(){
        $('#sel2').val('La Camera Gialla');
        })
/************************** ROOM MODALS - La Camera Gialla END ********/
/************************** ROOM MODALS - PROPERTY ********************/
    $(".openProperty").click(function(){
        $("#myModalProperty").modal();
    });
    $(".modal-transparent").on('show.bs.modal', function () {
      setTimeout( function() {
        $(".modal-backdrop").addClass("modal-backdrop-transparent");
      }, 0);
    });
    $(".modal-transparent").on('hidden.bs.modal', function () {
      $(".modal-backdrop").addClass("modal-backdrop-transparent");
    });
    $(".modal-fullscreen").on('show.bs.modal', function () {
      setTimeout( function() {
        $(".modal-backdrop").addClass("modal-backdrop-fullscreen");
      }, 0);
    });
    $(".modal-fullscreen").on('hidden.bs.modal', function () {
      $(".modal-backdrop").addClass("modal-backdrop-fullscreen");
    });
/************************** ROOM MODALS - PROPERTY END ****************/
/************************** SELECT ROOM *******************************/
    $('a').click(function() {
        var select_num = $(this).index() + 1;
        $('#items option').eq(select_num).attr('selected', 'selected');
    });
/************************** SELECT ROOM END ***************************/
});
