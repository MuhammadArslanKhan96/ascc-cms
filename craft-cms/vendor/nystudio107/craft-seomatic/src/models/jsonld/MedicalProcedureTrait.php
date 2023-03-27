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
 * Trait for MedicalProcedure.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MedicalProcedure
 */
trait MedicalProcedureTrait
{
    /**
     * How the procedure is performed.
     *
     * @var string|Text
     */
    public $howPerformed;

    /**
     * The type of procedure, for example Surgical, Noninvasive, or Percutaneous.
     *
     * @var MedicalProcedureType
     */
    public $procedureType;

    /**
     * The status of the study (enumerated).
     *
     * @var string|MedicalStudyStatus|Text|EventStatusType
     */
    public $status;

    /**
     * Location in the body of the anatomical structure.
     *
     * @var string|Text
     */
    public $bodyLocation;

    /**
     * Typical or recommended followup care after the procedure is performed.
     *
     * @var string|Text
     */
    public $followup;

    /**
     * Typical preparation that a patient must undergo before having the procedure
     * performed.
     *
     * @var string|Text|MedicalEntity
     */
    public $preparation;
}
