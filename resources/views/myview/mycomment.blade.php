@extends('layouts.cardlayout')
@section('card-header','My Comments')

@section('content')
<div class="comment">
    @forelse ($allComments as $comment)
        <p style="font-size:20px;">
            <a href="{{ route('question.show',['question'=>$comment->question_id]) }}">
                {{ $comment->question->qs }} <span class="text-secondary">({{ $comment->question->comments->count() }}comment)</span>
            </a>
        </p>

        <div class="comment-block pl-2">
            <div class="text-secondary">
                {{ $comment->user->name }} <span>|</span> {{ $comment->created_at->diffForHumans() }}
            </div>
            <div class="mb-2">
                {{ $comment->comment }}
            </div>
        </div>
        <hr>
    @empty
        <p>You Are Not Comment Of Any Post At Yet...</p>
    @endforelse
    {{ $allComments->links() }}
</div>
@endsection
