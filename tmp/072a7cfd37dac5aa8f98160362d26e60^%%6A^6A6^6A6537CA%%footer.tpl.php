<?php /* Smarty version 2.6.26, created on 2012-05-04 08:29:44
         compiled from layout/footer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxscript', 'layout/footer.tpl', 2, false),array('function', 'oxmultilang', 'layout/footer.tpl', 20, false),array('block', 'oxifcontent', 'layout/footer.tpl', 17, false),array('modifier', 'count', 'layout/footer.tpl', 44, false),)), $this); ?>

    <?php echo smarty_function_oxscript(array('include' => "js/widgets/oxequalizer.js",'priority' => 10), $this);?>

    <?php echo smarty_function_oxscript(array('add' => "$(function(){oxEqualizer.equalHeight($( '#panel dl' ));});"), $this);?>

    <div id="footer">
        <div id="panel" class="corners">
                <div class="bar">
                    
                        <?php if ($this->_tpl_vars['oView']->isActive('FbLike') && $this->_tpl_vars['oViewConf']->getFbAppId()): ?>
                            <div class="facebook" id="footerFbLike">
                                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/facebook/enable.tpl", 'smarty_include_vars' => array('source' => "widget/facebook/like.tpl",'ident' => "#footerFbLike",'parent' => 'footer')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                            </div>
                        <?php endif; ?>
                    
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/footer/newsletter.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    
                        <div class="deliveryinfo">
                            <?php $this->_tag_stack[] = array('oxifcontent', array('ident' => 'oxdeliveryinfo','object' => 'oCont')); $_block_repeat=true;smarty_block_oxifcontent($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
                                <?php if ($this->_tpl_vars['oView']->getUser()): ?>
                                    <?php $this->assign('oUser', $this->_tpl_vars['oView']->getUser()); ?>
                                    <?php if ($this->_tpl_vars['oUser']->oxuser__oxustid->value && $this->_tpl_vars['oUser']->oxuser__oxcompany->value): ?> <a href="<?php echo $this->_tpl_vars['oCont']->getLink(); ?>
" rel="nofollow"> <?php echo smarty_function_oxmultilang(array('ident' => 'PLUS_SHIPPING3'), $this);?>
</a> <?php else: ?> <a href="<?php echo $this->_tpl_vars['oCont']->getLink(); ?>
" rel="nofollow"><?php echo smarty_function_oxmultilang(array('ident' => 'FOOTER_INCLTAXANDPLUSSHIPPING'), $this);?>
</a> <?php endif; ?>
                                <?php else: ?>
                                    <a href="<?php echo $this->_tpl_vars['oCont']->getLink(); ?>
" rel="nofollow"><?php echo smarty_function_oxmultilang(array('ident' => 'FOOTER_INCLTAXANDPLUSSHIPPING'), $this);?>
</a>
                                <?php endif; ?>
                            <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxifcontent($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
                            
                        </div>
                    
                </div>

                
                    <dl class="services" id="footerServices">
                        <dt><?php echo smarty_function_oxmultilang(array('ident' => 'FOOTER_SERVICES'), $this);?>
</dt>
                        <dd><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/footer/services.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></dd>
                    </dl>
                

                
                    <dl id="footerInformation">
                        <dt><?php echo smarty_function_oxmultilang(array('ident' => 'FOOTER_INFORMATION'), $this);?>
</dt>
                        <dd><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/footer/info.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></dd>
                    </dl>
                

            <?php if (((is_array($_tmp=$this->_tpl_vars['oView']->getManufacturerlist())) ? $this->_run_mod_handler('count', true, $_tmp) : count($_tmp))): ?>
                    
                        <dl id="footerManufacturers">
                            <dt><?php echo smarty_function_oxmultilang(array('ident' => 'FOOTER_MANUFACTURERS'), $this);?>
</dt>
                          <dd><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/footer/manufacturers.tpl", 'smarty_include_vars' => array('manufacturers' => $this->_tpl_vars['oView']->getManufacturerlist())));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></dd>
                        </dl>
                    
            <?php endif; ?>

            <?php if (((is_array($_tmp=$this->_tpl_vars['oView']->getVendorlist())) ? $this->_run_mod_handler('count', true, $_tmp) : count($_tmp))): ?>
                    
                        <dl id="footerVendors">
                            <dt><?php echo smarty_function_oxmultilang(array('ident' => 'FOOTER_DISTRIBUTORS'), $this);?>
</dt>
                            <dd><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/footer/vendors.tpl", 'smarty_include_vars' => array('vendors' => $this->_tpl_vars['oView']->getVendorlist())));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></dd>
                        </dl>
                    
            <?php endif; ?>

            <?php if ($this->_tpl_vars['oxcmp_categories']): ?>
                    
                        <dl class="categories" id="footerCategories">
                            <dt><?php echo smarty_function_oxmultilang(array('ident' => 'FOOTER_CATEGORIES'), $this);?>
</dt>
                            <dd><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/footer/categorieslist.tpl", 'smarty_include_vars' => array('categories' => $this->_tpl_vars['oxcmp_categories'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></dd>
                        </dl>
                    
            <?php endif; ?>
        </div>
        <div class="copyright">
            <img src="<?php echo $this->_tpl_vars['oViewConf']->getImageUrl('logo_small.png'); ?>
" alt="<?php echo smarty_function_oxmultilang(array('ident' => 'OXID_ESALES_URL_TITLE'), $this);?>
">
        </div>
        <div class="text">
            <?php $this->_tag_stack[] = array('oxifcontent', array('ident' => 'oxstdfooter','object' => 'oCont')); $_block_repeat=true;smarty_block_oxifcontent($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
                <?php echo $this->_tpl_vars['oCont']->oxcontents__oxcontent->value; ?>

            <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxifcontent($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
        </div>
    </div>

<?php if ($this->_tpl_vars['oView']->isRootCatChanged()): ?>
    <?php echo smarty_function_oxscript(array('include' => "js/widgets/oxmodalpopup.js",'priority' => 10), $this);?>

    <?php echo smarty_function_oxscript(array('add' => "$( '#scRootCatChanged' ).oxModalPopup({ target: '#scRootCatChanged', openDialog: true});"), $this);?>

    <div id="scRootCatChanged" class="popupBox corners FXgradGreyLight glowShadow">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "form/privatesales/basketexcl.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
<?php endif; ?>