
<form method="post" enctype="multipart/form-data" action="{{ route('companies.update', $company->id) }}">
    @method('PATCH')
    {{csrf_field()}}
    <div class="form-row my-3">
        <div class="col">
            <label>Name of Company</label>
            <input type="text" name="name" class="form-control form-control-sm" value="{{$company->name}}" />
        </div>
        <div class="col">
            <label>Email Address</label>
            <input type="email" name="email" class="form-control form-control-sm"  value="{{$company->email}}" />
        </div>
        <div class="col">
            <label>Company Logo</label>
            <input type="file" name="logo" class="form-control form-control-sm"  value="{{$company->logo}}" />
        </div>
        <div class="col">
            <label>Website</label>
            <input type="url" name="website" class="form-control form-control-sm"  value="{{$company->website}}" />
        </div>

    </div>
    <div class="form-row mt-3">
        <div class="form-group">
            <button type="submit" class="btn btn-sm btn-success px-4"> Save </button>
        </div>
    </div>
</form>
