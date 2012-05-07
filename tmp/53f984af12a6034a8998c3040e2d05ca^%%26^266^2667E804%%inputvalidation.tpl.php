<?php /* Smarty version 2.6.26, created on 2012-05-07 12:35:41
         compiled from message/inputvalidation.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxmultilang', 'message/inputvalidation.tpl', 2, false),)), $this); ?>
<?php $_from = $this->_tpl_vars['aErrors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['oError']):
?>
  <span class="js-oxError_postError"><?php echo smarty_function_oxmultilang(array('ident' => $this->_tpl_vars['oError']->getMessage()), $this);?>
</span>
<?php endforeach; endif; unset($_from); ?>