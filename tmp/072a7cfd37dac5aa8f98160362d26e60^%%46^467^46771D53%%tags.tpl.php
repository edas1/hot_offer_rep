<?php /* Smarty version 2.6.26, created on 2012-05-04 08:29:43
         compiled from widget/sidebar/tags.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxmultilang', 'widget/sidebar/tags.tpl', 3, false),array('function', 'oxgetseourl', 'widget/sidebar/tags.tpl', 10, false),array('modifier', 'cat', 'widget/sidebar/tags.tpl', 10, false),)), $this); ?>
<?php if ($this->_tpl_vars['oView']->showTags()): ?>
    <div id="tagBox" class="box tagCloud">
        <h3><?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_TAGS_HEADER'), $this);?>
</h3>
        <div class="content">
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