<?php /* Smarty version 2.6.26, created on 2012-05-07 12:35:39
         compiled from widget/locator/paging.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxmultilang', 'widget/locator/paging.tpl', 4, false),)), $this); ?>
<?php if ($this->_tpl_vars['pages']->changePage): ?>
    <div class="pager <?php if ($this->_tpl_vars['place'] == 'bottom'): ?> lineBox<?php endif; ?>" id="itemsPager<?php echo $this->_tpl_vars['place']; ?>
">
    <?php if ($this->_tpl_vars['pages']->previousPage): ?>
        <a class="prev" href="<?php echo $this->_tpl_vars['pages']->previousPage; ?>
"><?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_PRODUCT_LOCATOR_PREV'), $this);?>
</a>
    <?php endif; ?>
        <?php $this->assign('i', 1); ?>
        <?php $_from = $this->_tpl_vars['pages']->changePage; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['iPage'] => $this->_tpl_vars['page']):
?>
            <?php if ($this->_tpl_vars['iPage'] == $this->_tpl_vars['i']): ?>
               <a href="<?php echo $this->_tpl_vars['page']->url; ?>
" class="page<?php if ($this->_tpl_vars['iPage'] == $this->_tpl_vars['pages']->actPage): ?> active<?php endif; ?>"><?php echo $this->_tpl_vars['iPage']; ?>
</a>
               <?php $this->assign('i', $this->_tpl_vars['i']+1); ?>
            <?php elseif ($this->_tpl_vars['iPage'] > $this->_tpl_vars['i']): ?>
               ...
               <a href="<?php echo $this->_tpl_vars['page']->url; ?>
" class="page<?php if ($this->_tpl_vars['iPage'] == $this->_tpl_vars['pages']->actPage): ?> active<?php endif; ?>"><?php echo $this->_tpl_vars['iPage']; ?>
</a>
               <?php $this->assign('i', $this->_tpl_vars['iPage']+1); ?>
            <?php elseif ($this->_tpl_vars['iPage'] < $this->_tpl_vars['i']): ?>
               <a href="<?php echo $this->_tpl_vars['page']->url; ?>
" class="page<?php if ($this->_tpl_vars['iPage'] == $this->_tpl_vars['pages']->actPage): ?> active<?php endif; ?>"><?php echo $this->_tpl_vars['iPage']; ?>
</a>
               ...
               <?php $this->assign('i', $this->_tpl_vars['iPage']+1); ?>
            <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
    <?php if ($this->_tpl_vars['pages']->nextPage): ?>
        <a class="next" href="<?php echo $this->_tpl_vars['pages']->nextPage; ?>
"><?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_PRODUCT_LOCATOR_NEXT'), $this);?>
</a>
    <?php endif; ?>
     </div>
<?php endif; ?>