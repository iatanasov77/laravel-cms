<?php

use Illuminate\Support\Facades\App;

return [
    'name' => 'CMS',
    'resources' => [
        'staticpages'    => [
            'entityType'    => '\IA\Laravel\Modules\Cms\Entities\StaticPage',
            'viewNamespace' => 'admin.modules.cms.staticpages',
            'routePath'     => '/admin/cms/static-pages',
            'requestClass'  => '\IA\Laravel\Modules\Cms\Http\Requests\StaticPagesRequest'
        ],
        'portlets'    => [
            'entityType'    => '\IA\Laravel\Modules\Cms\Entities\Portlet',
            'viewNamespace' => 'admin.modules.cms.portlets',
            'routePath'     => '/admin/cms/portlets',
            'requestClass'  => '\IA\Laravel\Modules\Cms\Http\Requests\PortletsRequest'
        ],
        'sliderimages'    => [
            'entityType'    => '\IA\Laravel\Modules\Cms\Entities\SliderImage',
            'listMethod'    => 'withDeactivated',
            'viewNamespace' => 'admin.modules.cms.sliderimages',
            'routePath'     => '/admin/cms/slider-images',
            'requestClass'  => '\IA\Laravel\Modules\Cms\Http\Requests\SliderImagesRequest'
        ]
    ]
];
