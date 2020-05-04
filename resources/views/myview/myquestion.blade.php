@extends('layouts.cardlayout')

@section('card-header','My Question')
@section('content')
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    @forelse ($allquestion as $question)
        <p>
            <a href="{{ route('question.show',['question' => $question->id]) }}">{{ $question->qs }} <span class="text-secondary">({{ $question->comments->count() }}) comments</span></a>
        </p>
    @empty
        <p class="text-secodary"> I Am Not Asking Qeustion Yet...</p>
    @endforelse
@endsection
