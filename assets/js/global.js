$('#btn-logout').click(function() {
    $.ajax({
        type: "GET",
        url: "api/user/logout",
        dataType: "json",
        success: function (response) {
            if(response.status>0) {
                window.location = '/';
            } else {
                alert(response.msg);
            }
        }
    });
});
$('#btn-login').click(function() {
    mdui.snackbar({message: "登录中，请稍候" });
    $(this).attr('disabled','');
    un = $('#username').val();
    pw = $('#password').val();
    rm = $('#login-remember').is(':checked');
    $.ajax({
        type: "POST",
        url: "api/user/login",
        data: {
            "name": un,
            "pw": pw,
            "rm": rm
        },
        dataType: "json",
        success: function (response) {
            if(response.status>0) {
                window.location.href = "/";
            } else {
                alert(response.msg);
            }
        }
    });
    $(this).removeAttr('disabled');
});
$('.donate-btn').click(function() {
    var dialog = new mdui.Dialog($('#donate-dialog'));
    dialog.open();
});
$('.about-btn').click(function() {
    var dialog = new mdui.Dialog($('#about-dialog'));
    dialog.open();
});
$('#password').bind('keypress',function(event){
    if(event.keyCode == "13") {
        $('#btn-login').click();
    }
});

Date.prototype.Format = function (fmt) { //author: meizz 
    var o = {
        "M+": this.getMonth() + 1, //月份 
        "d+": this.getDate(), //日 
        "h+": this.getHours(), //小时 
        "m+": this.getMinutes(), //分 
        "s+": this.getSeconds(), //秒 
        "q+": Math.floor((this.getMonth() + 3) / 3), //季度 
        "S": this.getMilliseconds() //毫秒 
    };
    if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
    for (var k in o)
    if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
    return fmt;
}