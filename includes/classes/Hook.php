<?php
namespace includes\classes;
use includes\Bootstrap;
use includes\interfaces\HookInterface;

class Hook implements HookInterface{
    const VERSION = '1.0';
    public $template = '';
    public function init() {
        $this->registerAction();
        $this->registerFilter();
        $this->registerAsset();
        $this->registerShortcodes();
    }

    public function registerAction() {
        // TODO: Implement registerAction() method.
        add_action('wp_ajax_admin_ajax', [$this, 'excuteAjaxAdmin']);
        add_action('wp_ajax_front', [$this, 'excuteAjax']);
        add_action('wp_ajax_nopriv_front', [$this, 'excuteAjax']);
        add_action('init', [$this, 'registerTaxonomy']);
        add_action('init', [$this, 'registerPostType']);
    }

    public function registerFilter() {
        // TODO: Implement registerFilter() method.
    }

    public function registerAsset() {
        add_action('wp_enqueue_scripts', [$this, 'addStyles']);
        add_action('wp_enqueue_scripts', [$this, 'addScripts']);
        add_action('admin_enqueue_scripts', [$this, 'addScriptsAdmin']);
    }

    public function addStyles() {
        $path = get_template_directory_uri();
        $styles = array(
            'icon' => 'css/icon.css',
            'bootstrap-min' => 'css/bootstrap4/bootstrap.min.css',
            'owl-css'  => 'js/plugins/OwlCarousel2-2.2.1/owl.carousel.css',
            'owl-default' => 'js/plugins/OwlCarousel2-2.2.1/owl.theme.default.css',
            'owl-animate' => 'js/plugins/OwlCarousel2-2.2.1/animate.css',
            'contact_style' => 'css/contact_styles.css',
            'contact_responsive' => 'css/contact_responsive.css',
            'single_style' => 'css/single_styles.css',
            'single_responsive' => 'css/single_responsive.css',
            'categories_style' => 'css/categories_styles.css',
            'categories_responsive' => 'css/categories_responsive.css',
            'main_style' => 'css/main_styles.css',
            'responsive' => 'css/responsive.css',
            'custom-theme' => 'css/custom-theme.css',
        );
        foreach ($styles as $style) {
            wp_enqueue_style($style, $path .'/'. $style, array(), self::VERSION);
        }
    }

    public function addScripts() {
        $path = get_template_directory_uri();
        $scripts = array(
            'js-query' => 'js/jquery-3.2.1.min.js',
            'js-poper' => 'css/bootstrap4/popper.js',
            'js-isotope' => 'js/plugins/Isotope/isotope.pkgd.min.js',
            'js-bootstrap' => 'css/bootstrap4/bootstrap.min.js',
            'js-owl' => 'js/plugins/OwlCarousel2-2.2.1/owl.carousel.js',
            'js-easy' => 'js/plugins/easing/easing.js',
            'js-ui'   => 'js/plugins/jquery-ui-1.12.1.custom/jquery-ui.js',
            'js-map' =>   'js/map.js',
            'js-custom' => 'js/custom.js',
            'js-contact' => 'js/contact_custom.js',
            'js-categories' => 'js/categories_custom.js',
            'js-single' => 'js/single_custom.js',
            'js-notify' => 'js/notify.min.js',
            'js-theme-custom' => 'js/theme_custom.js',
        );
        foreach ($scripts as $script) {
            wp_enqueue_script($script, $path .'/'. $script, array('jquery'), self::VERSION, true);
        }
    }

    public function addScriptsAdmin() {
        $path = get_template_directory_uri();
        $scripts = array(
            'admin-js' =>'assets/js/admin.js',
        );
        foreach ($scripts as $script) {
            wp_enqueue_script($script, $path .'/'. $script, array('jquery'), self::VERSION, true);
        }
    }

    public function excuteAjax() {
        if ($_POST['method']) {
            $method = $_POST['method'];
            switch ($method) {
                case 'sendContact':
                    $params = $_POST['contact'];
                    $subject = '[CONTACT GUEST]';
                    $result = wp_mail($params['email'], $subject, $params['reason']);

                    header('Location: ' . $_SERVER['HTTP_REFERER'] . '?message=success');
                    exit;
                    break;
                default:
                    # code...
                    break;
            }
        }
        exit(200);
    }

    public function excuteAjaxAdmin() {
        exit(200);
    }

    public function registerPostType() {
        $dir_path = \includes\Bootstrap::getPath();
        foreach (glob($dir_path . "/posttypes/classes/*.php") as $filename)
        {
            $class_name = \includes\Bootstrap::bootstrap()->helper->getClassByPath($filename);
            /**
             * @var $model PostType
             */
            $class_name = '\\includes\\posttypes\\'.$class_name;
            $class_name::getInstance();
        }
    }

    public function registerTaxonomy() {
        $dir_path = \includes\Bootstrap::getPath();
        foreach (glob($dir_path . "/taxonomies/classes/*.php") as $filename)
        {
            $class_name = \includes\Bootstrap::bootstrap()->helper->getClassByPath($filename);
            /**
             * @var $class_name Taxonomy
             */
            $class_name = '\\includes\\taxonomies\\'.$class_name;
            $class_name::getInstance();
        }
    }

    public function registerShortcodes() {
        $dir_path = \includes\Bootstrap::getPath();
        foreach (glob($dir_path . "/shortcodes/classes/*.php") as $filename)
        {
            $class_name = \includes\Bootstrap::bootstrap()->helper->getClassByPath($filename);
            /**
             * @var $model Shortcode
             */
            $class_name = '\\includes\\shortcodes\\'.$class_name;
            $model = new $class_name();
            $model->register();
        }
    }
}