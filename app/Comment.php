<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id','question_id','comment'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function question() {
        return $this->belongsTo(Question::class);
    }

    public function likes() {
        // return $this->hasMany('App\CommentLikeUnlike')->where('like',1)->get();
        return $this->hasMany('App\CommentLikeUnlike')->where('like',1);
    }
    public function unlikes() {
        // return $this->hasMany('App\CommentLikeUnlike')->where('unlike',1)->get();
        return $this->hasMany('App\CommentLikeUnlike')->where('unlike',1);
    }
}
