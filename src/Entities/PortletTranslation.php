<?php

namespace IA\Laravel\Modules\Cms\Entities;

use Illuminate\Database\Eloquent\Model;

class PortletTranslation extends Model
{
    public $timestamps  = false;

    protected $table    = 'cms_portlets_translations';

    protected $fillable = ['title', 'description'];
}
