{*<!-- this is inspired by theme/defaults/template/picture.tpl -->*}

{combine_script id='coa.script' load='footer' require='jquery' path=$COA_PATH|cat:'template/script.js'}

{html_style}{strip}
#comments { margin:10px 0 0 0; padding: 2px 5px !important; position:relative; }
#comments .commentElement { width:98%; }

{if $COMMENTS_ON_TOP}
#comments { margin:0 0 10px 0; }
{/if}

{if $themeconf.name == 'elegant'}
#content { padding-bottom:0; }
#comments { background-color:#333333; }
#comments h3 { margin: 10px 0px; }
{/if}

{if $themeconf.name == 'Sylvia'}
#comments .description { padding: 15px 2px 6px 12px; }
#comments .commentElement { border: 1px solid #666; }
{/if}

{if $themeconf.name|strstr:"stripped"}
#comments { text-align: left; }
#comments .description { height:auto; }
#thumbnails_block2 { min-height:0; }
{/if}

{if $themeconf.name != 'elegant'}
#comments { background:rgba(127,127,127,0.1); }
#comments.commentshidden #pictureComments { display:none; }
#comments .comments_toggle { cursor:pointer; }
#commentsSwitcher { float:left; margin:2px 0; cursor:pointer; }
#comments .switchArrow { width:16px; height:16px; margin:8px 5px 8px 4px; }
#comments .switchArrow:before { content:"\BB"; display:inline-block; font-size:22px; }
#comments.commentshidden .switchArrow:before { -webkit-transform:rotate(90deg); transform:rotate(90deg); }
#comments.commentsshown .switchArrow:before { -webkit-transform:rotate(-90deg); transform:rotate(-90deg); }
{/if}
{/strip}{/html_style}

{footer_script}
var coa_on_top = {intval(isset($COMMENTS_ON_TOP))}, coa_force_open = {intval(isset($DISPLAY_COMMENTS_BLOCK))};
{/footer_script}


{if isset($COMMENT_COUNT)}
<div id="comments" {if (!isset($comment_add) && ($COMMENT_COUNT == 0))}class="noCommentContent"{else}class="commentContent"{/if}><div id="commentsSwitcher"></div>
  <h3>{$COMMENT_COUNT|translate_dec:'%d comment':'%d comments'}</h3>

  <div id="pictureComments">
    {if isset($comment_add)}
    <div id="commentAdd">
      <h4>{'Add a comment'|translate}</h4>
      <form method="post" action="{$comment_add.F_ACTION}" id="addComment">
        {if $comment_add.SHOW_AUTHOR}
          <p><label for="author">{'Author'|translate}{if $comment_add.AUTHOR_MANDATORY} ({'mandatory'|translate}){/if} :</label></p>
          <p><input type="text" name="author" id="author" value="{$comment_add.AUTHOR}"></p>
        {/if}
        {if $comment_add.SHOW_EMAIL}
          <p><label for="email">{'Email address'|translate}{if $comment_add.EMAIL_MANDATORY} ({'mandatory'|translate}){/if} :</label></p>
          <p><input type="text" name="email" id="email" value="{$comment_add.EMAIL}"></p>
        {/if}
        <p><label for="website_url">{'Website'|translate} :</label></p>
        <p><input type="text" name="website_url" id="website_url" value="{$comment_add.WEBSITE_URL}"></p>
        <p><label for="contentid">{'Comment'|translate} ({'mandatory'|translate}) :</label></p>
        <p><textarea name="content" id="contentid" rows="5" cols="50">{$comment_add.CONTENT}</textarea></p>
        <p><input type="hidden" name="key" value="{$comment_add.KEY}">
          <input type="submit" value="{'Submit'|translate}"></p>
      </form>
    </div>
    {/if}
    {if isset($comments)}
    <div id="pictureCommentList">
      {if (($COMMENT_COUNT > 2) || !empty($comment_navbar))}
        <div id="pictureCommentNavBar">
          {if $COMMENT_COUNT > 2}
            <a href="{$COMMENTS_ORDER_URL}#comments" rel="nofollow" class="commentsOrder">{$COMMENTS_ORDER_TITLE}</a>
          {/if}
          {if !empty($comment_navbar)}
            {include file='navigation_bar.tpl'|get_extent:'navbar' navbar=$comment_navbar}
          {/if}
        </div>
      {/if}
      {include file='comment_list.tpl'}
    </div>
    {/if}
    <div style="clear:both"></div>
  </div>

</div>
{/if}{*comments*}