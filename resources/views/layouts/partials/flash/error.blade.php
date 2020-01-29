@if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ $error }}
    </div>
    @endforeach
@endif

@if (session()->has('error'))

        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{ session()->get('error') }}
        </div>

@endif
