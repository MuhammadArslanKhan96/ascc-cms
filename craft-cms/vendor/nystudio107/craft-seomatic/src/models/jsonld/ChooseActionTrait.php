<?php

/**
 * SEOmatic plugin for Craft CMS 4
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for ChooseAction.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ChooseAction
 */
trait ChooseActionTrait
{
    /**
     * A sub property of object. The options subject to this action.
     *
     * @var string|Text|Thing
     */
    public $option;

    /**
     * A sub property of object. The options subject to this action.
     *
     * @var string|Text|Thing
     */
    public $actionOption;
}
