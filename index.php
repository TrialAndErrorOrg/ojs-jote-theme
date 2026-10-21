<?php

/**
 * @defgroup plugins_themes_JOTE JOTE theme plugin
 */
 
/**
 * @file plugins/themes/jote/index.php
 *
 * Copyright (c) 2022-2023 Thomas F. K. Jorna, Center of Trial and Error 
 * Distributed under the GNU GPL v3. For full terms see the file docs/COPYING.
 *
 * @ingroup plugins_themes_default
 * @brief Wrapper for default theme plugin.
 *
 */

require_once('JOTEThemePlugin.inc.php');

return new JOTEThemePlugin();


