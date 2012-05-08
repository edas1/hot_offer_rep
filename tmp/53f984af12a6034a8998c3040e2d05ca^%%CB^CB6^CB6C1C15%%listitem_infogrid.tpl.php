<?php /* Smarty version 2.6.26, created on 2012-05-08 08:06:21
         compiled from widget/product/listitem_infogrid.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'oxhasrights', 'widget/product/listitem_infogrid.tpl', 21, false),array('function', 'oxmultilang', 'widget/product/listitem_infogrid.tpl', 45, false),array('function', 'oxid_include_dynamic', 'widget/product/listitem_infogrid.tpl', 84, false),)), $this); ?>

    <?php $this->assign('currency', $this->_tpl_vars['oView']->getActCurrency()); ?>
    <?php if ($this->_tpl_vars['showMainLink']): ?>
        <?php $this->assign('_productLink', $this->_tpl_vars['product']->getMainLink()); ?>
    <?php else: ?>
        <?php $this->assign('_productLink', $this->_tpl_vars['product']->getLink()); ?>
    <?php endif; ?>
    <?php $this->assign('aVariantSelections', $this->_tpl_vars['product']->getVariantSelections(null,null,1)); ?>
    <?php $this->assign('blShowToBasket', true); ?>     <?php if ($this->_tpl_vars['blDisableToCart'] || $this->_tpl_vars['product']->isNotBuyable() || ( $this->_tpl_vars['aVariantSelections'] && $this->_tpl_vars['aVariantSelections']['selections'] ) || $this->_tpl_vars['product']->hasMdVariants() || ( $this->_tpl_vars['oViewConf']->showSelectListsInList() && $this->_tpl_vars['product']->getSelections(1) ) || $this->_tpl_vars['product']->getVariants()): ?>
        <?php $this->assign('blShowToBasket', false); ?>
    <?php endif; ?>

    <form name="tobasket<?php echo $this->_tpl_vars['testid']; ?>
" <?php if ($this->_tpl_vars['blShowToBasket']): ?>action="<?php echo $this->_tpl_vars['oViewConf']->getSelfActionLink(); ?>
" method="post"<?php else: ?>action="<?php echo $this->_tpl_vars['_productLink']; ?>
" method="get"<?php endif; ?>>
        <?php echo $this->_tpl_vars['oViewConf']->getNavFormParams(); ?>

        <?php echo $this->_tpl_vars['oViewConf']->getHiddenSid(); ?>

        <input type="hidden" name="pgNr" value="<?php echo $this->_tpl_vars['oView']->getActPage(); ?>
">
        <?php if ($this->_tpl_vars['recommid']): ?>
            <input type="hidden" name="recommid" value="<?php echo $this->_tpl_vars['recommid']; ?>
">
        <?php endif; ?>
        <?php $this->_tag_stack[] = array('oxhasrights', array('ident' => 'TOBASKET')); $_block_repeat=true;smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
            <?php if ($this->_tpl_vars['blShowToBasket']): ?>
                <input type="hidden" name="cl" value="<?php echo $this->_tpl_vars['oViewConf']->getActiveClassName(); ?>
">
                <?php if ($this->_tpl_vars['owishid']): ?>
                    <input type="hidden" name="owishid" value="<?php echo $this->_tpl_vars['owishid']; ?>
">
                <?php endif; ?>
                <?php if ($this->_tpl_vars['toBasketFunction']): ?>
                    <input type="hidden" name="fnc" value="<?php echo $this->_tpl_vars['toBasketFunction']; ?>
">
                <?php else: ?>
                  <input type="hidden" name="fnc" value="tobasket">
                <?php endif; ?>
                <input type="hidden" name="aid" value="<?php echo $this->_tpl_vars['product']->oxarticles__oxid->value; ?>
">
                <?php if ($this->_tpl_vars['altproduct']): ?>
                    <input type="hidden" name="anid" value="<?php echo $this->_tpl_vars['altproduct']; ?>
">
                <?php else: ?>
                    <input type="hidden" name="anid" value="<?php echo $this->_tpl_vars['product']->oxarticles__oxnid->value; ?>
">
                <?php endif; ?>
                <input type="hidden" name="am" value="1">
            <?php endif; ?>
        <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

    
        <div class="pictureBox gridPicture">
            <a class="sliderHover" href="<?php echo $this->_tpl_vars['_productLink']; ?>
" title="<?php echo $this->_tpl_vars['product']->oxarticles__oxtitle->value; ?>
 <?php echo $this->_tpl_vars['product']->oxarticles__oxvarselect->value; ?>
"></a>
            <a href="<?php echo $this->_tpl_vars['_productLink']; ?>
" class="viewAllHover glowShadow corners" title="<?php echo $this->_tpl_vars['product']->oxarticles__oxtitle->value; ?>
 <?php echo $this->_tpl_vars['product']->oxarticles__oxvarselect->value; ?>
"><span><?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_PRODUCT_PRODUCT_DETAILS'), $this);?>
</span></a>
            <?php if ($this->_tpl_vars['product']->oxarticles__nfq_hotoffer->value == 1): ?><div class="nfq_hotoffer"></div><?php endif; ?>
            <img src="<?php echo $this->_tpl_vars['product']->getThumbnailUrl(); ?>
" alt="<?php echo $this->_tpl_vars['product']->oxarticles__oxtitle->value; ?>
 <?php echo $this->_tpl_vars['product']->oxarticles__oxvarselect->value; ?>
">
        </div>
    

    <div class="listDetails">
        
            <div class="titleBox">
                <a id="<?php echo $this->_tpl_vars['testid']; ?>
" href="<?php echo $this->_tpl_vars['_productLink']; ?>
" class="title" title="<?php echo $this->_tpl_vars['product']->oxarticles__oxtitle->value; ?>
 <?php echo $this->_tpl_vars['product']->oxarticles__oxvarselect->value; ?>
">
                    <span><?php echo $this->_tpl_vars['product']->oxarticles__oxtitle->value; ?>
 <?php echo $this->_tpl_vars['product']->oxarticles__oxvarselect->value; ?>
</span>
                </a>
            </div>
        

        
                <div class="selectorsBox">
                    <?php if ($this->_tpl_vars['aVariantSelections'] && $this->_tpl_vars['aVariantSelections']['selections']): ?>
                        <div id="variantselector_<?php echo $this->_tpl_vars['testid']; ?>
" class="selectorsBox js-fnSubmit clear">
                            <?php $_from = $this->_tpl_vars['aVariantSelections']['selections']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['iKey'] => $this->_tpl_vars['oSelectionList']):
?>
                                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/product/selectbox.tpl", 'smarty_include_vars' => array('oSelectionList' => $this->_tpl_vars['oSelectionList'],'sJsAction' => "js-fnSubmit")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                            <?php endforeach; endif; unset($_from); ?>
                        </div>
                    <?php elseif ($this->_tpl_vars['oViewConf']->showSelectListsInList()): ?>
                        <?php $this->assign('oSelections', $this->_tpl_vars['product']->getSelections(1)); ?>
                        <?php if ($this->_tpl_vars['oSelections']): ?>
                            <div id="selectlistsselector_<?php echo $this->_tpl_vars['testid']; ?>
" class="selectorsBox js-fnSubmit clear">
                                <?php $_from = $this->_tpl_vars['oSelections']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['selections'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['selections']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['oList']):
        $this->_foreach['selections']['iteration']++;
?>
                                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/product/selectbox.tpl", 'smarty_include_vars' => array('oSelectionList' => $this->_tpl_vars['oList'],'sFieldName' => 'sel','iKey' => ($this->_foreach['selections']['iteration']-1),'blHideDefault' => true,'sSelType' => 'seldrop','sJsAction' => "js-fnSubmit")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                                <?php endforeach; endif; unset($_from); ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
        

           <div class="priceBox">
                <div class="content">
                    <?php if ($this->_tpl_vars['oViewConf']->getShowCompareList()): ?>
                        <?php echo smarty_function_oxid_include_dynamic(array('file' => "widget/product/compare_links.tpl",'testid' => "_".($this->_tpl_vars['testid']),'type' => 'compare','aid' => $this->_tpl_vars['product']->oxarticles__oxid->value,'anid' => $this->_tpl_vars['altproduct'],'in_list' => $this->_tpl_vars['product']->isOnComparisonList(),'page' => $this->_tpl_vars['oView']->getActPage()), $this);?>

                    <?php endif; ?>
                    
                        <?php $this->_tag_stack[] = array('oxhasrights', array('ident' => 'SHOWARTICLEPRICE')); $_block_repeat=true;smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
                            <?php $this->assign('tprice', $this->_tpl_vars['product']->getTPrice()); ?>
                            <?php $this->assign('price', $this->_tpl_vars['product']->getPrice()); ?>
                            <?php if ($this->_tpl_vars['tprice'] && $this->_tpl_vars['tprice']->getBruttoPrice() > $this->_tpl_vars['price']->getBruttoPrice()): ?>
                                <span class="oldPrice"><?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_PRODUCT_PRODUCT_REDUCEDFROM'), $this);?>
 <del><?php echo $this->_tpl_vars['product']->getFTPrice(); ?>
 <?php echo $this->_tpl_vars['currency']->sign; ?>
</del></span>
                            <?php endif; ?>
                            
                                <?php if ($this->_tpl_vars['product']->getFPrice()): ?>
                                    <span class="price"><span><?php echo $this->_tpl_vars['product']->getFPrice(); ?>
</span> <?php echo $this->_tpl_vars['currency']->sign; ?>
 <?php if (! ( $this->_tpl_vars['product']->hasMdVariants() || ( $this->_tpl_vars['oViewConf']->showSelectListsInList() && $this->_tpl_vars['product']->getSelections(1) ) || $this->_tpl_vars['product']->getVariantList() )): ?>*<?php endif; ?></span>
                                <?php endif; ?>
                            
                            <?php if ($this->_tpl_vars['product']->getPricePerUnit()): ?>
                                <span id="productPricePerUnit_<?php echo $this->_tpl_vars['testid']; ?>
" class="pricePerUnit">
                                    <?php echo $this->_tpl_vars['product']->oxarticles__oxunitquantity->value; ?>
 <?php echo $this->_tpl_vars['product']->getUnitName(); ?>
 | <?php echo $this->_tpl_vars['product']->getPricePerUnit(); ?>
 <?php echo $this->_tpl_vars['currency']->sign; ?>
/<?php echo $this->_tpl_vars['product']->getUnitName(); ?>

                                </span>
                            <?php elseif ($this->_tpl_vars['product']->oxarticles__oxweight->value): ?>
                                <span id="productPricePerUnit_<?php echo $this->_tpl_vars['testid']; ?>
" class="pricePerUnit">
                                    <span title="weight"><?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_PRODUCT_PRODUCT_ARTWEIGHT'), $this);?>
</span>
                                    <span class="value"><?php echo $this->_tpl_vars['product']->oxarticles__oxweight->value; ?>
 <?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_PRODUCT_PRODUCT_ARTWEIGHT2'), $this);?>
</span>
                                </span>
                            <?php endif; ?>
                        <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
                    
                </div>
            </div>
            
                <div class="buttonBox">
                    <?php if ($this->_tpl_vars['blShowToBasket']): ?>
                        <?php $this->_tag_stack[] = array('oxhasrights', array('ident' => 'TOBASKET')); $_block_repeat=true;smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
                            <button type="submit" class="submitButton largeButton"><?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_PRODUCT_PRODUCT_ADDTOCART'), $this);?>
</button>
                        <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
                    <?php else: ?>
                        <a class="submitButton largeButton" href="<?php echo $this->_tpl_vars['_productLink']; ?>
" ><?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_PRODUCT_PRODUCT_MOREINFO'), $this);?>
</a>
                    <?php endif; ?>
                </div>
            
        </div>
    </form>
