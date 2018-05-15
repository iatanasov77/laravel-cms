<?php

use Illuminate\Support\Facades\App;

return [
    'name' => 'CMS',
    'resources' => [
        'staticpages'    => [
            'entityType'    => '\Modules\CMS\Entities\StaticPage',
            'viewNamespace' => 'admin.modules.cms.staticpages',
            'routePath'     => '/admin/cms/static-pages',
            'requestClass'  => '\Modules\CMS\Http\Requests\StaticPagesRequest'
        ],
        'portlets'    => [
            'entityType'    => '\Modules\CMS\Entities\Portlet',
            'viewNamespace' => 'admin.modules.cms.portlets',
            'routePath'     => '/admin/cms/portlets',
            'requestClass'  => '\Modules\CMS\Http\Requests\PortletsRequest'
        ],
        'sliderimages'    => [
            'entityType'    => '\Modules\CMS\Entities\SliderImage',
            'listMethod'    => 'withDeactivated',
            'viewNamespace' => 'admin.modules.cms.sliderimages',
            'routePath'     => '/admin/cms/slider-images',
            'requestClass'  => '\Modules\CMS\Http\Requests\SliderImagesRequest'
        ]
    ]
];
