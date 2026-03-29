<?php
/* Smarty version 4.5.6, created on 2026-03-29 10:03:07
  from '/var/www/html/app/views/templates/layout.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_69c8f8db935551_44676239',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9926cb905c4db5a90cdfe211a7667b521a570892' => 
    array (
      0 => '/var/www/html/app/views/templates/layout.tpl',
      1 => 1774777620,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69c8f8db935551_44676239 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo (($tmp = $_smarty_tpl->tpl_vars['title']->value ?? null)===null||$tmp==='' ? "Блог" ?? null : $tmp);?>
 - Мой блог</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1><a href="/">Мой блог</a></h1>
            <nav>
                <ul>
                    <li><a href="/">Главная</a></li>
                </ul>
            </nav>
        </div>
    </header>
    
    <main class="container">
        <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['template']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
    </main>
    
    <footer>
        <div class="container">
            <p>&copy; 2025 Мой блог. Все права защищены.</p>
        </div>
    </footer>
</body>
</html><?php }
}
