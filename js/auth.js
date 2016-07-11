(function ($) {
        $.fn.formAuth = function (options) {
            var ret = this.each(function () {
                    var selObj = this; // the original select object.
                    var $selObj = $(this); // the original select object.
                    var $user = options.NameSelector || null;
                    var $pass = options.PassSelector || null;
                    var sumo = {
                        init: function () {
                            var that = this;
                            $selObj.find("input[type=submit]").click(function(e){
                                e.preventDefault();
                                if(that.checkUser() === true && that.checkPass() === true){
                                    $.post("validate.php", {"user": $user.val(), "password": $pass.val()}, function( data ) {
                                        if(typeof jQuery.parseJSON(data) =='object') {
                                            var response=jQuery.parseJSON(data);
                                            if(response.user === false) {
                                                $(".login_content").find('.alert').remove();
                                                $(".login_content").prepend("<div class='alert alert-danger'> " +
                                                " Your login is incorrect " +
                                                "</div>");
                                            }
                                            else {
                                                $(".login_content").find('.alert').remove();
                                                $(".login_content").prepend("<div class='alert alert-success'> " +
                                                "Your login is correct. Your user is " + response.user +
                                                "</div>");
                                            }
                                        }
                                    });
                                }
                            });
                        },
                        checkUser:function()  {
                            return $selObj.find($user).val() ? true: false;
                        },
                        checkPass:function() {
                            return $selObj.find($pass).val() ? true: false;
                        }
                    }
                    sumo.init();
                }
            );
        }
    }
    (jQuery)
);

