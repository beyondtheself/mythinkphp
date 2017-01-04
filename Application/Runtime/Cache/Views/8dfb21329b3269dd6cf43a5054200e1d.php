<?php if (!defined('THINK_PATH')) exit();?><!--->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>STONE-thinkphp</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">STONE-thinkphp</a>
				</div>
		
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="#">主页</a></li>
						<li><a href="#">Link</a></li>
					</ul>
					<form class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Search">
						</div>
						<button type="submit" class="btn btn-default">Submit</button>
					</form>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#">Link</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">主题 <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo U('index',array('t'=>'default'));?>">默认主题</a></li>
								<li><a href="<?php echo U('index',array('t'=>'stone'));?>">stone主题</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>
<div class="container">
    
        <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                &times;
            </button>
            <strong>Header模版继承</strong>
        </div>
    
    <div class="col-md-2 list-group">
        <a class="list-group-item" href="<?php echo U('index');?>">主页</a>
        <a class="list-group-item" href="<?php echo U('friends');?>">好友列表</a>
    </div>
    <div class="col-md-10">
        
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">好友列表</h3>
    </div>
    <ul class="list-group media-list">
        <!-- volist循环 -->
        <?php if(is_array($friends)): $i = 0; $__LIST__ = $friends;if( count($__LIST__)==0 ) : echo "你个穷碧没朋友" ;else: foreach($__LIST__ as $key=>$friend): $mod = ($i % 2 );++$i;?><li class="list-group-item media">
                <a class="pull-left" href="#">
                    <!-- empty判断头像是否为空 -->
                    <?php if(empty($friend['avatar'])): ?><img width="120" height="120" class="media-object"
                             src="/Uploads/avatar/default.png" alt="<?php echo ($friend['username']); ?>">
                        <?php else: ?>
                        <img width="120" height="120" class="media-object"
                             src="/Uploads/avatar/<?php echo ($friend['avatar']); ?>" alt="<?php echo ($friend['username']); ?>"><?php endif; ?>
                </a>
                <div class="media-body">
                    <h4 class="media-heading">

                        <!-- eq 判断年龄是否是30岁-->
                        <?php echo ($friend['username']); ?>(今年<?php echo ($friend["age"]); ?>岁)
                        <?php if(($friend['age']) == "30"): ?><span class="label label-warning">您恰好30岁，真是猿粪啊！</span><?php endif; ?>
                        <!-- if/else-->
                        <?php if($friend['age'] < 18): ?><span class="pull-right">未成年，不显示</span>
                            <?php else: ?>
                            <a href="#" class="pull-right btn btn-warning">满18岁，可操作</a><?php endif; ?>
                    </h4>
                    <p>
                        <!-- 比较标签-->
                        <!-- lt比较年龄-->
                        <?php if(($friend['age']) < "18"): ?>未成年<?php endif; ?>
                        <!-- compare比较年龄-->
                        <?php if(($friend['age']) < "18"): ?><span class="text-danger">
										注意：compare标签也提示：<?php echo ($friend['username']); ?>未成年！
									</span><?php endif; ?>
                        <!-- egt方式比较年龄-->
                        <?php if(($friend['age']) >= "35"): ?>中年人<?php endif; ?>
                        <!-- between 方式比较年龄-->
                        <?php $_RANGE_VAR_=explode(',',"18,34");if($friend['age']>= $_RANGE_VAR_[0] && $friend['age']<= $_RANGE_VAR_[1]):?>青年<?php endif; ?>
                    </p>
                </div>
                <div>
                    标签：
                    <!-- volist循环嵌套输出tags标签-->
                    <?php if(is_array($friend['tags'])): $i = 0; $__LIST__ = $friend['tags'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i;?><span class="label label-success"><?php echo ($tag); ?></span><?php endforeach; endif; else: echo "你个穷碧没朋友" ;endif; ?>
                </div>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div>


    </div>
</div>
<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>

 		<script type="text/javascript" src="/Public/Js/bootstrap.js"></script>

 		<script type="text/javascript" src="/Public/js/jquery.js"></script>

 		<link rel="stylesheet" type="text/css" href="/Public/css/bootstrap.css" />

 		<script type="text/javascript" src="./Cdn/js/bootstrap.js"></script>
</body>
</html>