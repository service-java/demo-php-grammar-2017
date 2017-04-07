<?php
/* Smarty version 3.1.30, created on 2017-04-07 09:26:52
  from "C:\wamp\www\hello-php\jump\smartydemo\templates\news.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58e73f3cba0017_91197774',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eb1e6ba063f34677f39e1059a8d1ca3cf3f7bd4a' => 
    array (
      0 => 'C:\\wamp\\www\\hello-php\\jump\\smartydemo\\templates\\news.tpl',
      1 => 1491550010,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58e73f3cba0017_91197774 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '716458e73f3cb070b1_65069960';
?>


<?php if ($_smarty_tpl->tpl_vars['name']->value == "tom") {?>
  <h1>hello Tom !!</h1>
<?php } elseif ($_smarty_tpl->tpl_vars['name']->value == 'sam') {?>
  <h1>oh Sam !!</h1>
<?php } else { ?>
  <h1>who are you ?</h1>
<?php }?>
<hr>



<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['newsArray']->value, 'news');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['news']->value) {
?>
  <p><?php echo $_smarty_tpl->tpl_vars['news']->value['id'];?>
 : <?php echo $_smarty_tpl->tpl_vars['news']->value['content'];?>
</p>
<?php
}
} else {
?>

  <p>今日没有新闻</p>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

<hr>



<?php
$__section_loop_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_loop']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop'] : false;
$__section_loop_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['newsArray']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_loop_0_start = min(0, $__section_loop_0_loop);
$__section_loop_0_total = min(($__section_loop_0_loop - $__section_loop_0_start), $__section_loop_0_loop);
$_smarty_tpl->tpl_vars['__smarty_section_loop'] = new Smarty_Variable(array());
$__section_loop_0_show = (bool) false ? $__section_loop_0_total != 0 : false;
if ($__section_loop_0_show) {
for ($__section_loop_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] = $__section_loop_0_start; $__section_loop_0_iteration <= $__section_loop_0_total; $__section_loop_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']++){
?>
  <p><?php echo $_smarty_tpl->tpl_vars['newsArray']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]['id'];?>
 : <?php echo $_smarty_tpl->tpl_vars['newsArray']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]['content'];?>
</p>
<?php
}
}
if ($__section_loop_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_loop'] = $__section_loop_0_saved;
}
}
}
