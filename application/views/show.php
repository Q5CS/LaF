<div class="mdui-tab mdui-tab-centered mdui-tab-full-width" mdui-tab>
  <a href="#tab1" id="btn-switch-type-1" class="mdui-ripple">会徽</a>
  <a href="#tab2" id="btn-switch-type-2" class="mdui-ripple">吉祥物</a>
</div>

<p style="text-align:center">您正在查看的是 <b><span id="current-type"></span></b> ；</p>
<!--<p style="text-align:center">您还有 <b><span id="remain-vote"></span></b> 次投票机会；</p>-->
<p style="text-align:center">您可以分别为每件作品投上一票，最多三票，投票后无法撤销，请慎重选择；</p>
<p style="text-align:center">具体规则请参见首页。</p>

<?php
$now = time();
echo '<p style="text-align:center">投票时间： <b>'. date('Y-m-d H:i:s', $startTime) .'</b> 至 <b>'. date('Y-m-d H:i:s', $endTime) .'</b>。</p>'.PHP_EOL;

if ($now<$startTime) {
    echo '<p id="wait" style="text-align:center;color:red">本次投票暂未开始，您可以先查看作品。</p>'.PHP_EOL;
}
if ($now>$endTime) {
    echo '<p id="ended" style="text-align:center;color:red">本次投票已经结束，感谢您的支持。</p>'.PHP_EOL;
}

echo '<script>';
if ($now<$startTime) {
    echo 'var status=-1;'.PHP_EOL;
} elseif ($now>$endTime) {
    echo 'var status=-2;'.PHP_EOL;
} else {
    echo 'var status=1;'.PHP_EOL;
}
echo 'var limit='.$limit.';'.PHP_EOL;
echo '</script>';
?>
<div class="mdui-row" id="item-list">
  <!--
  <div class="mdui-col-xs-12 mdui-col-sm-6 item-card">
    <div class="mdui-card">
      <div class="mdui-card-header">
        <img class="mdui-card-header-avatar" src="//mdui-org.b0.upaiyun.com/docs/assets/docs/img/avatar1.jpg">
        <div class="mdui-card-header-title">Title</div>
        <div class="mdui-card-header-subtitle">Subtitle</div>
      </div>
      <div class="mdui-card-media">
        <img src="//mdui-org.b0.upaiyun.com/docs/assets/docs/img/card.jpg">
      </div>
      <div class="mdui-card-primary">
        <div class="mdui-card-primary-title">Title</div>
        <div class="mdui-card-primary-subtitle">Subtitle</div>
      </div>
      <div class="mdui-card-actions">
        <button class="mdui-btn mdui-ripple">投上一票</button>
        <button class="mdui-btn mdui-ripple">作品内容</button>
      </div>
    </div>
  </div>
  -->
  
</div>

<button id="btn-post-vote" class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent mdui-center">提交</button>

<!-- Introduction Modal -->
<div class="modal fade" id="detail-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="item-title">

				</h4>
			</div>
			<div class="modal-body" id="item-content">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">关闭
				</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal -->
</div>
