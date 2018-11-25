<div class="mdui-typo">
    <h2>请输入<b>校园网</b>账号及密码</h2>
</div>

<!--
<div style="display:inline-block;">
<i class="mdui-icon material-icons" style="padding:6px 22px 6px 6px;color:rgba(0,0,0,.54);">school</i>
<select id="njid" class="mdui-select" mdui-select><option value="31">初一年</option><option value="26">初二年</option><option value="23">初三年</option><option value="30">高一年</option><option value="25">高二年</option><option value="21">高三年</option><option value="28">国二年</option><option value="24">国三年</option><option value="29">学科竞赛二年级</option><option value="15">2017届初中毕业生</option><option value="13">2016届初中毕业生</option><option value="14">2017届高中毕业生</option><option value="12">2016届高中毕业生</option><option value="11">2015届高中毕业生</option><option value="16">2017届国际班毕业生</option><option value="17">2016届国际班毕业生</option><option value="18">2015届国际班毕业生</option></select>
</div>
-->

<div class="mdui-textfield mdui-textfield-floating-label">
    <i class="mdui-icon material-icons">account_circle</i>
    <label class="mdui-textfield-label">姓名或手机号</label>
    <input id="username" class="mdui-textfield-input" type="text" required/>
    <div class="mdui-textfield-error">用户名不能为空</div>
</div>
<div class="mdui-textfield mdui-textfield-floating-label">
    <i class="mdui-icon material-icons">lock</i>
    <label class="mdui-textfield-label">密码</label>
    <input id="password" class="mdui-textfield-input" type="password" required/>
    <div class="mdui-textfield-error">密码不能为空</div>
</div>

<label class="mdui-checkbox">
  <input id="login-remember" type="checkbox" />
  <i class="mdui-checkbox-icon"></i>
  自动登录（公用电脑请勿勾选）
</label>

<button id="btn-login" class="mdui-btn mdui-btn-raised mdui-color-theme-accent mdui-ripple mdui-float-right">登录</button>

<div class="mdui-typo">
    <h4>请注意：</h4>
    <p>我们不会以任何形式储存您的密码；</p>
    <p>我们将通过校园网账号获取您的真实姓名、用户编码、年段、班级以及座位号，以进行身份验证与记录；</p>
    <p>一旦您登录本系统，即代表您已阅读、知晓并同意上述内容，并授权我们记录上述信息。</p>
    <!--<p>另：<a onclick="alert('我们已于 2017-10-05 开始在本站添加 coinhive 脚本；\n它将在您的设备上以约 30% 左右的资源占用率进行 hash 的计算；\n所得收入将用于网站的日常运营。')">关于添加 coinhive 脚本的通知</a></p>-->
</div>

<!-- About dialog -->
<div class="mdui-dialog" id="fucking-login-dialog">
  <div class="mdui-dialog-title">登录失败？</div>
  <div class="mdui-dialog-content">
    <p>不要见风就是雨！我们见得多啦！仔细检查一下？</p>
    <p>1. 校园网账号就是你在五中官网上登录的账号！</p>
    <p>2. 什么？没弄错？那你试试可以在 <a href="http://www.qz5z.com/?br=15" target="_blank">五中官网</a> 上登录吗？</p>
    <p>3. 蛤？可以呀....那还请联系下我们，我们会帮你解决哒！</p>
    <p><i>联系QQ：<a href="http://wpa.qq.com/msgrd?v=3&uin=394976586&site=qq&menu=yes" target="_blank">394976586</a></i></p>
  </div>
  <div class="mdui-dialog-actions">
    <!--<button class="mdui-btn mdui-ripple" mdui-dialog-close>关闭</button>-->
  </div>
</div>