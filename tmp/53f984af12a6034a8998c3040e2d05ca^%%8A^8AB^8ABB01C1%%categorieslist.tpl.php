<?php /* Smarty version 2.6.26, created on 2012-05-08 08:06:25
         compiled from widget/footer/categorieslist.tpl */ ?>
<ul class="list categories">
    <?php $_from = $this->_tpl_vars['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['_cat']):
?>
        <?php if ($this->_tpl_vars['_cat']->getIsVisible()): ?>
            <?php if ($this->_tpl_vars['_cat']->getContentCats()): ?>
                <?php $_from = $this->_tpl_vars['_cat']->getContentCats(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['_oCont']):
?>
                <li><a href="<?php echo $this->_tpl_vars['_oCont']->getLink(); ?>
"><i></i><?php echo $this->_tpl_vars['_oCont']->oxcontents__oxtitle->value; ?>
</a></li>
                <?php endforeach; endif; unset($_from); ?>
            <?php endif; ?>
            <li><a href="<?php echo $this->_tpl_vars['_cat']->getLink(); ?>
" <?php if ($this->_tpl_vars['_cat']->expanded): ?>class="exp"<?php endif; ?>><?php echo $this->_tpl_vars['_cat']->oxcategories__oxtitle->value; ?>
 <?php if ($this->_tpl_vars['oView']->showCategoryArticlesCount() && ( $this->_tpl_vars['_cat']->getNrOfArticles() > 0 )): ?> (<?php echo $this->_tpl_vars['_cat']->getNrOfArticles(); ?>
)<?php endif; ?></a></li>
        <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
</ul>