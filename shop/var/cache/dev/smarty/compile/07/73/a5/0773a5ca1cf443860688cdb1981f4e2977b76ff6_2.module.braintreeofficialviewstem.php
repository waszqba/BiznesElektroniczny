<?php
/* Smarty version 3.1.33, created on 2020-12-12 21:21:55
  from 'module:braintreeofficialviewstem' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fd526639d0980_24605080',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0773a5ca1cf443860688cdb1981f4e2977b76ff6' => 
    array (
      0 => 'module:braintreeofficialviewstem',
      1 => 1606862643,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fd526639d0980_24605080 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- begin /var/www/html/modules/braintreeofficial/views/templates/front/_partials/prefetch.tpl -->
<?php if (isset($_smarty_tpl->tpl_vars['prefetchResources']->value) && is_array($_smarty_tpl->tpl_vars['prefetchResources']->value) && empty($_smarty_tpl->tpl_vars['prefetchResources']->value) == false) {?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['prefetchResources']->value, 'prefetchResource');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['prefetchResource']->value) {
?>
        <link href="<?php echo htmlspecialchars(addslashes($_smarty_tpl->tpl_vars['prefetchResource']->value), ENT_QUOTES, 'UTF-8');?>
" rel="prefetch" as="script">
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}?><!-- end /var/www/html/modules/braintreeofficial/views/templates/front/_partials/prefetch.tpl --><?php }
}
