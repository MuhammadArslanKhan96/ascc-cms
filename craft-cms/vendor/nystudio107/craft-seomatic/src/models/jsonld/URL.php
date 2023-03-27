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
 * URL - Data type: URL.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/URL
 */
class URL extends MetaJsonLd implements URLInterface, TextInterface
{
	use URLTrait;
	use TextTrait;

	/**
	 * The Schema.org Type Name
	 *
	 * @var string
	 */
	public static string $schemaTypeName = 'URL';

	/**
	 * The Schema.org Type Scope
	 *
	 * @var string
	 */
	public static string $schemaTypeScope = 'https://schema.org/URL';

	/**
	 * The Schema.org Type Extends
	 *
	 * @var string
	 */
	public static string $schemaTypeExtends = 'Text';

	/**
	 * The Schema.org Type Description
	 *
	 * @var string
	 */
	public static string $schemaTypeDescription = 'Data type: URL.';


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

		];
	}


	/**
	 * @inheritdoc
	 */
	public function getSchemaPropertyDescriptions(): array
	{
		return [

		];
	}


	/**
	 * @inheritdoc
	 */
	public function getGoogleRequiredSchema(): array
	{
		return [];
	}


	/**
	 * @inheritdoc
	 */
	public function getGoogleRecommendedSchema(): array
	{
		return [];
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
