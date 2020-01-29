@extends('layouts.admin.app')

@section('content')
    <div>
        <div class="d-flex d-none justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Companies</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <a href="{{route('companies.create')}}" class="btn btn-sm btn-outline-secondary">Add New</a>
                </div>
            </div>
        </div>
        @include('layouts.partials.flash.success')
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th># ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Logo</th>
                    <th>Website</th>
                    <th>Action</th>
                </tr>
                </thead>
                @forelse($companies as $company)
                    <tbody>
                    <tr>
                        <td>{{$company->id}}</td>
                        <td>{{$company->name}}</td>
                        <td>{{$company->email}}</td>
                        <td>
                            <img @if(!$company->logo) src="https://www.pncdigital.com/wp-content/uploads/2018/01/pnclogo.png"
                                 @else src="{{asset("storage/$company->logo")}}" @endif width="120">
                        </td>
                        <td>{{$company->website}}</td>
                        <td>

                            <span class="px-2"> <a href="{{ route('companies.edit',$company->id)}}"> <i class="fa fa-pencil"> </i> Edit</a> </span>

                            <form action="{{ route('companies.destroy', $company->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                            </form>

                        </td>
                    </tr>
                    </tbody>
                @empty
                    <center><p>No company records were found</p></center>
                @endforelse
            </table>
            {{$companies->links()}}
        </div>
    </div>

@stop
