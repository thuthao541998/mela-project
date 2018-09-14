<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    public $timestamps = true;
    public function getUserCommentAttribute(){
        $user_comment = User::find($this->user_id);
        return $this->attributes['userComment']=$user_comment->name;
    }
    public function getUserFirstCharAttribute(){
        $user_comment = User::find($this->user_id);
        $name = $user_comment->name;
        return $this->attributes['userFirstChar'] = substr($name, 0, 1);
    }

    protected $appends = ['user_comment','user_first_char'];
}
