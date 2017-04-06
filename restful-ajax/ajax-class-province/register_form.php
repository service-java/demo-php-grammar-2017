<fieldset id="reg_form">
	<legend>校友注册</legend>
	<form action="register_db.php" method="post" accept-charset="utf-8" class="add_form">
		<label class="userInput">
			<input type="text" name="userName" placeholder="请输入用户名" id="userName"/>
			<span id="userNameError" class="spanError"></span>
		</label>
		<label class="userInput"><input type="text" name="realName" placeholder="请输入真实姓名"/></label>
		<label class="userInput"><input type="text" name="mobile" placeholder="请输入手机"/></label>
		<label class="userInput"><input type="text" name="cardID" placeholder="请输入身份证号"/></label>
		<label class="userInput">
			<select name="enterYear">
			<?php
				for($i=1970;$i<2015;$i++){
					echo "<option value='".$i."'>$i</option>";
				}
			?>
			</select>
		</label>

		<label class="userInput" id="school_info">
			<select name="college" id="college">

			</select>
			<select name="speciality" id="speciality">

			</select>
			<select name="class" id="class">

			</select>
		</label>

		<label class="loginButton">
			<input type="submit"  value="提交" />
			<input type="reset"  value="重置" />
		</label>

	</form>
</fieldset>
<script type="text/javascript">
	var initOption="<option value='0'>请先选择学院</option>";

	$("#school_info>select").html(initOption);

	$("#userName").blur(function(){
		var name={userName:$(this).val()};
		$.post("reg_name.php",name,function(data){
			$("#userNameError").text(data);
		});
	});

	$("#college").load("update_school.php?q=1");

	$("#college").change(function() {
		$.post("update_school.php?q=2",{id:$(this).val()},function(data){
			$("#speciality").html(data);
			$.post("update_school.php?q=3",{id:$("#speciality").val()},function(data){
				$("#class").html(data);
			});
		});
	});

	$("#speciality").change(function(){
		$.post("update_school.php?q=3",{id:$(this).val()},function(data){
			$("#class").html(data);
		});
	});
</script>
