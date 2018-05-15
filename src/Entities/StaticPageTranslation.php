<?php

namespace IA\LaravelCms\Entities;

use Illuminate\Database\Eloquent\Model;

class StaticPageTranslation extends Model
{

    public $timestamps  = false;

    protected $table    = 'cms_static_pages_translations';

    protected $fillable = ['title', 'sub_title', 'body', 'tags'];
}
