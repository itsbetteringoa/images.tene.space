{combine_css path=$EASYCAPTCHA_PATH|cat:'template/style.css'}

{combine_css path='themes/default/js/plugins/chosen.css'}
{combine_script id='jquery.chosen' load='footer' path='themes/default/js/plugins/chosen.jquery.min.js'}

{combine_css path=$EASYCAPTCHA_PATH|cat:'template/bgrins-spectrum/spectrum.css'}
{combine_script id='jquery.spectrum' load='footer' path=$EASYCAPTCHA_PATH|cat:'template/bgrins-spectrum/spectrum.js'}

{assign var="spectrum_language" value=$EASYCAPTCHA_PATH|cat:'template/bgrins-spectrum/i18n/jquery.spectrum-'|cat:$lang_info.code|cat:'.js'}
{if 'PHPWG_ROOT_PATH'|constant|cat:$spectrum_language|file_exists}
{combine_script id='jquery.spectrum.'|cat:$lang_info.code load='footer' require='jquery.spectrum' path=$spectrum_language}
{/if}


{footer_script}
// multiselect
$("select").css({
    width: 300
}).chosen({
    disable_search:true,
    placeholder_text_multiple: '{'Nowhere'|translate}'
});

// Spectrum settings
$.extend($.fn.spectrum.defaults, {
    showInput: true,
    showPalette: true,
    localStorageKey: "spectrum.easycaptcha",
    showInitial: true,
    preferredFormat: "hex6",
});

// Tic-tac-toe preview
$('.preview-tictac').on('change', function() {
    var inputs = ['size','bg1','bg2','bd','obj','sel'],
        url = '{$EASYCAPTCHA_PATH}tictac/gen_admin.php?t='+ new Date().getTime();

    for (var i=0; i<inputs.length; i++) {
        url+= '&'+ inputs[i] +'='+ encodeURIComponent($('input[name="tictac['+ inputs[i] +']"]').val());
    }

    $('#preview-tictac').attr('src', url);
});
$('.preview-tictac').eq(0).trigger('change');

// Drag & drop preview
var themes = {
{foreach from=$THEMES key=theme item=params}
  '{$theme}': '{$EASYCAPTCHA_PATH}drag/{$theme}/{$params.image}',
{/foreach}
};

$('.preview-drag').on('change', function() {
    // style
    var inputs = ['size','nb','bg1','bg2','obj','sel','bd1','bd2','txt'],
        style = $('#drag_style_src').text(),
        search, replace;

    for (var i=0; i<inputs.length; i++) {
        search = '{ldelim}\\$EASYCAPTCHA.drag\\.'+ inputs[i] +'}';
        replace = $('input[name="drag['+ inputs[i] +']"]').val();
        style = style.replace(new RegExp(search, 'g'), replace);
    }

    var x = parseInt($('input[name="drag[size]"]').val()),
        y = parseInt($('input[name="drag[nb]"]').val());

    search = '{ldelim}math equation=\'15+(x+5)*y\' x=$EASYCAPTCHA.drag.size y=$EASYCAPTCHA.drag.nb}',
    replace = 15+(x+5)*y;
    style = style.replace(search, replace);

    $('#drag_style').text(style);

    // content
    $('#easycaptcha .drag_item').remove();
    var html = '',
        image = themes[$('input[name="drag[theme]"]').val()];
    for (var i=0; i<y; i++) {
        html+=
        '<div class="drag_item" style="left:'+ (10+(x+5)*i) +'px;">'+
          '<img src="'+ image +'">'+
        '</div>';
    }
    $('#easycaptcha').prepend(html);
});
$('#drag_style').appendTo('head'); // move to last position to have priority
$('.preview-drag').eq(0).trigger('change');

$('#easycaptcha .drop_zone').on({
    'mouseenter': function() { $(this).addClass('valid'); },
    'mouseleave': function() { $(this).removeClass('valid'); },
});

// Drag & drop theme
$('.theme').on('click', function() {
  $('.theme').removeClass('selected');
  $(this).addClass('selected');
  $('input[name="drag[theme]"]').val($(this).attr('title')).trigger('change');
});
$('.theme .title span').css('background-color', $('#content').css('background-color'));
$('.theme .count span').css('background-color', $('#content').css('background-color'));

// show previews
$('.preview').prevAll('a').on('click', function() {
    $(this).hide();
    $(this).nextAll('.preview').slideDown();
});
{/footer_script}


<div class="titrePage">
  <h2>Easy Captcha</h2>
</div>

<form method="post" action="" class="properties">
<fieldset>
  <legend>{'Configuration'|translate}</legend>

  <ul>
    <li>
      <b><label for="guest_only">{'Only for unauthenticated users'|translate}</label></b>
      <input type="checkbox" name="guest_only" id="guest_only" {if $easycaptcha.guest_only}checked{/if}>
    </li>
    <li>
      <b>{'Activate on'|translate}</b>
      <select name="activate_on[]" multiple>
        <option value="picture" {if $easycaptcha.activate_on.picture}selected{/if}>{'Picture comments'|translate}</option>
        {if $loaded.category}<option value="category" {if $easycaptcha.activate_on.category}selected{/if}>{'Album comments'|translate}</option>{/if}
        <option value="register" {if $easycaptcha.activate_on.register}selected{/if}>{'Register form'|translate}</option>
        {if $loaded.contactform}<option value="contactform" {if $easycaptcha.activate_on.contactform}selected{/if}>{'Contact form'|translate}</option>{/if}
        {if $loaded.guestbook}<option value="guestbook" {if $easycaptcha.activate_on.guestbook}selected{/if}>{'Guestbook'|translate}</option>{/if}
      </select>
    </li>
    <li>
      <b>{'Comments action'|translate}</b>
      <label><input type="radio" name="comments_action" value="reject" {if $easycaptcha.comments_action == 'reject'}checked="checked"{/if}> {'Reject'|translate}</label>
      <label><input type="radio" name="comments_action" value="moderate" {if $easycaptcha.comments_action == 'moderate'}checked="checked"{/if}> {'Moderate'|translate}</label>
    </li>
    <li>
      <b>{'Challenge'|translate}</b>
      <label><input type="radio" name="challenge" value="tictac" {if $easycaptcha.challenge == 'tictac'}checked="checked"{/if}> {'Tic-tac-toe minigame'|translate}</label>
      <label><input type="radio" name="challenge" value="drag" {if $easycaptcha.challenge == 'drag'}checked="checked"{/if}> {'Image drag & drop'|translate}</label>
      <label><input type="radio" name="challenge" value="random" {if $easycaptcha.challenge == 'random'}checked="checked"{/if}> {'Random'|translate}</label>
    </li>
  </ul>

  <fieldset>
    <legend>{'Tic-tac-toe options'|translate}</legend>

    <ul>
      <li>
        <b>{'Image size'|translate}</b>
        <input type="number" name="tictac[size]" value="{$easycaptcha.tictac.size}" min=32 max=256 class="preview-tictac">
      </li>
      <li>
        <b>{'Colors'|translate}</b>
        <table class="colors">
          <tr>
            <td>{'Background'|translate} 1</td>
            <td>{'Background'|translate} 2</td>
            <td>{'Border'|translate}</td>
            <td>{'Marks'|translate}</td>
            <td>{'Selection'|translate}</td>
          </tr>
          <tr>
            <td><input type="color" name="tictac[bg1]" value="{$easycaptcha.tictac.bg1}" class="preview-tictac" size="7"></td>
            <td><input type="color" name="tictac[bg2]" value="{$easycaptcha.tictac.bg2}" class="preview-tictac" size="7"></td>
            <td><input type="color" name="tictac[bd]" value="{$easycaptcha.tictac.bd}" class="preview-tictac" size="7"></td>
            <td><input type="color" name="tictac[obj]" value="{$easycaptcha.tictac.obj}" class="preview-tictac" size="7"></td>
            <td><input type="color" name="tictac[sel]" value="{$easycaptcha.tictac.sel}" class="preview-tictac" size="7"></td>
          </tr>
        </table>
      </li>
      <li>
        <b>&nbsp;</b>
        <a class="buttonLike">{'Preview'|translate}</a>
        <div class="preview">
          <img id="preview-tictac" src="">
        </div>
      </li>
    </ul>
  </fieldset>

  <fieldset>
    <legend>{'Drag & drop options'|translate}</legend>

    <div class="warnings my-warnings">
      <ul><li>{'This challenge requires that JavaScript is enabled on the visitor browser. About 1% of Internet users have Javascript disabled.'|translate}</li></ul>
    </div>

    <ul>
      <li>
        <b>{'Theme'|translate}</b>
        {foreach from=$THEMES key=theme item=params}
        <a class="theme {if $easycaptcha.drag.theme == $theme}selected{/if}" title="{$theme}">
          <div class="title"><span>{$theme|ucfirst}</span></div>
          <div class="count"><span>({$params.count})</span></div>
          <img src="{$EASYCAPTCHA_PATH}drag/{$theme}/{$params.image}">
        </a>
        {/foreach}
        <input type="hidden" name="drag[theme]" value="{$easycaptcha.drag.theme}" class="preview-drag">
      </li>
      <li>
        <b>{'Image size'|translate}</b>
        <label><input type="number" name="drag[size]" value="{$easycaptcha.drag.size}" min=24 max=128 class="preview-drag"></label>
      </li>
      <li>
        <b>{'Number of images'|translate}</b>
        <label><input type="number" name="drag[nb]" value="{$easycaptcha.drag.nb}" min=3 max=10 class="preview-drag"></label>
      </li>
      <li>
        <b>{'Colors'|translate}</b>
        <table class="colors">
          <tr>
            <td>{'Background'|translate} 1</td>
            <td>{'Background'|translate} 2</td>
            <td>{'Image'|translate}</td>
            <td>{'Image border'|translate}</td>
            <td>{'Drop'|translate}</td>
            <td>{'Drop border'|translate}</td>
            <td>{'Text'|translate}</td>
          </tr>
          <tr>
            <td><input type="color" name="drag[bg1]" value="{$easycaptcha.drag.bg1}" class="preview-drag" size="7"></td>
            <td><input type="color" name="drag[bg2]" value="{$easycaptcha.drag.bg2}" class="preview-drag" size="7"></td>
            <td><input type="color" name="drag[obj]" value="{$easycaptcha.drag.obj}" class="preview-drag" size="7"></td>
            <td><input type="color" name="drag[bd1]" value="{$easycaptcha.drag.bd1}" class="preview-drag" size="7"></td>
            <td><input type="color" name="drag[sel]" value="{$easycaptcha.drag.sel}" class="preview-drag" size="7"></td>
            <td><input type="color" name="drag[bd2]" value="{$easycaptcha.drag.bd2}" class="preview-drag" size="7"></td>
            <td><input type="color" name="drag[txt]" value="{$easycaptcha.drag.txt}" class="preview-drag" size="7"></td>
          </tr>
        </table>
      </li>
      <li>
        <b>&nbsp;</b>
        <a class="buttonLike">{'Preview'|translate}</a>
        <div class="preview">
          {$easycaptcha.challenge = 'drag'}
          {include file=$EASYCAPTCHA_ABS_PATH|cat:'template/common.inc.tpl' EASYCAPTCHA=$easycaptcha}
          {$smarty.capture.easycaptcha}
        </div>
      </li>
    </ul>
  </fieldset>
</fieldset>

<p class="formButtons"><input class="submit" type="submit" value="{'Submit'|translate}" name="submit"></p>
</form>

<div style="text-align:right;">
  Icons
    [<a href="https://www.iconfinder.com/iconsets/cutecritters" class="externalLink">#1</a>]
    [<a href="https://www.iconfinder.com/iconsets/crystalproject" class="externalLink">#2</a>]
    [<a href="https://www.iconfinder.com/iconsets/UrbanStories-png-Artdesigner-lv" class="externalLink">#3</a>]
    [<a href="https://www.iconfinder.com/iconsets/ie_Bright" class="externalLink">#4</a>]
  | Libraries
    [<a href="http://bgrins.github.io/spectrum" class="externalLink">Spectrum.js</a>]
    [<a href="http://threedubmedia.com" class="externalLink">jQuery.events</a>]
</div>


{* <!-- weird thing to update bunch of CSS --> *}
{html_head}
<style id="drag_style"></style>
<script type="text/template" id="drag_style_src">
{$DRAG_CSS}
</script>
{/html_head}