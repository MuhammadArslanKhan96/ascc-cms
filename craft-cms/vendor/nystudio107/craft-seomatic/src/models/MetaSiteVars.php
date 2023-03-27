<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic\models;

use Craft;
use craft\helpers\DateTimeHelper;
use craft\validators\ArrayValidator;
use craft\validators\DateTimeValidator;
use DateTime;
use nystudio107\seomatic\base\VarsModel;
use nystudio107\seomatic\helpers\Json as JsonHelper;
use yii\web\ServerErrorHttpException;
use function is_array;
use function is_string;

/**
 * Site variables object, containing values that determine side-wide settings
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class MetaSiteVars extends VarsModel
{
    // Constants
    // =========================================================================

    const CONTAINER_TYPE = 'MetaSiteVarsContainer';

    // Static Methods
    // =========================================================================
    /**
     * @var string The name of the website
     */
    public $siteName = '';

    // Public Properties
    // =========================================================================
    /**
     * @var Entity
     */
    public $identity;
    /**
     * @var Entity
     */
    public $creator;
    /**
     * @var string The Twitter handle
     */
    public $twitterHandle = '';
    /**
     * @var string The Facebook profile ID
     */
    public $facebookProfileId = '';
    /**
     * @var string The Facebook app ID
     */
    public $facebookAppId = '';
    /**
     * @var string The Google Site Verification code
     */
    public $googleSiteVerification = '';
    /**
     * @var string The Bing Site Verification code
     */
    public $bingSiteVerification = '';
    /**
     * @var string The Pinterest Site Verification code
     */
    public $pinterestSiteVerification = '';
    /**
     * @var string The Facebook Site Verification code
     */
    public $facebookSiteVerification = '';
    /**
     * @var array Array of links for Same As... sites, indexed by the handle
     */
    public $sameAsLinks = [];
    /**
     * @var array Google Site Links search target
     */
    public $siteLinksSearchTarget = '';
    /**
     * @var string Google Site Links query input
     */
    public $siteLinksQueryInput = '';
    /**
     * @var string Default referrer tag setting
     */
    public $referrer = 'no-referrer-when-downgrade';
    /**
     * @var array Array of additional custom sitemap URLs
     */
    public $additionalSitemapUrls = [];
    /**
     * @var DateTime
     */
    public $additionalSitemapUrlsDateUpdated;
    /**
     * @var array Array of additional sitemaps
     */
    public $additionalSitemaps = [];

    /**
     * @param array $config
     *
     * @return null|MetaSiteVars
     */
    public static function create(array $config = [])
    {
        $model = new MetaSiteVars($config);
        $model->normalizeData();

        return $model;
    }

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init(): void
    {
        parent::init();

        // Set some default values
        if (empty($this->siteName)) {
            try {
                $info = Craft::$app->getInfo();
            } catch (ServerErrorHttpException $e) {
                $info = null;
            }
            $currentSite = Craft::$app->getSites()->getCurrentSite();
            $siteName = Craft::t('site', $currentSite->getName());
            if (is_array($siteName)) {
                $siteName = reset($siteName);
            }
            $this->siteName = $siteName ?? $info->name;
        }
    }

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        return [
            [
                [
                    'siteName',
                    'twitterHandle',
                    'facebookProfileId',
                    'facebookAppId',
                    'googleSiteVerification',
                    'bingSiteVerification',
                    'pinterestSiteVerification',
                    'facebookSiteVerification',
                    'siteLinksSearchTarget',
                    'siteLinksQueryInput',
                    'referrer',
                ],
                'string'
            ],
            [
                [
                    'additionalSitemapUrlsDateUpdated'
                ],
                DateTimeValidator::class
            ],
            [
                [
                    'sameAsLinks',
                    'additionalSitemapUrls',
                    'additionalSitemaps',
                ],
                ArrayValidator::class,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function datetimeAttributes(): array
    {
        $attributes = parent::datetimeAttributes();

        if (property_exists($this, 'additionalSitemapUrlsDateUpdated')) {
            $attributes[] = 'additionalSitemapUrlsDateUpdated';
        }

        return $attributes;
    }

    /**
     * Normalizes model data
     */
    public function normalizeData()
    {
        // Decode any JSON data
        $properties = $this->getAttributes();
        foreach ($properties as $property => $value) {
            if (!empty($value) && is_string($value)) {
                $this->$property = JsonHelper::decodeIfJson($value);
            }
        }
        // Convert our date attributes in the additionalSitemaps array
        if (!empty($this->additionalSitemaps)) {
            foreach ($this->additionalSitemaps as $index => $additionalSitemap) {
                if (!empty($additionalSitemap['lastmod'])) {
                    $this->additionalSitemaps[$index]['lastmod']
                        = DateTimeHelper::toDateTime($additionalSitemap['lastmod']);
                }
            }
        }
        // Make sure these are strings
        if (!empty($this->facebookProfileId)) {
            $this->facebookProfileId = (string)$this->facebookProfileId;
        }
        if (!empty($this->facebookAppId)) {
            $this->facebookAppId = (string)$this->facebookAppId;
        }
        // Identity
        if ($this->identity !== null && is_array($this->identity)) {
            $this->identity = new Entity($this->identity);
        }
        // Creator
        if ($this->creator !== null && is_array($this->creator)) {
            $this->creator = new Entity($this->creator);
        }
    }
}
