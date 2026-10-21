<?php

/**
 * @file plugins/themes/jote/JOTEThemePlugin.php
 *
 * Copyright (c) 2022-2026 Thomas F. K. Jorna, Center of Trial and Error
 * Distributed under the GNU GPL v3. For full terms see the file docs/COPYING.
 *
 * @class JOTEThemePlugin
 *
 * @brief JOTE theme: the default theme in JOTE's colours and Open Sans, and a JOTE-branded backend
 */

namespace APP\plugins\themes\jote;

use PKP\core\PKPSessionGuard;
use PKP\plugins\ThemePlugin;

class JOTEThemePlugin extends ThemePlugin
{
    /**
     * @copydoc ThemePlugin::isActive()
     */
    public function isActive()
    {
        if (PKPSessionGuard::isSessionDisable()) {
            return true;
        }
        return parent::isActive();
    }

    /**
     * @copydoc ThemePlugin::init()
     */
    public function init()
    {
        $this->setParent('defaultthemeplugin');

        $this->modifyStyle('stylesheet', ['addLess' => ['styles/index.less']]);
        $this->addStyle('font', 'styles/fonts/openSans.less');
        $this->modifyStyle('stylesheet', ['addLessVariables' => '@font: "Open Sans", sans-serif;@font-heading: "Open Sans", sans-serif;']);

        $this->addStyle('jote', 'styles/backend.less', ['contexts' => 'backend']);
    }

    /**
     * @copydoc Plugin::getContextSpecificPluginSettingsFile()
     */
    public function getContextSpecificPluginSettingsFile()
    {
        return $this->getPluginPath() . '/settings.xml';
    }

    /**
     * @copydoc Plugin::getInstallSitePluginSettingsFile()
     */
    public function getInstallSitePluginSettingsFile()
    {
        return $this->getPluginPath() . '/settings.xml';
    }

    /**
     * @copydoc Plugin::getDisplayName()
     */
    public function getDisplayName()
    {
        return __('plugins.themes.jote.name');
    }

    /**
     * @copydoc Plugin::getDescription()
     */
    public function getDescription()
    {
        return __('plugins.themes.jote.description');
    }
}

if (!PKP_STRICT_MODE) {
    class_alias('\APP\plugins\themes\jote\JOTEThemePlugin', '\JOTEThemePlugin');
}
