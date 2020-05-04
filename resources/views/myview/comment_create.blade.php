@extends('layouts.cardlayout')
@section('card-header','new comment')

@section('content')
<form method="post" action="{{ route('comment.create') }}">
        @csrf        
        <div class="form-group">
            <textarea name="comment" id="comment" cols="30" rows="5" class="form-control">{{ old('comment') }}</textarea>
        </div>

        <div class="form-group">
            <input type="New comment" value="Sunmit" class="btn btn-primary">
        </div>
    </form>
@endsection