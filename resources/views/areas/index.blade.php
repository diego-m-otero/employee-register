@extends('layouts.app')

@section('title', 'Areas')

@section('content_header')
    <h1></h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Areas
                        <button data-action="create" data-route="{{ route('areas.store') }}" class="btn btn-primary btn-sm float-right btn-modal-form-areas">
                            <i class="fas fa-plus"></i> Crear
                        </button>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table_areas" class="table table-striped"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('areas.form')

    @section('scripts')
        <script src="/js/areas/datatable.js"></script>
        <script src="/js/areas/form.js"></script>
        <script src="/js/areas/destroy.js"></script>
    @stop
@endsection
