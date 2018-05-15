<?php

namespace Modules\CMS\Entities;

use Dimsav\Translatable\Translatable;
use Cviebrock\EloquentSluggable\Sluggable;
use Phoenix\EloquentMeta\MetaTrait;
use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{
    use Translatable;
    use Sluggable;
    use MetaTrait;

    const PROMOTIONS_CATEGORY_ID    = 4;

    protected $table                = 'cms_static_pages';

    protected $fillable             = ['category_id', 'slug', 'image'];

    public $translatedAttributes    = ['title', 'sub_title', 'body', 'tags'];

    public static function promotions( $columns = ['*'] )
    {
        return ( new static )->newQuery()->where( 'category_id', self::PROMOTIONS_CATEGORY_ID );
    }

    public function category()
    {
        return $this->belongsTo( '\Modules\CMS\Entities\Category' );
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
