<?php
namespace BootstrapDefault;

class Config {

    const CONF_PARAM = 'bootstrapdefault';
    const CONF_VERSION = 5;

    const TYPE_BOOL = 'bool';
    const TYPE_STRING = 'string';
    const TYPE_FILE = 'file';

    const KEY_VERSION = 'conf_version';

    const KEY_BOOTSTRAP_THEME = 'bootstrap_theme';

    const KEY_PICTURE_PAGE = 'picture_page';

    const KEY_SOCIAL_ENABLED = 'social_enabled';
    const KEY_SOCIAL_TWITTER = 'social_twitter';
    const KEY_SOCIAL_FACEBOOK = 'social_facebook';
    const KEY_SOCIAL_GOOGLE_PLUS = 'social_google_plus';

    const KEY_COMMENTS_TYPE = 'comments_type';
    const KEY_COMMENTS_DISQUS_SHORTNAME = 'comments_disqus_shortname';

    const KEY_TAG_CLOUD_TYPE = 'tag_cloud_type';

    const KEY_CUSTOM_CSS = 'custom_css';

    private $defaults = array(
        self::KEY_BOOTSTRAP_THEME => 'default',
        self::KEY_PICTURE_PAGE => 'normal',
        self::KEY_SOCIAL_ENABLED => true,
        self::KEY_SOCIAL_TWITTER => true,
        self::KEY_SOCIAL_FACEBOOK => true,
        self::KEY_SOCIAL_GOOGLE_PLUS => true,
        self::KEY_COMMENTS_TYPE => 'piwigo',
        self::KEY_COMMENTS_DISQUS_SHORTNAME => null,
        self::KEY_TAG_CLOUD_TYPE => 'basic',
        self::KEY_CUSTOM_CSS => null,
    );

    private $types = array(
        self::KEY_BOOTSTRAP_THEME => self::TYPE_STRING,
        self::KEY_PICTURE_PAGE => self::TYPE_STRING,
        self::KEY_SOCIAL_ENABLED => self::TYPE_BOOL,
        self::KEY_SOCIAL_TWITTER => self::TYPE_BOOL,
        self::KEY_SOCIAL_FACEBOOK => self::TYPE_BOOL,
        self::KEY_SOCIAL_GOOGLE_PLUS => self::TYPE_BOOL,
        self::KEY_COMMENTS_TYPE => self::TYPE_STRING,
        self::KEY_COMMENTS_DISQUS_SHORTNAME => self::TYPE_STRING,
        self::KEY_TAG_CLOUD_TYPE => self::TYPE_STRING,
        self::KEY_CUSTOM_CSS => self::TYPE_FILE,
    );

    private $files = array();

    private $config = array();

    public function __construct() {
        global $conf;

        // Initialise the files array
        $this->initFiles();

        // Create initial config if necessary
        if (!isset($conf[self::CONF_PARAM])) {
            $this->createDefaultConfig();
            return;
        }

        // Load and JSON decode the config
        $loaded = json_decode($conf[self::CONF_PARAM], true);

        // Check for current version
        if (isset($loaded[self::KEY_VERSION]) && $loaded[self::KEY_VERSION] == self::CONF_VERSION) {
            $this->config = $loaded;
            return;
        }

        // Invalid or old config, recreate
        $this->createDefaultConfig();
        if (is_array($loaded)) {
            $this->populateConfig($loaded);
        }
        $this->save();
    }

    private function initFiles() {
        $this->files[self::KEY_CUSTOM_CSS] = PHPWG_ROOT_PATH . PWG_LOCAL_DIR . 'bootstrapdefault/custom.css';
    }

    public function __set($key, $value) {
        if (array_key_exists($key, $this->defaults)) {
            switch ($this->types[$key]) {
                case self::TYPE_STRING:
                    $this->config[$key] = !empty($value) ? $value : null;
                    break;
                case self::TYPE_BOOL:
                    $this->config[$key] = $value ? true : false;
                    break;
                case self::TYPE_FILE:
                    $this->saveFile($key, $value);
                    break;
            }
        }
    }

    public function __get($key) {
        if (array_key_exists($key, $this->defaults)) {
            switch ($this->types[$key]) {
                case self::TYPE_STRING:
                case self::TYPE_BOOL:
                    return $this->config[$key];
                case self::TYPE_FILE:
                    return $this->loadFile($key);
            }
        } else {
            return null;
        }
    }

    public function fromPost(array $post) {
        foreach (array_keys($this->defaults) as $key) {
            $this->__set($key, isset($post[$key]) ? stripslashes($post[$key]) : null);
        }
    }

    public function save() {
        conf_update_param(self::CONF_PARAM, json_encode($this->config));
    }

    private function createDefaultConfig() {
        $this->config = $this->defaults;
        $this->config[self::KEY_VERSION] = self::CONF_VERSION;
    }

    private function populateConfig(array $config) {
        foreach (array_keys($this->defaults) as $key) {
            if (isset($config[$key])) {
                $this->config[$key] = $config[$key];
            }
        }
    }

    private function saveFile($key, $content) {
        $file = $this->files[$key];
        $dir = dirname($file);
        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }
        if (empty($content) && file_exists($file)) {
            unlink($file);
        } else {
            file_put_contents($file, $content);
        }
    }

    private function loadFile($key) {
        $file = $this->files[$key];
        if (file_exists($file)) {
            return file_get_contents($file);
        } else {
            return null;
        }
    }

}