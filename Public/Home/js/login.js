$(function(){
	
	//登录页背景随机
	/* var rand = Math.floor(Math.random() * 5) + 1;
	$("body")
	.css("background", "url(" + ThinkPHP['IMG']+ "/login_bg" + rand +".jpg) no-repeat")
	.css("background-size", "100%"); */
	
	//登录页按钮
	$("#login input[type='submit']").button();
	
	//自定义验证，不得包含@符号
	$.validator.addMethod('inAt', function(value, element) {
		var text = /^[^@]+$/i;
		return this.optional(element) || (text.test(value));
	}, '存在@符号');
	
	$('#login').validate({
		submitHandler: function(form){
			$("#verify_register").attr('form-click', 'login');
			$("#verify_register").dialog('open');
		},
		rules: {
			username: {
				required: true,
				minlength: 2,
				maxlength: 50,
			},
			password: {
				required: true,
				minlength: 6,
				maxlength: 30,
			},
		},
		messages: {
			username: {
				required: '账号不得为空',
				minlength: $.format('账号不得小于{0}位！'),
				maxlength: $.format('账号不得大于{0}位！'),
			},
			password: {
				required: '密码不得为空',
				minlength: $.format('密码不得小于{0}位！'),
				maxlength: $.format('密码不得大于{0}位！'),
			},
		},
	});
	
	//创建注册对话框
	$("#register").dialog({
		width: 430,
		height: 370,
		modal: true,
		resizable: false,
		autoOpen: false,
		title: "注册新用户",
		closeText: "关闭",
		buttons: [{
			text: "提交",
			click: function(e) {
				$(this).submit();
			},
		}],
		
	}).validate({
		submitHandler: function() {
			$("#verify_register").attr('form-click', 'register');
			$("#verify_register").dialog('open');
		},
		
		rules: {
			username: {
				required: true,
				inAt: true,
				minlength: 2,
				maxlength: 20,
				remote: {
					url: ThinkPHP['MODULE']  + '/User/checkUserName',
					type: 'POST',
					/* beforeSend: function() {
						$('#username').next().html('&nbsp;').removeClass('succ').addClass('loading');
					},
					complete: function(jqXHR) {
						if (jqXHR.responseText == 'true') {
							$('#username').next().html('&nbsp;').removeClass('loading').addClass('succ');
						} else {
							$('#username').next().html('&nbsp;').removeClass('loading').addClass('failure');
						}
					} */
				},
			},
			password: {
				required: true,
				minlength: 6,
				maxlength: 30,
			},
			repassword: {
				required: true,
				equalTo: '#password',
			},
			email: {
				required: true,
				email: true,
				remote: {
					url: ThinkPHP['MODULE']  + '/User/CheckEmail',
					type: 'POST',
					/* beforeSend: function() {
						$('#email').next().html('&nbsp;').removeClass('succ').addClass('loading');
					},
					complete: function(jqXHR) {
						if (jqXHR.responseText == 'true') {
							$('#email').next().html('&nbsp;').removeClass('loading').addClass('succ');
						} else {
							$('#email').next().html('&nbsp;').removeClass('loading').addClass('failure');
						}
					} */
				},				
			},
		},
		
		messages: {
			username: {
				required: '账号不得为空',
				inAt: '账号不得包含@符号',
				minlength: $.format('账号不得小于{0}位！'),
				maxlength: $.format('账号不得大于{0}位！'),
				remote: '账号被占用',
			},
			password: {
				required: '密码不得为空',
				minlength: $.format('密码不得小于{0}位！'),
				maxlength: $.format('密码不得大于{0}位！'),
			},
			repassword: {
				required: '密码确认不得为空',
				equalTo: '密码和密码确认必须一致!',
			},
			email: {
				required: '邮箱不得为空',
				email: '邮箱格式不正确',
				remote: '邮箱被占用',
			},
		},
		
		showErrors: function(errorMap, errorList) {
			var errors = this.numberOfInvalids();
			if (errors > 0){
				$("#register").dialog('option', 'height', errors * 20 + 380);
			} else {
				$("#register").dialog('option', 'height', 380);
			};
			this.defaultShowErrors();
		},
		
		highlight: function(element, errorClass) {
			$(element).css('border', '1px solid red');
			$(element).parent().find('span').html('&nbsp;').removeClass('succ').addClass('failure');
		},
		
		unhighlight: function(element, errorClass) {
			$(element).css('border', '1px solid #ccc');
			$(element).parent().find('span').html('&nbsp;').removeClass('failure').addClass('succ');
		},
		
		errorLabelContainer: 'ol.register_errors',
		
		wrapper: 'li',
		
		
	});
	
	$("#reg_link").click(function() {
		$("#register").dialog("open");
	});
	
	//loading
	$("#loading").dialog({
		width: 180,
		height: 40,
		modal: true,
		closeOnEscape: false,    //不允许按Escape键关闭
		resizable: false,
		autoOpen: false,
		draggable: false,
	}).parent().find('.ui-dialog-titlebar').hide();
	
	//邮箱自动补全
	$("#email").autocomplete({  
		delay: 0, //默认为300 毫秒，延迟显示设置。  
		autoFocus:true, //设置为true 时，第一个项目会自动被选定。  
		source: function (request, response) {  

			var hosts = ["qq.com", "163.com", "263.com", "sina.com.cn", "gmail.com", "hotmail.com"];//邮箱域名集合  

			var term = request.term; //获取用户输入的内容；  
			var name = term;  //邮箱的用户名  
			var host = "";   //邮箱的域名 例如qq.com  
			var ix = term.indexOf('@'); //@的位置  

			var result = []; //最终呈现的邮箱列表  
			  
			//当用户输入的数据（email）里存在@的时候，就重新给用户名和域名赋值  
			if (ix > -1) { //如果@符号存在，就表示用户已经输入用户名了。  
				name = term.slice(0, ix);  
				host = term.slice(ix + 1);  
			}  

			if (name) { //如果name有值 即：不为空  

				var getHosts = []; //根据用户名填写的域名我们在hosts里面找到对应的域名集合  
				  
				getHosts=  host ? ($.grep(hosts, function (val) { return val.indexOf(host) > -1 })) : hosts;  

				result = $.map(getHosts, function (val) { //这个val就是getHosts里的每个域名元素。  
					return name + "@" + val;  
				});                  
			}            
			result.unshift(term); // unshift方法的作用是：将一个或多个新元素添加到数组开始，数组中的元素自动后移，返回数组新长度  

			response(result);  

		}  
	});

	//验证码
	$("#verify_register").dialog({
		width: 290,
		height: 305,
		modal: true,
		resizable: false,
		autoOpen: false,
		title: "请输入验证码",
		closeText: "关闭",
		buttons: [{
			text: "完成",
			click: function(e) {
				$(this).submit();
			},
			style: 'right: 85px',
		}],	
	}).validate({
		submitHandler: function(form) {
			if ($("#verify_register").attr('form-click') == 'register') {
				$('#register').ajaxSubmit({
					url: ThinkPHP["MODULE"] + "/User/register",
					type: "POST",
					data: {
						verify: $('#verify').val(),
					},
					beforeSubmit: function() {
						$('#loading').dialog('open');
					},
					success: function(responseText) {
						if (responseText) {
							$('#loading').css('background', 'url(' + ThinkPHP['IMG'] + '/reg_success.png) no-repeat 20px center').html('数据新增成功...');
							setTimeout(function() {
								$('#register').dialog('close');
								$('#verify_register').dialog('close');		//关闭注册界面
								$('#loading').dialog('close');		//关闭提示界面
								$('#verify_register').resetForm();			//还原注册表单
								$('#span.star').html('*').removeClass('succ');		//恢复*去掉对号
							}, 1000);
						}
					},
				});
			} else if ($("#verify_register").attr('form-click') == 'login') {
				$(form).ajaxSubmit({
					url: ThinkPHP['MODULE']  + '/User/login',
					type: 'POST',
					beforeSubmit: function() {
						$('#loading').dialog('open');
					},
					success: function(responseText) {
						if (responseText == -9) {
							$('#loading').dialog('option', 'width', 200).css('background', 'url(' + ThinkPHP['IMG'] + '/warning.png) no-repeat 20px center').html('账号或密码不正确...');
							setTimeout(function(){
								$('#loading').dialog('close');
								$('#loading').dialog('option', 'width', 180).css('background', 'url(' + ThinkPHP['IMG'] + '/loading.gif) no-repeat 20px center').html('数据交互中...');
							}, 2000);
						} else {
							$('#loading').dialog('option', 'width', 220).css('background', 'url(' + ThinkPHP['IMG'] + '/reg_success.png) no-repeat 20px center').html('登录成功，跳转中...');
							setTimeout(function(){
								location.href = 'http://www.baidu.com';
							}, 1000);
						}
					},
				});
			}
		},
		rules: {
			verify: {
				required: true,
				remote: {
					url: ThinkPHP['MODULE'] + '/User/checkVerify',
					type: 'POST',
				},
			},
		},
		messages: {
			verify: {
				required: '验证码不得为空',
				remote: '验证码不正确',
			},	
		},
		showErrors: function(errorMap, errorList) {
			var errors = this.numberOfInvalids();
			if (errors > 0){
				$("#verify_register").dialog('option', 'height', errors * 20 + 305);
			} else {
				$("#verify_register").dialog('option', 'height', 305);
			};
			this.defaultShowErrors();
		},
		
		highlight: function(element, errorClass) {
			$(element).css('border', '1px solid red');
			$(element).parent().find('span').html('&nbsp;').removeClass('succ').addClass('failure');
		},
		
		unhighlight: function(element, errorClass) {
			$(element).css('border', '1px solid #ccc');
			$(element).parent().find('span').html('&nbsp;').removeClass('failure').addClass('succ');
		},
		
		errorLabelContainer: 'ol.ver_error',
		
		wrapper: 'li',
	});
	
	//点击更换验证码
	var verifyimg = $('.verifyimg').attr('src');
	$('.changeimg').click(function(){
		if (verifyimg.indexOf('?') > 0) {
			$('.verifyimg').attr('src', verifyimg + '&random=' + Math.random());
		} else {
			$('.verifyimg').attr('src', verifyimg + '?random=' + Math.random());
		}
		
	});
});