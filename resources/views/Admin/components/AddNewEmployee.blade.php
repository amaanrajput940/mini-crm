
<form method="post" enctype="multipart/form-data" action="{{route('employees.store')}}">
    {{csrf_field()}}
    <div class="form-row my-3">
        <div class="col">
            <label>FirstName</label>
            <input type="text" name="firstname" class="form-control form-control-sm" />
        </div>
        <div class="col">
            <label>LastName</label>
            <input type="text" name="lastname" class="form-control form-control-sm"  />
        </div>
        <div class="col">
            <label>Email Address</label>
            <input type="email" name="email" class="form-control form-control-sm" />
        </div>
        <div class="col">
            <label>Select Company</label>
            <select class="selectpicker" name="company" data-live-search="true" title="Choose one of the company">
                @foreach($companies as $company)
                <option value="{{$company->id}}">{{$company->name}}</option>
                    @endforeach
            </select>

        </div>
        <div class="col">
            <label>Phone No</label>
            <input type="tel" name="phone" class="form-control form-control-sm" />
        </div>

    </div>
    <div class="form-row mt-3">
        <div class="form-group">
            <button type="submit" class="btn btn-sm btn-success px-4"> Add </button>
        </div>
    </div>
</form>
