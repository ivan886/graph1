<?php

namespace App\GraphQL\Queries;

class SiteQuery {

    public function all(){
         return \App\Site::all();
    }

    public function find($root, array $args){
        return \App\Site::find($args['id']);
    }
}
