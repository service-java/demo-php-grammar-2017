<?php
$date = $_GET['startdate'];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>新建日程</title>

</head>

<body>
<div class="fancy">
	<h3>新建事件</h3>
    <form id="add_form" action="save.php?action=add" method="post">
    <p>日程标题：
      <input type="text" class="input" name="eventtitle" id="eventtitle" style="width:320px" placeholder="日程标题"></p>
    <p style="height:100px;">日程内容：
      <label for="textarea"></label>
      <textarea name="eventcontent" id="eventcontent" cols="40" rows="4"></textarea>
    </p>
    <p>开始时间：
      <input type="text" class="input datepicker" name="startdate" id="startdate" value="<?php echo $date;?>" readonly>
      <span id="sel_start" style="display:none">
	    <select name="s_hour">
	    <?php
			for($i = 0; $i<24; $i++)
			{
				if ($i == 8) 
				{
					$selected = "selected";
				}else{
					$selected = "";
				}
				printf('<option value="%d" %s>%02d</option>',$i,$selected,$i);
			}
		?>
        </select>&nbsp;:
        <select name="s_minute">
		<?php
			for($i = 0; $i<12; $i++)
			{
				if ($i == 0) 
				{
					$selected = "selected";
				}else{
					$selected = "";
				}
				printf('<option value="%d" %s>%02d</option>',$i*5,$selected,$i*5);
			}
		?>
        </select>
      </span>
    </p>
    <p id="p_endtime" style="display:none">结束时间：&nbsp;<input type="text" class="input datepicker" name="enddate" id="enddate" value="<?php echo $date;?>" readonly>
    <span id="sel_end" style="display:none">
	    <select name="e_hour">
    	<?php
			for($i = 0; $i<24; $i++)
			{
				if ($i == 12) 
				{
					$selected = "selected";
				}else{
					$selected = "";
				}
				printf('<option value="%d" %s>%02d</option>',$i,$selected,$i);
			}
		?>
        </select>&nbsp;:
    <select name="e_minute">
    	<?php
			for($i = 0; $i<12; $i++)
			{
				if ($i == 0) 
				{
					$selected = "selected";
				}else{
					$selected = "";
				}
				printf('<option value="%d" %s>%02d</option>',$i*5,$selected,$i*5);
			}
		?>
    </select>
    </span>
    </p>
    <p>
    <label><input type="checkbox" value="1" id="isallday" name="isallday" checked> 全天</label>
    <label><input type="checkbox" value="1" id="isend" name="isend"> 结束时间</label>
    </p>
    <div class="sub_btn"><input type="submit" class="btn btn_ok" value="确定"> <input type="button" class="btn btn_cancel" value="取消" onClick="$.fancybox.close()"></div>
    </form>
</div>
<script type="text/javascript" src="js/lib/jquery.form.min.js"></script>
<script type="text/javascript">
$(function(){
	$.datepicker.regional['zh-CN'] = {
			closeText: '关闭',
			prevText: '&#x3C;上月',
			nextText: '下月&#x3E;',
			currentText: '今天',
			monthNames: ['一月','二月','三月','四月','五月','六月',
			'七月','八月','九月','十月','十一月','十二月'],
			monthNamesShort: ['一月','二月','三月','四月','五月','六月',
			'七月','八月','九月','十月','十一月','十二月'],
			dayNames: ['星期日','星期一','星期二','星期三','星期四','星期五','星期六'],
			dayNamesShort: ['周日','周一','周二','周三','周四','周五','周六'],
			dayNamesMin: ['日','一','二','三','四','五','六'],
			weekHeader: '周',
			dateFormat: 'yy-mm-dd',
			firstDay: 1,
			isRTL: false,
			showMonthAfterYear: true,
			yearSuffix: '年',
			dateFormat: 'yy-mm-dd'
		};
			
    $.datepicker.setDefaults($.datepicker.regional['zh-CN']);
    $('.datepicker').datepicker();
	

	$("#isallday").click(function(){
		if($("#sel_start").css("display")=="none"){
			$("#sel_start,#sel_end").show();
		}else{
			$("#sel_start,#sel_end").hide();
		}
	});
	
	$("#isend").click(function(){
		if($("#p_endtime").css("display")=="none"){
			$("#p_endtime").show();
		}else{
			$("#p_endtime").hide();
		}
		$.fancybox.resize();//调整高度自适应
	});

	//提交表单
	$('#add_form').ajaxForm({
		beforeSubmit: showRequest, //表单验证
        success: showResponse //成功返回
    }); 

});

function showRequest(){
	var title = $("#eventtitle").val();
	var content = $("#eventcontent").val();
	if(title==''){
		alert("请输入日程标题！");
		$("#title").focus();
		return false;
	}

	if(content==''){
		alert("请输入日程内容！");
		$("#content").focus();
		return false;
	}
}

function showResponse(responseText, statusText, xhr, $form){
	if(statusText=="success"){	
		if(responseText==1){
			$.fancybox.close();
			$('#calendar').fullCalendar('refetchEvents'); //重新获取所有事件数据
		}else{
			alert(responseText);
		}
	}else{
		alert(statusText);
	}
}
</script>
</body>
</html>
