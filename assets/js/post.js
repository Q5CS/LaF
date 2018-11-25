var fileName;
var title,descrp,place,place1,place2,time,time1,contact;
var type=1;

function myDate()   {
    var now=new Date();
    return now.Format("yyyy-MM-dd");
}

function myTimeStamp(date) {
    return new Date(date).getTime();
}

function switchTo(t_type) {
    type = t_type;
}

function confirm(callback) {
    mdui.dialog({
      title: '请确认您的信息！',
      content: '信息一旦发布，无法撤销，请确认是否继续？',
      history: false,
      buttons: [
        {
          text: '取消'
        },
        {
          text: '确认',
          onClick: function(inst){
            callback();
          }
        }
      ]
    });
}

function post() {
    title = $('#title').val().trim();
    descrp = $('#descrp').val().trim();
    place = $('#place').val().trim();
    place1 = $('#place1').val().trim();
    place2 = $('#place2').val().trim();
    time = $('#date-input1').val().trim();
    time1 = $('#date-input2').val().trim();
    contact = $('#contact').val().trim();
    
    if(title === '') alert('请填写物品名称'); else
    if(descrp === '') alert('请填写物品描述'); else
    if(contact === '') alert('请填写联系方式'); else
    
    if(type === 1) { // found
        if(place1 === '') alert('请填写拾获地点'); else
        if(place2 === '') alert('请填写保管地点'); else
        if(time1 === '') alert('请填写拾获时间'); else
        confirm(function(){post_found();});
    } else { // lost
        if(place === '') alert('请填写遗失地点'); else
        if(time === '') alert('请填写时间'); else
        confirm(function(){post_lost();});
    }
}

function post_found() {
    $('#add_btn').attr('disabled','true');
    time1 = myTimeStamp(time1);
    $.ajax({
        type: "POST",
        url: "api/post/post_found",
        dataType: "json",
        data: {
            "title": title,
            "descrp": descrp,
            "place1": place1,
            "place2": place2,
            "time": time1,
            "img_name": fileName,
            "contact": contact
        },
        success: function (json) {
            if(json.status > 0) {
                alert('发布成功！');
                window.location.href = '/main/found';
            } else {
                alert(json.msg);
            }
            $('#add_btn').removeAttr('disabled');
        }
    });
}

function post_lost() {
    $('#add_btn').attr('disabled','true');
    time = myTimeStamp(time);
    $.ajax({
        type: "POST",
        url: "api/post/post_lost",
        dataType: "json",
        data: {
            "title": title,
            "descrp": descrp,
            "place": place,
            "time": time,
            "img_name": fileName,
            "contact": contact
        },
        success: function (json) {
            if(json.status > 0) {
                alert('发布成功！');
                window.location.href = '/main/lost';
            } else {
                alert(json.msg);
            }
            $('#add_btn').removeAttr('disabled');
        }
    });
}

layui.use(['layer','laydate', 'upload'], function(){
  var layer = layui.layer
  ,laydate = layui.laydate
  ,upload = layui.upload;
  
    laydate.render({
      elem: '#date-input1'
      ,max: myDate()
    });
    laydate.render({
      elem: '#date-input2'
      ,max: myDate()
    });
    
  //普通图片上传
  var uploadInst = upload.render({
    elem: '#img_upload'
    ,url: '/api/post/img_upload'
    ,size: 20480
    ,before: function(obj){
      //预读本地文件示例，不支持ie8
      obj.preview(function(index, file, result){
        $('#img-demo').attr('src', result); //图片链接（base64）
      });
      layer.load(0, {
          shade: [0.5,'#000']
      });
    }
    ,done: function(res){
      layer.closeAll('loading'); //关闭loading
      //如果上传失败
      if(res.error != null){
        return layer.msg('上传图片失败');
      }
      //上传成功
      fileName = res.upload_data;
      return layer.msg('上传图片成功');
    }
    ,error: function(){
      layer.closeAll('loading'); //关闭loading
      //演示失败状态，并实现重传
      var demoText = $('#uploadText');
      demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-mini upload-reload">重试</a>');
      demoText.find('.upload-reload').on('click', function(){
        demoText.hide();
        uploadInst.upload();
      });
    }
  });
  
});

$('#add_btn').click(function(){
    post();
})