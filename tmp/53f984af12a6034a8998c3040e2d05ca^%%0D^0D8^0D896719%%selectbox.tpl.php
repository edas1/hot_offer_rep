<?php /* Smarty version 2.6.26, created on 2012-05-08 08:06:21
         compiled from widget/product/selectbox.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxscript', 'widget/product/selectbox.tpl', 1, false),array('function', 'oxmultilang', 'widget/product/selectbox.tpl', 14, false),array('modifier', 'default', 'widget/product/selectbox.tpl', 22, false),)), $this); ?>
<?php echo smarty_function_oxscript(array('include' => "js/widgets/oxdropdown.js",'priority' => 10), $this);?>

<?php echo smarty_function_oxscript(array('add' => "$('div.dropDown p').oxDropDown();"), $this);?>

<?php $this->assign('oSelections', $this->_tpl_vars['oSelectionList']->getSelections()); ?>
<?php if ($this->_tpl_vars['oSelections']): ?>
<div class="dropDown <?php echo $this->_tpl_vars['sJsAction']; ?>
">
    <p class="selectorLabel underlined <?php if ($this->_tpl_vars['editable'] === false): ?> js-disabled<?php endif; ?>">
        <label><?php echo $this->_tpl_vars['oSelectionList']->getLabel(); ?>
:</label>
        <?php $this->assign('oActiveSelection', $this->_tpl_vars['oSelectionList']->getActiveSelection()); ?>
        <?php if ($this->_tpl_vars['oActiveSelection']): ?>
            <span><?php echo $this->_tpl_vars['oActiveSelection']->getName(); ?>
</span>
        <?php elseif (! $this->_tpl_vars['blHideDefault']): ?>
            <span <?php if ($this->_tpl_vars['blInDetails']): ?>class="selectMessage"<?php endif; ?>>
                <?php if ($this->_tpl_vars['sFieldName'] == 'sel'): ?>
                    <?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_PRODUCT_ATTRIBUTES_PLEASECHOOSE'), $this);?>

                <?php else: ?>
                    <?php echo smarty_function_oxmultilang(array('ident' => 'CHOOSE_VARIANT'), $this);?>

                <?php endif; ?>
            </span>
        <?php endif; ?>
    </p>
    <?php if ($this->_tpl_vars['editable'] !== false): ?>
        <input type="hidden" name="<?php echo ((is_array($_tmp=@$this->_tpl_vars['sFieldName'])) ? $this->_run_mod_handler('default', true, $_tmp, 'varselid') : smarty_modifier_default($_tmp, 'varselid')); ?>
[<?php echo $this->_tpl_vars['iKey']; ?>
]" value="<?php if ($this->_tpl_vars['oActiveSelection']): ?><?php echo $this->_tpl_vars['oActiveSelection']->getValue(); ?>
<?php endif; ?>">
        <ul class="drop <?php echo ((is_array($_tmp=@$this->_tpl_vars['sSelType'])) ? $this->_run_mod_handler('default', true, $_tmp, 'vardrop') : smarty_modifier_default($_tmp, 'vardrop')); ?>
 FXgradGreyLight shadow">
            <?php if ($this->_tpl_vars['oActiveSelection'] && ! $this->_tpl_vars['blHideDefault']): ?>
                <li><a rel="" href="#">
                    <?php if ($this->_tpl_vars['sFieldName'] == 'sel'): ?>
                        <?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_PRODUCT_ATTRIBUTES_PLEASECHOOSE'), $this);?>

                    <?php else: ?>
                        <?php echo smarty_function_oxmultilang(array('ident' => 'CHOOSE_VARIANT'), $this);?>

                    <?php endif; ?>
                </a></li>
            <?php endif; ?>
            <?php $_from = $this->_tpl_vars['oSelections']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['oSelection']):
?>
                <li class="<?php if ($this->_tpl_vars['oSelection']->isDisabled()): ?>js-disabled disabled<?php endif; ?>">
                    <a data-seletion-id="<?php echo $this->_tpl_vars['oSelection']->getValue(); ?>
" href="<?php echo $this->_tpl_vars['oSelection']->getLink(); ?>
" class="<?php if ($this->_tpl_vars['oSelection']->isActive()): ?>selected<?php endif; ?>"><?php echo $this->_tpl_vars['oSelection']->getName(); ?>
</a>
                </li>
            <?php endforeach; endif; unset($_from); ?>
        </ul>
    <?php endif; ?>
</div>
<?php else: ?>
<a href="<?php echo $this->_tpl_vars['_productLink']; ?>
" class="variantMessage">
<?php if ($this->_tpl_vars['sFieldName'] == 'sel'): ?>
    <?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_PRODUCT_ATTRIBUTES_PLEASECHOOSE'), $this);?>

<?php else: ?>
    <?php echo smarty_function_oxmultilang(array('ident' => 'CHOOSE_VARIANT'), $this);?>

<?php endif; ?>
</a>
<?php endif; ?>