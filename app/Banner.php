<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Banner  extends Model
{

    protected $table = 'banners';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'banner','descricao', 'link', 'ordem'
    ];


}
