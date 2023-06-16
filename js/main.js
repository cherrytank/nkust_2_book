function generateSerialNumber() {
    var timestamp = Date.now().toString(); // 獲取當前時間戳並轉換為字串
    var random = Math.floor(Math.random() * 10000); // 生成0到9999之間的隨機數

    // 將時間戳和隨機數結合生成流水號
    var serialNumber = timestamp + random;

    return serialNumber;
}
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
var imgid = "";
function salebook(){
    var sunber = generateSerialNumber(); 
    $.post(
        'http://localhost/nkust_2_book/php/salebook.php',
    {   
        ordernumber:sunber,
        ISBN: $('#ISBN').val(),
        bookname: $('#bookname').val(),
        author: $('#author').val(),
        price: $('#price').val(),
        college: $('#college').val(),
        exchang: $('#exchang').val(),
        img_id:imgid,
    },
        function(status){
            if(status=='success'){
                $("#salebook_success_button").click();
            }
            else{
                alert(status);
                $("#salebook_fail_button").click();
            }
        }
    );
    console.log("salebooksalebooksalebook");
}

function upimg(){
    $('#uploadForm').on('submit', function(e) {
        e.preventDefault(); // 阻止表單提交
        var formData = new FormData(this);
        $.ajax({
            url: '../php/upload.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                alert(response);
                imgid = response;
            }
        });
    });
}


