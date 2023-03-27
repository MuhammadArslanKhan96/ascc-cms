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
 * Trait for MedicalGuidelineRecommendation.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MedicalGuidelineRecommendation
 */
trait MedicalGuidelineRecommendationTrait
{
    /**
     * Strength of the guideline's recommendation (e.g. 'class I').
     *
     * @var string|Text
     */
    public $recommendationStrength;
}
