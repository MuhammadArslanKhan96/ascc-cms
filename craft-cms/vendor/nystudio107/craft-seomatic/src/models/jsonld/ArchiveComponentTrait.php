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
 * Trait for ArchiveComponent.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ArchiveComponent
 */
trait ArchiveComponentTrait
{
    /**
     * [[ArchiveOrganization]] that holds, keeps or maintains the
     * [[ArchiveComponent]].
     *
     * @var ArchiveOrganization
     */
    public $holdingArchive;

    /**
     * Current location of the item.
     *
     * @var string|Place|Text|PostalAddress
     */
    public $itemLocation;
}
