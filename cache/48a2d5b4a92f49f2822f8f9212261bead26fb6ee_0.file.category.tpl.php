<?php
/* Smarty version 4.5.6, created on 2026-03-29 10:34:00
  from '/var/www/html/app/views/templates/category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_69c900185230c4_33933578',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '48a2d5b4a92f49f2822f8f9212261bead26fb6ee' => 
    array (
      0 => '/var/www/html/app/views/templates/category.tpl',
      1 => 1774780121,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69c900185230c4_33933578 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/vendor/smarty/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<div class="category-page">
    <div class="category-info">
        <h2><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</h2>
        <p><?php echo $_smarty_tpl->tpl_vars['category']->value['description'];?>
</p>
        <div class="stats">Всего статей: <?php echo $_smarty_tpl->tpl_vars['totalArticles']->value;?>
</div>
    </div>
    
    <div class="sorting">
        <span>Сортировать:</span>
        <a href="?order=date&page=1" <?php if ($_smarty_tpl->tpl_vars['currentOrder']->value == 'date') {?>class="active"<?php }?>>По дате</a>
        <a href="?order=views&page=1" <?php if ($_smarty_tpl->tpl_vars['currentOrder']->value == 'views') {?>class="active"<?php }?>>По просмотрам</a>
    </div>
    
    <div class="articles-list">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articles']->value, 'article');
$_smarty_tpl->tpl_vars['article']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['article']->do_else = false;
?>
            <div class="article-item">
                <?php if ($_smarty_tpl->tpl_vars['article']->value['image']) {?>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['article']->value['image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
" class="article-image">
                <?php }?>
                <div class="article-content">
                    <h3><a href="/article/<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
</a></h3>
                    <p><?php echo $_smarty_tpl->tpl_vars['article']->value['description'];?>
</p>
                    <div class="meta">
                        <span>👁️ <?php echo $_smarty_tpl->tpl_vars['article']->value['views'];?>
</span>
                        <span>📅 <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['article']->value['created_at'],"%d.%m.%Y");?>
</span>
                    </div>
                </div>
            </div>
        <?php
}
if ($_smarty_tpl->tpl_vars['article']->do_else) {
?>
            <p>В этой категории пока нет статей.</p>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
    
    <?php if ($_smarty_tpl->tpl_vars['totalPages']->value > 1) {?>
        <div class="pagination">
            <?php if ($_smarty_tpl->tpl_vars['currentPage']->value > 1) {?>
                <a href="?order=<?php echo $_smarty_tpl->tpl_vars['currentOrder']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['currentPage']->value-1;?>
">← Назад</a>
            <?php }?>
            
            <?php
$_smarty_tpl->tpl_vars['page'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['page']->step = 1;$_smarty_tpl->tpl_vars['page']->total = (int) ceil(($_smarty_tpl->tpl_vars['page']->step > 0 ? $_smarty_tpl->tpl_vars['totalPages']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['totalPages']->value)+1)/abs($_smarty_tpl->tpl_vars['page']->step));
if ($_smarty_tpl->tpl_vars['page']->total > 0) {
for ($_smarty_tpl->tpl_vars['page']->value = 1, $_smarty_tpl->tpl_vars['page']->iteration = 1;$_smarty_tpl->tpl_vars['page']->iteration <= $_smarty_tpl->tpl_vars['page']->total;$_smarty_tpl->tpl_vars['page']->value += $_smarty_tpl->tpl_vars['page']->step, $_smarty_tpl->tpl_vars['page']->iteration++) {
$_smarty_tpl->tpl_vars['page']->first = $_smarty_tpl->tpl_vars['page']->iteration === 1;$_smarty_tpl->tpl_vars['page']->last = $_smarty_tpl->tpl_vars['page']->iteration === $_smarty_tpl->tpl_vars['page']->total;?>
                <?php if ($_smarty_tpl->tpl_vars['page']->value == $_smarty_tpl->tpl_vars['currentPage']->value) {?>
                    <span class="current"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</span>
                <?php } else { ?>
                    <a href="?order=<?php echo $_smarty_tpl->tpl_vars['currentOrder']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</a>
                <?php }?>
            <?php }
}
?>
            
            <?php if ($_smarty_tpl->tpl_vars['currentPage']->value < $_smarty_tpl->tpl_vars['totalPages']->value) {?>
                <a href="?order=<?php echo $_smarty_tpl->tpl_vars['currentOrder']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['currentPage']->value+1;?>
">Вперед →</a>
            <?php }?>
        </div>
    <?php }?>
</div><?php }
}
