@extends('layouts.cardlayout')

@section('content')
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    
    <form method="post" action="{{ route('question.create') }}">
        @csrf
        <div class="form-group">
            <label for="question">Question</label>
            <input id="question" class="form-control" type="text" name="qs" value="{{ old('qs') }}" placeholder="Enter your question here">
        </div>

        <div class="form-group">
            <label for="">Details</label>
            <textarea name="details" id="details" cols="30" rows="5" class="form-control">{{ old('details') }}</textarea>
        </div>

        <div class="form-group">
            <input type="submit" value="Sunmit" class="btn btn-primary">
        </div>
    </form>
@endsection
