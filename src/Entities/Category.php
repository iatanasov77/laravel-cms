<?php

namespace IA\Laravel\Modules\Cms\Entities;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Phoenix\EloquentMeta\MetaTrait;
use Rutorika\Sortable\SortableTrait;

class Category extends Model
{
    use Sluggable;
    use MetaTrait;
    use SortableTrait;

    protected $table    = 'cms_categories';
    protected $fillable = ['parent_id', 'name', 'description'];

    public function pages()
    {
        return $this->hasMany( 'IA\Laravel\Modules\Cms\Entities\StaticPage' );
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
                'source' => 'name'
            ]
        ];
    }
}
