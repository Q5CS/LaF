<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<!--
一张网页，要经历怎样的过程，才能抵达用户面前？
一位新人，要经历怎样的成长，才能站在技术之巅？
探寻这里的秘密；
体验这里的挑战；
成为这里的主人；
加入泉五电研社，你，可以影响世界。
-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href='<?php echo base_url();?>' />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/layui/css/layui.css">
    <link rel="stylesheet" href="assets/css/mdui.min.css">
    <link rel="stylesheet" href="assets/css/global.css">
    
    <title>失物招领平台</title>
    <meta name="description" content="泉州五中失物招领平台" />

    <!--[if lt IE 10]>
    <script type="text/javascript" src="https://cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
    <script src="https://wuyongzhiyong.b0.upaiyun.com/iedie/v1.2/script.min.js"></script>
    <![endif]-->
    
    <?php
      for ($i=1;$i<=count($add_css);$i++) {
          echo '<link href="assets/css/'. $add_css[$i-1] . '" rel="stylesheet">' . PHP_EOL;
      }
    ?>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-78734040-6"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-78734040-6');
    </script>

</head>
<body class="mdui-theme-primary-blue mdui-theme-accent-indigo mdui-appbar-with-toolbar mdui-drawer-body-left">

<header class="mdui-appbar mdui-appbar-fixed">
    <div class="mdui-toolbar mdui-color-theme">
        <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white" mdui-drawer="{target: '#main-drawer'}"><i class="mdui-icon material-icons">menu</i></span>
        <span class="mdui-typo-title">失物招领平台</span>
        <div class="mdui-toolbar-spacer"></div>
        <?php
            if ($logged) {
                echo '<a href="#" id="btn-logout" class="mdui-btn">注销</a>';
            }
        ?>
    </div>
</header>
<div class="mdui-drawer" id="main-drawer">
    <div class="mdui-list" mdui-collapse="{accordion: true}" style="margin-bottom: 76px;">

        <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
            <a href="main/found" style="padding-right:32px"><i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-green">explore</i></a>
            <a href="main/found" class="mdui-list-item-content">失物招领</a>
        </div>

        <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
            <a href="main/lost" style="padding-right:32px"><i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-orange">youtube_searched_forss</i></a>
            <a href="main/lost" class="mdui-list-item-content">寻物启事</a>
        </div>

        <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
            <a href="main/post" style="padding-right:32px"><i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-red">edit</i></a>
            <a href="main/post" class="mdui-list-item-content">信息发布</a>
        </div>
        
        <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
            <a href="main/dashboard" style="padding-right:32px"><i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-light-green">person</i></a>
            <a href="main/dashboard" class="mdui-list-item-content">个人中心</a>
        </div>
<?php
    if ($admin) {
        echo '
        <!-- admin -->
        <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
            <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-red">build</i>
            <a href="/admin" class="mdui-list-item-content">管理面板</a>
        </div>';
    }
?>
        <!-- about -->
        <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
            <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-blue">info_outline</i>
            <a class="about-btn mdui-list-item-content">关于</a>
        </div>
    </div>
</div>
<div class="mdui-container">