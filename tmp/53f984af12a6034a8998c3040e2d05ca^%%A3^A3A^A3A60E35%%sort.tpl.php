<?php /* Smarty version 2.6.26, created on 2012-05-07 12:35:40
         compiled from widget/locator/sort.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxscript', 'widget/locator/sort.tpl', 7, false),array('function', 'oxmultilang', 'widget/locator/sort.tpl', 11, false),array('modifier', 'upper', 'widget/locator/sort.tpl', 14, false),array('modifier', 'oxaddparams', 'widget/locator/sort.tpl', 23, false),)), $this); ?>
<?php if ($this->_tpl_vars['oView']->showSorting()): ?>
    <?php $this->assign('_listType', $this->_tpl_vars['oView']->getListDisplayType()); ?>
    <?php $this->assign('_additionalParams', $this->_tpl_vars['oView']->getAdditionalParams()); ?>
    <?php $this->assign('_artPerPage', $this->_tpl_vars['oViewConf']->getArtPerPageCount()); ?>
    <?php $this->assign('_sortColumnVarName', $this->_tpl_vars['oView']->getSortOrderByParameterName()); ?>
    <?php $this->assign('_sortDirectionVarName', $this->_tpl_vars['oView']->getSortOrderParameterName()); ?>
    <?php echo smarty_function_oxscript(array('include' => "js/widgets/oxdropdown.js",'priority' => 10), $this);?>

    <?php echo smarty_function_oxscript(array('add' => "$('div.dropDown p').oxDropDown();"), $this);?>

    <div class="dropDown js-fnLink" id="sortItems">
        <p>
            <label><?php echo smarty_function_oxmultilang(array('ident' => 'SORT_BY'), $this);?>
</label>
            <span class="<?php echo $this->_tpl_vars['oView']->getListOrderDirection(); ?>
">
                <?php if ($this->_tpl_vars['oView']->getListOrderBy()): ?>
                    <?php echo smarty_function_oxmultilang(array('ident' => ((is_array($_tmp=$this->_tpl_vars['oView']->getListOrderBy())) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp))), $this);?>

                <?php else: ?>
                    <?php echo smarty_function_oxmultilang(array('ident' => 'CHOOSE'), $this);?>

                <?php endif; ?>
            </span>
        </p>
        <ul class="drop FXgradGreyLight shadow">
            <?php $_from = $this->_tpl_vars['oView']->getSortColumns(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sColumnName']):
?>
                <li class="desc">
                    <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['oView']->getLink())) ? $this->_run_mod_handler('oxaddparams', true, $_tmp, "ldtype=".($this->_tpl_vars['_listType'])."&amp;_artperpage=".($this->_tpl_vars['_artPerPage'])."&amp;".($this->_tpl_vars['_sortColumnVarName'])."=".($this->_tpl_vars['sColumnName'])."&amp;".($this->_tpl_vars['_sortDirectionVarName'])."=desc&amp;pgNr=0&amp;".($this->_tpl_vars['_additionalParams'])) : smarty_modifier_oxaddparams($_tmp, "ldtype=".($this->_tpl_vars['_listType'])."&amp;_artperpage=".($this->_tpl_vars['_artPerPage'])."&amp;".($this->_tpl_vars['_sortColumnVarName'])."=".($this->_tpl_vars['sColumnName'])."&amp;".($this->_tpl_vars['_sortDirectionVarName'])."=desc&amp;pgNr=0&amp;".($this->_tpl_vars['_additionalParams']))); ?>
" <?php if ($this->_tpl_vars['oView']->getListOrderDirection() == 'desc' && $this->_tpl_vars['sColumnName'] == $this->_tpl_vars['oView']->getListOrderBy()): ?> class="selected"<?php endif; ?>><span><?php echo smarty_function_oxmultilang(array('ident' => ((is_array($_tmp=$this->_tpl_vars['sColumnName'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp))), $this);?>
</span></a>
                </li>
                <li class="asc">
                    <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['oView']->getLink())) ? $this->_run_mod_handler('oxaddparams', true, $_tmp, "ldtype=".($this->_tpl_vars['_listType'])."&amp;_artperpage=".($this->_tpl_vars['_artPerPage'])."&amp;".($this->_tpl_vars['_sortColumnVarName'])."=".($this->_tpl_vars['sColumnName'])."&amp;".($this->_tpl_vars['_sortDirectionVarName'])."=asc&amp;pgNr=0&amp;".($this->_tpl_vars['_additionalParams'])) : smarty_modifier_oxaddparams($_tmp, "ldtype=".($this->_tpl_vars['_listType'])."&amp;_artperpage=".($this->_tpl_vars['_artPerPage'])."&amp;".($this->_tpl_vars['_sortColumnVarName'])."=".($this->_tpl_vars['sColumnName'])."&amp;".($this->_tpl_vars['_sortDirectionVarName'])."=asc&amp;pgNr=0&amp;".($this->_tpl_vars['_additionalParams']))); ?>
" <?php if ($this->_tpl_vars['oView']->getListOrderDirection() == 'asc' && $this->_tpl_vars['sColumnName'] == $this->_tpl_vars['oView']->getListOrderBy()): ?> class="selected"<?php endif; ?>><span><?php echo smarty_function_oxmultilang(array('ident' => ((is_array($_tmp=$this->_tpl_vars['sColumnName'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp))), $this);?>
</span></a>
                </li>
            <?php endforeach; endif; unset($_from); ?>
        </ul>
    </div>
<?php endif; ?>