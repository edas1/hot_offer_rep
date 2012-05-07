<?php /* Smarty version 2.6.26, created on 2012-05-07 12:35:40
         compiled from layout/page.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'oxifcontent', 'layout/page.tpl', 25, false),array('function', 'oxmultilang', 'layout/page.tpl', 28, false),)), $this); ?>
<?php ob_start(); ?>
    <?php if ($this->_tpl_vars['oView']->showRDFa()): ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "rdfa/rdfa.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>
    <div id="page" class="<?php if ($this->_tpl_vars['sidebar']): ?> sidebar<?php echo $this->_tpl_vars['sidebar']; ?>
<?php endif; ?>">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "layout/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php if ($this->_tpl_vars['oView']->getClassName() != 'start' && ! $this->_tpl_vars['blHideBreadcrumb']): ?>
           <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/breadcrumb.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['sidebar']): ?>
            <div id="sidebar">
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "layout/sidebar.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            </div>
        <?php endif; ?>
        <div id="content">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "message/errors.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <?php $_from = $this->_tpl_vars['oxidBlock_content']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['_block']):
?>
                <?php echo $this->_tpl_vars['_block']; ?>

            <?php endforeach; endif; unset($_from); ?>
        </div>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "layout/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/facebook/init.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php if ($this->_tpl_vars['oView']->isPriceCalculated()): ?>
        <?php $this->_tag_stack[] = array('oxifcontent', array('ident' => 'oxdeliveryinfo','object' => 'oCont')); $_block_repeat=true;smarty_block_oxifcontent($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
            <div id="incVatMessage">
                <?php if ($this->_tpl_vars['oView']->isVatIncluded()): ?>
                    * <span class="deliveryInfo"><?php echo smarty_function_oxmultilang(array('ident' => 'PLUS_SHIPPING'), $this);?>
<a href="<?php echo $this->_tpl_vars['oCont']->getLink(); ?>
" rel="nofollow"><?php echo smarty_function_oxmultilang(array('ident' => 'PLUS_SHIPPING2'), $this);?>
</a></span>
                <?php else: ?>
                    * <span class="deliveryInfo"><?php echo smarty_function_oxmultilang(array('ident' => 'PLUS'), $this);?>
<a href="<?php echo $this->_tpl_vars['oCont']->getLink(); ?>
" rel="nofollow"><?php echo smarty_function_oxmultilang(array('ident' => 'PLUS_SHIPPING2'), $this);?>
</a></span>
                <?php endif; ?>
            </div>
        <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxifcontent($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
    <?php endif; ?>
<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->append('oxidBlock_pageBody', ob_get_contents());ob_end_clean(); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "layout/base.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>