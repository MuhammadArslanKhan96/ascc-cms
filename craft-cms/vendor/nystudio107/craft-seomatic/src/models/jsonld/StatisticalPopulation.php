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

use nystudio107\seomatic\models\MetaJsonLd;

/**
 * schema.org version: v15.0-release
 * StatisticalPopulation - A StatisticalPopulation is a set of instances of a certain given type that
 * satisfy some set of constraints. The property [[populationType]] is used to
 * specify the type. Any property that can be used on instances of that type
 * can appear on the statistical population. For example, a
 * [[StatisticalPopulation]] representing all [[Person]]s with a
 * [[homeLocation]] of East Podunk California would be described by applying
 * the appropriate [[homeLocation]] and [[populationType]] properties to a
 * [[StatisticalPopulation]] item that stands for that set of people. The
 * properties [[numConstraints]] and [[constrainingProperty]] are used to
 * specify which of the populations properties are used to specify the
 * population. Note that the sense of "population" used here is the general
 * sense of a statistical population, and does not imply that the population
 * consists of people. For example, a [[populationType]] of [[Event]] or
 * [[NewsArticle]] could be used. See also [[Observation]], and the [data and
 * datasets](/docs/data-and-datasets.html) overview for more details.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/StatisticalPopulation
 */
class StatisticalPopulation extends MetaJsonLd implements StatisticalPopulationInterface, IntangibleInterface, ThingInterface
{
	use StatisticalPopulationTrait;
	use IntangibleTrait;
	use ThingTrait;

	/**
	 * The Schema.org Type Name
	 *
	 * @var string
	 */
	public static string $schemaTypeName = 'StatisticalPopulation';

	/**
	 * The Schema.org Type Scope
	 *
	 * @var string
	 */
	public static string $schemaTypeScope = 'https://schema.org/StatisticalPopulation';

	/**
	 * The Schema.org Type Extends
	 *
	 * @var string
	 */
	public static string $schemaTypeExtends = 'Intangible';

	/**
	 * The Schema.org Type Description
	 *
	 * @var string
	 */
	public static string $schemaTypeDescription = "A StatisticalPopulation is a set of instances of a certain given type that satisfy some set of constraints. The property [[populationType]] is used to specify the type. Any property that can be used on instances of that type can appear on the statistical population. For example, a [[StatisticalPopulation]] representing all [[Person]]s with a [[homeLocation]] of East Podunk California would be described by applying the appropriate [[homeLocation]] and [[populationType]] properties to a [[StatisticalPopulation]] item that stands for that set of people.\nThe properties [[numConstraints]] and [[constrainingProperty]] are used to specify which of the populations properties are used to specify the population. Note that the sense of \"population\" used here is the general sense of a statistical\npopulation, and does not imply that the population consists of people. For example, a [[populationType]] of [[Event]] or [[NewsArticle]] could be used. See also [[Observation]], and the [data and datasets](/docs/data-and-datasets.html) overview for more details.\n  ";


	/**
	 * @inheritdoc
	 */
	public function getSchemaPropertyNames(): array
	{
		return array_keys($this->getSchemaPropertyExpectedTypes());
	}


	/**
	 * @inheritdoc
	 */
	public function getSchemaPropertyExpectedTypes(): array
	{
		return [
		    'additionalType' => ['URL'],
		    'alternateName' => ['Text'],
		    'constrainingProperty' => ['Integer'],
		    'description' => ['Text'],
		    'disambiguatingDescription' => ['Text'],
		    'identifier' => ['PropertyValue', 'URL', 'Text'],
		    'image' => ['URL', 'ImageObject'],
		    'mainEntityOfPage' => ['URL', 'CreativeWork'],
		    'name' => ['Text'],
		    'numConstraints' => ['Integer'],
		    'populationType' => ['Class'],
		    'potentialAction' => ['Action'],
		    'sameAs' => ['URL'],
		    'subjectOf' => ['Event', 'CreativeWork'],
		    'url' => ['URL']
		];
	}


	/**
	 * @inheritdoc
	 */
	public function getSchemaPropertyDescriptions(): array
	{
		return [
		    'additionalType' => 'An additional type for the item, typically used for adding more specific types from external vocabularies in microdata syntax. This is a relationship between something and a class that the thing is in. In RDFa syntax, it is better to use the native RDFa syntax - the \'typeof\' attribute - for multiple types. Schema.org tools may have only weaker understanding of extra types, in particular those defined externally.',
		    'alternateName' => 'An alias for the item.',
		    'constrainingProperty' => 'Indicates a property used as a constraint to define a [[StatisticalPopulation]] with respect to the set of entities   corresponding to an indicated type (via [[populationType]]).',
		    'description' => 'A description of the item.',
		    'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
		    'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
		    'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
		    'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
		    'name' => 'The name of the item.',
		    'numConstraints' => 'Indicates the number of constraints (not counting [[populationType]]) defined for a particular [[StatisticalPopulation]]. This helps applications understand if they have access to a sufficiently complete description of a [[StatisticalPopulation]].',
		    'populationType' => 'Indicates the populationType common to all members of a [[StatisticalPopulation]].',
		    'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
		    'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
		    'subjectOf' => 'A CreativeWork or Event about this Thing.',
		    'url' => 'URL of the item.'
		];
	}


	/**
	 * @inheritdoc
	 */
	public function getGoogleRequiredSchema(): array
	{
		return ['description', 'name'];
	}


	/**
	 * @inheritdoc
	 */
	public function getGoogleRecommendedSchema(): array
	{
		return ['image', 'url'];
	}


	/**
	 * @inheritdoc
	 */
	public function defineRules(): array
	{
		$rules = parent::defineRules();
		    $rules = array_merge($rules, [
		        [$this->getSchemaPropertyNames(), 'validateJsonSchema'],
		        [$this->getGoogleRequiredSchema(), 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
		        [$this->getGoogleRecommendedSchema(), 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
		    ]);

		    return $rules;
	}
}
