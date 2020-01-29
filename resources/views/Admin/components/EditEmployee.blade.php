
<form method="post" enctype="multipart/form-data" action="{{route('employees.update', $employee->id)}}">
    @method('PATCH')
    {{csrf_field()}}
    <div class="form-row my-3">
        <div class="col">
            <label>FirstName</label>
            <input type="text" name="firstname" class="form-control form-control-sm" value="{{$employee->firstname}}" />
        </div>
        <div class="col">
            <label>LastName</label>
            <input type="text" name="lastname" class="form-control form-control-sm" value="{{$employee->lastname}}"  />
        </div>
        <div class="col">
            <label>Email Address</label>
            <input type="email" name="email" class="form-control form-control-sm" value="{{$employee->email}}" />
        </div>
        <div class="col">
            <label>Select Company</label>
            <select class="selectpicker" name="company" data-live-search="true" title="Choose one of the company">
                @foreach($companies as $company)
                    <option @if($employee->company_id == $company->id) selected @endif value="{{$company->id}}">{{$company->name}}</option>
                @endforeach
            </select>

        </div>
        <div class="col">
            <label>Phone No</label>
            <input type="tel" name="phone" class="form-control form-control-sm" value="{{$employee->phone}}" />
        </div>

    </div>
    <div class="form-row mt-3">
        <div class="form-group">
            <button type="submit" class="btn btn-sm btn-success px-4"> Save </button>
        </div>
    </div>
</form>
