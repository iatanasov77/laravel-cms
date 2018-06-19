<?php

namespace IA\Laravel\Modules\Cms\Http\Controllers;

use App\Http\Controllers\Controller;
use IA\Laravel\Modules\Cms\Entities\SliderImageTranslation;

class SliderImagesTranslationsController extends Controller
{
    public function translation( $id, $locale )
    {
        if ( $id )
        {
            $item   = SliderImageTranslation::where( ['slider_image_id' => $id, 'locale' => $locale] )->first();

            return view( 'admin.modules.cms.sliderimages.translation', ['locale'  => $locale, 'item'  => $item] );
        }

        return view( 'admin.modules.cms.sliderimages.translation', ['locale'  => $locale] );
    }
}
