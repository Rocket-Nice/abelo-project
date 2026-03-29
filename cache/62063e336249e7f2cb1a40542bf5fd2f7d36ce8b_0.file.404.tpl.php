<?php
/* Smarty version 4.5.6, created on 2026-03-29 10:33:52
  from '/var/www/html/app/views/templates/404.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_69c900103b3a02_56021825',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '62063e336249e7f2cb1a40542bf5fd2f7d36ce8b' => 
    array (
      0 => '/var/www/html/app/views/templates/404.tpl',
      1 => 1774777361,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69c900103b3a02_56021825 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="error-page">
    <h1>404</h1>
    <h2>Страница не найдена</h2>
    <p><?php echo (($tmp = $_smarty_tpl->tpl_vars['message']->value ?? null)===null||$tmp==='' ? "Извините, запрашиваемая страница не существует." ?? null : $tmp);?>
</p>
    <a href="/public/" class="btn">Вернуться на главную</a>
</div><?php }
}
