@extends('layouts.cardlayout')
@section('card-header','Question Details')

@section('content')
    {{-- Question details   --}}
    <h4>{{ $question->qs }}</h4>
    @if(strlen($question->details) > 0)
        <p>{{ $question->details }}</p>
    @endif

    <div class="text-secodary">
        posted by <span class="font-weight-bold">{{ $question->user->name }}</>
        <span class="separator">|</span>
        {{ $question->created_at->diffForHumans() }}
        {{-- <span class="separator">|</span>
        <a href="{{ route('question.like',$question->id) }}">
            Like
        </a>({{ $qlike }})
        <span class="separator">|</span>
        <a href="{{ route('question.unlike', $question->id) }}">
            Unlike
        </a>({{ $qunlike }}) --}}
{{--        <span class="separator">|</span>--}}
{{--        <question-like :question="{{ $question->id }}"></question-like>--}}
{{--        <span class="separator">|</span>--}}
{{--        <question-unlike :question="{{ $question->id }}"></question-unlike>--}}
        <question-like-unlike :question="{{ $question->id }}" :like="{{$qlike}}" :unlike="{{$qunlike}}"></question-like-unlike>
    </div>
    <hr>

    @if(Auth::check())

        @foreach ($comments as $comment)
            <p>{{ $comment->comment }}</p>
            {{ $comment->user->name }}
            <span class="separator">|</span>
            {{ $comment->created_at->diffForHumans() }}
{{--            <span class="separator">|</span>--}}
{{--            <a href="{{ route('comment.like',['question'=>$question->id,'comment' => $comment->id]) }}">--}}
{{--                Like--}}
{{--            </a>({{ $comment->likes->count() }})--}}
{{--            <span class="separator">|</span>--}}
{{--            <a href="{{ route('comment.unlike',['question'=>$question->id,'comment' => $comment->id]) }}">--}}
{{--                Unlike--}}
{{--            </a>({{ $comment->unlikes->count() }})--}}

            <comment-like-unlike :question="{{$question->id}}" :comment="{{$comment->id}}"></comment-like-unlike>
            <hr>
        @endforeach

        {{--  comment section post  --}}
        <form method="post" action="{{ route('comment.store',['question'=>$question->id]) }}">
                @csrf
                <div class="form-group">
                    <textarea name="comment" id="comment" cols="30" rows="5" class="form-control">{{ old('comment') }}</textarea>
                </div>

                <div class="form-group">
                    <input type="submit" value="New comment" class="btn btn-success btn-sm">
                </div>
        </form>
    @else
        <a href="{{ route('login') }}">Login to anser this question</a>
    @endif
@endsection
