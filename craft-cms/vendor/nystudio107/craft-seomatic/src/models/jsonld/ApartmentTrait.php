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
 * Trait for Apartment.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Apartment
 */
trait ApartmentTrait
{
    /**
     * The number of rooms (excluding bathrooms and closets) of the accommodation
     * or lodging business. Typical unit code(s): ROM for room or C62 for no unit.
     * The type of room can be put in the unitText property of the
     * QuantitativeValue.
     *
     * @var float|Number|QuantitativeValue
     */
    public $numberOfRooms;

    /**
     * The allowed total occupancy for the accommodation in persons (including
     * infants etc). For individual accommodations, this is not necessarily the
     * legal maximum but defines the permitted usage as per the contractual
     * agreement (e.g. a double room used by a single person). Typical unit
     * code(s): C62 for person
     *
     * @var QuantitativeValue
     */
    public $occupancy;
}
