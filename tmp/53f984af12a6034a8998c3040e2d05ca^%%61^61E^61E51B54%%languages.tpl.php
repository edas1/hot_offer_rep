<?php /* Smarty version 2.6.26, created on 2012-05-08 08:06:22
         compiled from widget/header/languages.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxscript', 'widget/header/languages.tpl', 1, false),array('modifier', 'cat', 'widget/header/languages.tpl', 7, false),array('modifier', 'oxaddparams', 'widget/header/languages.tpl', 10, false),)), $this); ?>
<?php echo smarty_function_oxscript(array('include' => "js/widgets/oxflyoutbox.js",'priority' => 10), $this);?>

<?php echo smarty_function_oxscript(array('add' => "$( '#languageTrigger' ).oxFlyOutBox();"), $this);?>

<?php if ($this->_tpl_vars['oView']->isLanguageLoaded()): ?>
<div class="topPopList">
    <?php ob_start(); ?>
        <?php $_from = $this->_tpl_vars['oxcmp_lang']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['_lng']):
?>
        <?php $this->assign('sLangImg', ((is_array($_tmp=((is_array($_tmp="lang/")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['_lng']->abbr) : smarty_modifier_cat($_tmp, $this->_tpl_vars['_lng']->abbr)))) ? $this->_run_mod_handler('cat', true, $_tmp, ".png") : smarty_modifier_cat($_tmp, ".png"))); ?>
        <?php if ($this->_tpl_vars['_lng']->selected): ?>
            <?php ob_start(); ?>
                <a class="flag <?php echo $this->_tpl_vars['_lng']->abbr; ?>
" title="<?php echo $this->_tpl_vars['_lng']->name; ?>
" href="<?php echo ((is_array($_tmp=$this->_tpl_vars['_lng']->link)) ? $this->_run_mod_handler('oxaddparams', true, $_tmp, $this->_tpl_vars['oView']->getDynUrlParams()) : smarty_modifier_oxaddparams($_tmp, $this->_tpl_vars['oView']->getDynUrlParams())); ?>
" hreflang="<?php echo $this->_tpl_vars['_lng']->abbr; ?>
"><span style="background-image:url('<?php echo $this->_tpl_vars['oViewConf']->getImageUrl($this->_tpl_vars['sLangImg']); ?>
')" ><?php echo $this->_tpl_vars['_lng']->name; ?>
</span></a>
            <?php $this->_smarty_vars['capture']['languageSelected'] = ob_get_contents(); ob_end_clean(); ?>
        <?php endif; ?>
            <li><a class="flag <?php echo $this->_tpl_vars['_lng']->abbr; ?>
 <?php if ($this->_tpl_vars['_lng']->selected): ?>selected<?php endif; ?>" title="<?php echo $this->_tpl_vars['_lng']->name; ?>
" href="<?php echo ((is_array($_tmp=$this->_tpl_vars['_lng']->link)) ? $this->_run_mod_handler('oxaddparams', true, $_tmp, $this->_tpl_vars['oView']->getDynUrlParams()) : smarty_modifier_oxaddparams($_tmp, $this->_tpl_vars['oView']->getDynUrlParams())); ?>
" hreflang="<?php echo $this->_tpl_vars['_lng']->abbr; ?>
"><span style="background-image:url('<?php echo $this->_tpl_vars['oViewConf']->getImageUrl($this->_tpl_vars['sLangImg']); ?>
')"><?php echo $this->_tpl_vars['_lng']->name; ?>
</span></a></li>
        <?php endforeach; endif; unset($_from); ?>
    <?php $this->_smarty_vars['capture']['languageList'] = ob_get_contents(); ob_end_clean(); ?>
    <p id="languageTrigger" class="selectedValue">
        <?php echo $this->_smarty_vars['capture']['languageSelected']; ?>

    </p>
    <div class="flyoutBox">
    <ul id="languages" class="corners">
        <li class="active"><?php echo $this->_smarty_vars['capture']['languageSelected']; ?>
</li>
        <?php echo $this->_smarty_vars['capture']['languageList']; ?>

    </ul>
    </div>
</div>
<?php endif; ?>