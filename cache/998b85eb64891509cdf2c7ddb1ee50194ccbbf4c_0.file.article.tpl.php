<?php
/* Smarty version 4.5.6, created on 2026-03-29 10:33:52
  from '/var/www/html/app/views/templates/article.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_69c900102b4a65_29986191',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '998b85eb64891509cdf2c7ddb1ee50194ccbbf4c' => 
    array (
      0 => '/var/www/html/app/views/templates/article.tpl',
      1 => 1774780123,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69c900102b4a65_29986191 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/vendor/smarty/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),1=>array('file'=>'/var/www/html/vendor/smarty/smarty/libs/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
?>
<article class="full-article">
    <?php if ($_smarty_tpl->tpl_vars['article']->value['image']) {?>
        <div class="article-image-wrapper">
            <img src="<?php echo $_smarty_tpl->tpl_vars['article']->value['image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
" class="main-image">
        </div>
    <?php }?>
    
    <h1><?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
</h1>
    
    <div class="meta">
        <span>👁️ <?php echo $_smarty_tpl->tpl_vars['article']->value['views'];?>
 просмотров</span>
        <span>📅 <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['article']->value['created_at'],"%d.%m.%Y %H:%M");?>
</span>
    </div>
    
    <?php if ($_smarty_tpl->tpl_vars['article']->value['categories']) {?>
        <div class="categories">
            <strong>Категории:</strong>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['article']->value['categories'], 'cat');
$_smarty_tpl->tpl_vars['cat']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->do_else = false;
?>
                <a href="/category/<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
" class="category-badge"><?php echo $_smarty_tpl->tpl_vars['cat']->value['name'];?>
</a>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
    <?php }?>
    
    <div class="description">
        <h3>Описание</h3>
        <p><?php echo $_smarty_tpl->tpl_vars['article']->value['description'];?>
</p>
    </div>
    
    <div class="content">
        <h3>Содержание</h3>
        <p><?php echo $_smarty_tpl->tpl_vars['article']->value['content'];?>
</p>
    </div>
</article>

<?php if ($_smarty_tpl->tpl_vars['related']->value) {?>
    <section class="related-articles">
        <h3>Похожие статьи</h3>
        <div class="articles-grid">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['related']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                <div class="article-card">
                    <?php if ($_smarty_tpl->tpl_vars['item']->value['image']) {?>
                        <img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
">
                    <?php }?>
                    <div class="article-content">
                        <h4><a href="/article/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</a></h4>
                        <p><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['item']->value['description'],80);?>
</p>
                        <div class="meta">
                            <span>👁️ <?php echo $_smarty_tpl->tpl_vars['item']->value['views'];?>
</span>
                        </div>
                    </div>
                </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
    </section>
<?php }
}
}
