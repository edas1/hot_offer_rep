<?php /* Smarty version 2.6.26, created on 2012-05-07 11:38:16
         compiled from tools_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'oxmultilangassign', 'tools_list.tpl', 1, false),array('modifier', 'oxwordwrap', 'tools_list.tpl', 46, false),array('modifier', 'oxaddslashes', 'tools_list.tpl', 70, false),array('function', 'oxmultilang', 'tools_list.tpl', 26, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "headitem.tpl", 'smarty_include_vars' => array('title' => ((is_array($_tmp='TOOLS_LIST_TITLE')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp) : smarty_modifier_oxmultilangassign($_tmp)),'box' => 'list')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script type="text/javascript">
<!--
window.onload = function ()
{
    top.reloadEditFrame();
    <?php if ($this->_tpl_vars['updatelist'] == 1): ?>
        top.oxid.admin.updateList('<?php echo $this->_tpl_vars['oxid']; ?>
');
    <?php endif; ?>
}
//-->
</script>
<form name="search" id="search" action="<?php echo $this->_tpl_vars['oViewConf']->getSelfLink(); ?>
" method="post">
    <?php echo $this->_tpl_vars['oViewConf']->getHiddenSid(); ?>

    <input type="hidden" name="actedit" value="<?php echo $this->_tpl_vars['actedit']; ?>
">
    <input type="hidden" name="cl" value="tools_list">
    <input type="hidden" name="oxid" value="x">
</form>

<div id="liste">

    <table cellspacing="0" cellpadding="0" border="0">
    <?php if ($this->_tpl_vars['blViewSuccess']): ?>
    <tr>
    <td class="editnavigation"><?php echo smarty_function_oxmultilang(array('ident' => 'TOOLS_LIST_UPDATEVIEWSSECCESS'), $this);?>
</td>
    </tr>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['blMailSuccess']): ?>
    <tr>
    <td class="editnavigation"><?php echo smarty_function_oxmultilang(array('ident' => 'TOOLS_LIST_SECCESS'), $this);?>
</td>
    </tr>
    <?php endif; ?>
    <tr>
    <td class="editnavigation"><?php if ($this->_tpl_vars['blFin']): ?><?php echo smarty_function_oxmultilang(array('ident' => 'TOOLS_LIST_ACTIONEND'), $this);?>
<?php endif; ?></td>
    </tr>
    </table>
    <br>
    <table cellspacing="0" cellpadding="0" border="0" width="100%" class="editnavigation">
    <?php $_from = $this->_tpl_vars['aQueries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['query']):
?>
        <?php $this->assign('sQuery', $this->_tpl_vars['aQueries'][$this->_tpl_vars['key']]); ?>
        <?php $this->assign('sAffectedRows', $this->_tpl_vars['aAffectedRows'][$this->_tpl_vars['key']]); ?>
        <?php $this->assign('sErrorMsg', $this->_tpl_vars['aErrorMessages'][$this->_tpl_vars['key']]); ?>
        <?php $this->assign('iErrorNum', $this->_tpl_vars['aErrorNumbers'][$this->_tpl_vars['key']]); ?>
        <?php if ($this->_tpl_vars['sQuery']): ?>
        <tr valign="top"><td><?php echo smarty_function_oxmultilang(array('ident' => 'TOOLS_LIST_SQLQUERY'), $this);?>
 (<?php echo $this->_tpl_vars['key']+1; ?>
) : </td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['sQuery'])) ? $this->_run_mod_handler('oxwordwrap', true, $_tmp, 100, "<br>", true) : smarty_modifier_oxwordwrap($_tmp, 100, "<br>", true)); ?>
</td></tr>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['sAffectedRows']): ?>
        <tr><td colspan="2"><br></td></tr>
        <tr valign="top"><td><?php echo smarty_function_oxmultilang(array('ident' => 'TOOLS_LIST_AFFECTEDROWS'), $this);?>
 : </td><td><?php echo $this->_tpl_vars['sAffectedRows']; ?>
</td></tr>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['sErrorMsg']): ?>
        <tr><td colspan="2"><br></td></tr>
        <tr valign="top"><td><?php echo smarty_function_oxmultilang(array('ident' => 'TOOLS_LIST_ERRORMESSAGE'), $this);?>
 : </td><td><?php echo $this->_tpl_vars['sErrorMsg']; ?>
</td></tr>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['iErrorNum']): ?>
        <tr><td colspan="2"><br></td></tr>
        <tr valign="top"><td><?php echo smarty_function_oxmultilang(array('ident' => 'TOOLS_LIST_ERRORNUM'), $this);?>
 : </td><td><?php echo $this->_tpl_vars['iErrorNum']; ?>
</td></tr>
        <?php endif; ?>
        <tr><td colspan="2"><hr></td></tr>
    <?php endforeach; endif; unset($_from); ?>
    </table>

</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pagetabsnippet.tpl", 'smarty_include_vars' => array('noOXIDCheck' => 'true')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script type="text/javascript">
if (parent.parent)
{   parent.parent.sShopTitle   = "<?php echo ((is_array($_tmp=$this->_tpl_vars['actshopobj']->oxshops__oxname->getRawValue())) ? $this->_run_mod_handler('oxaddslashes', true, $_tmp) : smarty_modifier_oxaddslashes($_tmp)); ?>
";
    parent.parent.sMenuItem    = "<?php echo smarty_function_oxmultilang(array('ident' => 'TOOLS_LIST_MENUITEM'), $this);?>
";
    parent.parent.sMenuSubItem = "<?php echo smarty_function_oxmultilang(array('ident' => 'TOOLS_LIST_MENUSUBITEM'), $this);?>
";
    parent.parent.sWorkArea    = "<?php echo $this->_tpl_vars['_act']; ?>
";
    parent.parent.setTitle();
}
</script>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "bottomitem.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>