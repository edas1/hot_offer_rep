<?php /* Smarty version 2.6.26, created on 2012-05-08 08:08:45
         compiled from page/details/details.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'page/details/details.tpl', 5, false),array('modifier', 'oxmultilangassign', 'page/details/details.tpl', 8, false),array('modifier', 'truncate', 'page/details/details.tpl', 40, false),array('function', 'oxmultilang', 'page/details/details.tpl', 38, false),array('insert', 'oxid_tracker', 'page/details/details.tpl', 56, false),)), $this); ?>
<?php ob_start(); ?>
  <?php $this->assign('oDetailsProduct', $this->_tpl_vars['oView']->getProduct()); ?>
  <?php $this->assign('oPictureProduct', $this->_tpl_vars['oView']->getPicturesProduct()); ?>
  <?php $this->assign('currency', $this->_tpl_vars['oView']->getActCurrency()); ?>
  <?php $this->assign('sPageHeadTitle', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oDetailsProduct']->oxarticles__oxtitle->value)) ? $this->_run_mod_handler('cat', true, $_tmp, ' ') : smarty_modifier_cat($_tmp, ' ')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['oDetailsProduct']->oxarticles__oxvarselect->value) : smarty_modifier_cat($_tmp, $this->_tpl_vars['oDetailsProduct']->oxarticles__oxvarselect->value))); ?>

    <?php if ($this->_tpl_vars['oView']->getPriceAlarmStatus() == 1): ?>
        <?php $this->assign('_statusMessage1', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='PAGE_DETAILS_THANKYOUMESSAGE1')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp) : smarty_modifier_oxmultilangassign($_tmp)))) ? $this->_run_mod_handler('cat', true, $_tmp, ' ') : smarty_modifier_cat($_tmp, ' ')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['oxcmp_shop']->oxshops__oxname->value) : smarty_modifier_cat($_tmp, $this->_tpl_vars['oxcmp_shop']->oxshops__oxname->value))); ?>
        <?php $this->assign('_statusMessage2', ((is_array($_tmp=((is_array($_tmp='PAGE_DETAILS_THANKYOUMESSAGE2')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp) : smarty_modifier_oxmultilangassign($_tmp)))) ? $this->_run_mod_handler('cat', true, $_tmp, ' ') : smarty_modifier_cat($_tmp, ' '))); ?>
        <?php $this->assign('_statusMessage3', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='PAGE_DETAILS_THANKYOUMESSAGE3')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp) : smarty_modifier_oxmultilangassign($_tmp)))) ? $this->_run_mod_handler('cat', true, $_tmp, ' ') : smarty_modifier_cat($_tmp, ' ')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['oView']->getBidPrice()) : smarty_modifier_cat($_tmp, $this->_tpl_vars['oView']->getBidPrice())))) ? $this->_run_mod_handler('cat', true, $_tmp, ' ') : smarty_modifier_cat($_tmp, ' ')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['currency']->sign) : smarty_modifier_cat($_tmp, $this->_tpl_vars['currency']->sign)))) ? $this->_run_mod_handler('cat', true, $_tmp, ' ') : smarty_modifier_cat($_tmp, ' '))); ?>
        <?php $this->assign('_statusMessage4', ((is_array($_tmp='PAGE_DETAILS_THANKYOUMESSAGE4')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp) : smarty_modifier_oxmultilangassign($_tmp))); ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "message/success.tpl", 'smarty_include_vars' => array('statusMessage' => ($this->_tpl_vars['_statusMessage1']).($this->_tpl_vars['_statusMessage2']).($this->_tpl_vars['_statusMessage3']).($this->_tpl_vars['_statusMessage4']))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php elseif ($this->_tpl_vars['oView']->getPriceAlarmStatus() == 2): ?>
        <?php $this->assign('_statusMessage', ((is_array($_tmp='PAGE_DETAILS_WRONGVERIFICATIONCODE')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp) : smarty_modifier_oxmultilangassign($_tmp))); ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "message/error.tpl", 'smarty_include_vars' => array('statusMessage' => $this->_tpl_vars['_statusMessage'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php elseif ($this->_tpl_vars['oView']->getPriceAlarmStatus() === 0): ?>
        <?php $this->assign('_statusMessage1', ((is_array($_tmp=((is_array($_tmp='PAGE_DETAILS_NOTABLETOSENDEMAIL')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp) : smarty_modifier_oxmultilangassign($_tmp)))) ? $this->_run_mod_handler('cat', true, $_tmp, "<br> ") : smarty_modifier_cat($_tmp, "<br> "))); ?>
        <?php $this->assign('_statusMessage2', ((is_array($_tmp='PAGE_DETAILS_VERIFYYOUREMAIL')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp) : smarty_modifier_oxmultilangassign($_tmp))); ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "message/error.tpl", 'smarty_include_vars' => array('statusMessage' => ($this->_tpl_vars['_statusMessage1']).($this->_tpl_vars['_statusMessage2']))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>

    <div id="details">
        <?php if ($this->_tpl_vars['oView']->getSearchTitle()): ?>
          <?php $this->assign('detailsLocation', $this->_tpl_vars['oView']->getSearchTitle()); ?>
        <?php else: ?>
          <?php $_from = $this->_tpl_vars['oView']->getCatTreePath(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['detailslocation'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['detailslocation']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['oCatPath']):
        $this->_foreach['detailslocation']['iteration']++;
?>
          <?php if (($this->_foreach['detailslocation']['iteration'] == $this->_foreach['detailslocation']['total'])): ?>

            <?php $this->assign('detailsLocation', $this->_tpl_vars['oCatPath']->oxcategories__oxtitle->value); ?>
            <?php endif; ?>
          <?php endforeach; endif; unset($_from); ?>
        <?php endif; ?>


                <?php $this->assign('actCategory', $this->_tpl_vars['oView']->getActiveCategory()); ?>
        <div id="overviewLink">
            <a href="<?php echo $this->_tpl_vars['actCategory']->toListLink; ?>
" class="overviewLink"><?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_BREADCRUMB_OVERVIEW'), $this);?>
</a>
        </div>
        <h2 class="pageHead"><?php echo ((is_array($_tmp=$this->_tpl_vars['sPageHeadTitle'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 80) : smarty_modifier_truncate($_tmp, 80)); ?>
</h2>
        <div class="detailsParams listRefine bottomRound">
            <div class="pager refineParams clear" id="detailsItemsPager">
                <?php if ($this->_tpl_vars['actCategory']->prevProductLink): ?><a id="linkPrevArticle" class="prev" href="<?php echo $this->_tpl_vars['actCategory']->prevProductLink; ?>
"><?php echo smarty_function_oxmultilang(array('ident' => 'DETAILS_LOCATOR_PREVIOUSPRODUCT'), $this);?>
</a><?php endif; ?>
                <span class="page">
                   <?php echo smarty_function_oxmultilang(array('ident' => 'DETAILS_LOCATOR_PRODUCT'), $this);?>
 <?php echo $this->_tpl_vars['actCategory']->iProductPos; ?>
 <?php echo smarty_function_oxmultilang(array('ident' => 'DETAILS_LOCATOR_FROM'), $this);?>
 <?php echo $this->_tpl_vars['actCategory']->iCntOfProd; ?>

                </span>
                <?php if ($this->_tpl_vars['actCategory']->nextProductLink): ?><a id="linkNextArticle" href="<?php echo $this->_tpl_vars['actCategory']->nextProductLink; ?>
" class="next"><?php echo smarty_function_oxmultilang(array('ident' => 'DETAILS_LOCATOR_NEXTPRODUCT'), $this);?>
</a><?php endif; ?>
            </div>
        </div>

                <div id="productinfo">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "page/details/inc/fullproductinfo.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>
    </div>
    <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'oxid_tracker', 'title' => ((is_array($_tmp='DETAILS_PRODUCTDETAILS')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp) : smarty_modifier_oxmultilangassign($_tmp)), 'product' => $this->_tpl_vars['oDetailsProduct'], 'cpath' => $this->_tpl_vars['oView']->getCatTreePath())), $this); ?>

<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->append('oxidBlock_content', ob_get_contents());ob_end_clean(); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "layout/page.tpl", 'smarty_include_vars' => array('sidebar' => 'Left')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>