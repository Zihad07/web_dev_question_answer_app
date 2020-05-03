@extends('layouts.cardlayout')

@section('content')
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    @foreach ($allquestion as $question)
        <p>
            <a href="">{{ $question->qs }} <span class="text-secondary">({{ $question->comments->count() }}) comments</span></a>
        </p>
    @endforeach
@endsection
