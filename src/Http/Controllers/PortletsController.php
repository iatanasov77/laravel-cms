<?php

namespace IA\Laravel\Modules\Cms\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use IA\LaravelCore\CRUD\ResourceController;
use IA\Laravel\Modules\Cms\Entities\Portlet;

class PortletsController extends ResourceController
{
    public function index( Request $request )
    {
        $items  = [
            Portlet::firstOrNew( ['id' => 1] ),
            Portlet::firstOrNew( ['id' => 2] ),
            Portlet::firstOrNew( ['id' => 3] ),
            Portlet::firstOrNew( ['id' => 4] )
        ];
        return view( $this->config()['viewNamespace'] . '.edit', [ 'items' => $items ] );
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    protected function preSave( Request $request, Model &$entity, array &$input )
    {
        if ( $request->hasFile( 'item.image' ) )
        {
            $image              = $request->file( 'item.image' );
            $input['image']     = md5( time() ) . '.' . $image->getClientOriginalExtension();
            $destinationPath    = public_path('/upload');

            $image->move( $destinationPath, $input['image'] );
        }
    }
}
