<?php namespace IA\LaravelCms\Http\Controllers;

use App\Http\Controllers\Controller;
use IA\LaravelCms\Entities\StaticPageTranslation;

class StaticPagesTranslationsController extends Controller
{
    public function translation( $id, $locale )
    {
        if ( $id )
        {
            $item   = StaticPageTranslation::where( ['static_page_id' => $id, 'locale' => $locale] )->first();

            return view( 'admin.modules.cms.staticpages.translation', ['locale'  => $locale, 'item'  => $item] );
        }

        return view( 'admin.modules.cms.staticpages.translation', ['locale'  => $locale] );
    }
}
