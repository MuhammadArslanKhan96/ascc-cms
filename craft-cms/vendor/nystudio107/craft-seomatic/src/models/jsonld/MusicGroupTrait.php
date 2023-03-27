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
 * Trait for MusicGroup.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MusicGroup
 */
trait MusicGroupTrait
{
    /**
     * A music album.
     *
     * @var MusicAlbum
     */
    public $album;

    /**
     * A music recording (track)—usually a single song.
     *
     * @var MusicRecording
     */
    public $tracks;

    /**
     * A music recording (track)—usually a single song. If an ItemList is given,
     * the list should contain items of type MusicRecording.
     *
     * @var ItemList|MusicRecording
     */
    public $track;

    /**
     * A collection of music albums.
     *
     * @var MusicAlbum
     */
    public $albums;

    /**
     * Genre of the creative work, broadcast channel or group.
     *
     * @var string|Text|URL
     */
    public $genre;

    /**
     * A member of a music group—for example, John, Paul, George, or Ringo.
     *
     * @var Person
     */
    public $musicGroupMember;
}
