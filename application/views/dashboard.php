<div class="mdui-tab mdui-tab-full-width" mdui-tab style="margin-bottom:20px">
  <a href="#tab-found" class="mdui-ripple" onclick="switchTo(1)">我拾获的</a>
  <a href="#tab-lost" class="mdui-ripple" onclick="switchTo(2)">我遗失的</a>
</div>

<div id="view">
    <p style="text-align:center">点击表格修改状态</p>
    <table id="my-table" class="mdui-table mdui-table-hoverable">
    <thead>
      <tr>
        <th>物品名</th>
        <th>发布时间</th>
        <th style="width:25%">状态</th>
      </tr>
    </thead>
    <tbody id="my-tbody">
    </tbody>
    </table>
</div>

<div class="mdui-progress">
  <div class="mdui-progress-indeterminate"></div>
</div>