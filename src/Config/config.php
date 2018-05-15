<?php

use Illuminate\Support\Facades\App;

return [
    'name' => 'CMS',
    'resources' => [
        'staticpages'    => [
            'entityType'    => '\IA\LaravelCms\Entities\StaticPage',
            'viewNamespace' => 'admin.modules.cms.staticpages',
            'routePath'     => '/admin/cms/static-pages',
            'requestClass'  => '\IA\LaravelCms\Http\Requests\StaticPagesRequest'
        ],
        'portlets'    => [
            'entityType'    => '\IA\LaravelCms\Entities\Portlet',
            'viewNamespace' => 'admin.modules.cms.portlets',
            'routePath'     => '/admin/cms/portlets',
            'requestClass'  => '\IA\LaravelCms\Http\Requests\PortletsRequest'
        ],
        'sliderimages'    => [
            'entityType'    => '\IA\LaravelCms\Entities\SliderImage',
            'listMethod'    => 'withDeactivated',
            'viewNamespace' => 'admin.modules.cms.sliderimages',
            'routePath'     => '/admin/cms/slider-images',
            'requestClass'  => '\IA\LaravelCms\Http\Requests\SliderImagesRequest'
        ]
    ]
];
