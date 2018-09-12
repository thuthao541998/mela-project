<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    public $timestamps = true;
    public function getUserCommentAttribute(){
        $user_comment = User::find($this->user_id);
        return $user_comment->name;
    }
    public function getUserFirstChar(){
        $user_comment = User::find($this->user_id);
        $name = $user_comment->name;
        return substr($name, 0, 1);
    }
}
