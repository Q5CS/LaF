var type=1, myUrl = 'api/dashboard/ifound', myText = '已取回';

var html_finding1 = '<div class="mdui-chip"><span class="mdui-chip-icon mdui-color-red"><i class="mdui-icon material-icons">close</i></span><span class="mdui-chip-title mdui-hidden-sm-down">未取回</span></div>'
var html_found1 = '<div class="mdui-chip"><span class="mdui-chip-icon mdui-color-green"><i class="mdui-icon material-icons">check</i></span><span class="mdui-chip-title mdui-hidden-sm-down">已取回</span></div>';
var html_finding2 = '<div class="mdui-chip"><span class="mdui-chip-icon mdui-color-red"><i class="mdui-icon material-icons">close</i></span><span class="mdui-chip-title mdui-hidden-sm-down">未找到</span></div>'
var html_found2 = '<div class="mdui-chip"><span class="mdui-chip-icon mdui-color-green"><i class="mdui-icon material-icons">check</i></span><span class="mdui-chip-title mdui-hidden-sm-down">已找到</span></div>';

function formatDate(timestamp)   {
    var now=new Date(parseInt(timestamp));
    return now.Format("yyyy-MM-dd");
}

function switchTo(t) {
    type = t;
    if(t == 1) { // found
        myUrl = 'api/dashboard/ifound';
        myText = '已取回'
    } else { // lost
        myUrl = 'api/dashboard/ilost';
        myText = '已找到'
    }
    getAll();
}

function bindAll() {
    $('#my-tbody tr').click(function(){
        id = $(this).attr('item-id');
        st = $(this).attr('status');
        if(st != 0) {
            alert('该物品'+myText);
        } else {
            confirm(function(){chStatus(id);});
        }
    });
}

function chStatus(id) {
    $.ajax({
        type: "POST",
        url: "api/dashboard/chStatus",
        dataType: "json",
        data: {
            "id": id,
            "type": type
        },
        success: function (json) {
            if(json.status > 0) {
                alert('修改成功！');
                getAll();
            } else {
                alert(json.msg);
            }
        }
    });
}

function getAll() {
    if(type == 1) {
        text1 = html_finding1;
        text2 = html_found1;
    } else {
        text1 = html_finding2;
        text2 = html_found2;
    }
    $('.mdui-progress').show();
    $.ajax({
        type: "GET",
        url: myUrl,
        dataType: "json",
        success: function (json) {
            $('#my-tbody').html('');
            for(var i=0;i<json.length;i++) {
                console.log(json[i].time);
                text =
                    '<tr item-id='+ json[i].id +' status='+ json[i].status +'>'+
                        '<td>'+ json[i].title +'</td>'+
                        '<td>'+ formatDate(json[i].r_time) +'</td>'
                    ;
                if(json[i].status === '0') {
                    text += '<td>'+ text1 +'</td>';
                }
                if(json[i].status === '1') {
                    text += '<td>'+ text2 +'</td>';
                }
                text += '</tr>';
                $('#my-tbody').append(text);
            }
            bindAll();
            $('.mdui-progress').hide();
        }
    });
}

function confirm(callback) {
    mdui.dialog({
      title: '请确认是否将物品状态修改为 <b style="color:red">'+ myText +'</b>',
      content: '一旦修改，无法撤销，请确认是否继续？',
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

switchTo(1);