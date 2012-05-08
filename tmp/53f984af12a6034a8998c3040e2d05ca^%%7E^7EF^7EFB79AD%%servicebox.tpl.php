<?php /* Smarty version 2.6.26, created on 2012-05-08 08:06:22
         compiled from widget/header/servicebox.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'widget/header/servicebox.tpl', 9, false),array('function', 'oxscript', 'widget/header/servicebox.tpl', 10, false),array('function', 'oxmultilang', 'widget/header/servicebox.tpl', 14, false),array('function', 'oxgetseourl', 'widget/header/servicebox.tpl', 19, false),array('modifier', 'cat', 'widget/header/servicebox.tpl', 19, false),)), $this); ?>
<div class="topPopList">
    <?php if ($this->_tpl_vars['oxcmp_user']): ?>
        <?php $this->assign('noticeListCount', $this->_tpl_vars['oxcmp_user']->getNoticeListArtCnt()); ?>
        <?php $this->assign('wishListCount', $this->_tpl_vars['oxcmp_user']->getWishListArtCnt()); ?>
    <?php else: ?>
        <?php $this->assign('noticeListCount', '0'); ?>
        <?php $this->assign('wishListCount', '0'); ?>
    <?php endif; ?>
    <?php echo smarty_function_math(array('equation' => "a+b+c",'a' => $this->_tpl_vars['oView']->getCompareItemsCnt(),'b' => $this->_tpl_vars['noticeListCount'],'c' => $this->_tpl_vars['wishListCount'],'assign' => 'notificationsCounter'), $this);?>

    <?php echo smarty_function_oxscript(array('include' => "js/widgets/oxflyoutbox.js",'priority' => 10), $this);?>

    <?php echo smarty_function_oxscript(array('add' => "$( '#servicesTrigger' ).oxFlyOutBox();"), $this);?>

    
        <p id="servicesTrigger" class="selectedValue <?php if ($this->_tpl_vars['notificationsCounter'] > 0): ?>hasNotifications<?php endif; ?>">
            <a href="#" rel="nofollow"><span><?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_SERVICES_ACCOUNT'), $this);?>
</span></a><?php if ($this->_tpl_vars['notificationsCounter'] > 0): ?><span class="counter FXgradOrange"><?php echo $this->_tpl_vars['notificationsCounter']; ?>
</span><?php endif; ?>
        </p>
        <div class="flyoutBox">
            <ul id="services" class="corners flyoutMenu">
                
                    <li class="active"><a href="<?php echo smarty_function_oxgetseourl(array('ident' => ((is_array($_tmp=$this->_tpl_vars['oViewConf']->getSelfLink())) ? $this->_run_mod_handler('cat', true, $_tmp, "cl=account") : smarty_modifier_cat($_tmp, "cl=account"))), $this);?>
"><span><?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_SERVICES_ACCOUNT'), $this);?>
</span></a></li>
                    <li><a href="<?php echo smarty_function_oxgetseourl(array('ident' => ((is_array($_tmp=$this->_tpl_vars['oViewConf']->getSslSelfLink())) ? $this->_run_mod_handler('cat', true, $_tmp, "cl=account") : smarty_modifier_cat($_tmp, "cl=account"))), $this);?>
" rel="nofollow"><span><?php echo smarty_function_oxmultilang(array('ident' => 'LAYOUT_HEADER_ACCOUNT_LINK'), $this);?>
</span></a></li>
                    <?php if ($this->_tpl_vars['oViewConf']->getShowCompareList()): ?>
                        <li><a href="<?php echo smarty_function_oxgetseourl(array('ident' => ((is_array($_tmp=$this->_tpl_vars['oViewConf']->getSelfLink())) ? $this->_run_mod_handler('cat', true, $_tmp, "cl=compare") : smarty_modifier_cat($_tmp, "cl=compare"))), $this);?>
" rel="nofollow"><span><?php echo smarty_function_oxmultilang(array('ident' => 'LAYOUT_HEADER_COMPARE_LINK'), $this);?>
</span><?php if ($this->_tpl_vars['oView']->getCompareItemsCnt()): ?><span class="counter FXgradOrange"><?php echo $this->_tpl_vars['oView']->getCompareItemsCnt(); ?>
</span><?php endif; ?></a></li>
                    <?php endif; ?>
                    <li><a href="<?php echo smarty_function_oxgetseourl(array('ident' => ((is_array($_tmp=$this->_tpl_vars['oViewConf']->getSelfLink())) ? $this->_run_mod_handler('cat', true, $_tmp, "cl=account_noticelist") : smarty_modifier_cat($_tmp, "cl=account_noticelist"))), $this);?>
" rel="nofollow"><span><?php echo smarty_function_oxmultilang(array('ident' => 'LAYOUT_HEADER_NOTICELIST_LINK'), $this);?>
</span><?php if ($this->_tpl_vars['oxcmp_user'] && $this->_tpl_vars['oxcmp_user']->getNoticeListArtCnt()): ?><span class="counter FXgradOrange"><?php echo $this->_tpl_vars['oxcmp_user']->getNoticeListArtCnt(); ?>
</span><?php endif; ?></a></li>
                    <?php if ($this->_tpl_vars['oViewConf']->getShowWishlist()): ?>
                        <li><a href="<?php echo smarty_function_oxgetseourl(array('ident' => ((is_array($_tmp=$this->_tpl_vars['oViewConf']->getSelfLink())) ? $this->_run_mod_handler('cat', true, $_tmp, "cl=account_wishlist") : smarty_modifier_cat($_tmp, "cl=account_wishlist"))), $this);?>
" rel="nofollow"><span><?php echo smarty_function_oxmultilang(array('ident' => 'LAYOUT_HEADER_WISHLIST_LINK'), $this);?>
</span><?php if ($this->_tpl_vars['oxcmp_user'] && $this->_tpl_vars['oxcmp_user']->getWishListArtCnt()): ?><span class="counter FXgradOrange"><?php echo $this->_tpl_vars['oxcmp_user']->getWishListArtCnt(); ?>
</span><?php endif; ?></a></li>
                    <?php endif; ?>
                    <?php if ($this->_tpl_vars['oViewConf']->getShowListmania()): ?>
                        <li><a href="<?php echo smarty_function_oxgetseourl(array('ident' => ((is_array($_tmp=$this->_tpl_vars['oViewConf']->getSelfLink())) ? $this->_run_mod_handler('cat', true, $_tmp, "cl=account_recommlist") : smarty_modifier_cat($_tmp, "cl=account_recommlist"))), $this);?>
" rel="nofollow"><span><?php echo smarty_function_oxmultilang(array('ident' => 'LAYOUT_HEADER_LISTMANIA_LINK'), $this);?>
</span><?php if ($this->_tpl_vars['oxcmp_user'] && $this->_tpl_vars['oxcmp_user']->getRecommListsCount()): ?><span class="counter FXgradOrange"><?php echo $this->_tpl_vars['oxcmp_user']->getRecommListsCount(); ?>
</span><?php endif; ?></a></li>
                    <?php endif; ?>
                    <?php if ($this->_tpl_vars['oView']->isEnabledDownloadableFiles()): ?>
                        <li><a href="<?php echo smarty_function_oxgetseourl(array('ident' => ((is_array($_tmp=$this->_tpl_vars['oViewConf']->getSelfLink())) ? $this->_run_mod_handler('cat', true, $_tmp, "cl=account_downloads") : smarty_modifier_cat($_tmp, "cl=account_downloads"))), $this);?>
" rel="nofollow"><span><?php echo smarty_function_oxmultilang(array('ident' => 'MY_DOWNLOADS'), $this);?>
</span></a></li>
                    <?php endif; ?>
                
            </ul>
        </div>
    
 </div>