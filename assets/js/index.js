$.ajax({
    type: "GET",
    url: "api/user/login",
    dataType: "json",
    success: function (response) {
        $('#main-name').html(response.name);
    }
});