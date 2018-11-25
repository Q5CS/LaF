<?php
echo "<script>var num = $num, perPage = $perPage ;</script>";
?>
<p style="text-align:center">点击表格查看详情</p>
<table id="found-table" class="mdui-table mdui-table-hoverable">
<thead>
  <tr>
    <th>物品名</th>
    <th>拾获地点</th>
    <th class="mdui-hidden-sm-down">拾获时间</th>
    <th style="width:25%">状态</th>
  </tr>
</thead>
<tbody id="found-tbody">
</tbody>
</table>

<div class="mdui-progress">
  <div class="mdui-progress-indeterminate"></div>
</div>

<div id="page"></div>

<!-- Detail Modal -->
<div class="modal fade" id="detail-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="detail-title">

				</h4>
			</div>
			<div class="modal-body" id="detail-content">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">关闭
				</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal -->
</div>
