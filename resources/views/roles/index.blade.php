@extends('layouts.app')

@section('title', 'Roles')

@section('content_header')
    <h1></h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Roles
                        <button data-action="create" data-route="{{ route('roles.store') }}" class="btn btn-primary float-right btn-modal-form-roles">
                            <i class="fas fa-plus"></i> Crear
                        </button>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table_roles" class="table table-striped"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('roles.form')

    @section('scripts')
        <script src="/js/roles/datatable.js"></script>
        <script src="/js/roles/form.js"></script>
    @stop
@endsection
