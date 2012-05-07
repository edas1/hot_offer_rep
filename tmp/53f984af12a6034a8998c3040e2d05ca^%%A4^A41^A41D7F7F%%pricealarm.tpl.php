<?php /* Smarty version 2.6.26, created on 2012-05-07 13:14:06
         compiled from form/pricealarm.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxmultilang', 'form/pricealarm.tpl', 2, false),array('function', 'oxscript', 'form/pricealarm.tpl', 3, false),array('block', 'oxhasrights', 'form/pricealarm.tpl', 20, false),)), $this); ?>
<?php $this->assign('currency', $this->_tpl_vars['oView']->getActCurrency()); ?>
<p><?php echo smarty_function_oxmultilang(array('ident' => 'FORM_PRICEALARM_PRICEALARMMESSAGE'), $this);?>
</p>
<?php echo smarty_function_oxscript(array('include' => "js/widgets/oxinputvalidator.js",'priority' => 10), $this);?>

<?php echo smarty_function_oxscript(array('add' => "$('form.js-oxValidate').oxInputValidator();"), $this);?>

<form class="js-oxValidate" name="pricealarm" action="<?php echo $this->_tpl_vars['oViewConf']->getSelfActionLink(); ?>
" method="post">
    <div>
        <?php echo $this->_tpl_vars['oViewConf']->getHiddenSid(); ?>

        <?php echo $this->_tpl_vars['oViewConf']->getNavFormParams(); ?>

        <input type="hidden" name="cl" value="<?php echo $this->_tpl_vars['oViewConf']->getActiveClassName(); ?>
">
        <?php if ($this->_tpl_vars['oDetailsProduct']): ?>
        <input type="hidden" name="anid" value="<?php echo $this->_tpl_vars['oDetailsProduct']->oxarticles__oxid->value; ?>
">
        <?php endif; ?>
        <input type="hidden" name="fnc" value="addme">
        <?php $this->assign('oCaptcha', $this->_tpl_vars['oView']->getCaptcha()); ?>
        <input type="hidden" name="c_mach" value="<?php echo $this->_tpl_vars['oCaptcha']->getHash(); ?>
"/>
    </div>
    <ul class="form">
        <li>
            <label><?php echo smarty_function_oxmultilang(array('ident' => 'FORM_PRICEALARM_YOURPRICE'), $this);?>
 (<?php echo $this->_tpl_vars['currency']->sign; ?>
):</label>
            <input class="js-oxValidate js-oxValidate_notEmpty" type="text" name="pa[price]" value="<?php $this->_tag_stack[] = array('oxhasrights', array('ident' => 'SHOWARTICLEPRICE')); $_block_repeat=true;smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php if ($this->_tpl_vars['product']): ?><?php echo $this->_tpl_vars['product']->getFPrice(); ?>
<?php endif; ?><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" size="20" maxlength="32">
            <p class="oxValidateError">
                <span class="js-oxError_notEmpty"><?php echo smarty_function_oxmultilang(array('ident' => 'EXCEPTION_INPUT_NOTALLFIELDS'), $this);?>
</span>
            </p>
        </li>
        <li>
            <label><?php echo smarty_function_oxmultilang(array('ident' => 'FORM_PRICEALARM_EMAIL'), $this);?>
:</label>
            <input class="js-oxValidate js-oxValidate_notEmpty js-oxValidate_email" type="text" name="pa[email]" value="<?php if ($this->_tpl_vars['oxcmp_user']): ?><?php echo $this->_tpl_vars['oxcmp_user']->oxuser__oxusername->value; ?>
<?php endif; ?>" size="20" maxlength="128">
            <p class="oxValidateError">
                <span class="js-oxError_notEmpty"><?php echo smarty_function_oxmultilang(array('ident' => 'EXCEPTION_INPUT_NOTALLFIELDS'), $this);?>
</span>
                <span class="js-oxError_email"><?php echo smarty_function_oxmultilang(array('ident' => 'EXCEPTION_INPUT_NOVALIDEMAIL'), $this);?>
</span>
            </p>
        </li>
        <li>
            <label><?php echo smarty_function_oxmultilang(array('ident' => 'FORM_PRICEALARM_VERIFICATIONCODE'), $this);?>
:</label>
            <?php if ($this->_tpl_vars['oCaptcha']->isImageVisible()): ?>
                <img class="verificationCode" src="<?php echo $this->_tpl_vars['oCaptcha']->getImageUrl(); ?>
" alt="<?php echo smarty_function_oxmultilang(array('ident' => 'FORM_PRICEALARM_VERIFICATIONCODE'), $this);?>
">
            <?php else: ?>
                <span class="verificationCode" id="verifyTextCode"><?php echo $this->_tpl_vars['oCaptcha']->getText(); ?>
</span>
            <?php endif; ?>
            <input class="js-oxValidate js-oxValidate_notEmpty" type="text" data-fieldsize="verify" name="c_mac" value="">
            <p class="oxValidateError">
                <span class="js-oxError_notEmpty"><?php echo smarty_function_oxmultilang(array('ident' => 'EXCEPTION_INPUT_NOTALLFIELDS'), $this);?>
</span>
            </p>
        </li>
        <li class="formSubmit">
            <button class="submitButton largeButton" type="submit"><?php echo smarty_function_oxmultilang(array('ident' => 'FORM_PRICEALARM_SEND'), $this);?>
</button>
        </li>
    </ul>
</form>