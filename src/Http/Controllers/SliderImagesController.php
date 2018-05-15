<?php namespace IA\LaravelCms\Http\Controllers;

use IA\LaravelCore\CRUD\ExtendedResourceController;
use IA\LaravelCore\CRUD\Grid\Grid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SliderImagesController extends ExtendedResourceController
{
    const UPLOAD_DIR    = DIRECTORY_SEPARATOR . 'cms'  . DIRECTORY_SEPARATOR . 'slider_images';

    const GRID_TITLE    = 'Слайдър';
    const PAGE_SIZE     = 20;
    
    /*
     * За да работи реордеринга, трябва полето за ордер в базата
     * да не е с еднакви стойности за всеки ред
     */
    public function index( Request $request )
    {
        $request->request->add( [ 'orderBy' => ['order' => 'asc']] );

        return parent::index( $request );
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    protected function buildGrid( Grid  &$grid )
    {
        parent::buildGrid( $grid );
        
        $grid->image( __('Снимка') )->display( function ( $image )
        {
            $html   = '<img src="' . config( 'orm.upload_provider' ) . '/' . base64_encode( $this->image ) . '" width="100" />';
            
            return $html;
        });
       
        $grid->date_from( __('От дата') )->display( function( $fromDate )
        {
            return $this->date_from ? date( 'd.m.Y', strtotime( $this->date_from ) ) : '';
        })->sortable();
        
        $grid->date_to( __('До дата') )->display( function( $toDate )
        {
            return $this->date_to ? date( 'd.m.Y', strtotime( $this->date_to ) ) : '';
        })->sortable();
        
    }
    
    protected function preSave( Request $request, Model &$entity, array &$input )
    {
        $input['is_active']   = isset( $input['is_active'] ) && $input['is_active'] == 'on' ? 1 : 0;

        $locale = $request->get( 'locale', App::getLocale() );

        if ( $request->hasFile( 'item.image:' . $locale ) )
        {
            $image              = $request->file( 'item.image:' . $locale );
            $rename             = md5( time() ) . '.' . $image->getClientOriginalExtension();
            $destinationPath    = config( 'orm.upload_path' ) . self::UPLOAD_DIR;
            if ( $image->move( $destinationPath, $rename ) )
            {
                $input['image:' . $locale ] = self::UPLOAD_DIR . DIRECTORY_SEPARATOR . $rename;
            }
        }

        if ( $request->hasFile( 'item.image_1300:' . $locale ) )
        {
            $image              = $request->file( 'item.image_1300:' . $locale );
            $rename             = md5( time() ) . '_1300.' . $image->getClientOriginalExtension();
            $destinationPath    = config( 'orm.upload_path' ) . self::UPLOAD_DIR;
            if ( $image->move( $destinationPath, $rename ) )
            {
                $input['image_1300:' . $locale ]    = self::UPLOAD_DIR . DIRECTORY_SEPARATOR . $rename;
            }
        }

        if ( $request->hasFile( 'item.image_800:' . $locale ) )
        {
            $image              = $request->file( 'item.image_800:' . $locale );
            $rename             = md5( time() ) . '_800.' . $image->getClientOriginalExtension();
            $destinationPath    = config( 'orm.upload_path' ) . self::UPLOAD_DIR;
            if ( $image->move( $destinationPath, $rename ) )
            {
                $input['image_800:' . $locale ] = self::UPLOAD_DIR . DIRECTORY_SEPARATOR . $rename;
            }
        }

        if ( $request->hasFile( 'item.image_500:' . $locale ) )
        {
            $image              = $request->file( 'item.image_500:' . $locale );
            $rename             = md5( time() ) . '_500.' . $image->getClientOriginalExtension();
            $destinationPath    = config( 'orm.upload_path' ) . self::UPLOAD_DIR;
            if ( $image->move( $destinationPath, $rename ) )
            {
                $input['image_500:' . $locale ] = self::UPLOAD_DIR . DIRECTORY_SEPARATOR . $rename;
            }
        }
    }

    protected function postDelete( Model $entity )
    {
        @unlink( public_path( config( 'orm.upload_path' ) .  $entity->image ) );
        @unlink( public_path( config( 'orm.upload_path' ) .  $entity->image_1300 ) );
        @unlink( public_path( config( 'orm.upload_path' ) .  $entity->image_800 ) );
        @unlink( public_path( config( 'orm.upload_path' ) .  $entity->image_500 ) );
    }
}
