[{$smarty.block.parent}]
<tr>
    <td class="edittext" width="140">
        [{oxmultilang alternative='&quot;Deutsche Insel&quot;-Zuschlag?' ident="b3nl_ISLAND_BACKEND_FOR_ISLAND"
        noerror=true}]
    </td>
    <td class="edittext" width="250">
        <input type="hidden" name="editval[oxdelivery__forn3nislandaddition]" value='0' [{$readonly}]>
        <input class="edittext" type="checkbox" name="editval[oxdelivery__forb3nislandaddition]" value='1'
               [{if $edit->oxdelivery__forb3nislandaddition->value == 1}]checked[{/if}] [{$readonly}]>
    </td>
</tr>
