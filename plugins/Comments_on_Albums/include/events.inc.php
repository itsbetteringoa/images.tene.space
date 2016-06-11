<?php
defined('COA_ID') or die('Hacking attempt!');

function coa_albums()
{
  global $page;

  if (!empty($page['section']) and $page['section'] == 'categories' and
      isset($page['category']) and $page['body_id'] == 'theCategoryPage'
    )
  {
    trigger_notify('loc_begin_coa');
    include(COA_PATH . 'include/coa_albums.php');
  }
}

function coa_comments()
{
  include(COA_PATH . 'include/coa_comments_page.php');
}

function coa_admin_intro()
{
  global $page;

  if ($page['page'] == 'intro')
  {
    global $template;

    // comments count
    $query = '
SELECT COUNT(*)
  FROM '.COA_TABLE.'
;';
    list($nb_comments) = pwg_db_fetch_row(pwg_query($query));

    $template->assign(
      'DB_COMMENTS_ALBUMS',
      l10n_dec('%d comment on album', '%d comments on albums', $nb_comments)
      );

    if ($nb_comments)
    {
      // unvalidated comments
      $query = '
SELECT COUNT(*)
  FROM '.COA_TABLE.'
  WHERE validated=\'false\'
;';
      list($nb_comments) = pwg_db_fetch_row(pwg_query($query));

      if ($nb_comments > 0)
      {
        $template->assign(array(
          'U_COMMENTS_ALBUMS' => COA_ADMIN,
          'NB_PENDING_COMMENTS_ALBUMS' => $nb_comments,
          ));
      }
    }

    $template->set_prefilter('intro', 'coa_admin_intro_prefilter');
  }
}

function coa_admin_intro_prefilter($content)
{
  $search = '(<a href="{$U_COMMENTS}">{\'%d waiting for validation\'|translate:$NB_PENDING_COMMENTS}</a>){/if}';

  $add = '
      </li>
    {/if}
    {if isset($DB_COMMENTS_ALBUMS)}
      <li>
        {$DB_COMMENTS_ALBUMS}{if isset($NB_PENDING_COMMENTS_ALBUMS)} (<a href="{$U_COMMENTS_ALBUMS}">{\'%d waiting for validation\'|translate:$NB_PENDING_COMMENTS_ALBUMS}</a>){/if}';

  return str_replace($search, $search.$add, $content);
}


function coa_tabsheet_before_select($sheets, $id)
{
  if ($id == 'comments')
  {
    $sheets['']['caption'] = l10n('Comments on photos');
    $sheets['']['url'] = get_root_url().'admin.php?page=comments';

    $sheets['albums'] = array(
      'caption' => l10n('Comments on albums'),
      'url' => COA_ADMIN,
      );
  }

  return $sheets;
}

function coa_register_stuffs_module($modules)
{
  $modules[] = array(
    'path' => COA_PATH . '/stuffs_module',
    'name' => l10n('Last comments on albums'),
    'description' => l10n('Display last posted comments on albums'),
    );

  return $modules;
}
