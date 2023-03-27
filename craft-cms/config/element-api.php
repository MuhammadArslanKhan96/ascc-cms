<?php
namespace Craft;
use craft\elements\Entry;
use craft\helpers\UrlHelper;
use craft\elements\GlobalSet;

return [
    'endpoints' => [
        'api/data.json' => function() {
            return [
                'cache' => 'PT240M',
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
                'cache' => 'PT240M',
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
                'cache' => 'PT240M',
                'elementType' => Entry::class,
                'criteria' => ['section' => 'home'],
                'transformer' => function(Entry $entry) {

                    return [
                        'title' => $entry->title,
                        'heroVideo'=>$entry->heroVideo->one() ? $entry->heroVideo->one()->url : null,
                        'mobileHeroVideo'=>$entry->mobileHeroVideo->one() ? $entry->mobileHeroVideo->one()->url : null,
                        'seo'=>$entry->seo,
                    ];
                },
            ];
        },
        'api/allartists.json' => function() {
            return [
                'cache' => 'PT240M',
                'elementType' => Entry::class,
                'criteria' => ['section' => 'artists'],
                'transformer' => function(Entry $entry) {
                    
                    $caseStudies = [];

                    foreach ($entry->workListing as $workEntry) {
                        $caseStudies[]= array(
                            'Name'=>$workEntry->title,
                            'URL'=>$workEntry->photo->one() ? $workEntry->photo->one()->url : null,
                            'workUrl'=>'/work/'.$workEntry->slug,
                        );
                    }
                    return [
                        'title' => $entry->title,
                        'url' => $entry->slug,
                        'leftImage'=>$entry->artistProfileImage->one() ? $entry->artistProfileImage->one()->url : null,
                        'category'=>$entry->artistTitle->one() ? $entry->artistTitle->one()->title : null,
                        'caseStudies'=>count($caseStudies) >0 ? true:false ,

                    ];
                },
            ];
        },
        'api/artist/<slug>.json' => function($slug) {
            return [
                'cache' => 'PT240M',
                'elementType' => Entry::class,
                'criteria' => ['section' => 'artists','slug' => $slug],
                'transformer' => function(Entry $entry) {
                    
                    $caseStudies = [];

                    foreach ($entry->workListing as $workEntry) {
                        $caseStudies[]= array(
                            'Name'=>$workEntry->title,
                            'URL'=>$workEntry->photo->one() ? $workEntry->photo->one()->url : null,
                            'workUrl'=>'/artist/work/'.$workEntry->slug,
                        );
                    }
                    return [
                        'title' => $entry->title,
                        'url' => $entry->slug,
                        'profileImage'=>$entry->artistProfileImage->one() ? $entry->artistProfileImage->one()->url : null,
                        'bio'=>$entry->bio,
                        'category'=>$entry->artistTitle->one() ? $entry->artistTitle->one()->title : null,
                        'caseStudies'=>$caseStudies,
                        'instagramURL'=>$entry->artistInstagramUrl,
                        'contactemail'=>$entry->artistContactEmail,
                        'seo'=>$entry->seo,
                    ];
                },
            ];
        },
        'api/leftmenu.json' => function() {
            return [
                'cache' => 'PT240M',
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
                       'url' => '/'.$entry->slug,
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
                'cache' => 'PT240M',
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
                'cache' => 'PT240M',
                'elementType' =>GlobalSet::class, 
                'criteria' => ['handle' => 'rightMenu'],
                'transformer' => function(GlobalSet $globalSet) 
                {
                   $rightmenu = [];
                   foreach ($globalSet->rightMenuEntries as $entry) {
                    // $photos = [];
                    // foreach ($entry->photo->all() as $photo) {
                    //     $photos[]['url'] = $photo->url;
                    // }
                    $rightmenu[] = array(
                       'title' => $entry->title,
                       'url' => $entry->url,
                       'slug' => $entry->slug,
                       
                       'profileImage'=>$entry->artistProfileImage->one() ? $entry->artistProfileImage->one()->url : null,
                       'category'=>$entry->artistTitle->one() ? $entry->artistTitle->one()->title : null,
                     );
                   }
                   return ['rightmenu' => $rightmenu];
                }
            ];
        },
        'api/clients.json' => function() {
            return [
                'cache' => 'PT240M',
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
                   
                   return ['clients' =>$clients,'seo'=>$entry->seo];
                }
            ];
        },
        'api/work/<slug>.json' => function($slug) {
            return [
                'cache' => 'PT240M',
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
                       'seo'=>$entry->seo,
                     );
                   
                   return ['work' =>$work];
                }
            ];
        },
        'api/work-category/<slug>.json' => function($slug) {
            $works = \craft\elements\Entry::find()
            ->section('workCategories')
            ->slug($slug)
            ->one();
             // print_r($works->seo);
             // die();

            return [
                'cache' => 'PT240M',
                'elementType' =>Entry::class, 
                'criteria' => ['section'=>'caseStudies','relatedTo' =>$works],
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
                    
                    
                    return [
                        'title' => $entry->title,
                        'slug' => $entry->slug,
                        'URL'=>$entry->photo->one() ? $entry->photo->one()->url : null ,
                        'heroMobileImage'=>$heroImageMobile,
                        'workUrl'=> '/work/'.$entry->slug,
                        'Text' => $entry->title,
                        'seo'=>$entry->category->one()->seo,

                   ];
                }
            ];
        },
        'api/work.json' => function() {
            return [
                'cache' => 'PT240M',
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
                            'workUrl'=>'/work/'.$workEntry->slug,
                        );
                    }
                    $work = array(
                       'title' => $entry->title,
                       'url' => $entry->url,
                       'rightImage'=>$photos,
                       'caseStudies'=>$caseStudies,
                     );
                   
                   return ['work' =>$work,'seo'=>$entry->seo];
                }
            ];
        },
        'api/work-category.json' => function() {
            return [
                'cache' => 'PT240M',
                'elementType' =>Entry::class, 
                'criteria' => ['section' => 'workCategories'],
                'transformer' => function(Entry $entry) 
                {
                    
                    return [
                        'title' => $entry->title,
                        'slug' => $entry->slug,
                        'href' => $entry->slug,
                        'seo'=>$entry->seo,
                    ];
                }
            ];
        },
        'api/artistwork/<slug>.json' => function($slug) {
            
            return [
                'cache' => 'PT240M',
                'elementType' =>Entry::class, 
                'criteria' => ['section'=>'caseStudies','slug'=>$slug],
                'transformer' => function(Entry $entry) 
                {
                    
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
                       
                       'category'=>$entry->category->one() ? $entry->category->one()->title : null,
                       'caseStudies'=>$caseStudies,
                       'seo'=>$entry->seo,
                       'artist'=>$entry->artist->one() ? $entry->artist->one()->title : null,
                     );
                   
                   return [
                        'title' => $entry->title,
                       'slug' => $entry->slug,
                       
                       'category'=>$entry->category->one() ? $entry->category->one()->title : null,
                       'caseStudies'=>$caseStudies,
                       'seo'=>$entry->seo,
                       'artist'=>$entry->artist->one() ? $entry->artist->one()->title : null,
                       'artistslug'=>$entry->artist->one() ? $entry->artist->one()->slug : null,
                   ];
                }
            ];
        },
        'api/allwork.json' => function() {
            
            return [
                'cache' => 'PT240M',
                'elementType' =>Entry::class, 
                'criteria' => ['section'=>'caseStudies'],
                'transformer' => function(Entry $entry) 
                {
                    return [
                        'title' => $entry->title,
                       'slug' => $entry->slug,
                   ];
                }
            ];
        },
    ]       
];