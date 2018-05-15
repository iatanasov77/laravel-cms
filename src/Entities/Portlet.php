<?php

namespace IA\Laravel\Modules\Cms\Entities;

use Dimsav\Translatable\Translatable;
use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Model;

class Portlet extends Model
{
    use Translatable;
    use Sluggable;

    public $translatedAttributes    = ['title', 'description'];

    protected $table                = 'cms_portlets';

    protected $fillable             = ['slug', 'image'];

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
