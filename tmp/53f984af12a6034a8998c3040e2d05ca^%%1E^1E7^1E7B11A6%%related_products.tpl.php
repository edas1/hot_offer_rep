<?php /* Smarty version 2.6.26, created on 2012-05-08 08:08:47
         compiled from page/details/inc/related_products.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'page/details/inc/related_products.tpl', 2, false),)), $this); ?>

    <?php if (((is_array($_tmp=$this->_tpl_vars['oView']->getCrossSelling())) ? $this->_run_mod_handler('count', true, $_tmp) : count($_tmp))): ?>
        <?php ob_start(); ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/product/boxproducts.tpl", 'smarty_include_vars' => array('_boxId' => 'cross','_oBoxProducts' => $this->_tpl_vars['oView']->getCrossSelling(),'_sHeaderIdent' => 'WIDGET_PRODUCT_RELATED_PRODUCTS_CROSSSELING_HEADER','_sHeaderCssClass' => 'lightHead')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->append('oxidBlock_productbar', ob_get_contents());ob_end_clean(); ?>
    <?php endif; ?>



    <?php if (((is_array($_tmp=$this->_tpl_vars['oView']->getSimilarProducts())) ? $this->_run_mod_handler('count', true, $_tmp) : count($_tmp))): ?>
        <?php ob_start(); ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/product/boxproducts.tpl", 'smarty_include_vars' => array('_boxId' => 'similar','_oBoxProducts' => $this->_tpl_vars['oView']->getSimilarProducts(),'_sHeaderIdent' => 'WIDGET_PRODUCT_RELATED_PRODUCTS_SIMILAR_HEADER','_sHeaderCssClass' => 'lightHead')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->append('oxidBlock_productbar', ob_get_contents());ob_end_clean(); ?>
    <?php endif; ?>



    <?php if (((is_array($_tmp=$this->_tpl_vars['oView']->getAccessoires())) ? $this->_run_mod_handler('count', true, $_tmp) : count($_tmp))): ?>
        <?php ob_start(); ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/product/boxproducts.tpl", 'smarty_include_vars' => array('_boxId' => 'accessories','_oBoxProducts' => $this->_tpl_vars['oView']->getAccessoires(),'_sHeaderIdent' => 'WIDGET_PRODUCT_RELATED_PRODUCTS_ACCESSORIES_HEADER','_sHeaderCssClass' => 'lightHead')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->append('oxidBlock_productbar', ob_get_contents());ob_end_clean(); ?>
    <?php endif; ?>


<?php if ($this->_tpl_vars['oxidBlock_productbar']): ?>
    <div id="relProducts" class="relatedProducts">
      <?php $_from = $this->_tpl_vars['oxidBlock_productbar']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['_block']):
?>
        <?php echo $this->_tpl_vars['_block']; ?>

      <?php endforeach; endif; unset($_from); ?>
    </div>
<?php endif; ?>