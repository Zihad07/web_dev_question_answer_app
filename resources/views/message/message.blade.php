@if(session('success'))
    <div class="alert alert-success" role="alert">
        <strong>{{ session('success') }}</strong>
    </div>
@endif

@if($errors->any())
    @foreach ($errors->all() as $error )
        <div class="alert alert-danger" role="alert">
            <strong>{{ $error }}</strong>
        </div>
    @endforeach
@endif