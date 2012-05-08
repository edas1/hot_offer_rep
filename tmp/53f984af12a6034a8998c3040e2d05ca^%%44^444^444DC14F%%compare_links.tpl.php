<?php /* Smarty version 2.6.26, created on 2012-05-08 08:08:45
         compiled from page/details/inc/compare_links.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxgetseourl', 'page/details/inc/compare_links.tpl', 2, false),array('function', 'oxmultilang', 'page/details/inc/compare_links.tpl', 2, false),array('modifier', 'cat', 'page/details/inc/compare_links.tpl', 2, false),)), $this); ?>
<?php if ($this->_tpl_vars['_compare_in_list']): ?>
  <a id="removeFromCompare<?php echo $this->_tpl_vars['_compare_testid']; ?>
" class="<?php echo $this->_tpl_vars['_compare_class']; ?>
" href="<?php echo smarty_function_oxgetseourl(array('ident' => ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oViewConf']->getSelfLink())) ? $this->_run_mod_handler('cat', true, $_tmp, "cl=") : smarty_modifier_cat($_tmp, "cl=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['oViewConf']->getActiveClassName()) : smarty_modifier_cat($_tmp, $this->_tpl_vars['oViewConf']->getActiveClassName())),'params' => ((is_array($_tmp="am=1&amp;removecompare=1&amp;fnc=tocomparelist&amp;aid=".($this->_tpl_vars['_compare_aid'])."&amp;anid=".($this->_tpl_vars['_compare_anid'])."&amp;pgNr=".($this->_tpl_vars['_compare_page']))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['oViewConf']->getNavUrlParams()) : smarty_modifier_cat($_tmp, $this->_tpl_vars['oViewConf']->getNavUrlParams()))), $this);?>
" rel="nofollow"><?php echo smarty_function_oxmultilang(array('ident' => $this->_tpl_vars['_compare_text_from_id']), $this);?>
</a>
<?php else: ?>
  <a id="addToCompare<?php echo $this->_tpl_vars['_compare_testid']; ?>
" class="<?php echo $this->_tpl_vars['_compare_class']; ?>
" href="<?php echo smarty_function_oxgetseourl(array('ident' => ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oViewConf']->getSelfLink())) ? $this->_run_mod_handler('cat', true, $_tmp, "cl=") : smarty_modifier_cat($_tmp, "cl=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['oViewConf']->getActiveClassName()) : smarty_modifier_cat($_tmp, $this->_tpl_vars['oViewConf']->getActiveClassName())),'params' => ((is_array($_tmp="am=1&amp;addcompare=1&amp;fnc=tocomparelist&aid=".($this->_tpl_vars['_compare_aid'])."&amp;anid=".($this->_tpl_vars['_compare_anid'])."&amp;pgNr=".($this->_tpl_vars['_compare_page']))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['oViewConf']->getNavUrlParams()) : smarty_modifier_cat($_tmp, $this->_tpl_vars['oViewConf']->getNavUrlParams()))), $this);?>
" rel="nofollow"><?php echo smarty_function_oxmultilang(array('ident' => $this->_tpl_vars['_compare_text_to_id']), $this);?>
</a>
<?php endif; ?>