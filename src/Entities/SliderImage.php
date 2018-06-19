<?php

namespace IA\Laravel\Modules\Cms\Entities;

use Dimsav\Translatable\Translatable;
use Rutorika\Sortable\SortableTrait;
use Cog\Flag\Traits\Classic\HasActiveFlag;
use Illuminate\Database\Eloquent\Model;
use IA\Laravel\Core\Model\Interfaces\SortAwareInterface;
use IA\Laravel\Core\Model\Interfaces\ActivatableAwareInterface;

class SliderImage extends Model implements SortAwareInterface, ActivatableAwareInterface
{
    use Translatable;
    use SortableTrait;
    use HasActiveFlag;

    protected static $sortableField = 'order';

    protected $table                = 'cms_slider_images';

    protected $fillable             = ['date_from', 'date_to', 'order', 'is_active'];

    public $translatedAttributes    = ['url', 'image', 'image_1300', 'image_800', 'image_500'];
}
