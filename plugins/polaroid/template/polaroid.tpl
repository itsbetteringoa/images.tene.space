{combine_css path="plugins/polaroid/template/polaroid.css"}

{footer_script}

jQuery(document).ready(function() {
  window.setTimeout(function(){ window.location.reload() }, 60000);

  // get a list of randomized thumbnail indexes
  var thumbIndexes = [];
  var nbThumbs = jQuery("ul.polaroid li a").size();
  for (var i=0; i<nbThumbs; i++) {
    thumbIndexes[i] = i;
  }
  shuffle(thumbIndexes);

  window.setTimeout(function(){ polaroidAnimate(0) }, 3000);

  function polaroidAnimate(idx) {
    jQuery("ul.polaroid li a").eq(thumbIndexes[idx % thumbIndexes.length ]).addClass('animate');
    window.setTimeout(function(){ polaroidStopAnimate(idx) }, 2000);
  }

  function polaroidStopAnimate(idx) {
    jQuery("ul.polaroid li a").eq(thumbIndexes[idx % thumbIndexes.length]).removeClass('animate');

    // animate another thumbnail
    window.setTimeout(function(){ polaroidAnimate(++idx) }, 500);
  }

  function shuffle(o){
    for(var j, x, i = o.length; i; j = Math.floor(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
    return o;
  };
});
{/footer_script}

{*
{html_style}{literal}
ul.polaroid a {
	height:{/literal}{180+30}{literal}px;
}
ul.polaroid li
{
	height:{/literal}{180+70}{literal}px;
}
{/literal}{/html_style}
*}

{define_derivative name='derivative_polaroid' width=250 height=250 crop=false}

{if !empty($thumbnails)}
{strip}{foreach from=$thumbnails item=thumbnail}
<li>
 <a href="{$thumbnail.URL}" title="{if isset($thumbnail.NAME)}{$thumbnail.NAME|truncate:15:"..."|@replace:'"':' '}{/if}"><img src="{$pwg->derivative_url($derivative_polaroid, $thumbnail.src_image)}"  alt="{$thumbnail.TN_ALT}" title="{$thumbnail.TN_TITLE}" ></a>
</li>
{/foreach}{/strip}
{/if}
