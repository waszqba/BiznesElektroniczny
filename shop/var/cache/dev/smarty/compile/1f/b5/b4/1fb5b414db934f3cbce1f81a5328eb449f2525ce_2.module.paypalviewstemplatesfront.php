<?php
/* Smarty version 3.1.33, created on 2020-12-12 21:04:09
  from 'module:paypalviewstemplatesfront' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fd52239b414f5_88861366',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1fb5b414db934f3cbce1f81a5328eb449f2525ce' => 
    array (
      0 => 'module:paypalviewstemplatesfront',
      1 => 1606862643,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fd52239b414f5_88861366 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- begin /var/www/html/modules/paypal/views/templates/front/prefetch.tpl -->
<?php if (isset($_smarty_tpl->tpl_vars['resources']->value) && is_array($_smarty_tpl->tpl_vars['resources']->value) && empty($_smarty_tpl->tpl_vars['resources']->value) == false) {?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['resources']->value, 'resource');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['resource']->value) {
?>
      <link href="<?php echo htmlspecialchars(addslashes($_smarty_tpl->tpl_vars['resource']->value), ENT_QUOTES, 'UTF-8');?>
" rel="prefetch" as="script">
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}?>

<!-- end /var/www/html/modules/paypal/views/templates/front/prefetch.tpl --><?php }
}
