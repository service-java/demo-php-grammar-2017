<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>个人日程管理</title>
<meta name="keywords" content="日程管理,PHP实例">
<meta name="description" content="在线个人日程管理案例。">
<link rel="stylesheet" type="text/css" href="css/fullcalendar.min.css">
<link rel="stylesheet" type="text/css" href="css/fancybox.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<style type="text/css">
	#calendar{width:100%; margin:20px auto 10px auto}
	.fancy{width:450px; height:auto}
	.fancy h3{height:30px; line-height:30px; border-bottom:1px solid #d3d3d3; font-size:14px}
	.fancy form{padding:10px}
	.fancy p{height:28px; line-height:28px; padding:4px; color:#999}
	.input{height:20px; line-height:20px; padding:2px; border:1px solid #d3d3d3; width:100px}
	.btn{-webkit-border-radius: 3px;-moz-border-radius:3px;padding:5px 12px; cursor:pointer}
	.btn_ok{background: #360;border: 1px solid #390;color:#fff}
	.btn_cancel{background:#f0f0f0;border: 1px solid #d3d3d3; color:#666 }
	.btn_del{background:#f90;border: 1px solid #f80; color:#fff }
	.sub_btn{height:32px; line-height:32px; padding-top:6px; border-top:1px solid #f0f0f0; text-align:right; position:relative}
	.sub_btn .del{position:absolute; left:2px}
</style>

<script src='js/lib/moment.min.js'></script>
<script src='js/lib/jquery.min.js'></script>
<script src='js/lib/jquery-ui.js'></script>
<script src='js/fullcalendar.min.js'></script>
<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="js/fancybox/jquery.fancybox.pack.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="js/fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />
<script type="text/javascript">
    /**
	* 时间对象的格式化
	*/
	Date.prototype.format = function(format)
	{
		var o = {
			"M+" : this.getMonth() + 1,
			"d+" : this.getDate(),
			"h+" : this.getHours(),
			"m+" : this.getMinutes(),
			"s+" : this.getSeconds(),
			"q+" : Math.floor((this.getMonth() + 3) / 3),
			"S" : this.getMilliseconds()
		}
		
		if (/(y+)/.test(format))
		{
			format = format.replace(RegExp.$1, (this.getFullYear() + "").substr(4
			- RegExp.$1.length));
		}
		
		for (var k in o)
		{
			if (new RegExp("(" + k + ")").test(format))
			{
				format = format.replace(RegExp.$1, RegExp.$1.length == 1
				? o[k]
				: ("00" + o[k]).substr(("" + o[k]).length));
			}
		}
	return format;
	}
	$(document).ready(function() 
	{
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			titleFormat:{month: 'YYYY年MM 日程'},
			// locale
			isRTL: false,
			firstDay: 1,
			monthNames: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"],
				monthNamesShort: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"],
				dayNames: ["星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六"],
				dayNamesShort: ["星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六"],
			buttonText: {
			prev: "上月",
			next: "下月",
			prevYear: "上年",
			nextYear: "下年",
			today: '今天',
			month: '月',
			week: '周',
			day: '天'
			},
			dayClick: function(date, jsEvent, view) {
				var selDate =(new Date(date)).format("yyyy-MM-dd"); 
					$.fancybox({
						'type':'ajax', 
						'href':'add.php?startdate='+selDate,
					});
			},
			eventClick: function(calEvent, jsEvent, view) {
				$.fancybox({
					'type':'ajax', 
					'href':'edit.php?id='+calEvent.id,
				});
			},
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events:  "json.php",
			
		});
		
	});
</script>
</head>
<body>
    <div id="header">
       <div id="logo"></div>
    </div>
    <div id="main" style="width:1060px">
       <div id='calendar'></div>
    </div>
    <div id="footer">
        <p>Powered by ZIOER&nbsp;<a href="http://www.zioer.com">www.zioer.com</a></p>
    </div>
</body>
</html>
