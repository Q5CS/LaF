var now=0;

var html_finding = '<div class="mdui-chip"><span class="mdui-chip-icon mdui-color-red"><i class="mdui-icon material-icons">close</i></span><span class="mdui-chip-title mdui-hidden-sm-down">未找到</span></div>'
var html_found = '<div class="mdui-chip"><span class="mdui-chip-icon mdui-color-green"><i class="mdui-icon material-icons">check</i></span><span class="mdui-chip-title mdui-hidden-sm-down">已找到</span></div>';
var html_finding2 = '<div class="mdui-chip"><span class="mdui-chip-icon mdui-color-red"><i class="mdui-icon material-icons">close</i></span><span class="mdui-chip-title">未找到</span></div>'
var html_found2 = '<div class="mdui-chip"><span class="mdui-chip-icon mdui-color-green"><i class="mdui-icon material-icons">check</i></span><span class="mdui-chip-title">已找到</span></div>';

function formatDate(timestamp)   {
    var now=new Date(parseInt(timestamp));
    return now.Format("yyyy-MM-dd");
}
              
function show(start,end) {
    $('.mdui-progress').show();
    $.ajax({
        type: "GET",
        url: "api/lost/show/"+start+"/"+end,
        dataType: "json",
        success: function (json) {
            $('#lost-tbody').html('');
            for(var i=0;i<json.length;i++) {
                console.log(json[i].time);
                text =
                    '<tr item-id='+ json[i].id +'>'+
                        '<td>'+ json[i].title +'</td>'+
                        '<td>'+ json[i].place +'</td>'+
                        '<td class="mdui-hidden-sm-down">'+ formatDate(json[i].time) +'</td>'
                    ;
                if(json[i].status === '0') {
                    text += '<td>'+html_finding+'</td>';
                }
                if(json[i].status === '1') {
                    text += '<td>'+html_found+'</td>';
                }
                text += '</tr>';
                $('#lost-tbody').append(text);
            }
            bindAll();
            $('.mdui-progress').hide();
        }
    });
}

function showOne(id) {
    $.ajax({
        type: "GET",
        url: "api/lost/showOne/"+id,
        dataType: "json",
        success: function (json) {
            $('#detail-title').html(json[0].title);
            $('#detail-content').html(
                '<h4>遗失物品</h4>'+'<p>'+json[0].title+'</p>'+
                '<h4>物品描述</h4>'+'<p>'+json[0].descrp+'</p>'+
                '<h4>遗失地点</h4>'+'<p>'+json[0].place+'</p>'+
                '<h4>遗失时间</h4>'+'<p>'+formatDate(json[0].time)+'</p>'+
                '<h4>联系方式</h4>'+'<p>'+json[0].contact+'</p>'
                );
                
            if(json[0].status === '0') {
                $('#detail-content').append('<h4>物品状态</h4>'+html_finding2);
            }
            if(json[0].status === '1') {
                $('#detail-content').append('<h4>物品状态</h4>'+html_found2);
            }

            if(json[0].img_name !== null) {
                $('#detail-content').append('<h4>参考图片</h4>'+'<img class="preview-img" src="https://laf-cdn.iifly.cn/upload/item_pic/'+json[0].img_name+'!preview"</img>');
            }
            $('#detail-content').append('<div class="social-share"></div>');
            var $config = {
                url                 : 'https://laf.iifly.cn/main/lost', // 网址，默认使用 window.location.href
                source              : 'https://laf.iifly.cn/main/lost', // 来源（QQ空间会用到）, 默认读取head标签：<meta name="site" content="http://overtrue" />
                title               : '泉州五中失物招领平台', // 标题，默认读取 document.title 或者 <meta name="title" content="share.js" />
                description         : '#寻物启事#\n物品名称：'+json[0].title+'\n ,遗失地点：'+json[0].place+'\n ,遗失时间：'+formatDate(json[0].time)+'\n ,请发现线索的同学尽快联系失主！', // 描述, 默认读取head标签：<meta name="description" content="PHP弱类型的实现原理分析" />
                image               : 'https://laf-cdn.iifly.cn/upload/item_pic/'+json[0].img_name+'!preview', // 图片, 默认取网页中第一个img标签
                sites               : ['qzone', 'qq', 'weibo','wechat', 'douban'], // 启用的站点
                disabled            : ['google', 'facebook', 'twitter'], // 禁用的站点
                wechatQrcodeTitle   : '微信扫一扫：分享', // 微信二维码提示文字
                wechatQrcodeHelper  : '<p>微信里点“发现”，扫一下</p><p>二维码便可将本文分享至朋友圈。</p>'
            };
            $('.social-share').share($config);
            
            $('#detail-modal').modal(); 
        }
    });
}

function bindAll() {
    $('#lost-tbody tr').click(function(){
        id = $(this).attr('item-id');
        showOne(id);
    });
}

var layer;
layui.use(['laypage','layer'], function(){
  var laypage = layui.laypage;
  layer = layui.layer;
  
    laypage.render({
      elem: 'page'
      ,count: num //数据总数，从服务端得到
      ,limit: perPage
      ,jump: function(obj, first){
        //obj包含了当前分页的所有参数，比如：
        console.log(obj.curr); //得到当前页，以便向服务端请求对应页的数据。
        console.log(obj.limit); //得到每页显示的条数
        show((obj.curr-1)*perPage,(obj.curr-1)*perPage+perPage);
        
        //首次不执行
        if(!first){
          //do something
        }
      }
    });
});