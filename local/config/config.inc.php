<?php 
$conf['question_mark_in_urls'] = false;
$conf['php_extension_in_urls'] = false;
$conf['category_url_style'] = 'id-name';
$conf['picture_url_style'] = 'file';

// Display a link to subscribe to Piwigo Announcements Newsletter
$conf['show_newsletter_subscription'] = false;
// anti-flood_time : number of seconds between 2 comments : 0 to disable
$conf['anti-flood_time'] = 120;
// maximum number of links in a comment before it is qualified spam
$conf['comment_spam_max_links'] = 2;
// calendar_show_empty : the calendar shows month/weeks/days even if there are
//no elements for these
$conf['calendar_show_empty'] = false;
// newcat_default_commentable : at creation, must a category be commentable
// or not ?
$conf['newcat_default_commentable'] = false;

// newcat_default_visible : at creation, must a category be visible or not ?
// Warning : if the parent category is invisible, the category is
// automatically create invisible. (invisible = locked)
$conf['newcat_default_visible'] = false;

// newcat_default_status : at creation, must a category be public or private
// ? Warning : if the parent category is private, the category is
// automatically create private.
$conf['newcat_default_status'] = 'private';
// session_use_ip_address: avoid session hijacking by using a part of the IP
// address
$conf['session_use_ip_address'] = false;

// guest_id : id of the anonymous user
$conf['guest_id'] = 2;
// webmaster_id : webmaster'id.
$conf['webmaster_id'] = 1;

?>