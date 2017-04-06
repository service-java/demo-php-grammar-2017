<?php
session_start();
include "../include/Agenda.php";

@$id = (int)$_GET['id'];
$agenda = new Agenda();
$result = $agenda->getOneagendabyID( $id );

$row = mysql_fetch_array($result);
if($row){
	@$title = $row['title'];
	@$content = $row['content'];
	@$starttime = strtotime($row['starttime']);
	@$start_d = date("Y-m-d",$starttime);
	@$start_h = date("H",$starttime);
	@$start_m = date("i",$starttime);
	@$endtime = strtotime($row['endtime']);
	@$end_d = date("Y-m-d",$endtime);
	@$end_h = date("H",$endtime);
	@$end_m = date("i",$endtime);
	@$allday = $row['allday'];
	@$end = $row['end'];
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>编辑日程</title>

</head>

<body>
<div class="fancy">
	<h3>编辑事件</h3>
    <form id="add_form" action="save.php?action=edit" method="post">
	<input type="hidden" name="id" id="eventid" value="<?php echo $id;?>">
    <p>
	  <table width="100%">
		<tr>
			<td>日程标题：</td>
			<td><input type="text" class="input" name="eventtitle" id="eventtitle" style="width:320px" value="<?php echo $title;?>"></td>
		</tr>
		<tr>
			<td width="75px">日程内容：</td>
			<td><label for="textarea"></label>
			<textarea name="eventcontent" id="eventcontent" cols="40" rows="4"><?php echo $content;?></textarea></td>
		</tr>
		<tr>	
			<td>开始时间：</td>
			<td>
				<input type="text" class="input datepicker" name="startdate" id="startdate" value="<?php echo $start_d;?>" readonly>
				<span id="sel_start" <?php if ($allday) echo ' style="display:none"';?> >
				<select name="s_hour" style=" width:60px;">
				<?php
					for($i = 0; $i<24; $i++)
					{
						if ($i == $start_h) 
						{
							$selected = "selected";
						}else{
							$selected = "";
						}
						printf('<option value="%d" %s>%02d</option>',$i,$selected,$i);
					}
				?>
				</select>&nbsp;:
				<select name="s_minute" style=" width:60px;">
				<?php
					for($i = 0; $i<12; $i++)
					{
						if ($i == $start_m) 
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
			</td>
		</tr>
		<tr id="p_endtime" style="display:none">
			<td>结束时间：</td>
			<td>
			<input type="text" class="input datepicker" name="enddate" id="enddate" value="<?php echo $end_d;?>" readonly>
			<span id="sel_end" <?php if ($allday) echo ' style="display:none"';?> >
				<select name="e_hour" style=" width:60px;">
				<?php
					for($i = 0; $i<24; $i++)
					{
						if ($i == $end_h) 
						{
							$selected = "selected";
						}else{
							$selected = "";
						}
						printf('<option value="%d" %s>%02d</option>',$i,$selected,$i);
					}
				?>
				</select>&nbsp;:
			<select name="e_minute" style=" width:60px;">
				<?php
					for($i = 0; $i<12; $i++)
					{
						if ($i == $end_m) 
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
			</td>
		</tr>
		<tr>
		<td colspan="2">
		<label><input type="checkbox" value="1" id="isallday" name="isallday" <?php if ($allday) echo "checked";?> > 全天</label>
		<label><input type="checkbox" value="1" id="isend" name="isend" <?php if ($end) echo "checked";?>> 结束时间</label>
		</td>
		</tr>
		<tr>
		<td colspan="2" align="right">
		<span class="del"><input type="button" class="btn btn_del" id="del_event" value="删除"></span>&nbsp;<input type="submit" class="btn btn_ok" value="确定"> <input type="button" class="btn btn_cancel" value="取消" onClick="$.fancybox.close()">
		</td>
		</tr>
	  </table>	
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
	
	//删除事件
	$("#del_event").click(function(){
		if(confirm("确定删除吗？")){
			var eventid = $("#eventid").val();
			$.post("save.php?action=del",{id:eventid},function(msg){
				if(msg==1){//删除成功
					$.fancybox.close();
					$('#calendar').fullCalendar('refetchEvents'); //重新获取所有事件数据
				}else{
					alert(msg);	
				}
			});
		}
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
