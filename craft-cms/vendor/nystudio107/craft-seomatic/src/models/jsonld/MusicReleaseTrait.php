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
 * Trait for MusicRelease.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MusicRelease
 */
trait MusicReleaseTrait
{
    /**
     * The album this is a release of.
     *
     * @var MusicAlbum
     */
    public $releaseOf;

    /**
     * Format of this release (the type of recording media used, i.e. compact
     * disc, digital media, LP, etc.).
     *
     * @var MusicReleaseFormatType
     */
    public $musicReleaseFormat;

    /**
     * The duration of the item (movie, audio recording, event, etc.) in [ISO 8601
     * date format](http://en.wikipedia.org/wiki/ISO_8601).
     *
     * @var Duration
     */
    public $duration;

    /**
     * The label that issued the release.
     *
     * @var Organization
     */
    public $recordLabel;

    /**
     * The catalog number for the release.
     *
     * @var string|Text
     */
    public $catalogNumber;

    /**
     * The group the release is credited to if different than the byArtist. For
     * example, Red and Blue is credited to "Stefani Germanotta Band", but by Lady
     * Gaga.
     *
     * @var Person|Organization
     */
    public $creditedTo;
}
