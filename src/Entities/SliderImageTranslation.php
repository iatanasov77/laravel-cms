<?php

namespace Modules\CMS\Entities;

use Illuminate\Database\Eloquent\Model;

class SliderImageTranslation extends Model
{

    public $timestamps  = false;

    protected $table    = 'cms_slider_images_translations';

    protected $fillable = ['url', 'image', 'image_1300', 'image_800', 'image_500'];
}
