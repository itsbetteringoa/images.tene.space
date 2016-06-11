<?php
defined('PHPWG_ROOT_PATH') or die('Hacking attempt!');

class Comments_on_Albums_maintain extends PluginMaintain
{
  private $table;
  
  function __construct($id)
  {
    global $prefixeTable;
    
    parent::__construct($id);
    $this->table = $prefixeTable.'comments_categories';
  }

  function install($plugin_version, &$errors=array())
  {
    pwg_query('
CREATE TABLE IF NOT EXISTS `' . $this->table . '` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT "0000-00-00 00:00:00",
  `author` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `author_id` smallint(5) DEFAULT NULL,
  `anonymous_id` varchar(45) NOT NULL,
  `website_url` varchar(255) DEFAULT NULL,
  `content` longtext,
  `validated` enum("true","false") NOT NULL DEFAULT "false",
  `validation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_i2` (`validation_date`),
  KEY `comments_i1` (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8
;');

    $result = pwg_query('SHOW COLUMNS FROM `' . $this->table . '` LIKE "anonymous_id";');
    if (!pwg_db_num_rows($result))
    {
      pwg_query('ALTER TABLE `' . $this->table . '` ADD `anonymous_id` VARCHAR(45) DEFAULT NULL;');
    }

    $result = pwg_query('SHOW COLUMNS FROM `' . $this->table . '` LIKE "email";');
    if (!pwg_db_num_rows($result))
    {
      pwg_query('
ALTER TABLE `' . $this->table . '`
  ADD `email` varchar(255) DEFAULT NULL,
  ADD `website_url` varchar(255) DEFAULT NULL,
  ADD KEY `comments_i2` (`validation_date`),
  ADD KEY `comments_i1` (`category_id`)
;');
    }
  }

  function update($old_version, $new_version, &$errors=array())
  {
    $this->install($new_version, $errors);
  }

  function uninstall()
  {
    pwg_query('DROP TABLE `' . $this->table . '`;');
  }
}
