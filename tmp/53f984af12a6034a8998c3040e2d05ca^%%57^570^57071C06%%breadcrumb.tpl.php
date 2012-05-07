<?php /* Smarty version 2.6.26, created on 2012-05-07 16:45:31
         compiled from widget/breadcrumb.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxmultilang', 'widget/breadcrumb.tpl', 3, false),array('modifier', 'escape', 'widget/breadcrumb.tpl', 5, false),)), $this); ?>
<?php echo '<div id="breadCrumb"><span>'; ?><?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_BREADCRUMB_YOUAREHERE'), $this);?><?php echo ':</span>'; ?><?php $_from = $this->_tpl_vars['oView']->getBreadCrumb(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sCrum']):
?><?php echo '&nbsp;/&nbsp;'; ?><?php if ($this->_tpl_vars['sCrum']['link']): ?><?php echo '<a href="'; ?><?php echo $this->_tpl_vars['sCrum']['link']; ?><?php echo '" title="'; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['sCrum']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?><?php echo '">'; ?><?php endif; ?><?php echo ''; ?><?php echo $this->_tpl_vars['sCrum']['title']; ?><?php echo ''; ?><?php if ($this->_tpl_vars['sCrum']['link']): ?><?php echo '</a>'; ?><?php endif; ?><?php echo ''; ?><?php endforeach; endif; unset($_from); ?><?php echo '</div>'; ?>
