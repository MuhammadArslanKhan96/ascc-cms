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
 * Trait for Menu.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Menu
 */
trait MenuTrait
{
    /**
     * A subgrouping of the menu (by dishes, course, serving time period, etc.).
     *
     * @var MenuSection
     */
    public $hasMenuSection;

    /**
     * A food or drink item contained in a menu or menu section.
     *
     * @var MenuItem
     */
    public $hasMenuItem;
}
