<?php
/* Smarty version 3.1.30, created on 2017-04-07 09:16:13
  from "C:\wamp\www\hello-php\jump\smartydemo\templates\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58e73cbd2c0c14_78567116',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f2bb586e713d77c50fb0a99b5a87b4019c432268' => 
    array (
      0 => 'C:\\wamp\\www\\hello-php\\jump\\smartydemo\\templates\\index.tpl',
      1 => 1491548962,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head.tpl' => 1,
    'file:news.tpl' => 1,
  ),
),false)) {
function content_58e73cbd2c0c14_78567116 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '2113958e73cbd21f349_11512072';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>index</title>
</head>

<body>

  <?php $_smarty_tpl->_subTemplateRender("file:head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <?php $_smarty_tpl->_subTemplateRender("file:news.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


  
  <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

</body>

</html>
<?php }
}
