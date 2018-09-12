<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function getUserAtrribute(){
        $user = User::find($this->user_id);
        return $this->atrributes['user'] = $user;
    }
    protected $appends = ['user'];
}
