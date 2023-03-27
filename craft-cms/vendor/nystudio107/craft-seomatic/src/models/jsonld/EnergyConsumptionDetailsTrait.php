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
 * Trait for EnergyConsumptionDetails.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/EnergyConsumptionDetails
 */
trait EnergyConsumptionDetailsTrait
{
    /**
     * Defines the energy efficiency Category (which could be either a rating out
     * of range of values or a yes/no certification) for a product according to an
     * international energy efficiency standard.
     *
     * @var EnergyEfficiencyEnumeration
     */
    public $hasEnergyEfficiencyCategory;

    /**
     * Specifies the least energy efficient class on the regulated EU energy
     * consumption scale for the product category a product belongs to. For
     * example, energy consumption for televisions placed on the market after
     * January 1, 2020 is scaled from D to A+++.
     *
     * @var EUEnergyEfficiencyEnumeration
     */
    public $energyEfficiencyScaleMin;

    /**
     * Specifies the most energy efficient class on the regulated EU energy
     * consumption scale for the product category a product belongs to. For
     * example, energy consumption for televisions placed on the market after
     * January 1, 2020 is scaled from D to A+++.
     *
     * @var EUEnergyEfficiencyEnumeration
     */
    public $energyEfficiencyScaleMax;
}
