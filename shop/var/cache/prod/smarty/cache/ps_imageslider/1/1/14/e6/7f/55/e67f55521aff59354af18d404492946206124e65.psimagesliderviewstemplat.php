<?php
/* Smarty version 3.1.33, created on 2020-11-22 22:27:58
  from 'module:psimagesliderviewstemplat' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fbad7de182c64_69435248',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6c2108a17c7103b6e203f4f0621d4645b56b0114' => 
    array (
      0 => 'module:psimagesliderviewstemplat',
      1 => 1604760386,
      2 => 'module',
    ),
  ),
  'cache_lifetime' => 31536000,
),true)) {
function content_5fbad7de182c64_69435248 (Smarty_Internal_Template $_smarty_tpl) {
?>
  <div id="carousel" data-ride="carousel" class="carousel slide" data-interval="5000" data-wrap="true" data-pause="hover">
    <ul class="carousel-inner" role="listbox">
              <li class="carousel-item active" role="option" aria-hidden="false">
          <a href="http://127.0.0.1:5000/">
            <figure>
              <img src="http://127.0.0.1:5000/modules/ps_imageslider/images/94cbb3cf65695b4bf64b2b5c4480f1c3ac6ab4e9_kk.jpeg" alt="sample-1">
                              <figcaption class="caption">
                  <h2 class="display-1 text-uppercase"></h2>
                  <div class="caption-description"><h3><span style="color:#050000;">Premium Leisure</span></h3>
<p><strong><span style="color:#0a0a0a;">PrestaShop to moja pasja</span></strong></p></div>
                </figcaption>
                          </figure>
          </a>
        </li>
              <li class="carousel-item " role="option" aria-hidden="true">
          <a href="http://127.0.0.1:5000/">
            <figure>
              <img src="http://127.0.0.1:5000/modules/ps_imageslider/images/dfb27f98f9955ea91d200f854a9d4d5566e7da41_pp4.jpeg" alt="sample-2">
                              <figcaption class="caption">
                  <h2 class="display-1 text-uppercase"></h2>
                  <div class="caption-description"><h3><span style="color:#050000;">Premium Leisure</span></h3></div>
                </figcaption>
                          </figure>
          </a>
        </li>
          </ul>
    <div class="direction" aria-label="Przyciski karuzeli">
      <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
        <span class="icon-prev hidden-xs" aria-hidden="true">
          <i class="material-icons">&#xE5CB;</i>
        </span>
        <span class="sr-only">Poprzedni</span>
      </a>
      <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
        <span class="icon-next" aria-hidden="true">
          <i class="material-icons">&#xE5CC;</i>
        </span>
        <span class="sr-only">Następny</span>
      </a>
    </div>
  </div>
<?php }
}
