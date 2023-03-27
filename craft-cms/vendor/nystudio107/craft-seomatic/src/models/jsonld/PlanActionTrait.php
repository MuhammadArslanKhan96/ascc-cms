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
 * Trait for PlanAction.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/PlanAction
 */
trait PlanActionTrait
{
    /**
     * The time the object is scheduled to.
     *
     * @var DateTime
     */
    public $scheduledTime;
}
