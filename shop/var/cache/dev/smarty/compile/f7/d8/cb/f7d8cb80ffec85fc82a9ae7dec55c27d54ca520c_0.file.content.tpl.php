<?php
/* Smarty version 3.1.33, created on 2020-12-04 19:05:07
  from '/var/www/html/admin5361pbecj/themes/default/template/content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fca7a5321d019_83675060',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f7d8cb80ffec85fc82a9ae7dec55c27d54ca520c' => 
    array (
      0 => '/var/www/html/admin5361pbecj/themes/default/template/content.tpl',
      1 => 1607094856,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fca7a5321d019_83675060 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="ajax_confirmation" class="alert alert-success hide"></div>
<div id="ajaxBox" style="display:none"></div>


<div class="row">
	<div class="col-lg-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div>
<?php }
}
