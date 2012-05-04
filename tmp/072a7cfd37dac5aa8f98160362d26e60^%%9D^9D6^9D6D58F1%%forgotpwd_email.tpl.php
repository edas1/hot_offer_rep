<?php /* Smarty version 2.6.26, created on 2012-05-04 08:29:41
         compiled from form/forgotpwd_email.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxmultilang', 'form/forgotpwd_email.tpl', 1, false),array('function', 'oxscript', 'form/forgotpwd_email.tpl', 3, false),array('block', 'oxifcontent', 'form/forgotpwd_email.tpl', 26, false),)), $this); ?>
<?php echo smarty_function_oxmultilang(array('ident' => 'PAGE_ACCOUNT_FORGOTPWD_FORGOTPWD'), $this);?>
<br>
<?php echo smarty_function_oxmultilang(array('ident' => 'PAGE_ACCOUNT_FORGOTPWD_WEWILLSENDITTOYOU'), $this);?>
<br><br>
<?php echo smarty_function_oxscript(array('include' => "js/widgets/oxinputvalidator.js",'priority' => 10), $this);?>

<?php echo smarty_function_oxscript(array('add' => "$('form.js-oxValidate').oxInputValidator();"), $this);?>

<form class="js-oxValidate" action="<?php echo $this->_tpl_vars['oViewConf']->getSelfActionLink(); ?>
" name="order" method="post">
  <?php echo $this->_tpl_vars['oViewConf']->getHiddenSid(); ?>

  <?php echo $this->_tpl_vars['oViewConf']->getNavFormParams(); ?>

  <input type="hidden" name="fnc" value="forgotpassword">
  <input type="hidden" name="cl" value="forgotpwd">
  <ul class="form clear">
    <li>
        <label><?php echo smarty_function_oxmultilang(array('ident' => 'PAGE_ACCOUNT_FORGOTPWD_YOUREMAIL'), $this);?>
</label>
        <input id="forgotPasswordUserLoginName<?php echo $this->_tpl_vars['idPrefix']; ?>
" type="text" name="lgn_usr" value="<?php echo $this->_tpl_vars['oView']->getActiveUsername(); ?>
" class="js-oxValidate js-oxValidate_notEmpty js-oxValidate_email">
        <p class="oxValidateError">
            <span class="js-oxError_notEmpty"><?php echo smarty_function_oxmultilang(array('ident' => 'EXCEPTION_INPUT_NOTALLFIELDS'), $this);?>
</span>
            <span class="js-oxError_email"><?php echo smarty_function_oxmultilang(array('ident' => 'EXCEPTION_INPUT_NOVALIDEMAIL'), $this);?>
</span>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "message/inputvalidation.tpl", 'smarty_include_vars' => array('aErrors' => $this->_tpl_vars['aErrors']['oxuser__oxusername'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </p>
    </li>
    <li class="formSubmit">
        <button class="submitButton" type="submit" title="<?php echo smarty_function_oxmultilang(array('ident' => 'PAGE_ACCOUNT_FORGOTPWD_REQUESTPWD'), $this);?>
"><?php echo smarty_function_oxmultilang(array('ident' => 'PAGE_ACCOUNT_FORGOTPWD_REQUESTPWD'), $this);?>
</button>
    </li>
  </ul>
</form>
<?php echo smarty_function_oxmultilang(array('ident' => 'PAGE_ACCOUNT_FORGOTPWD_AFTERCLICK'), $this);?>
<br><br>
<?php $this->_tag_stack[] = array('oxifcontent', array('ident' => 'oxforgotpwd','object' => 'oCont')); $_block_repeat=true;smarty_block_oxifcontent($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
    <?php echo $this->_tpl_vars['oCont']->oxcontents__oxcontent->value; ?>

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxifcontent($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>