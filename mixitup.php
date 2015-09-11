<?php
namespace Grav\Plugin;

use Grav\Common\Plugin;
use Grav\Common\Grav;
use Grav\Common\Page\Page;
use Grav\Common\Taxonomy;
use RocketTheme\Toolbox\Event\Event;

class MixitupPlugin extends Plugin
{
    /**
     * @return array
     */
    public static function getSubscribedEvents() {
        return [
            'onPageInitialized' => ['onPageInitialized', 0],
            'onGetPageTemplates' => ['onGetPageTemplates', 0],
            'onTwigTemplatePaths' => ['onTwigTemplatePaths', 0],
            'onTwigSiteVariables' => ['onTwigSiteVariables', 0]
        ];
    }

    /**
     * Add current directory to twig lookup paths.
     */
    public function onTwigTemplatePaths()
    {
        $this->grav['twig']->twig_paths[] = __DIR__ . '/templates';
    }

    /**
     * Initialize configuration
     */
    public function onPageInitialized()
    {
        $defaults = (array) $this->config->get('plugins.mixitup');

        /** @var Page $page */
        $page = $this->grav['page'];
        if (isset($page->header()->mixitup)) {
            $page->header()->mixitup = array_merge($defaults, $page->header()->mixitup);
        } else {
            $page->header()->mixitup = $defaults;
        }

    }

    /**
     * Add page template types.
     */
    public function onGetPageTemplates(Event $event)
    {
        /** @var Types $types */
        $types = $event->types;
        $types->scanTemplates('plugins://mixitup/templates');
    }

    /**
     * Include required css and js files.
     */
    public function onTwigSiteVariables()
    {
        if ($this->config->get('plugins.mixitup.built_in_css')) {
            $this->grav['assets']
                ->add('plugin://mixitup/css/mixitup-core.css')
                ->add('plugin://mixitup/css/mixitup-custom.css')
                ->add('plugin://mixitup/js/jquery.mixitup.min.js');
        }
    }
}
