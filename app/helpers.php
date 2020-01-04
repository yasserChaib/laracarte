<?php

if(! function_exists('page_titre')){
    function page_titre($titre){
        $base = config('app.name')." list of artisans";

        if($titre === ''){
            return $base;
        }else{
            return $titre . ' | ' . $base;
        }
    }
}