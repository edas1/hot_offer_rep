<?php /* Smarty version 2.6.26, created on 2012-05-07 16:45:31
         compiled from widget/sidebar/categoriestree.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxmultilang', 'widget/sidebar/categoriestree.tpl', 31, false),array('function', 'oxgetseourl', 'widget/sidebar/categoriestree.tpl', 38, false),array('modifier', 'cat', 'widget/sidebar/categoriestree.tpl', 38, false),)), $this); ?>
<?php if ($this->_tpl_vars['categories'] && $this->_tpl_vars['oView']->getClassName() != 'start'): ?>
<div class="categoryBox">
    <ul class="tree" id="tree">
    <?php if (!function_exists('smarty_fun_tree')) { function smarty_fun_tree(&$smarty, $params) { $_fun_tpl_vars = $smarty->_tpl_vars; $smarty->assign($params);  ?>
        <?php $smarty->assign('deepLevel', $smarty->_tpl_vars['deepLevel']+1); ?>
        <?php $smarty->assign('oContentCat', $smarty->_tpl_vars['oView']->getContentCategory()); ?>
        <?php $_from = $smarty->_tpl_vars['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $smarty->_tpl_vars['_cat']):
?>
            <?php if ($smarty->_tpl_vars['_cat']->getIsVisible()): ?>
                                <?php if ($smarty->_tpl_vars['_cat']->getContentCats() && $smarty->_tpl_vars['deepLevel'] > 1): ?>
                    <?php $_from = $smarty->_tpl_vars['_cat']->getContentCats(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $smarty->_tpl_vars['_oCont']):
?>
                    <li class="<?php if ($smarty->_tpl_vars['oContentCat'] && $smarty->_tpl_vars['oContentCat']->getId() == $smarty->_tpl_vars['_oCont']->getId()): ?> active <?php else: ?> end <?php endif; ?>" >
                        <a href="<?php echo $smarty->_tpl_vars['_oCont']->getLink(); ?>
"><i></i><?php echo $smarty->_tpl_vars['_oCont']->oxcontents__oxtitle->value; ?>
</a>
                    </li>
                    <?php endforeach; endif; unset($_from); ?>
                <?php endif; ?>
                                <li class="<?php if (! $smarty->_tpl_vars['oContentCat'] && $smarty->_tpl_vars['act'] && $smarty->_tpl_vars['act']->getId() == $smarty->_tpl_vars['_cat']->getId()): ?>active<?php elseif ($smarty->_tpl_vars['_cat']->expanded): ?>exp<?php endif; ?><?php if (! $smarty->_tpl_vars['_cat']->hasVisibleSubCats): ?> end<?php endif; ?>">
                    <a href="<?php echo $smarty->_tpl_vars['_cat']->getLink(); ?>
"><i><span></span></i><?php echo $smarty->_tpl_vars['_cat']->oxcategories__oxtitle->value; ?>
 <?php if ($smarty->_tpl_vars['oView']->showCategoryArticlesCount() && ( $smarty->_tpl_vars['_cat']->getNrOfArticles() > 0 )): ?> (<?php echo $smarty->_tpl_vars['_cat']->getNrOfArticles(); ?>
)<?php endif; ?></a>
                    <?php if ($smarty->_tpl_vars['_cat']->getSubCats() && $smarty->_tpl_vars['_cat']->expanded): ?>
                        <ul><?php smarty_fun_tree($smarty, array('categories'=>$smarty->_tpl_vars['_cat']->getSubCats()));  ?></ul>
                    <?php endif; ?>
                </li>
            <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
    <?php  $smarty->_tpl_vars = $_fun_tpl_vars; }} smarty_fun_tree($this, array('categories'=>$this->_tpl_vars['categories']));  ?>
    </ul>
    <?php if ($this->_tpl_vars['oView']->showTags() && $this->_tpl_vars['oView']->getTagCloudManager()): ?>
        <div class="categoryTagsBox">
            <?php $this->assign('oTagsManager', $this->_tpl_vars['oView']->getTagCloudManager()); ?>
            <h3><?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_TAGS_HEADER'), $this);?>
</h3>
            <div class="categoryTags">
                <?php $_from = $this->_tpl_vars['oTagsManager']->getCloudArray(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sTagTitle'] => $this->_tpl_vars['iCount']):
?>
                    <a class="tagitem_<?php echo $this->_tpl_vars['oTagsManager']->getTagSize($this->_tpl_vars['sTagTitle']); ?>
" href="<?php echo $this->_tpl_vars['oTagsManager']->getTagLink($this->_tpl_vars['sTagTitle']); ?>
"><?php echo $this->_tpl_vars['oTagsManager']->getTagTitle($this->_tpl_vars['sTagTitle']); ?>
</a>
                <?php endforeach; endif; unset($_from); ?>
                <?php if ($this->_tpl_vars['oView']->isMoreTagsVisible()): ?>
                    <br>
                    <a href="<?php echo smarty_function_oxgetseourl(array('ident' => ((is_array($_tmp=$this->_tpl_vars['oViewConf']->getSelfLink())) ? $this->_run_mod_handler('cat', true, $_tmp, "cl=tags") : smarty_modifier_cat($_tmp, "cl=tags"))), $this);?>
" class="readMore"><?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_TAGS_LINKMORE'), $this);?>
</a>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php endif; ?>