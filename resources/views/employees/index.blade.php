@extends('layouts.app')

@section('title', 'Empleados')

@section('content_header')
    <h1></h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Empleados
                        <button data-action="create" data-route="{{ route('employees.store') }}" class="btn btn-primary btn-sm float-right btn-modal-form-employees">
                            <i class="fas fa-plus"></i> Crear
                        </button>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table_employees" class="table table-striped"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('employees.form')

    @section('scripts')
        <script src="/js/employees/datatable.js"></script>
        <script src="/js/employees/options.js"></script>
        <script src="/js/employees/form.js"></script>
        <script src="/js/employees/destroy.js"></script>
    @stop
@endsection
