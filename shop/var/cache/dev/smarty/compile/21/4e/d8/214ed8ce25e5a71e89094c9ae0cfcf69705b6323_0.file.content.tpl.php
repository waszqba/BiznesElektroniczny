<?php
/* Smarty version 3.1.33, created on 2020-12-12 21:12:45
  from '/var/www/html/admin5361pbecj/themes/new-theme/template/content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fd5243dd11790_62899919',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '214ed8ce25e5a71e89094c9ae0cfcf69705b6323' => 
    array (
      0 => '/var/www/html/admin5361pbecj/themes/new-theme/template/content.tpl',
      1 => 1607619645,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fd5243dd11790_62899919 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="ajax_confirmation" class="alert alert-success" style="display: none;"></div>


<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
  <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

<?php }
}
}
