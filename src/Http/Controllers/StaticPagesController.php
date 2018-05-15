<?php namespace IA\LaravelCms\Http\Controllers;

use IA\LaravelCore\CRUD\ExtendedResourceController;
use IA\LaravelCore\CRUD\Grid\Grid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use IA\LaravelCms\Entities\Category;

class StaticPagesController extends ExtendedResourceController
{
    const UPLOAD_DIR    = DIRECTORY_SEPARATOR . 'cms'  . DIRECTORY_SEPARATOR . 'static_pages';

    const GRID_TITLE    = 'Текстови страници';
    const PAGE_SIZE     = 20;

    public function create( Request $request )
    {
        return parent::create( $request )->with( 'categories', Category::pluck( 'name', 'id' ) );
    }

    public function edit( $id, $locale = null )
    {
        return parent::edit( $id, $locale )->with( 'categories', Category::pluck( 'name', 'id' ) );
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    protected function buildGrid( Grid  &$grid )
    {
        parent::buildGrid( $grid );
        
        $grid->title( __('Заглавие') )->sortable();
        $grid->sub_title( __('Под-Заглавие') )->sortable();
        
        $grid->category( __('Категория') )->display( function( $category )
        {
            return $this->category ? $this->category->name : '';
        })->sortable();
        
        $grid->status( __('Преглед') )->display( function ( )
        {
            $html   = '<a href="' . route( 'site.show-page', ['slug' => $this->slug]) . '" target="__blank" >' . __('Преглед') . '</a>';
            
            return $html;
        })->sortable();
        
    }
    
    protected function preSave( Request $request, Model &$entity, array &$input )
    {
        if ( $request->hasFile( 'item.image' ) )
        {
            $image              = $request->file( 'item.image' );
            $rename             = md5( time() ) . '.' . $image->getClientOriginalExtension();
            $destinationPath    = config( 'orm.upload_path' ) . self::UPLOAD_DIR . DIRECTORY_SEPARATOR;

            if ( $image->move( $destinationPath, $rename ) )
            {
                $input['image']     = self::UPLOAD_DIR . DIRECTORY_SEPARATOR . $rename;
            }
        }
    }

    protected function postDelete( Model $entity )
    {
        @unlink( public_path( config( 'orm.upload_path' ) .  $entity->image ) );
    }
}
