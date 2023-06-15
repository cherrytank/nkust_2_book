function register(){
    $.post(
        'http://localhost/nkust_2_book/php/register.php',
    {   ID: $('#register_email').val(),
        name: $('#register_name').val(),
        email: $('#register_email').val()+"@nkust.edu.tw",
        local: $('#register_local').val(),
        phone: $('#register_phone').val(),
        password: $('#register_password').val(),},
        function(status){
            if(status=='success'){
                $("#registerindows_success_button").click();
                $("#register_close").click();
            }
            else{
                $("#registerwindows_fail_button").click();
            }
        }
    );
}

function login(){
    $.post(
        'http://localhost/nkust_2_book/php/login.php',
    {   ID: $('#login_ID').val(),
        password: $('#login_password').val(),},
        function(status){
            if(status=='success'){
                $("#loginwindows_success_button").click();
                $("#loginwindows_button").addClass("d-none");
                $("#registerindows_button").addClass("d-none");
                $("#personal_iocn").removeClass("d-none");
                $("#login_close").click();
            }
            else{
                $("#loginwindows_fail_button").click();
            }
        }
    );
}