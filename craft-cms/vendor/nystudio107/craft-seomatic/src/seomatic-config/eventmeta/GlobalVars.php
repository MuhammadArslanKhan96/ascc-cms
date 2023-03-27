<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2019 nystudio107
 */

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.2.0
 */

return [
    '*' => [
        'mainEntityOfPage' => 'Event',
        'seoTitle' => '{{ event.title }}',
        'siteNamePosition' => '',
        'seoDescription' => '',
        'seoKeywords' => '',
        'seoImage' => '',
        'seoImageWidth' => '',
        'seoImageHeight' => '',
        'seoImageDescription' => '',
        'canonicalUrl' => '{{ event.url }}',
        'robots' => 'all',
        'ogType' => 'website',
        'ogTitle' => '{{ seomatic.meta.seoTitle }}',
        'ogSiteNamePosition' => '',
        'ogDescription' => '{{ seomatic.meta.seoDescription }}',
        'ogImage' => '{{ seomatic.meta.seoImage }}',
        'ogImageWidth' => '{{ seomatic.meta.seoImageWidth }}',
        'ogImageHeight' => '{{ seomatic.meta.seoImageHeight }}',
        'ogImageDescription' => '{{ seomatic.meta.seoImageDescription }}',
        'twitterCard' => 'summary_large_image',
        'twitterCreator' => '{{ seomatic.site.twitterHandle }}',
        'twitterTitle' => '{{ seomatic.meta.seoTitle }}',
        'twitterSiteNamePosition' => '',
        'twitterDescription' => '{{ seomatic.meta.seoDescription }}',
        'twitterImage' => '{{ seomatic.meta.seoImage }}',
        'twitterImageWidth' => '{{ seomatic.meta.seoImageWidth }}',
        'twitterImageHeight' => '{{ seomatic.meta.seoImageHeight }}',
        'twitterImageDescription' => '{{ seomatic.meta.seoImageDescription }}',
    ],
];