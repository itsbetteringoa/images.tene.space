<?php
defined('SHARETHIS_PATH') or die('Hacking attempt!');

/**
 * detect current section
 */
function skeleton_loc_end_section_init()
{
  global $tokens, $page, $conf;

  if ($tokens[0] == 'skeleton')
  {
    $page['section'] = 'skeleton';

    // section_title is for breadcrumb, title is for page <title>
    $page['section_title'] = '<a href="'.get_absolute_root_url().'">'.l10n('Home').'</a>'.$conf['level_separator'].'<a href="'.SKELETON_PUBLIC.'">'.l10n('Skeleton').'</a>';
    $page['title'] = l10n('Skeleton');

    $page['body_id'] = 'theSkeletonPage';
    $page['is_external'] = true; // inform Piwigo that you are on a new page
  }
}

/**
 * include public page
 */
function skeleton_loc_end_page()
{
  global $page, $template;

  if (isset($page['section']) and $page['section']=='skeleton')
  {
    include(SKELETON_PATH . 'include/skeleton_page.inc.php');
  }
}

/*
 * button on album and photos pages
 */
function skeleton_add_button()
{
  global $template;

  $template->assign('SKELETON_PATH', SKELETON_PATH);
  $template->set_filename('skeleton_button', realpath(SKELETON_PATH.'template/my_button.tpl'));
  $button = $template->parse('skeleton_button', true);

  if (script_basename()=='index')
  {
    $template->add_index_button($button, BUTTONS_RANK_NEUTRAL);
  }
  else
  {
    $template->add_picture_button($button, BUTTONS_RANK_NEUTRAL);
  }
}

/**
 * add a prefilter on photo page
 */
function skeleton_loc_end_picture()
{
  global $template;

  $template->set_prefilter('picture', 'skeleton_picture_prefilter');
}

function skeleton_picture_prefilter($content)
{
  $search = '{if $display_info.author and isset($INFO_AUTHOR)}';
  $replace = '
<div id="Skeleton" class="imageInfo">
  <dt>{\'Skeleton\'|@translate}</dt>
  <dd style="color:orange;">{\'Piwigo rocks\'|@translate}</dd>
</div>
';

  return str_replace($search, $replace.$search, $content);
}
