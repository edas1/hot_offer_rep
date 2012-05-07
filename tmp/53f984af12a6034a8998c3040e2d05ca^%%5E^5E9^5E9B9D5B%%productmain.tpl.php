<?php /* Smarty version 2.6.26, created on 2012-05-07 13:14:05
         compiled from page/details/inc/productmain.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'page/details/inc/productmain.tpl', 8, false),array('modifier', 'strip_tags', 'page/details/inc/productmain.tpl', 46, false),array('modifier', 'default', 'page/details/inc/productmain.tpl', 115, false),array('modifier', 'oxmultilangassign', 'page/details/inc/productmain.tpl', 115, false),array('modifier', 'strip', 'page/details/inc/productmain.tpl', 335, false),array('modifier', 'escape', 'page/details/inc/productmain.tpl', 335, false),array('function', 'oxscript', 'page/details/inc/productmain.tpl', 15, false),array('function', 'oxmultilang', 'page/details/inc/productmain.tpl', 45, false),array('function', 'oxid_include_dynamic', 'page/details/inc/productmain.tpl', 80, false),array('function', 'oxgetseourl', 'page/details/inc/productmain.tpl', 83, false),array('function', 'mailto', 'page/details/inc/productmain.tpl', 115, false),array('block', 'oxhasrights', 'page/details/inc/productmain.tpl', 18, false),)), $this); ?>
<?php $this->assign('aVariantSelections', $this->_tpl_vars['oView']->getVariantSelections()); ?>

<?php if ($this->_tpl_vars['aVariantSelections'] && $this->_tpl_vars['aVariantSelections']['rawselections']): ?>
    <?php $this->assign('_sSelectionHashCollection', ""); ?>
    <?php $_from = $this->_tpl_vars['aVariantSelections']['rawselections']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['iKey'] => $this->_tpl_vars['oSelectionList']):
?>
        <?php $this->assign('_sSelectionHash', ""); ?>
        <?php $_from = $this->_tpl_vars['oSelectionList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['iPos'] => $this->_tpl_vars['oListItem']):
?>
            <?php $this->assign('_sSelectionHash', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['_sSelectionHash'])) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['iPos']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['iPos'])))) ? $this->_run_mod_handler('cat', true, $_tmp, ":") : smarty_modifier_cat($_tmp, ":")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['oListItem']['hash']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['oListItem']['hash'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "|") : smarty_modifier_cat($_tmp, "|"))); ?>
        <?php endforeach; endif; unset($_from); ?>
        <?php if ($this->_tpl_vars['_sSelectionHash']): ?>
            <?php if ($this->_tpl_vars['_sSelectionHashCollection']): ?><?php $this->assign('_sSelectionHashCollection', ((is_array($_tmp=$this->_tpl_vars['_sSelectionHashCollection'])) ? $this->_run_mod_handler('cat', true, $_tmp, ",") : smarty_modifier_cat($_tmp, ","))); ?><?php endif; ?>
            <?php $this->assign('_sSelectionHashCollection', ((is_array($_tmp=$this->_tpl_vars['_sSelectionHashCollection'])) ? $this->_run_mod_handler('cat', true, $_tmp, "'".($this->_tpl_vars['_sSelectionHash'])."'") : smarty_modifier_cat($_tmp, "'".($this->_tpl_vars['_sSelectionHash'])."'"))); ?>
        <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
    <?php echo smarty_function_oxscript(array('add' => "var oxVariantSelections  = [".($this->_tpl_vars['_sSelectionHashCollection'])."];"), $this);?>

<?php endif; ?>

<?php $this->_tag_stack[] = array('oxhasrights', array('ident' => 'TOBASKET')); $_block_repeat=true;smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
    <form class="js-oxProductForm" action="<?php echo $this->_tpl_vars['oViewConf']->getSelfActionLink(); ?>
" method="post">
        <div>
            <?php echo $this->_tpl_vars['oViewConf']->getHiddenSid(); ?>

            <?php echo $this->_tpl_vars['oViewConf']->getNavFormParams(); ?>

            <input type="hidden" name="cl" value="<?php echo $this->_tpl_vars['oViewConf']->getActiveClassName(); ?>
">
            <input type="hidden" name="aid" value="<?php echo $this->_tpl_vars['oDetailsProduct']->oxarticles__oxid->value; ?>
">
            <input type="hidden" name="anid" value="<?php echo $this->_tpl_vars['oDetailsProduct']->oxarticles__oxnid->value; ?>
">
            <input type="hidden" name="parentid" value="<?php if (! $this->_tpl_vars['oDetailsProduct']->oxarticles__oxparentid->value): ?><?php echo $this->_tpl_vars['oDetailsProduct']->oxarticles__oxid->value; ?>
<?php else: ?><?php echo $this->_tpl_vars['oDetailsProduct']->oxarticles__oxparentid->value; ?>
<?php endif; ?>">
            <input type="hidden" name="panid" value="">
            <?php if (! $this->_tpl_vars['oDetailsProduct']->isNotBuyable()): ?>
                <input type="hidden" name="fnc" value="tobasket">
            <?php endif; ?>
        </div>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

<div class="detailsInfo clear">
        
        <?php echo smarty_function_oxscript(array('include' => "js/libs/cloudzoom.js",'priority' => 10), $this);?>

        <?php if ($this->_tpl_vars['oView']->showZoomPics()): ?>
            <?php echo smarty_function_oxscript(array('include' => "js/widgets/oxmodalpopup.js",'priority' => 10), $this);?>

            <?php echo smarty_function_oxscript(array('add' => "$('#zoomTrigger').oxModalPopup({target:'#zoomModal'});"), $this);?>

            <a id="zoomTrigger" rel="nofollow" href="#">Zoom</a>
            <?php echo smarty_function_oxscript(array('add' => "$('#zoom1').attr( 'rel', $('#zoom1').attr('data-zoomparams'));"), $this);?>

            <?php echo smarty_function_oxscript(array('add' => "$('.cloud-zoom, .cloud-zoom-gallery').CloudZoom();"), $this);?>

            <div class="picture">
                <a href="<?php echo $this->_tpl_vars['oPictureProduct']->getMasterZoomPictureUrl(1); ?>
" class="cloud-zoom" id="zoom1" rel='' data-zoomparams="adjustY:-2, zoomWidth:'354', fixZoomWindow:'390', trImg:'<?php echo $this->_tpl_vars['oViewConf']->getImageUrl('dot.png'); ?>
', loadingText:'<?php echo smarty_function_oxmultilang(array('ident' => 'PAGE_DETAILS_ZOOM_LOADING'), $this);?>
'">
                    <img src="<?php echo $this->_tpl_vars['oView']->getActPicture(); ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['oPictureProduct']->oxarticles__oxtitle->value)) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['oPictureProduct']->oxarticles__oxvarselect->value)) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
">
                </a>
            </div>
        <?php else: ?>
            <div class="picture">
                <img src="<?php echo $this->_tpl_vars['oView']->getActPicture(); ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['oPictureProduct']->oxarticles__oxtitle->value)) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['oPictureProduct']->oxarticles__oxvarselect->value)) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
">
            </div>
        <?php endif; ?>
    

        <div class="information">

        <?php $this->assign('oManufacturer', $this->_tpl_vars['oView']->getManufacturer()); ?>
        <div class="productMainInfo<?php if ($this->_tpl_vars['oManufacturer']->oxmanufacturers__oxicon->value): ?> hasBrand<?php endif; ?>">

            <?php echo smarty_function_oxscript(array('include' => "js/widgets/oxarticleactionlinksselect.js",'priority' => 10), $this);?>

            <?php echo smarty_function_oxscript(array('add' => "$( '#productTitle' ).oxArticleActionLinksSelect();"), $this);?>


                        
                <h1 id="productTitle"><span><?php echo $this->_tpl_vars['oDetailsProduct']->oxarticles__oxtitle->value; ?>
 <?php echo $this->_tpl_vars['oDetailsProduct']->oxarticles__oxvarselect->value; ?>
</span></h1>
            

                        <?php if ($_COOKIE['showlinksonce'] != '1'): ?>
                <div id="showLinksOnce"></div>
            <?php endif; ?>

            
                <a class="selector corners FXgradBlueDark" href="#" id="productLinks"><img src="<?php echo $this->_tpl_vars['oViewConf']->getImageUrl('selectbutton.png'); ?>
" alt="Select"></a>
                <ul class="actionLinks corners shadow">
                    
                        <?php if ($this->_tpl_vars['oViewConf']->getShowCompareList()): ?>
                            <li><span><?php echo smarty_function_oxid_include_dynamic(array('file' => "page/details/inc/compare_links.tpl",'testid' => "",'type' => 'compare','aid' => $this->_tpl_vars['oDetailsProduct']->oxarticles__oxid->value,'anid' => $this->_tpl_vars['oDetailsProduct']->oxarticles__oxnid->value,'in_list' => $this->_tpl_vars['oDetailsProduct']->isOnComparisonList(),'page' => $this->_tpl_vars['oView']->getActPage(),'text_to_id' => 'PAGE_DETAILS_COMPARE','text_from_id' => 'PAGE_DETAILS_REMOVEFROMCOMPARELIST'), $this);?>
</span></li>
                        <?php endif; ?>
                        <li>
                            <span><a id="suggest" rel="nofollow" href="<?php echo smarty_function_oxgetseourl(array('ident' => ((is_array($_tmp=$this->_tpl_vars['oViewConf']->getSelfLink())) ? $this->_run_mod_handler('cat', true, $_tmp, "cl=suggest") : smarty_modifier_cat($_tmp, "cl=suggest")),'params' => ((is_array($_tmp="anid=".($this->_tpl_vars['oDetailsProduct']->oxarticles__oxnid->value))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['oViewConf']->getNavUrlParams()) : smarty_modifier_cat($_tmp, $this->_tpl_vars['oViewConf']->getNavUrlParams()))), $this);?>
"><?php echo smarty_function_oxmultilang(array('ident' => 'PAGE_DETAILS_RECOMMEND'), $this);?>
</a></span>
                        </li>
                        <?php if ($this->_tpl_vars['oViewConf']->getShowListmania()): ?>
                            <li>
                                <span>
                                    <?php if ($this->_tpl_vars['oxcmp_user']): ?>
                                        <a id="recommList" rel="nofollow" href="<?php echo smarty_function_oxgetseourl(array('ident' => ((is_array($_tmp=$this->_tpl_vars['oViewConf']->getSelfLink())) ? $this->_run_mod_handler('cat', true, $_tmp, "cl=recommadd") : smarty_modifier_cat($_tmp, "cl=recommadd")),'params' => ((is_array($_tmp="aid=".($this->_tpl_vars['oDetailsProduct']->oxarticles__oxnid->value)."&amp;anid=".($this->_tpl_vars['oDetailsProduct']->oxarticles__oxnid->value))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['oViewConf']->getNavUrlParams()) : smarty_modifier_cat($_tmp, $this->_tpl_vars['oViewConf']->getNavUrlParams()))), $this);?>
"><?php echo smarty_function_oxmultilang(array('ident' => 'PAGE_DETAILS_ADDTORECOMMLIST'), $this);?>
</a>
                                    <?php else: ?>
                                        <a id="loginToRecommlist" rel="nofollow" href="<?php echo smarty_function_oxgetseourl(array('ident' => ((is_array($_tmp=$this->_tpl_vars['oViewConf']->getSelfLink())) ? $this->_run_mod_handler('cat', true, $_tmp, "cl=account") : smarty_modifier_cat($_tmp, "cl=account")),'params' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="anid=".($this->_tpl_vars['oDetailsProduct']->oxarticles__oxnid->value))) ? $this->_run_mod_handler('cat', true, $_tmp, "&amp;sourcecl=") : smarty_modifier_cat($_tmp, "&amp;sourcecl=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['oViewConf']->getActiveClassName()) : smarty_modifier_cat($_tmp, $this->_tpl_vars['oViewConf']->getActiveClassName())))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['oViewConf']->getNavUrlParams()) : smarty_modifier_cat($_tmp, $this->_tpl_vars['oViewConf']->getNavUrlParams()))), $this);?>
"><?php echo smarty_function_oxmultilang(array('ident' => 'PAGE_DETAILS_LOGGINTOACCESSRECOMMLIST'), $this);?>
</a>
                                    <?php endif; ?>
                                </span>
                            </li>
                        <?php endif; ?>
                        <?php if ($this->_tpl_vars['oxcmp_user']): ?>
                            <li><span><a id="linkToNoticeList" href="<?php echo smarty_function_oxgetseourl(array('ident' => ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oViewConf']->getSelfLink())) ? $this->_run_mod_handler('cat', true, $_tmp, "cl=") : smarty_modifier_cat($_tmp, "cl=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['oViewConf']->getActiveClassName()) : smarty_modifier_cat($_tmp, $this->_tpl_vars['oViewConf']->getActiveClassName())),'params' => ((is_array($_tmp="aid=".($this->_tpl_vars['oDetailsProduct']->oxarticles__oxnid->value)."&amp;anid=".($this->_tpl_vars['oDetailsProduct']->oxarticles__oxnid->value)."&amp;fnc=tonoticelist&amp;am=1")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['oViewConf']->getNavUrlParams()) : smarty_modifier_cat($_tmp, $this->_tpl_vars['oViewConf']->getNavUrlParams()))), $this);?>
" rel="nofollow"><?php echo smarty_function_oxmultilang(array('ident' => 'PAGE_DETAILS_ADDTONOTICELIST'), $this);?>
</a></span></li>
                        <?php else: ?>
                            <li><span><a id="loginToNotice" href="<?php echo smarty_function_oxgetseourl(array('ident' => ((is_array($_tmp=$this->_tpl_vars['oViewConf']->getSelfLink())) ? $this->_run_mod_handler('cat', true, $_tmp, "cl=account") : smarty_modifier_cat($_tmp, "cl=account")),'params' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="anid=".($this->_tpl_vars['oDetailsProduct']->oxarticles__oxnid->value))) ? $this->_run_mod_handler('cat', true, $_tmp, "&amp;sourcecl=") : smarty_modifier_cat($_tmp, "&amp;sourcecl=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['oViewConf']->getActiveClassName()) : smarty_modifier_cat($_tmp, $this->_tpl_vars['oViewConf']->getActiveClassName())))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['oViewConf']->getNavUrlParams()) : smarty_modifier_cat($_tmp, $this->_tpl_vars['oViewConf']->getNavUrlParams()))), $this);?>
" rel="nofollow"><?php echo smarty_function_oxmultilang(array('ident' => 'PAGE_DETAILS_LOGGINTOACCESSNOTICELIST'), $this);?>
</a></span></li>
                        <?php endif; ?>
                        <?php if ($this->_tpl_vars['oViewConf']->getShowWishlist()): ?>
                            <?php if ($this->_tpl_vars['oxcmp_user']): ?>
                                <li><span><a id="linkToWishList" href="<?php echo smarty_function_oxgetseourl(array('ident' => ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oViewConf']->getSelfLink())) ? $this->_run_mod_handler('cat', true, $_tmp, "cl=") : smarty_modifier_cat($_tmp, "cl=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['oViewConf']->getActiveClassName()) : smarty_modifier_cat($_tmp, $this->_tpl_vars['oViewConf']->getActiveClassName())),'params' => ((is_array($_tmp="aid=".($this->_tpl_vars['oDetailsProduct']->oxarticles__oxnid->value)."&anid=".($this->_tpl_vars['oDetailsProduct']->oxarticles__oxnid->value)."&amp;fnc=towishlist&amp;am=1")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['oViewConf']->getNavUrlParams()) : smarty_modifier_cat($_tmp, $this->_tpl_vars['oViewConf']->getNavUrlParams()))), $this);?>
" rel="nofollow"><?php echo smarty_function_oxmultilang(array('ident' => 'PAGE_DETAILS_ADDTOWISHLIST'), $this);?>
</a></span></li>
                            <?php else: ?>
                                <li><span><a id="loginToWish" href="<?php echo smarty_function_oxgetseourl(array('ident' => ((is_array($_tmp=$this->_tpl_vars['oViewConf']->getSelfLink())) ? $this->_run_mod_handler('cat', true, $_tmp, "cl=account") : smarty_modifier_cat($_tmp, "cl=account")),'params' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="anid=".($this->_tpl_vars['oDetailsProduct']->oxarticles__oxnid->value))) ? $this->_run_mod_handler('cat', true, $_tmp, "&amp;sourcecl=") : smarty_modifier_cat($_tmp, "&amp;sourcecl=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['oViewConf']->getActiveClassName()) : smarty_modifier_cat($_tmp, $this->_tpl_vars['oViewConf']->getActiveClassName())))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['oViewConf']->getNavUrlParams()) : smarty_modifier_cat($_tmp, $this->_tpl_vars['oViewConf']->getNavUrlParams()))), $this);?>
" rel="nofollow"><?php echo smarty_function_oxmultilang(array('ident' => 'PAGE_DETAILS_LOGGINTOACCESSWISHLIST'), $this);?>
</a></span></li>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php $this->_tag_stack[] = array('oxhasrights', array('ident' => 'TOBASKET')); $_block_repeat=true;smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
                            <?php if ($this->_tpl_vars['oView']->isPriceAlarm() && $this->_tpl_vars['oDetailsProduct']->isBuyable()): ?>
                                <li><a id="priceAlarmLink" rel="nofollow" href="<?php echo ((is_array($_tmp=$this->_tpl_vars['oDetailsProduct']->getLink())) ? $this->_run_mod_handler('cat', true, $_tmp, '#itemTabs') : smarty_modifier_cat($_tmp, '#itemTabs')); ?>
"><?php echo smarty_function_oxmultilang(array('ident' => 'DETAILS_PRICEALARM'), $this);?>
</a></li>
                            <?php endif; ?>
                        <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
                        <li>
                           <span><?php echo smarty_function_mailto(array('extra' => 'id="questionMail"','address' => ((is_array($_tmp=@$this->_tpl_vars['oDetailsProduct']->oxarticles__oxquestionemail->value)) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['oxcmp_shop']->oxshops__oxinfoemail->value) : smarty_modifier_default($_tmp, @$this->_tpl_vars['oxcmp_shop']->oxshops__oxinfoemail->value)),'subject' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='DETAILS_QUESTIONSSUBJECT')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp) : smarty_modifier_oxmultilangassign($_tmp)))) ? $this->_run_mod_handler('cat', true, $_tmp, ' ') : smarty_modifier_cat($_tmp, ' ')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['oDetailsProduct']->oxarticles__oxartnum->value) : smarty_modifier_cat($_tmp, $this->_tpl_vars['oDetailsProduct']->oxarticles__oxartnum->value)),'text' => ((is_array($_tmp='DETAILS_QUESTIONS')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp) : smarty_modifier_oxmultilangassign($_tmp))), $this);?>
</span>
                        </li>
                    
                </ul>
            

                        
                <span id="productArtnum" class="itemCode"><?php echo smarty_function_oxmultilang(array('ident' => 'DETAILS_ARTNUMBER'), $this);?>
 <?php echo $this->_tpl_vars['oDetailsProduct']->oxarticles__oxartnum->value; ?>
</span>
            

                        <?php if ($this->_tpl_vars['oView']->ratingIsActive()): ?>
            
                <div class="rating clear">
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/reviews/rating.tpl", 'smarty_include_vars' => array('itemid' => "anid=".($this->_tpl_vars['oDetailsProduct']->oxarticles__oxnid->value),'sRateUrl' => $this->_tpl_vars['oDetailsProduct']->getLink())));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                </div>
            
            <?php endif; ?>
        </div>

        
            <?php if ($this->_tpl_vars['oManufacturer']->oxmanufacturers__oxicon->value): ?>
                <img src="<?php echo $this->_tpl_vars['oManufacturer']->getIconUrl(); ?>
" alt="<?php echo $this->_tpl_vars['oManufacturer']->oxmanufacturers__oxtitle->value; ?>
">
            <?php endif; ?>
        

                
            <?php $this->_tag_stack[] = array('oxhasrights', array('ident' => 'SHOWSHORTDESCRIPTION')); $_block_repeat=true;smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
                <?php if ($this->_tpl_vars['oDetailsProduct']->oxarticles__oxshortdesc->value): ?>
                    <div class="shortDescription description" id="productShortdesc"><?php echo $this->_tpl_vars['oDetailsProduct']->oxarticles__oxshortdesc->value; ?>
</div>
                <?php endif; ?>
            <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
        

        <?php $this->assign('blCanBuy', true); ?>
                
            <?php if ($this->_tpl_vars['aVariantSelections'] && $this->_tpl_vars['aVariantSelections']['selections']): ?>
                <?php echo smarty_function_oxscript(array('include' => "js/widgets/oxajax.js",'priority' => 10), $this);?>

                <?php echo smarty_function_oxscript(array('include' => "js/widgets/oxarticlevariant.js",'priority' => 10), $this);?>

                <?php echo smarty_function_oxscript(array('add' => "$( '#variants' ).oxArticleVariant();"), $this);?>

                <?php $this->assign('blCanBuy', $this->_tpl_vars['aVariantSelections']['blPerfectFit']); ?>
                <div id="variants" class="selectorsBox js-fnSubmit clear">

                    <?php $this->assign('blHasActiveSelections', false); ?>
                    <?php $_from = $this->_tpl_vars['aVariantSelections']['selections']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['iKey'] => $this->_tpl_vars['oList']):
?>
                        <?php if ($this->_tpl_vars['oList']->getActiveSelection()): ?>
                            <?php $this->assign('blHasActiveSelections', true); ?>
                        <?php endif; ?>
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/product/selectbox.tpl", 'smarty_include_vars' => array('oSelectionList' => $this->_tpl_vars['oList'],'iKey' => $this->_tpl_vars['iKey'],'blInDetails' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    <?php endforeach; endif; unset($_from); ?>

                </div>

                <?php if ($this->_tpl_vars['blHasActiveSelections']): ?>
                    <div class="variantReset">
                                                <a href="" class="reset"><?php echo smarty_function_oxmultilang(array('ident' => 'DETAILS_VARIANTS_RESETSELECTION'), $this);?>
</a>

                                                <label><?php echo smarty_function_oxmultilang(array('ident' => 'DETAILS_VARIANTS_SELECTEDCOMBINATION'), $this);?>
</label>
                        <?php $this->assign('sSelectionSep', ""); ?>
                        <?php echo ''; ?><?php $_from = $this->_tpl_vars['aVariantSelections']['selections']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['variantselections'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['variantselections']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['oSelectionList']):
        $this->_foreach['variantselections']['iteration']++;
?><?php echo ''; ?><?php $this->assign('oActiveSelection', $this->_tpl_vars['oSelectionList']->getActiveSelection()); ?><?php echo ''; ?><?php if ($this->_tpl_vars['oActiveSelection']): ?><?php echo ''; ?><?php echo $this->_tpl_vars['sSelectionSep']; ?><?php echo ''; ?><?php echo $this->_tpl_vars['oActiveSelection']->getName(); ?><?php echo ''; ?><?php $this->assign('sSelectionSep', ", "); ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php endforeach; endif; unset($_from); ?><?php echo ''; ?>

                    </div>
                <?php else: ?>
                    <?php if (! $this->_tpl_vars['blCanBuy'] && ! $this->_tpl_vars['oDetailsProduct']->isParentNotBuyable()): ?>
                        <?php $this->assign('blCanBuy', true); ?>
                    <?php endif; ?>
                <?php endif; ?>
                    <?php if (! $this->_tpl_vars['blCanBuy']): ?>
                        <div class="variantMessage"><?php echo smarty_function_oxmultilang(array('ident' => 'DETAILS_CHOOSEVARIANT'), $this);?>
</div>
                    <?php endif; ?>

            <?php endif; ?>
        

                
            <?php if ($this->_tpl_vars['oViewConf']->showSelectLists()): ?>
                <?php $this->assign('oSelections', $this->_tpl_vars['oDetailsProduct']->getSelections()); ?>
                <?php if ($this->_tpl_vars['oSelections']): ?>
                    <div class="selectorsBox js-fnSubmit clear" id="productSelections">
                        <?php $_from = $this->_tpl_vars['oSelections']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['selections'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['selections']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['oList']):
        $this->_foreach['selections']['iteration']++;
?>
                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/product/selectbox.tpl", 'smarty_include_vars' => array('oSelectionList' => $this->_tpl_vars['oList'],'sFieldName' => 'sel','iKey' => ($this->_foreach['selections']['iteration']-1),'blHideDefault' => true,'sSelType' => 'seldrop')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                        <?php endforeach; endif; unset($_from); ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        

        <div class="tobasket">

                        
                <?php if ($this->_tpl_vars['oView']->isPersParam()): ?>
                    <div class="persparamBox clear">
                        <label for="persistentParam"><?php echo smarty_function_oxmultilang(array('ident' => 'PAGE_DETAILS_PERSPARAM_LABEL'), $this);?>
</label><input type="text" id="persistentParam" name="persparam[details]" value="<?php echo $this->_tpl_vars['oDetailsProduct']->aPersistParam['text']; ?>
" size="35">
                    </div>
                <?php endif; ?>
            

            
                <?php $this->_tag_stack[] = array('oxhasrights', array('ident' => 'SHOWARTICLEPRICE')); $_block_repeat=true;smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
                    <?php $this->assign('tprice', $this->_tpl_vars['oDetailsProduct']->getTPrice()); ?>
                    <?php $this->assign('price', $this->_tpl_vars['oDetailsProduct']->getPrice()); ?>
                    <?php if ($this->_tpl_vars['tprice'] && $this->_tpl_vars['tprice']->getBruttoPrice() > $this->_tpl_vars['price']->getBruttoPrice()): ?>
                        <p class="oldPrice">
                            <strong><?php echo smarty_function_oxmultilang(array('ident' => 'DETAILS_REDUCEDFROM'), $this);?>
 <del><?php echo $this->_tpl_vars['oDetailsProduct']->getFTPrice(); ?>
 <?php echo $this->_tpl_vars['currency']->sign; ?>
</del></strong>
                        </p>
                    <?php endif; ?>
                <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
            

            <div class="tobasketFunction clear">
                
                    <?php $this->_tag_stack[] = array('oxhasrights', array('ident' => 'SHOWARTICLEPRICE')); $_block_repeat=true;smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
                        <?php if ($this->_tpl_vars['oDetailsProduct']->getFPrice()): ?>
                            <label id="productPrice" class="price">

                                <?php $this->assign('fPrice', $this->_tpl_vars['oDetailsProduct']->getFPrice()); ?>
                                <?php if (! $this->_tpl_vars['blCanBuy']): ?>
                                    <?php $this->assign('oParentProduct', $this->_tpl_vars['oDetailsProduct']->getParentArticle()); ?>
                                    <?php if ($this->_tpl_vars['oParentProduct']): ?>
                                        <?php $this->assign('fPrice', $this->_tpl_vars['oParentProduct']->getFPrice()); ?>
                                    <?php endif; ?>
                                <?php endif; ?>

                                <strong >
                                    <span><?php echo $this->_tpl_vars['fPrice']; ?>
</span>
                                    <span><?php echo $this->_tpl_vars['currency']->sign; ?>
</span>
                                    <span>*</>
                                </strong>

                            </label>
                        <?php endif; ?>
                        <?php if ($this->_tpl_vars['oDetailsProduct']->loadAmountPriceInfo()): ?>
                            <?php echo smarty_function_oxscript(array('include' => "js/widgets/oxamountpriceselect.js",'priority' => 10), $this);?>

                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "page/details/inc/priceinfo.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                        <?php endif; ?>
                    <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
                

                
                    <?php $this->_tag_stack[] = array('oxhasrights', array('ident' => 'TOBASKET')); $_block_repeat=true;smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
                        <?php if (! $this->_tpl_vars['oDetailsProduct']->isNotBuyable()): ?>
                            <input id="amountToBasket" type="text" name="am" value="1" size="3" autocomplete="off" class="textbox">
                            <button id="toBasket" type="submit" <?php if (! $this->_tpl_vars['blCanBuy']): ?>disabled="disabled"<?php endif; ?> class="submitButton largeButton" title="<?php echo smarty_function_oxmultilang(array('ident' => 'DETAILS_ADDTOCART'), $this);?>
"><?php echo smarty_function_oxmultilang(array('ident' => 'DETAILS_ADDTOCART'), $this);?>
</button>
                        <?php endif; ?>
                    <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
                
            </div>

                        <div class="additionalInfo clear">
                
                    <?php if ($this->_tpl_vars['oDetailsProduct']->getPricePerUnit()): ?>
                        <span id="productPriceUnit"><?php echo $this->_tpl_vars['oDetailsProduct']->getPricePerUnit(); ?>
 <?php echo $this->_tpl_vars['currency']->sign; ?>
/<?php echo $this->_tpl_vars['oDetailsProduct']->getUnitName(); ?>
</span>
                    <?php endif; ?>
                

                
                    <?php if ($this->_tpl_vars['oDetailsProduct']->getStockStatus() == -1): ?>
                        <span class="stockFlag notOnStock">
                            <?php if ($this->_tpl_vars['oDetailsProduct']->oxarticles__oxnostocktext->value): ?>
                                <?php echo $this->_tpl_vars['oDetailsProduct']->oxarticles__oxnostocktext->value; ?>

                            <?php elseif ($this->_tpl_vars['oViewConf']->getStockOffDefaultMessage()): ?>
                                <?php echo smarty_function_oxmultilang(array('ident' => 'DETAILS_NOTONSTOCK'), $this);?>

                            <?php endif; ?>
                            <?php if ($this->_tpl_vars['oDetailsProduct']->getDeliveryDate()): ?>
                                <?php echo smarty_function_oxmultilang(array('ident' => 'DETAILS_AVAILABLEON'), $this);?>
 <?php echo $this->_tpl_vars['oDetailsProduct']->getDeliveryDate(); ?>

                            <?php endif; ?>
                        </span>
                    <?php elseif ($this->_tpl_vars['oDetailsProduct']->getStockStatus() == 1): ?>
                        <span class="stockFlag lowStock">
                            <?php echo smarty_function_oxmultilang(array('ident' => 'DETAILS_LOWSTOCK'), $this);?>

                        </span>
                    <?php elseif ($this->_tpl_vars['oDetailsProduct']->getStockStatus() == 0): ?>
                        <span class="stockFlag">
                            <?php if ($this->_tpl_vars['oDetailsProduct']->oxarticles__oxstocktext->value): ?>
                                <?php echo $this->_tpl_vars['oDetailsProduct']->oxarticles__oxstocktext->value; ?>

                            <?php elseif ($this->_tpl_vars['oViewConf']->getStockOnDefaultMessage()): ?>
                                <?php echo smarty_function_oxmultilang(array('ident' => 'DETAILS_READYFORSHIPPING'), $this);?>

                            <?php endif; ?>
                        </span>
                    <?php endif; ?>
                

                
                    <?php $this->_tag_stack[] = array('oxhasrights', array('ident' => 'TOBASKET')); $_block_repeat=true;smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
                        <?php if ($this->_tpl_vars['oDetailsProduct']->isBuyable()): ?>
                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "page/details/inc/deliverytime.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                        <?php endif; ?>
                    <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
                

                
                    <?php if ($this->_tpl_vars['oDetailsProduct']->oxarticles__oxweight->value): ?>
                        <span id="productWeight"><?php echo smarty_function_oxmultilang(array('ident' => 'DETAILS_ARTWEIGHT'), $this);?>
 <?php echo $this->_tpl_vars['oDetailsProduct']->oxarticles__oxweight->value; ?>
 <?php echo smarty_function_oxmultilang(array('ident' => 'DETAILS_ARTWEIGHTUNIT'), $this);?>
</span>
                    <?php endif; ?>
                

            </div>

            
                <div class="social">
                    <?php if (( $this->_tpl_vars['oView']->isActive('FbShare') || $this->_tpl_vars['oView']->isActive('FbLike') && $this->_tpl_vars['oViewConf']->getFbAppId() )): ?>
                        <?php if ($this->_tpl_vars['oView']->isActive('FacebookConfirm') && ! $this->_tpl_vars['oView']->isFbWidgetVisible()): ?>
                            <div class="socialButton" id="productFbShare">
                                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/facebook/enable.tpl", 'smarty_include_vars' => array('source' => "widget/facebook/share.tpl",'ident' => "#productFbShare")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                                <?php ob_start();
$_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/facebook/like.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
$this->assign('fbfile', ob_get_contents()); ob_end_clean();
 ?>
                                <?php $this->assign('fbfile', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fbfile'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url'))); ?>
                                <?php echo smarty_function_oxscript(array('add' => "oxFacebook.buttons['#productFbLike']={html:'".($this->_tpl_vars['fbfile'])."',script:''};"), $this);?>

                            </div>
                            <div class="socialButton" id="productFbLike"></div>
                        <?php else: ?>
                            <div class="socialButton" id="productFbShare">
                                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/facebook/enable.tpl", 'smarty_include_vars' => array('source' => "widget/facebook/share.tpl",'ident' => "#productFbShare")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                            </div>
                            <div class="socialButton" id="productFbLike">
                                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/facebook/enable.tpl", 'smarty_include_vars' => array('source' => "widget/facebook/like.tpl",'ident' => "#productFbLike")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            
        </div>
    </div>
</div>

<?php $this->_tag_stack[] = array('oxhasrights', array('ident' => 'TOBASKET')); $_block_repeat=true;smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
    </form>

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "page/details/inc/morepics.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "page/details/inc/zoompopup.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>