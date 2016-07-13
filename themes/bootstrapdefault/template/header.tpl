<!DOCTYPE html>
<html lang="{$lang_info.code}" dir="{$lang_info.direction}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset={$CONTENT_ENCODING}">
    <meta name="generator" content="Piwigo (aka PWG), see piwigo.org">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
{if isset($meta_ref) }
{if isset($INFO_AUTHOR)}
    <meta name="author" content="{$INFO_AUTHOR|@strip_tags:false|@replace:'"':' '}">
{/if}
{if isset($related_tags)}
    <meta name="keywords" content="{foreach from=$related_tags item=tag name=tag_loop}{if !$smarty.foreach.tag_loop.first}, {/if}{$tag.name}{/foreach}">
{/if}
{if isset($COMMENT_IMG)}
    <meta name="description" content="{$COMMENT_IMG|@strip_tags:false|@replace:'"':' '}{if isset($INFO_FILE)} - {$INFO_FILE}{/if}">
{else}
    <meta name="description" content="{$PAGE_TITLE}{if isset($INFO_FILE)} - {$INFO_FILE}{/if}">
{/if}
{/if}

    <title>{if $PAGE_TITLE!=l10n('Home') && $PAGE_TITLE!=$GALLERY_TITLE}{$PAGE_TITLE} | {/if}{$GALLERY_TITLE}</title>
    <link rel="apple-touch-icon" sizes="57x57" href="/favicon/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/favicon/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/favicon/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/favicon/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/favicon/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/favicon/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/favicon/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/favicon/apple-touch-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon-180x180.png">
<link rel="icon" type="image/png" href="/favicon/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="/favicon/favicon-194x194.png" sizes="194x194">
<link rel="icon" type="image/png" href="/favicon/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="/favicon/android-chrome-192x192.png" sizes="192x192">
<link rel="icon" type="image/png" href="/favicon/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="/favicon/manifest.json">
<link rel="mask-icon" href="/favicon/safari-pinned-tab.svg" color="#5bbad5">
<link rel="shortcut icon" href="/favicon/favicon.ico">
<meta name="apple-mobile-web-app-title" content="tene.space/monkey">
<meta name="application-name" content="tene.space/monkey">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-TileImage" content="/favicon/mstile-144x144.png">
<meta name="msapplication-config" content="/favicon/browserconfig.xml">
<meta name="theme-color" content="#ffffff">
<meta property="og:image" content="http://images.tene.space/favicon/site_preview.jpg" />
<meta content="width=device-width, initial-scale=1, maximum-scale=3" name="viewport">

<script type="text/javascript">
    reformal_wdg_w    = "713";
                    reformal_wdg_h    = "460";
                    reformal_wdg_domain    = "spacemonkey";
                    reformal_wdg_mode    = 5;
                    reformal_wdg_title   = "Ideas and suggestions";
                    reformal_wdg_ltitle  = "Got ideas? Share!...";
                    reformal_wdg_lfont   = "Verdana, Geneva, sans-serif";
                    reformal_wdg_lsize   = "12px";
                    reformal_wdg_color   = "#0033ff";
                    reformal_wdg_bcolor  = "#516683";
                    reformal_wdg_tcolor  = "#FFFFFF";
                    reformal_wdg_align   = "";
                    reformal_wdg_waction = 0;
                    reformal_wdg_vcolor  = "#9FCE54";
                    reformal_wdg_cmline  = "#E0E0E0";
                    reformal_wdg_glcolor  = "#105895";
                    reformal_wdg_tbcolor  = "#FFFFFF";
</script>

    <!-- <link rel="shortcut icon" type="image/x-icon" href="{$ROOT_URL}{$themeconf.icon_dir}/favicon.ico">; -->
    <link rel="start" title="{'Home'|@translate}" href="{$U_HOME}" >
    <link rel="search" title="{'Search'|@translate}" href="{$ROOT_URL}search.php">
{if isset($first.U_IMG)   }
    <link rel="first" title="{'First'|@translate}" href="{$first.U_IMG}">
{/if}
{if isset($previous.U_IMG)}
    <link rel="prev" title="{'Previous'|@translate}" href="{$previous.U_IMG}">
{/if}
{if isset($next.U_IMG)}
    <link rel="next" title="{'Next'|@translate}" href="{$next.U_IMG}">
{/if}
{if isset($last.U_IMG)}
    <link rel="last" title="{'Last'|@translate}" href="{$last.U_IMG}">
{/if}
{if isset($U_UP)}
    <link rel="up" title="{'Thumbnails'|@translate}" href="{$U_UP}">
{/if}

{combine_css path="themes/bootstrapdefault/fullcalendar.css" order=20}
{combine_css path="themes/bootstrapdefault/fullcalendar.print.css" order=21}

{combine_css path="themes/bootstrapdefault/bootstrap/dist/css/bootstrap.min.css" order=-20}

{foreach from=$themes item=theme}
{if $theme.load_css}
    {combine_css path="themes/`$theme.id`/theme.css" order=-10}
{/if}
{if !empty($theme.local_head)}{include file=$theme.local_head load_css=$theme.load_css}{/if}
{/foreach}

{if $theme_config->bootstrap_theme == 'default'}
{combine_css path="themes/bootstrapdefault/bootstrap/dist/css/bootstrap-theme.min.css" order=0}
{/if}
{if file_exists("local/bootstrapdefault/custom.css")}
{combine_css path="local/bootstrapdefault/custom.css" order=10}
{/if}
{combine_css path="themes/bootstrapdefault/fixplugins.css" order=1000000}
{get_combined_css}

{if isset($U_PREFETCH)}
    <link rel="prefetch" href="{$U_PREFETCH}">
{/if}
{if not empty($page_refresh)}
    <meta http-equiv="refresh" content="{$page_refresh.TIME};url={$page_refresh.U_REFRESH}">
{/if}

{combine_script id='jquery'}
{combine_script id='jquery-ajaxmanager' require='jquery' path='themes/default/js/plugins/jquery.ajaxmanager.js'}
{combine_script id='thumbnails-loader' require='jquery-ajaxmanager' path='themes/default/js/thumbnails.loader.js'}
{combine_script id='bootstrap' require='jquery' path="themes/bootstrapdefault/bootstrap/dist/js/bootstrap.min.js"}
{combine_script id=$themeconf.name require='bootstrap' path="themes/bootstrapdefault/js/theme.js"}
{combine_script id='amoment' require='jquery' path="themes/bootstrapdefault/js/moment.min.js"}
<!--
{combine_script id='overthrow-detect' require='jquery' path="themes/bootstrapdefault/js/overthrow-detect.js"}
{combine_script id='overthrow-polyfill' require='jquery' path="themes/bootstrapdefault/js/overthrow-polyfill.js"}
{combine_script id='overthrow-toss' require='jquery' path="themes/bootstrapdefault/js/overthrow-toss.js"}
{combine_script id='overthrow-init' require='jquery' path="themes/bootstrapdefault/js/overthrow-init.js"}
-->
{combine_script id='share42' require='jquery' path="themes/bootstrapdefault/js/share42.js"}
<!-- {combine_script id='lazy' require='jquery' path="themes/bootstrapdefault/js/jquery.lazy.min.js"}
{combine_script id='lazy_plug' require='jquery' path="themes/bootstrapdefault/js/jquery.lazy.plugins.min.js"} -->

{get_combined_scripts load='header'}

    <!--[if lt IE 7]>
    <script type="text/javascript" src="{$ROOT_URL}themes/default/js/pngfix.js"></script>
    <![endif]-->

    {if not empty($head_elements)}
        {foreach from=$head_elements item=elt}{$elt}
        {/foreach}
    {/if}

</head>

<body id="{$BODY_ID}"  >
<!-- Share42 widget  -->
    <div class="share42init" data-top1="80" data-top2="80" data-margin="0" data-url="http://images.tene.space" data-title="[tene.space.monkey] images from travel" data-image="http://images.tene.space/favicon/site_preview.jpg" data-description="BE THE CHANGE you wish to see in the world" data-path="http://images.tene.space/favicon/" data-zero-counter="0"></div> 

    <div id="the_page">
{if $BODY_ID != 'thePicturePage' or $theme_config->picture_page == 'normal'}
        <!-- Bootstrap navbar, moved to the header as variables are missing in menubar.tpl, actual menus remain in menubar.tpl -->
        <nav class="navbar navbar-default navbar-main" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menubar-navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="http://tene.space/monkey"><img src="/favicon/spacemonkey_logo_200.png" height="50" alt="monkey_logo" title="tene.space/monkey"> <span>{$GALLERY_TITLE}<span></a>
                </div>
                <div class="collapse navbar-collapse navbar-right" id="menubar-navbar-collapse">
{$MENUBAR}
                </div>
            </div>
        </nav>
{/if}
<!--
{if !isset($slideshow) and ($BODY_ID != 'thePicturePage' or $theme_config->picture_page == 'normal')}
        <div class="jumbotron">
            <div class="container">
                <div id="theHeader">{$PAGE_BANNER}</div>
            </div>
        </div>
{/if}

{if not empty($header_msgs)}
{foreach from=$header_msgs item=msg}
{/foreach}
{/if}

{if not empty($header_notes)}
{foreach from=$header_notes item=note}
{/foreach}
{/if}
<!-- End of header.tpl -->