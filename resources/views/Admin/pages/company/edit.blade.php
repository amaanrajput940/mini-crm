@extends('layouts.admin.app')

@section('content')
    <div>

        <div class="d-flex d-none justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Company</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <a href="{{route('companies.index')}}" class="btn btn-sm btn-outline-secondary">All Companies</a>
                </div>
            </div>
        </div>


        <div class="">
            @include('layouts.partials.flash.success')
            @include('layouts.partials.flash.error')
            @include('Admin.components.EditCompany')
        </div>


    </div>

@stop
