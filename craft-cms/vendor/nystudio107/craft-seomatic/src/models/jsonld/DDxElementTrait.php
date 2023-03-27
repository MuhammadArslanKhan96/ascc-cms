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
 * Trait for DDxElement.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/DDxElement
 */
trait DDxElementTrait
{
    /**
     * One of a set of signs and symptoms that can be used to distinguish this
     * diagnosis from others in the differential diagnosis.
     *
     * @var MedicalSignOrSymptom
     */
    public $distinguishingSign;

    /**
     * One or more alternative conditions considered in the differential diagnosis
     * process as output of a diagnosis process.
     *
     * @var MedicalCondition
     */
    public $diagnosis;
}
