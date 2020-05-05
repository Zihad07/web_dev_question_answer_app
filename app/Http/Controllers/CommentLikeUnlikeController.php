<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\CommentLikeUnlike;
use App\Comment;
use App\Question;

class CommentLikeUnlikeController extends Controller
{
    public function userCommentCreate($qsId, $commentID) {
        $user = Auth::user();
        $userexit = CommentLikeUnlike::where('user_id',$user->id)->where('comment_id', $commentID)->get();

        if($userexit->count() == 0) {
            $newuser = new CommentLikeUnlike();
            $newuser->user_id = $user->id;
            $newuser->comment_id = $commentID;
            $newuser->question_id = $qsId;
            $newuser->save();
        }
    }
    public function like(Question $question,Comment $comment) {
        $user = Auth::user();
        $this->userCommentCreate($question->id,$comment->id);
        $userql = CommentLikeUnlike::where('user_id',$user->id)->where('comment_id', $comment->id)->get();
        // return $userql[0]->id;

        $userlike = CommentLikeUnlike::find($userql[0]->id);
        // return $userlike;
        // $likeControl = CommentLikeUnlike::find($use)
        if($userlike->like == 0) {
            if($userlike->unlike = 1) {
                $userlike->unlike = 0;
            }
            $userlike->like = 1;
        } elseif($userlike->like == 1) {
            $userlike->like = 0;
        }

        $userlike->save();

        // return $userlike;
        return redirect()->back();
        
    }

    public function unlike(Question $question,Comment $comment) {
        $user = Auth::user();
        $this->userCommentCreate($question->id,$comment->id);
        $userql = CommentLikeUnlike::where('user_id',$user->id)->where('comment_id', $comment->id)->get();
        // return $userql[0]->id;

        $userUnlike = CommentLikeUnlike::find($userql[0]->id);
        // return $userlike;
        // $likeControl = CommentLikeUnlike::find($use)
        if($userUnlike->unlike == 0) {
            if($userUnlike->like = 1) {
                $userUnlike->like = 0;
            }
            $userUnlike->unlike = 1;
        } elseif($userUnlike->unlike == 1) {
            $userUnlike->unlike = 0;
        }

        $userUnlike->save();

        // return $userUnlike;
        return redirect()->back();
    }
}
