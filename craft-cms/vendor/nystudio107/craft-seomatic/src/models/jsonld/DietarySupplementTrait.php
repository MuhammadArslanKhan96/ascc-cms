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
 * Trait for DietarySupplement.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/DietarySupplement
 */
trait DietarySupplementTrait
{
    /**
     * An active ingredient, typically chemical compounds and/or biologic
     * substances.
     *
     * @var string|Text
     */
    public $activeIngredient;

    /**
     * The generic name of this drug or supplement.
     *
     * @var string|Text
     */
    public $nonProprietaryName;

    /**
     * Any potential safety concern associated with the supplement. May include
     * interactions with other drugs and foods, pregnancy, breastfeeding, known
     * adverse reactions, and documented efficacy of the supplement.
     *
     * @var string|Text
     */
    public $safetyConsideration;

    /**
     * Proprietary name given to the diet plan, typically by its originator or
     * creator.
     *
     * @var string|Text
     */
    public $proprietaryName;

    /**
     * The drug or supplement's legal status, including any controlled substance
     * schedules that apply.
     *
     * @var string|Text|DrugLegalStatus|MedicalEnumeration
     */
    public $legalStatus;

    /**
     * Characteristics of the population for which this is intended, or which
     * typically uses it, e.g. 'adults'.
     *
     * @var string|Text
     */
    public $targetPopulation;

    /**
     * True if this item's name is a proprietary/brand name (vs. generic name).
     *
     * @var bool|Boolean
     */
    public $isProprietary;

    /**
     * Recommended intake of this supplement for a given population as defined by
     * a specific recommending authority.
     *
     * @var MaximumDoseSchedule
     */
    public $maximumIntake;

    /**
     * Recommended intake of this supplement for a given population as defined by
     * a specific recommending authority.
     *
     * @var RecommendedDoseSchedule
     */
    public $recommendedIntake;

    /**
     * The specific biochemical interaction through which this drug or supplement
     * produces its pharmacological effect.
     *
     * @var string|Text
     */
    public $mechanismOfAction;
}
