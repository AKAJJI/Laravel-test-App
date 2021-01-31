<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Post extends Model
{
    //

    public function category(){
        return $this->belongsTo('App\Category');
    }


    protected $fillable=['title','slug','content','online','category_id','tags_list'];

    // public static $rules =[
    //     'title'=> 'required|min:5',
    //     'content' => 'required|min:10'
    // ];

    public function scopePublished($query){
        return $query->where('online',1)->whereRaw('created_at < NOW()');
        // Or return $query->where('online',1)->where('created_at','<',DB::raw('NOW()'));
    }

    public function scopeSearchByTitle($query,$q){
        return $query->where('title','LIKE','%'.$q.'%');
    }
    public function getTitleAttribute($value){ //cette fonction des qu'une requete retourne le champs titre elle le change de la facondont on veut (strtoupper,ucfirst,strtolower)
        return strtoupper($value);
        // return strtolower($value);
        // return ucfirst($value);

    }

    public function setTitleAttribute($value){ // cette methode stocke la valeur qu on a saisit en majuscule dans notre BD peux importe la facon dont on l'a saisi(minuscule,majuscule,AzErTy)
        $this->attributes['title'] = strtoupper($value);
    }

    public function setSlugAttribute($value){
        if(empty($value)){
            $this->attributes['slug'] = Str::slug($this->title);
        }
    }

    public function getDates(){
        return ['created_at','updated_at','published_at'];
    }

    // public function getRouteKey()
    // {
    //   return $this->slug;
    // }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function getTagsListAttribute(){

        if($this->id){
          return  $this->tags->pluck('id')->toArray();
        }
    }

    public function setTagsListAttribute($value){
        // dd($value);
        return $this->tags()->sync($value);

    }


}
