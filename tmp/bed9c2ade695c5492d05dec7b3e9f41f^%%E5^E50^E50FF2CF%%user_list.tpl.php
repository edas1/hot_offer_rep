<?php /* Smarty version 2.6.26, created on 2012-05-07 16:48:11
         compiled from user_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'oxmultilangassign', 'user_list.tpl', 1, false),array('modifier', 'oxtruncate', 'user_list.tpl', 108, false),array('modifier', 'oxaddslashes', 'user_list.tpl', 137, false),array('function', 'oxmultilang', 'user_list.tpl', 74, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "headitem.tpl", 'smarty_include_vars' => array('title' => ((is_array($_tmp='GENERAL_ADMIN_TITLE')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp) : smarty_modifier_oxmultilangassign($_tmp)),'box' => 'list')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $this->assign('where', $this->_tpl_vars['oView']->getListFilter()); ?>

<?php if ($this->_tpl_vars['readonly']): ?>
    <?php $this->assign('readonly', 'readonly disabled'); ?>
<?php else: ?>
    <?php $this->assign('readonly', ""); ?>
<?php endif; ?>

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

<div id="liste">


<form name="search" id="search" action="<?php echo $this->_tpl_vars['oViewConf']->getSelfLink(); ?>
" method="post">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_formparams.tpl", 'smarty_include_vars' => array('cl' => 'user_list','lstrt' => $this->_tpl_vars['lstrt'],'actedit' => $this->_tpl_vars['actedit'],'oxid' => $this->_tpl_vars['oxid'],'fnc' => "",'language' => $this->_tpl_vars['actlang'],'editlanguage' => $this->_tpl_vars['actlang'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<table cellspacing="0" cellpadding="0" border="0" width="100%">
<colgroup>
    
        <col width="20%">
        <col width="20%">
        <col width="19%">
        <col width="10%">
        <col width="10%">
        <col width="10%">
        <col width="10%">
        <col width="1%">
    
<colgroup>
<tr class="listitem">
    
        <td valign="top" class="listfilter first" height="20">
            <div class="r1"><div class="b1">
            <input class="listedit" type="text" size="20" maxlength="128" name="where[oxuser][oxlname]" value="<?php echo $this->_tpl_vars['where']['oxuser']['oxlname']; ?>
">
            </div></div>
        </td>
        <td valign="top" class="listfilter">
            <div class="r1"><div class="b1">
            <input class="listedit" type="text" size="20" maxlength="128" name="where[oxuser][oxusername]" value="<?php echo $this->_tpl_vars['where']['oxuser']['oxusername']; ?>
">
            </div></div>
        </td>
        <td valign="top" class="listfilter">
            <div class="r1"><div class="b1">
            <input class="listedit" type="text" size="20" maxlength="128" name="where[oxuser][oxstreet]" value="<?php echo $this->_tpl_vars['where']['oxuser']['oxstreet']; ?>
">
            </div></div>
        </td>
        <td valign="top" class="listfilter">
            <div class="r1"><div class="b1">
            <input class="listedit" type="text" size="10" maxlength="128" name="where[oxuser][oxzip]" value="<?php echo $this->_tpl_vars['where']['oxuser']['oxzip']; ?>
">
            </div></div>
        </td>
        <td valign="top" class="listfilter">
            <div class="r1"><div class="b1">
            <input class="listedit" type="text" size="20" maxlength="128" name="where[oxuser][oxcity]" value="<?php echo $this->_tpl_vars['where']['oxuser']['oxcity']; ?>
">
            </div></div>
        </td>
        <td valign="top" class="listfilter">
            <div class="r1"><div class="b1">
            <input class="listedit" type="text" size="15" maxlength="128" name="where[oxuser][oxfon]" value="<?php echo $this->_tpl_vars['where']['oxuser']['oxfon']; ?>
">
            </div></div>
        </td>
        <td valign="top" class="listfilter" colspan="2" nowrap>
            <div class="r1"><div class="b1">
            <div class="find"><input class="listedit" type="submit" name="submitit" value="<?php echo smarty_function_oxmultilang(array('ident' => 'GENERAL_SEARCH'), $this);?>
"></div>
            <input class="listedit" type="text" size="5" maxlength="128" name="where[oxuser][oxcustnr]" value="<?php echo $this->_tpl_vars['where']['oxuser']['oxcustnr']; ?>
">
            </div>
            </div></div>
        </td>
    
</tr>
<tr>
    
        <td class="listheader first" height="15">&nbsp;<a href="Javascript:top.oxid.admin.setSorting( document.search, 'oxuser', 'oxlname', 'asc');document.search.submit();" class="listheader"><?php echo smarty_function_oxmultilang(array('ident' => 'GENERAL_NAME'), $this);?>
</a></td>
        <td class="listheader"><a href="Javascript:top.oxid.admin.setSorting( document.search, 'oxuser', 'oxusername', 'asc');document.search.submit();" class="listheader"><?php echo smarty_function_oxmultilang(array('ident' => 'GENERAL_EMAIL'), $this);?>
</a></td>
        <td class="listheader"><a href="Javascript:top.oxid.admin.setSorting( document.search, 'oxuser', 'oxstreet', 'asc');document.search.submit();" class="listheader"><?php echo smarty_function_oxmultilang(array('ident' => 'GENERAL_STREET'), $this);?>
</a></td>
        <td class="listheader"><a href="Javascript:top.oxid.admin.setSorting( document.search, 'oxuser', 'oxzip', 'asc');document.search.submit();" class="listheader"><?php echo smarty_function_oxmultilang(array('ident' => 'USER_LIST_ZIP'), $this);?>
</a></td>
        <td class="listheader"><a href="Javascript:top.oxid.admin.setSorting( document.search, 'oxuser', 'oxcity', 'asc');document.search.submit();" class="listheader"><?php echo smarty_function_oxmultilang(array('ident' => 'USER_LIST_PLACE'), $this);?>
</a></td>
        <td class="listheader"><a href="Javascript:top.oxid.admin.setSorting( document.search, 'oxuser', 'oxfon', 'asc');document.search.submit();" class="listheader"><?php echo smarty_function_oxmultilang(array('ident' => 'GENERAL_TELEPHONE'), $this);?>
</a></td>
        <td class="listheader" colspan="2"><a href="Javascript:top.oxid.admin.setSorting( document.search, 'oxuser', 'oxcustnr', 'asc');document.search.submit();" class="listheader"><?php echo smarty_function_oxmultilang(array('ident' => 'USER_LIST_CUSTOMERNUM'), $this);?>
</a></td>
    
</tr>

<?php $this->assign('blWhite', ""); ?>
<?php $this->assign('_cnt', 0); ?>
<?php $_from = $this->_tpl_vars['mylist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['listitem']):
?>
    <?php $this->assign('_cnt', $this->_tpl_vars['_cnt']+1); ?>
    <tr id="row.<?php echo $this->_tpl_vars['_cnt']; ?>
">
    
        <?php if ($this->_tpl_vars['listitem']->blacklist == 1): ?>
            <?php $this->assign('listclass', 'listitem3'); ?>
        <?php else: ?>
            <?php $this->assign('listclass', "listitem".($this->_tpl_vars['blWhite'])); ?>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['listitem']->getId() == $this->_tpl_vars['oxid']): ?>
            <?php $this->assign('listclass', 'listitem4'); ?>
        <?php endif; ?>
        <td valign="top" class="<?php echo $this->_tpl_vars['listclass']; ?>
" height="15"><div class="listitemfloating">&nbsp;<a href="Javascript:top.oxid.admin.editThis('<?php echo $this->_tpl_vars['listitem']->oxuser__oxid->value; ?>
');" class="<?php echo $this->_tpl_vars['listclass']; ?>
"><?php if (! $this->_tpl_vars['listitem']->oxuser__oxlname->value): ?>-kein Name-<?php else: ?><?php echo $this->_tpl_vars['listitem']->oxuser__oxlname->value; ?>
<?php endif; ?> <?php echo $this->_tpl_vars['listitem']->oxuser__oxfname->value; ?>
</a></div></td>
        <td valign="top" class="<?php echo $this->_tpl_vars['listclass']; ?>
"><div class="listitemfloating"><a href="Javascript:top.oxid.admin.editThis('<?php echo $this->_tpl_vars['listitem']->oxuser__oxid->value; ?>
');" class="<?php echo $this->_tpl_vars['listclass']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['listitem']->oxuser__oxusername->value)) ? $this->_run_mod_handler('oxtruncate', true, $_tmp, 21, "...", true) : smarty_modifier_oxtruncate($_tmp, 21, "...", true)); ?>
</a></div></td>
        <td valign="top" class="<?php echo $this->_tpl_vars['listclass']; ?>
"><div class="listitemfloating"><a href="Javascript:top.oxid.admin.editThis('<?php echo $this->_tpl_vars['listitem']->oxuser__oxid->value; ?>
');" class="<?php echo $this->_tpl_vars['listclass']; ?>
"><?php echo $this->_tpl_vars['listitem']->oxuser__oxstreet->value; ?>
</a></div></td>
        <td valign="top" class="<?php echo $this->_tpl_vars['listclass']; ?>
"><div class="listitemfloating"><a href="Javascript:top.oxid.admin.editThis('<?php echo $this->_tpl_vars['listitem']->oxuser__oxid->value; ?>
');" class="<?php echo $this->_tpl_vars['listclass']; ?>
"><?php echo $this->_tpl_vars['listitem']->oxuser__oxzip->value; ?>
</a></div></td>
        <td valign="top" class="<?php echo $this->_tpl_vars['listclass']; ?>
"><div class="listitemfloating"><a href="Javascript:top.oxid.admin.editThis('<?php echo $this->_tpl_vars['listitem']->oxuser__oxid->value; ?>
');" class="<?php echo $this->_tpl_vars['listclass']; ?>
"><?php echo $this->_tpl_vars['listitem']->oxuser__oxcity->value; ?>
</a></div></td>
        <td valign="top" class="<?php echo $this->_tpl_vars['listclass']; ?>
"><div class="listitemfloating"><a href="Javascript:top.oxid.admin.editThis('<?php echo $this->_tpl_vars['listitem']->oxuser__oxid->value; ?>
');" class="<?php echo $this->_tpl_vars['listclass']; ?>
"><?php echo $this->_tpl_vars['listitem']->oxuser__oxfon->value; ?>
</a></div></td>
        <td valign="top" class="<?php echo $this->_tpl_vars['listclass']; ?>
"><div class="listitemfloating"><a href="Javascript:top.oxid.admin.editThis('<?php echo $this->_tpl_vars['listitem']->oxuser__oxid->value; ?>
');" class="<?php echo $this->_tpl_vars['listclass']; ?>
"><?php echo $this->_tpl_vars['listitem']->oxuser__oxcustnr->value; ?>
</a></div></td>

        <td class="<?php echo $this->_tpl_vars['listclass']; ?>
">
            <?php if (! $this->_tpl_vars['listitem']->isOx() && ! $this->_tpl_vars['readonly'] && ! $this->_tpl_vars['listitem']->blPreventDelete): ?>
            <a href="Javascript:top.oxid.admin.deleteThis('<?php echo $this->_tpl_vars['listitem']->oxuser__oxid->value; ?>
');" class="delete" id="del.<?php echo $this->_tpl_vars['_cnt']; ?>
" <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "help.tpl", 'smarty_include_vars' => array('helpid' => 'item_delete')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>></a>
            <?php endif; ?>
        </td>
    
</tr>
<?php if ($this->_tpl_vars['blWhite'] == '2'): ?>
<?php $this->assign('blWhite', ""); ?>
<?php else: ?>
<?php $this->assign('blWhite', '2'); ?>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pagenavisnippet.tpl", 'smarty_include_vars' => array('colspan' => '8')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</table>
</form>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pagetabsnippet.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script type="text/javascript">
if (parent.parent)
{   parent.parent.sShopTitle   = "<?php echo ((is_array($_tmp=$this->_tpl_vars['actshopobj']->oxshops__oxname->getRawValue())) ? $this->_run_mod_handler('oxaddslashes', true, $_tmp) : smarty_modifier_oxaddslashes($_tmp)); ?>
";
    parent.parent.sMenuItem    = "<?php echo smarty_function_oxmultilang(array('ident' => 'USER_LIST_MENNUITEM'), $this);?>
";
    parent.parent.sMenuSubItem = "<?php echo smarty_function_oxmultilang(array('ident' => 'USER_LIST_MENNUSUBITEM'), $this);?>
";
    parent.parent.sWorkArea    = "<?php echo $this->_tpl_vars['_act']; ?>
";
    parent.parent.setTitle();
}
</script>
</body>
</html>