@extends('layouts.admin.app')

@section('content')
    <div>
        <div class="d-flex d-none justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Employees</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <a href="{{route('employees.create')}}" class="btn btn-sm btn-outline-secondary">Add New</a>
                </div>
            </div>
        </div>
        @include('layouts.partials.flash.success')
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>#ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Company</th>
                    <th>Phone No</th>
                    <th>Action</th>
                </tr>
                </thead>
                @forelse($employees as $employee)
                    <tbody>
                    <tr>
                        <td>{{$employee->id}}</td>
                        <td>{{$employee->firstname}}</td>
                        <td>{{$employee->lastname}}</td>
                        <td>{{$employee->email}}</td>
                        <td>{{$employee->company->name}}</td>
                        <td>{{$employee->phone}}</td>
                        <td>

                            <span class="px-2"> <a href="{{ route('employees.edit',$employee->id)}}"> <i class="fa fa-pencil"> </i> Edit</a> </span>

                            <form action="{{ route('employees.destroy', $employee->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                            </form>

                        </td>
                    </tr>
                    </tbody>
                @empty
                    <center><p>No employee records were found</p></center>
                @endforelse
            </table>
            {{$employees->links()}}
        </div>
    </div>

@stop
