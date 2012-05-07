[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]

[{ if $readonly }]
    [{assign var="readonly" value="readonly disabled"}]
[{else}]
    [{assign var="readonly" value=""}]
[{/if}]

<form name="myedit" id="myedit" action="[{ $oViewConf->getSelfLink() }]" method="post">
[{ $oViewConf->getHiddenSid() }]
<input type="hidden" name="cl" value="nfq_article_hotoffer">
<input type="hidden" name="fnc" value="save">
<input type="hidden" name="oxid" value="[{ $oxid }]">
<input type="hidden" name="editval[article__oxid]" value="[{ $oxid }]">
<input type="hidden" name="voxid" value="[{ $oxid }]">
<input type="hidden" name="oxparentid" value="[{ $oxparentid }]">
<input type="hidden" name="editlanguage" value="[{ $editlanguage }]">

<table cellspacing="0" cellpadding="0" border="0" height="100%">
    <tr height="10">
        <td></td><td></td>
    </tr>
    <tr>
        <td class="edittext">
            [{ oxmultilang ident="NFQ_ARTICLE_HOTOFFER_ADD" }]&nbsp;
        </td>
        <td class="edittext">
            <input class="edittext" type="checkbox" name="editval[oxarticles__nfq_hotoffer]" value="1" [{if $edit->oxarticles__nfq_hotoffer->value == 1}]checked[{/if}] [{ $readonly }]>
        </td>
    </tr>
    <tr>
        <td class="edittext" colspan="2">
            <input type="submit" class="edittext" id="oLockButton" name="saveArticle" value="[{ oxmultilang ident="NFQ_ARTICLE_HOTOFFER_SAVE" }]" onClick="Javascript:document.myedit.fnc.value='save'" [{ $readonly }] >
        </td>
    </tr>
</table>

[{include file="bottomnaviitem.tpl"}]
[{include file="bottomitem.tpl"}]