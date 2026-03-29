<?php
/* Smarty version 4.5.6, created on 2026-03-29 10:59:02
  from '/var/www/html/app/views/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_69c905f6ee9749_16238728',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0e4fb45efc16b690ab0d3f242e52ce3be3f7c57c' => 
    array (
      0 => '/var/www/html/app/views/templates/index.tpl',
      1 => 1774781913,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69c905f6ee9749_16238728 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/vendor/smarty/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),1=>array('file'=>'/var/www/html/vendor/smarty/smarty/libs/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
?>
<h2 class="main-h2">Главная страница</h2>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
    <div class="category-section">
        <div class="category-header">
            <h3><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</h3>
            <p><?php echo $_smarty_tpl->tpl_vars['category']->value['description'];?>
</p>
            <a href="/category/<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
" class="btn">Все статьи →</a>
        </div>
        
        <div class="articles-grid">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['latestArticles']->value[$_smarty_tpl->tpl_vars['category']->value['id']], 'article');
$_smarty_tpl->tpl_vars['article']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['article']->do_else = false;
?>
                <div class="article-card">
                    <?php if ($_smarty_tpl->tpl_vars['article']->value['image']) {?>
                        <img src="<?php echo $_smarty_tpl->tpl_vars['article']->value['image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
">
                    <?php }?>
                    <div class="article-content">
                        <h4><a href="/article/<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
</a></h4>
                        <div class="meta">
                            <span>👁️ <?php echo $_smarty_tpl->tpl_vars['article']->value['views'];?>
</span>
                            <span>📅 <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['article']->value['created_at'],"%d.%m.%Y");?>
</span>
                        </div>
                        <p><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['article']->value['description'],100);?>
</p>
                    </div>
                </div>
            <?php
}
if ($_smarty_tpl->tpl_vars['article']->do_else) {
?>
                <p>Нет статей в этой категории</p>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
    </div>
<?php
}
if ($_smarty_tpl->tpl_vars['category']->do_else) {
?>
    <p>Нет категорий</p>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
