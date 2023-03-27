<?php
namespace Craft;
use craft\elements\Entry;
use craft\helpers\UrlHelper;
use craft\elements\GlobalSet;

return [
    'endpoints' => [
        'api/data.json' => function() {
            return [
                'elementType' => Entry::class,
                'one' => true,
                'transformer' => function(Entry $entry) {
                    return [
                        'title' => 'Yes'
                    ];
                },
            ];
        },
        'api/artist.json' => function() {
            return [
                'elementType' => Entry::class,
                'criteria' => ['section' => 'artistTitle'],
                'transformer' => function(Entry $entry) {
                    return [
                        'title' => $entry->title,
                        'url' => $entry->url,
                        
                    ];
                },
            ];
        },
        'api/home.json' => function() {
            return [
                'elementType' => Entry::class,
                'criteria' => ['section' => 'home'],
                'transformer' => function(Entry $entry) {
                    $photos = [];
                    foreach ($entry->photo->all() as $photo) {
                        $photos[]['url'] = $photo->url;
                    }
                    $clients = [];
                    foreach ($entry->clients->all() as $photo) {
                        $clients[]['url'] = $photo->url;
                    }
                    $rightImage = [];
                    foreach ($entry->rightImage->all() as $photo) {
                        $rightImage[]['url'] = $photo->url;
                    }

                    return [
                        'title' => $entry->title,
                        'url' => $entry->url,
                        'photos' => $photos,
                        'rightImage'=>$rightImage,
                        'clients'=>$clients,
                        'about'=>$entry->about,
                    ];
                },
            ];
        },
        'api/allartists.json' => function() {
            return [
                'elementType' => Entry::class,
                'criteria' => ['section' => 'artists'],
                'transformer' => function(Entry $entry) {
                    $photos = [];
                    foreach ($entry->photo->all() as $photo) {
                        $photos[]['url'] = $photo->url;
                    }
                    $caseStudies = [];

                    foreach ($entry->workListing as $workEntry) {
                        $caseStudies[]= array(
                            'Name'=>$workEntry->title,
                            'URL'=>$workEntry->photo->one() ? $workEntry->photo->one()->url : null,
                            'workUrl'=>$workEntry->url,
                        );
                    }
                    return [
                        'title' => $entry->title,
                        'url' => $entry->slug,
                        'leftImage'=>$photos,
                        'category'=>$entry->artistTitle->one() ? $entry->artistTitle->one()->title : null,
                        'caseStudies'=>count($caseStudies) >0 ? true:false ,

                    ];
                },
            ];
        },
        'api/artist/<slug>.json' => function($slug) {
            return [
                'elementType' => Entry::class,
                'criteria' => ['section' => 'artists','slug' => $slug],
                'transformer' => function(Entry $entry) {
                    $photos = [];
                    foreach ($entry->photo->all() as $photo) {
                        $photos[]['url'] = $photo->url;
                    }
                    $caseStudies = [];

                    foreach ($entry->workListing as $workEntry) {
                        $caseStudies[]= array(
                            'Name'=>$workEntry->title,
                            'URL'=>$workEntry->photo->one() ? $workEntry->photo->one()->url : null,
                            'workUrl'=>$workEntry->url,
                        );
                    }
                    return [
                        'title' => $entry->title,
                        'url' => $entry->slug,
                        'leftImage'=>$photos,
                        'bio'=>$entry->bio,
                        'category'=>$entry->artistTitle->one() ? $entry->artistTitle->one()->title : null,
                        'caseStudies'=>$caseStudies,
                    ];
                },
            ];
        },
        'api/leftmenu.json' => function() {
            return [
                'elementType' =>GlobalSet::class, 
                'criteria' => ['handle' => 'leftMenu'],
                'transformer' => function(GlobalSet $globalSet) 
                {
                   $leftmenu = [];
                   foreach ($globalSet->leftMenuEntries as $entry) {
                    $photos = [];
                    foreach ($entry->rightImage->all() as $photo) {
                        $photos[]['url'] = $photo->url;
                    }
                    $leftmenu[] = array(
                       'title' => $entry->title,
                       'url' => $entry->url,
                       'rightImage'=>$photos,
                       'about'=>$entry->about,
                     );
                   }
                   return ['leftmenu' => $leftmenu];
                }
            ];
        },
        'api/global.json' => function() {
            return [
                'elementType' =>GlobalSet::class, 
                'criteria' => ['handle' => 'general'],
                'transformer' => function(GlobalSet $globalSet) 
                {
                   
                   return [
                        'title' => 'Gloabl Info',
                        'address' => $globalSet->address,
                        'studioEmail' =>$globalSet->studioEmail,
                        'careerEmail' =>$globalSet->careerEmail,
                        'facebookURL' =>$globalSet->facebookUrl,
                        'instagramURL' =>$globalSet->instagramUrl,
                        'messageURL' =>$globalSet->messageUrl,

                    ];
                }
            ];
        },
        'api/rightmenu.json' => function() {
            return [
                'elementType' =>GlobalSet::class, 
                'criteria' => ['handle' => 'rightMenu'],
                'transformer' => function(GlobalSet $globalSet) 
                {
                   $rightmenu = [];
                   foreach ($globalSet->rightMenuEntries as $entry) {
                    $photos = [];
                    foreach ($entry->photo->all() as $photo) {
                        $photos[]['url'] = $photo->url;
                    }
                    $rightmenu[] = array(
                       'title' => $entry->title,
                       'url' => $entry->url,
                       'slug' => $entry->slug,
                       'leftImage'=>$photos,
                       'category'=>$entry->artistTitle->one() ? $entry->artistTitle->one()->title : null,
                     );
                   }
                   return ['rightmenu' => $rightmenu];
                }
            ];
        },
        'api/clients.json' => function() {
            return [
                'elementType' =>Entry::class, 
                'criteria' => ['section' => 'clients'],
                'transformer' => function(Entry $entry) 
                {
                    $photos = [];
                    foreach ($entry->clientLogos->all() as $photo) {
                        $photos[]['url'] = $photo->url;
                    }

                    $clients = array(
                       'title' => $entry->title,
                       'url' => $entry->url,
                       'about'=>$entry->about,
                       'clientLogos'=>$photos,
                       
                     );
                   
                   return ['clients' =>$clients];
                }
            ];
        },
        'api/work/<slug>.json' => function($slug) {
            return [
                'elementType' =>Entry::class, 
                'criteria' => ['slug' => $slug],
                'transformer' => function(Entry $entry) 
                {
                    $photos = [];
                    $heroImageMobile = [];
                    foreach ($entry->photo->all() as $photo) {
                        $photos[]['url'] = $photo->url;
                    }
                    foreach ($entry->heroImageMobile->all() as $photo) {
                        $heroImageMobile[]['url'] = $photo->url;
                    }
                    $caseStudies = [];

                    foreach ($entry->caseStudies as $block) {
                        $caseStudies[]= array(
                            'image'=>$block->image->one() ? $block->image->one()->url : null,
                            'video'=>$block->video->one() ? $block->video->one()->url : null,
                        );
                    }
                    $work = array(
                       'title' => $entry->title,
                       'slug' => $entry->slug,
                       'heroImage'=>$photos,
                       'MobileHeroImage'=>$heroImageMobile,
                       'category'=>$entry->category->one() ? $entry->category->one()->title : null,
                       'caseStudies'=>$caseStudies,
                     );
                   
                   return ['work' =>$work];
                }
            ];
        },
        'api/work.json' => function() {
            return [
                'elementType' =>Entry::class, 
                'criteria' => ['section' => 'work'],
                'transformer' => function(Entry $entry) 
                {
                    $photos = [];
                    
                    foreach ($entry->rightImage->all() as $photo) {
                        $photos[]['url'] = $photo->url;
                    }
                    
                    $caseStudies = [];

                    foreach ($entry->workListing as $workEntry) {
                        $caseStudies[]= array(
                            'Name'=>$workEntry->title,
                            'URL'=>$workEntry->photo->one() ? $workEntry->photo->one()->url : null,
                            'slug'=>$workEntry->slug,
                            'workUrl'=>$workEntry->url,
                        );
                    }
                    $work = array(
                       'title' => $entry->title,
                       'url' => $entry->url,
                       'rightImage'=>$photos,
                       'caseStudies'=>$caseStudies,
                     );
                   
                   return ['work' =>$work];
                }
            ];
        },
    ]       
];