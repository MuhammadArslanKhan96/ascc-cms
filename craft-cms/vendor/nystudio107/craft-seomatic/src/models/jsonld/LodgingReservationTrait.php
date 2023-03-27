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
 * Trait for LodgingReservation.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/LodgingReservation
 */
trait LodgingReservationTrait
{
    /**
     * The latest someone may check out of a lodging establishment.
     *
     * @var DateTime|Time
     */
    public $checkoutTime;

    /**
     * Textual description of the unit type (including suite vs. room, size of
     * bed, etc.).
     *
     * @var string|Text|QualitativeValue
     */
    public $lodgingUnitType;

    /**
     * The number of children staying in the unit.
     *
     * @var int|Integer|QuantitativeValue
     */
    public $numChildren;

    /**
     * The number of adults staying in the unit.
     *
     * @var int|QuantitativeValue|Integer
     */
    public $numAdults;

    /**
     * The earliest someone may check into a lodging establishment.
     *
     * @var DateTime|Time
     */
    public $checkinTime;

    /**
     * A full description of the lodging unit.
     *
     * @var string|Text
     */
    public $lodgingUnitDescription;
}
