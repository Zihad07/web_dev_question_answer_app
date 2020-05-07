<?php

namespace App\Http\Controllers;

use App\Question;
use App\QuestionLikeUnlike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionLikeUnlikeController extends Controller
{




    public function userQuestionCreate($qsId) {
        $user = Auth::user();
        $userexit = QuestionLikeUnlike::where('user_id',$user->id)->where('question_id', $qsId)->get();

        if($userexit->count() == 0) {
            $newuser = new QuestionLikeUnlike();
            $newuser->user_id = $user->id;
            $newuser->question_id = $qsId;
            $newuser->save();
        }
    }
    public function like(Question $question) {

        $user = Auth::user();
        $this->userQuestionCreate($question->id);
        $userql = QuestionLikeUnlike::where('user_id',$user->id)->where('question_id', $question->id)->get();
        // return $userql[0]->id;

        $userlike = QuestionLikeUnlike::find($userql[0]->id);
        // return $userlike;
        // $likeControl = QuestionLikeUnlike::find($use)
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
        // return redirect()->back();
        $like = QuestionLikeUnlike::where('like',1)->where('question_id',$question->id)->get()->count();
        return $like;

    }

    public function unlike(Question $question) {
        $user = Auth::user();
        $this->userQuestionCreate($question->id);
        $userql = QuestionLikeUnlike::where('user_id',$user->id)->where('question_id', $question->id)->get();
        // return $userql[0]->id;

        $userUnlike = QuestionLikeUnlike::find($userql[0]->id);
        // return $userlike;
        // $likeControl = QuestionLikeUnlike::find($use)
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
        // return redirect()->back();
        $unlike = QuestionLikeUnlike::where('unlike',1)->where('question_id',$question->id)->get()->count();
        return $unlike;
    }

    public function refreshLike(Question $question) {
        $like = QuestionLikeUnlike::where('like',1)->where('question_id',$question->id)->get()->count();
        return $like;

    }
    public function refreshUnike(Question $question) {
        $unlike = QuestionLikeUnlike::where('unlike',1)->where('question_id',$question->id)->get()->count();

        return $unlike;

    }
}
