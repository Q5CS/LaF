<div class="mdui-tab mdui-tab-full-width" mdui-tab style="margin-bottom:20px">
  <a href="#tab-found" class="mdui-ripple" onclick="switchTo(1)">我拾获了物品</a>
  <a href="#tab-lost" class="mdui-ripple" onclick="switchTo(2)">我遗失了物品</a>
</div>

<div class="mdui-textfield">
  <label class="mdui-textfield-label">物品名称</label>
  <input id="title" class="mdui-textfield-input" type="text" maxlength="20" placeholder="如：黑框方形眼镜，黑色腰带，紫色钱包。"/>
</div>

<div class="mdui-textfield">
  <label class="mdui-textfield-label">物品描述</label>
  <textarea id="descrp" class="mdui-textfield-input" type="text" maxlength="300" style="min-height:50px" placeholder="描述物品特点，不超过 300 字。如品牌、特征、内含物品。"></textarea>
</div>

<div id="tab-found">
    <div class="mdui-textfield">
      <label class="mdui-textfield-label">拾获地点</label>
      <textarea id="place1" class="mdui-textfield-input" type="text" maxlength="30" style="min-height:50px" placeholder="在何处拾获该物品，30字以内。如：戴亚明广场、食堂一楼、男宿一楼、高一楼三楼。"></textarea>
    </div>
    
    <div class="mdui-textfield">
      <label class="mdui-textfield-label">保管地点</label>
      <textarea id="place2" class="mdui-textfield-input" type="text" maxlength="30" style="min-height:50px" placeholder="现在该物品在何处保管，30字以内。如：一楼超市、二楼超市、X年X班、XX老师。"></textarea>
    </div>
    
    <div class="mdui-textfield">
      <label class="mdui-textfield-label">拾获时间</label>
      <input id="date-input2" class="mdui-textfield-input" type="text" placeholder="请选择时间。" readonly />
    </div>
</div>
<div id="tab-lost">
    <div class="mdui-textfield">
      <label class="mdui-textfield-label">遗失地点</label>
      <textarea id="place" class="mdui-textfield-input" type="text" maxlength="30" style="min-height:50px" placeholder="在何处遗失该物品，30字以内。如：戴亚明广场、食堂一楼、男宿一楼、高一楼三楼。"></textarea>
    </div>
    
    <div class="mdui-textfield">
      <label class="mdui-textfield-label">遗失时间</label>
      <input id="date-input1" class="mdui-textfield-input" type="text" placeholder="请选择时间。" readonly />
    </div>
</div>


<div class="mdui-textfield">
  <label class="mdui-textfield-label">联系方式</label>
  <textarea id="contact" class="mdui-textfield-input" type="text" maxlength="20" style="min-height:50px" placeholder="可以留下 QQ、手机号等信息。如：QQ 3392863533、手机 18905950000."></textarea>
</div>

<p>如果可以，请上传一张有代表性的物品图片（如没有，可不上传）</p>
<div class="layui-upload">
  <button type="button" class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent" id="img_upload">上传图片</button>
  <div class="layui-upload-list">
    <img id="img-demo" class="layui-upload-img" style="max-width:90%;max-height:400px">
    <p id="uploadText"></p>
  </div>
</div>

<p>
    发布内容遵循“前台匿名，后台实名”原则，您的个人信息（除联系方式外）不会被公开，但将会作为记录保留。
    <br>
    发布内容前，请确保所填写的信息真实有效，并且符合相关法律法规。平台将不会验证信息真实性。一旦发现恶意发布信息，我们将直接锁定账号，不再另行通知。
</p>

<button id="add_btn" class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent mdui-center" style="margin-top:20px">发布</button>
