<?php

namespace App\Http\Controllers;

use App\Comment;
use App\CommentLikeUnlike;
use App\Http\Requests\QuestionRequest;
use App\Question;
use App\QuestionLikeUnlike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $allquestion = Question::with('comments')->latest()->get();
        $allquestion = Question::with('comments')->latest()->paginate(10);
        // return $allquestion;
        return view('myview.question',compact('allquestion'));
    }

    public function myQuestion() {
        // $allquestion = Question::with('comments')->latest()->get();
        $allquestion = Auth::user()->questions()->with('comments')->latest()->paginate(5);
        // return $allquestion['id'];

        // return $allquestion;
        return view('myview.myquestion',compact('allquestion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('myview.newquestion');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
        // dd($request->all());
        $user = Auth::user();
        $user->questions()->create([
            'qs' => $request->qs,
            'details' => $request->details==null? '' : $request->details,
        ]);

        return redirect()->route('question.eachuser')->with('success', 'Your Question Created Succesully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        // $user = Auth::user();
//        $comments = $question->comments;
        $comments = Comment::where('question_id',$question->id)->latest()->paginate(2);
        $qlike = QuestionLikeUnlike::where('like',1)->where('question_id',$question->id)->get()->count();
        $qunlike = QuestionLikeUnlike::where('unlike',1)->where('question_id',$question->id)->get()->count();
        $clike = CommentLikeUnlike::where('like',1)->get()->count();
        $cunlike = CommentLikeUnlike::where('unlike',1)->get()->count();
        return view('myview.question_details',
        compact('question', 'comments', 'qlike', 'qunlike','clike','cunlike'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
