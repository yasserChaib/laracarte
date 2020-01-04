<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $fillable =['respondToId','name','url','message'];
    
    //Utiliser pour charger les attribut calculer comme HumansCreatedAT
    protected $appends = ['humans_created_at']; 
    
    //Utiliser pour recuperer les commentaire chidren au moment de la charger de comments
    protected $with = ['children'];

    public function  getHumansCreatedAtAttribute(){
        return $this->created_at->diffForHumans();
    }

    public function children(){
        return $this->hasMany(comment::class , 'respondToId');
        // cette methode permet de retourner 0 1 out +eur (hasMany) comments qui son relier avec le comment parent par 
        // la column respondToId
    }      
}
