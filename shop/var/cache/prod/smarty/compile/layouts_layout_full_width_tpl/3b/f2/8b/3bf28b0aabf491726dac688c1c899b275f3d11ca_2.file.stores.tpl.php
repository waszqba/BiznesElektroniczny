<?php
/* Smarty version 3.1.33, created on 2020-11-22 23:02:52
  from '/var/www/html/themes/classic/templates/cms/stores.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fbae00c02ac88_13234374',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3bf28b0aabf491726dac688c1c899b275f3d11ca' => 
    array (
      0 => '/var/www/html/themes/classic/templates/cms/stores.tpl',
      1 => 1604760386,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fbae00c02ac88_13234374 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18871235755fbae00c0210d3_84680595', 'page_title');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15825514165fbae00c022178_73293766', 'page_content_container');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'page.tpl');
}
/* {block 'page_title'} */
class Block_18871235755fbae00c0210d3_84680595 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_title' => 
  array (
    0 => 'Block_18871235755fbae00c0210d3_84680595',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Our stores','d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>

<?php
}
}
/* {/block 'page_title'} */
/* {block 'page_content_container'} */
class Block_15825514165fbae00c022178_73293766 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_content_container' => 
  array (
    0 => 'Block_15825514165fbae00c022178_73293766',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <section id="content" class="page-content page-stores">

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['stores']->value, 'store');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['store']->value) {
?>
      <article id="store-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['store']->value['id'], ENT_QUOTES, 'UTF-8');?>
" class="store-item card">
        <div class="store-item-container clearfix">
          <div class="col-md-3 store-picture hidden-sm-down">
            <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['store']->value['image']['bySize']['stores_default']['url'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['store']->value['image']['legend'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['store']->value['image']['legend'], ENT_QUOTES, 'UTF-8');?>
">
          </div>
          <div class="col-md-5 col-sm-7 col-xs-12 store-description">
            <p class="h3 card-title"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['store']->value['name'], ENT_QUOTES, 'UTF-8');?>
</p>
            <address><?php echo $_smarty_tpl->tpl_vars['store']->value['address']['formatted'];?>
</address>
            <?php if ($_smarty_tpl->tpl_vars['store']->value['note'] || $_smarty_tpl->tpl_vars['store']->value['phone'] || $_smarty_tpl->tpl_vars['store']->value['fax'] || $_smarty_tpl->tpl_vars['store']->value['email']) {?>
              <a data-toggle="collapse" href="#about-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['store']->value['id'], ENT_QUOTES, 'UTF-8');?>
" aria-expanded="false" aria-controls="about-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['store']->value['id'], ENT_QUOTES, 'UTF-8');?>
"><strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'About and Contact','d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>
</strong><i class="material-icons">&#xE409;</i></a>
            <?php }?>
          </div>
          <div class="col-md-4 col-sm-5 col-xs-12 divide-left">
            <table>
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['store']->value['business_hours'], 'day');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['day']->value) {
?>
              <tr>
                <th><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( $_smarty_tpl->tpl_vars['day']->value['day'],4,'.' )), ENT_QUOTES, 'UTF-8');?>
</th>
                <td>
                  <ul>
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['day']->value['hours'], 'h');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['h']->value) {
?>
                    <li><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['h']->value, ENT_QUOTES, 'UTF-8');?>
</li>
                  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </ul>
                </td>
              </tr>
              <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </table>
          </div>
        </div>
        <footer id="about-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['store']->value['id'], ENT_QUOTES, 'UTF-8');?>
" class="collapse">
          <div class="store-item-footer divide-top">
            <div class="card-block">
              <?php if ($_smarty_tpl->tpl_vars['store']->value['note']) {?>
                <p class="text-justify"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['store']->value['note'], ENT_QUOTES, 'UTF-8');?>
<p>
              <?php }?>
            </div>
            <ul class="card-block">
              <?php if ($_smarty_tpl->tpl_vars['store']->value['phone']) {?>
                <li><i class="material-icons">&#xE0B0;</i><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['store']->value['phone'], ENT_QUOTES, 'UTF-8');?>
</li>
              <?php }?>
              <?php if ($_smarty_tpl->tpl_vars['store']->value['fax']) {?>
                <li><i class="material-icons">&#xE8AD;</i><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['store']->value['fax'], ENT_QUOTES, 'UTF-8');?>
</li>
              <?php }?>
              <?php if ($_smarty_tpl->tpl_vars['store']->value['email']) {?>
                <li><i class="material-icons">&#xE0BE;</i><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['store']->value['email'], ENT_QUOTES, 'UTF-8');?>
</li>
              <?php }?>
            </ul>
          </div>
        </footer>
      </article>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

  </section>
<?php
}
}
/* {/block 'page_content_container'} */
}
