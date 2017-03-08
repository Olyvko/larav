<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    protected $primaryKey = 'id';
    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = ['descr', 'name'];
    protected $guarded = ['*']; //заборона на поля для запису

    public function photo(){
        return $this->hasOne('App\Photo', 'article_id', 'id'); //article id
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
    // many to one, if many to many - belongsToMany(
}
