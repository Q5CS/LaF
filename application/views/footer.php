</div>

<!-- About dialog -->
<div class="mdui-dialog" id="about-dialog">
  <div class="mdui-dialog-title">关于</div>
  <div class="mdui-dialog-content">
    <p>程序设计： <a href="https://fly.moe" target="_blank">Fly3949</a></p>
    <p>Made with LOVE by <a href="https://www.qz5z.tech" target="_blank">泉州五中电研社</a></p>
    <p>如有操作上的问题，可以通过 <a href="mailto:i@fly.moe">邮件</a> 或 <a href="http://wpa.qq.com/msgrd?v=3&uin=394976586&site=qq&menu=yes" target="_blank">QQ</a> 联系我们</p>
  </div>
  <div class="mdui-dialog-actions">
    <!--<button class="mdui-btn mdui-ripple" mdui-dialog-close>关闭</button>-->
  </div>
</div>

</body>
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="assets/js/mdui.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/global.js"></script>
<?php
for ($i=1;$i<=count($add_js);$i++) {
    echo '<script src="assets/js/'. $add_js[$i-1] . '"></script>' . PHP_EOL;
}
?>
</html>