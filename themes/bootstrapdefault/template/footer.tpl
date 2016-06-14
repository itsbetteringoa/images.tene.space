        <!-- Start of footer.tpl -->
        <div class="copyright container">
            <div class="text-center">
{if isset($debug.TIME)}
                {'Page generated in'|@translate} {$debug.TIME} ({$debug.NB_QUERIES} {'SQL queries in'|@translate} {$debug.SQL_TIME}) -
{/if}
                {*
                    Please, do not remove this copyright. If you really want to,
                            contact us on http://piwigo.org to find a solution on how
                            to show the origin of the script...
                *}
                {'Powered by'|@translate}	<a href="{$PHPWG_URL}" class="Piwigo">Piwigo</a> | Bootstrap Default {'theme by'|@translate} <a href="https://philio.me/">Phil Bayfield</a>
{$VERSION} 
{* if isset($CONTACT_MAIL) *} <!-- 
                | <a href="mailto:{$CONTACT_MAIL}?subject={'A comment on your site'|@translate|@escape:url}">{'Contact webmaster'|@translate}</a> -->
{* /if *} 
<!-- 
{if isset($TOGGLE_MOBILE_THEME_URL)}
                | {'View in'|@translate} : <a href="{$TOGGLE_MOBILE_THEME_URL}">{'Mobile'|@translate}</a> | <b>{'Desktop'|@translate}</b>
{/if}
-->

{get_combined_scripts load='footer'}

{if isset($footer_elements)}
{foreach from=$footer_elements item=v}
{$v}
{/foreach}
{/if}
            </div>
        </div>
{if isset($debug.QUERIES_LIST)}
        <div id="debug">
{$debug.QUERIES_LIST}
        </div>
{/if}
    </div>
     <div class="flag_counter">
<a href="http://info.flagcounter.com/Cbbk"><img src="http://s06.flagcounter.com/count2/Cbbk/bg_FFFFFF/txt_000000/border_CCCCCC/columns_1/maxflags_5/viewers_0/labels_1/pageviews_1/flags_0/percent_0/" alt="Flag Counter" target=
_blank" border="0" style="display: none;"></a>     
    </div>
    
</body>
</html>