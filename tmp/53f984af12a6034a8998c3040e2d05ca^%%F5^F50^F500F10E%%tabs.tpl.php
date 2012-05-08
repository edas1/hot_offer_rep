<?php /* Smarty version 2.6.26, created on 2012-05-08 08:08:46
         compiled from page/details/inc/tabs.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxscript', 'page/details/inc/tabs.tpl', 1, false),array('function', 'oxmultilang', 'page/details/inc/tabs.tpl', 8, false),array('function', 'oxeval', 'page/details/inc/tabs.tpl', 11, false),array('function', 'oxid_include_dynamic', 'page/details/inc/tabs.tpl', 44, false),array('block', 'oxhasrights', 'page/details/inc/tabs.tpl', 5, false),array('modifier', 'cat', 'page/details/inc/tabs.tpl', 58, false),)), $this); ?>
<?php echo smarty_function_oxscript(array('add' => "$('a.js-external').attr('target', '_blank');"), $this);?>

<?php echo smarty_function_oxscript(array('add' => "$('div.tabbedWidgetBox').tabs();"), $this);?>



    <?php $this->_tag_stack[] = array('oxhasrights', array('ident' => 'SHOWLONGDESCRIPTION')); $_block_repeat=true;smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
        <?php $this->assign('oLongdesc', $this->_tpl_vars['oDetailsProduct']->getLongDescription()); ?>
        <?php if ($this->_tpl_vars['oLongdesc']->value): ?>
            <?php ob_start(); ?><a href="#description"><?php echo smarty_function_oxmultilang(array('ident' => 'PAGE_DETAILS_TABS_DESCRIPTION'), $this);?>
</a><?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->append('tabs', ob_get_contents());ob_end_clean(); ?>
            <?php ob_start(); ?>
            <div id="description" class="cmsContent">
                <?php echo smarty_function_oxeval(array('var' => $this->_tpl_vars['oLongdesc']), $this);?>

                <?php if ($this->_tpl_vars['oDetailsProduct']->oxarticles__oxexturl->value): ?>
                    <a id="productExturl" class="js-external" href="http://<?php echo $this->_tpl_vars['oDetailsProduct']->oxarticles__oxexturl->value; ?>
">
                    <?php if ($this->_tpl_vars['oDetailsProduct']->oxarticles__oxurldesc->value): ?>
                        <?php echo $this->_tpl_vars['oDetailsProduct']->oxarticles__oxurldesc->value; ?>

                    <?php else: ?>
                        <?php echo $this->_tpl_vars['oDetailsProduct']->oxarticles__oxexturl->value; ?>

                    <?php endif; ?>
                    </a>
                <?php endif; ?>
            </div>
            <?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->append('tabsContent', ob_get_contents());ob_end_clean(); ?>
        <?php endif; ?>
    <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>



    <?php if ($this->_tpl_vars['oView']->getAttributes()): ?>
        <?php ob_start(); ?><a href="#attributes"><?php echo smarty_function_oxmultilang(array('ident' => 'DETAILS_SPECIFICATION'), $this);?>
</a><?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->append('tabs', ob_get_contents());ob_end_clean(); ?>
        <?php ob_start(); ?><div id="attributes"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "page/details/inc/attributes.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div><?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->append('tabsContent', ob_get_contents());ob_end_clean(); ?>
    <?php endif; ?>



    <?php if ($this->_tpl_vars['oView']->isPriceAlarm() && ! $this->_tpl_vars['oDetailsProduct']->isParentNotBuyable()): ?>
        <?php ob_start(); ?><a href="#pricealarm"><?php echo smarty_function_oxmultilang(array('ident' => 'DETAILS_PRICEALARM'), $this);?>
</a><?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->append('tabs', ob_get_contents());ob_end_clean(); ?>
        <?php ob_start(); ?><div id="pricealarm"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "form/pricealarm.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div><?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->append('tabsContent', ob_get_contents());ob_end_clean(); ?>
    <?php endif; ?>



    <?php if ($this->_tpl_vars['oView']->showTags() && ( $this->_tpl_vars['oView']->getTagCloudManager() || ( ( $this->_tpl_vars['oView']->getTagCloudManager() || $this->_tpl_vars['oxcmp_user'] ) && $this->_tpl_vars['oDetailsProduct'] ) )): ?>
        <?php ob_start(); ?><a href="#tags"><?php echo smarty_function_oxmultilang(array('ident' => 'PAGE_DETAILS_TABS_TAGS'), $this);?>
</a><?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->append('tabs', ob_get_contents());ob_end_clean(); ?>
        <?php ob_start(); ?><div id="tags"><?php echo smarty_function_oxid_include_dynamic(array('file' => "page/details/inc/tags.tpl"), $this);?>
</div><?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->append('tabsContent', ob_get_contents());ob_end_clean(); ?>
    <?php endif; ?>



    <?php if ($this->_tpl_vars['oView']->getMediaFiles() || $this->_tpl_vars['oDetailsProduct']->oxarticles__oxfile->value): ?>
        <?php ob_start(); ?><a href="#media"><?php echo smarty_function_oxmultilang(array('ident' => 'PAGE_DETAILS_TABS_MEDIA'), $this);?>
</a><?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->append('tabs', ob_get_contents());ob_end_clean(); ?>
        <?php ob_start(); ?><div id="media"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "page/details/inc/media.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div><?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->append('tabsContent', ob_get_contents());ob_end_clean(); ?>
    <?php endif; ?>



    <?php if ($this->_tpl_vars['oView']->isActive('FbComments') && $this->_tpl_vars['oViewConf']->getFbAppId()): ?>
        <?php ob_start(); ?><a href="#productFbComments"><?php echo smarty_function_oxmultilang(array('ident' => 'FACEBOOK_COMMENTS'), $this);?>
</a><?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->append('FBtabs', ob_get_contents());ob_end_clean(); ?>
        <?php $this->assign('_fbScript', ((is_array($_tmp=((is_array($_tmp="http://connect.facebook.net/en_US/all.js#appId=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['oViewConf']->getFbAppId()) : smarty_modifier_cat($_tmp, $this->_tpl_vars['oViewConf']->getFbAppId())))) ? $this->_run_mod_handler('cat', true, $_tmp, "&amp;xfbml=1") : smarty_modifier_cat($_tmp, "&amp;xfbml=1"))); ?>
        <?php ob_start(); ?><div id="productFbComments"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/facebook/enable.tpl", 'smarty_include_vars' => array('source' => "widget/facebook/comments.tpl",'ident' => "#productFbComments",'script' => $this->_tpl_vars['_fbScript'],'type' => 'text')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div><?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->append('FBtabsContent', ob_get_contents());ob_end_clean(); ?>
    <?php endif; ?>



    <?php if ($this->_tpl_vars['oView']->isActive('FbInvite') && $this->_tpl_vars['oViewConf']->getFbAppId()): ?>
        <?php ob_start(); ?><a href="#productFbInvite"><?php echo smarty_function_oxmultilang(array('ident' => 'FACEBOOK_INVITE'), $this);?>
</a><?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->append('FBtabs', ob_get_contents());ob_end_clean(); ?>
        <?php ob_start(); ?>
            <div id="productFbInvite">
                <fb:serverfbml width="560px" id="productFbInviteFbml">
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/facebook/enable.tpl", 'smarty_include_vars' => array('source' => "widget/facebook/invite.tpl",'ident' => "#productFbInviteFbml",'type' => 'text')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                </fb:serverfbml>
            </div>
        <?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->append('FBtabsContent', ob_get_contents());ob_end_clean(); ?>
    <?php endif; ?>



    <?php if ($this->_tpl_vars['tabs']): ?>
        <div class="tabbedWidgetBox clear">
            <ul id="itemTabs" class="tabs clear">
                <?php $_from = $this->_tpl_vars['tabs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tab']):
?>
                    <li><?php echo $this->_tpl_vars['tab']; ?>
</li>
                <?php endforeach; endif; unset($_from); ?>
            </ul>
            <div class="widgetBoxBottomRound">
                <?php $_from = $this->_tpl_vars['tabsContent']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tabContent']):
?>
                    <?php echo $this->_tpl_vars['tabContent']; ?>

                <?php endforeach; endif; unset($_from); ?>
            </div>
        </div>
    <?php endif; ?>



    <?php if ($this->_tpl_vars['FBtabs']): ?>
        <div class="tabbedWidgetBox clear">
            <ul id="itemFbTabs" class="tabs clear">
                <?php $_from = $this->_tpl_vars['FBtabs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['FBtab']):
?>
                    <li class="fbTab"><?php echo $this->_tpl_vars['FBtab']; ?>
</li>
                <?php endforeach; endif; unset($_from); ?>
            </ul>
            <div class="widgetBoxBottomRound FXgradBlueLight">
                <?php $_from = $this->_tpl_vars['FBtabsContent']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['FBtabContent']):
?>
                    <?php echo $this->_tpl_vars['FBtabContent']; ?>

                <?php endforeach; endif; unset($_from); ?>
            </div>
        </div>
    <?php endif; ?>
