<extend name="Base/common" />

<block name="main">
	<div class="main_left">
		<div class="weibo_form">
			<span class="left">和大家分享一点儿新鲜事儿吧？</span>
			<span class="right weibo_num">可以输入<strong>140</strong>个字符</span>
			<textarea class="weibo_text" id="rl_exp_input"></textarea>
			<a href="javascript:void(0);" class="weibo_face" id="rl_exp_btn">表情</a>
			<div class="rl_exp" id="rl_bq" style="display:none;">
				<ul class="rl_exp_tab clearfix">
					<li><a href="javascript:void(0);" class="selected">默认</a></li>
					<li><a href="javascript:void(0);">拜年</a></li>
					<li><a href="javascript:void(0);">浪小花</a></li>
					<li><a href="javascript:void(0);">暴走漫画</a></li>
				</ul>
				<ul class="rl_exp_main clearfix rl_selected"></ul>
				<ul class="rl_exp_main clearfix" style="display:none;"></ul>
				<ul class="rl_exp_main clearfix" style="display:none;"></ul>
				<ul class="rl_exp_main clearfix" style="display:none;"></ul>
				<a href="javascript:void(0);" class="close">×</a>
			</div>
			<input class="weibo_button" type="submit" value="提交">
			
		</div>
	</div>
	<div class="main_right">
		right
	</div>
</block>