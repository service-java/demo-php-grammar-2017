<!doctype html>
<?php
	include "include/User.php";
	session_start();	
	@$username = stripslashes(trim($_POST['txtLoginName']));//用户名
	@$password = stripslashes(trim($_POST['txtLoginPwd']));//密码
	@$k = stripslashes(trim($_GET['k']));
	if ($username <> "" && $password <> "") 
	{
		$user = new User();
		$ret = $user->loginUser($username,$password);
		if ($ret>0)
		{
			header("Location: index/index.php"); 
			exit;
		}else
		{
			$k = "该用户名登录失败!";
		}		
	}	
?>
<html>
<head>
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Zioer CMS系统</title>
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link type="text/css" href="assets/css/custom-theme/jquery-ui-1.10.0.custom.css" rel="stylesheet" />
<link type="text/css" href="assets/css/font-awesome.min.css" rel="stylesheet" />
<!--[if IE 7]>
<link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css">
<![endif]-->
<!--[if lt IE 9]>
<link rel="stylesheet" type="text/css" href="assets/css/jquery.ui.1.10.0.ie.css"/>
<![endif]-->
<link href="assets/css/docs.css" rel="stylesheet">
<link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="assets/css/theme.css">

<style type="text/css">
    body{
		height:100%;
	}
	html{
		height:100%;
	}
    #line-chart {
        height:300px;
        width:800px;
        margin: 0px auto;
        margin-top: 1em;
    }
    .brand { font-family: georgia, serif; }
    .brand .first {
        color: #ccc;
        font-style: italic;
    }
    .brand .second {
        color: #fff;
        font-weight: bold;
    }
	.btnLogin{
		margin:0;
		padding:0;
		border:0;
		background-image:url(images/desc.gif); 
		width:58px;
		height:30px; 
		cursor:pointer;  
	}
</style>

</head>
<!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
<!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
<!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
<!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> 
<body class=""> 
<!--<![endif]-->

<div class="navbar">
    <div class="navbar-inner">
            <ul class="nav pull-right">
                
            </ul>
            <a class="brand" href="#"><span class="first">Zioer</span> <span class="second">CMS管理系统</span></a>
    </div>
</div>

<div class="row-fluid">
    <div class="dialog">
        <div class="block">
            <p class="block-heading">系统管理</p>
            <div class="block-body">
                <form id="loginform" action="default.php" method="post" class="form-vertical">
                    <label>用户名</label>
	                    <input type="text" ID="txtLoginName" name="txtLoginName"  MaxLength="18" style="width:97%" placeholder="Username" value="<?php echo $username;?>" >
                    <label>密码</label>
    	                <input type="password" ID="txtLoginPwd" name="txtLoginPwd"  TextMode="Password" MaxLength="18" style="width:97%" placeholder="Password" >
                    <div style="text-align:left;width:70px;float:left">
                        <input name="btn" type="image" src="images/regbtn.png" width="58px" height="30px" border="0" onClick="window.location='reg.php';return false;">
                    </div>
					<div style="text-align:right;width:70px;float:right">
                        <input name="btn2" type="image" src="images/loginbtn.png" width="58px" height="30px" border="0" onClick="sumbitLogin();return false;">
                    </div>
                    <div class="clearfix" ><p style="color:red"><?php echo $k; ?></p></div>
                    
                   <div class="hidden" >
                         <div id="alert" title="提示信息" style="text-align:left">
                            <div >
                                <div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"> 
                                    <p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .2em;"></span> 
                                    <strong>提示：</strong>&nbsp;<span id="alerttext"></span></p>
                                </div>
                            </div>
                        </div>
                   </div>
              </form>
            </div>
        </div>
        <p class="pull-right" style=""><a href="http://www.zioer.com" target="blank">COPYRIGHT&nbsp;&copy;&nbsp;2015&nbsp;ZIOER </a></p>
        
    </div>
</div>
                       
</body>
</html>

<script src="assets/js/jquery-1.9.0.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/jquery-ui-1.10.0.custom.min.js" type="text/javascript"></script>
<script src="assets/js/google-code-prettify/prettify.js" type="text/javascript"></script>
<script src="assets/js/docs.js" type="text/javascript"></script>
<script src="assets/js/jquery.validate.js"></script>
<script type="text/javascript" src="assets/js/l-main.js"></script>
<script src="assets/js/jquery.browser.min.js" type="text/javascript"></script>

<script type="text/javascript">
	
    $(function () {
		$('#alert').dialog({
            autoOpen: false,
            width: 300,
            modal: true,
            buttons: {
                "确定": function () {
                    $(this).dialog("close");
                }
            }
        });

        $('#message').dialog({
            bgiframe: true,
            autoOpen: false,
            width: 300,
            modal: true
        });
        $("#txtLoginName").focus();

        var IsCode = $("#hid_IsValidCode").attr("value");
        if (IsCode != "" && IsCode == "true") {
            $("#Td_ValidCodeTxt").show();
            $("#Td_ValidCodeControl").show();
        }
    });

    function sumbitLogin() {
		

        $('#alert').dialog({
            autoOpen: false,
            width: 300,
            modal: true,
            buttons: {
                "确定": function () {
                    $(this).dialog("close");
                }
            }
        });
		
        var loginName = document.getElementById("txtLoginName").value;
        if (loginName == "") {
            ShowDialog("请输入登录名!"); 
            $('#alert').bind('dialogclose', function (event) { $('#txtLoginName').focus() });
            return false;
        }
        else {
            
            var passWord = document.getElementById("txtLoginPwd").value;
            if (passWord == "") {
                ShowDialog("请输入密码!");
                $('#alert').bind('dialogclose', function (event) { $('#txtLoginPwd').focus() });
                return false;
            }
            else {
				$('#loginform').submit();
            }
        }
    }
    
</script>