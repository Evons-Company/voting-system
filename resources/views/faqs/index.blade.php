@extends('layouts.main')
@section('title', __('Faqs'))
@section('breadcrumb')
    <div class="col-md-12">
        <div class="page-header-title">
            <h4 class="m-b-10">{{ __('Faqs') }}</h4>
        </div>
        <ul class="breadcrumb">
            <li class="breadcrumb-item">{!! Html::link(route('home'),__('Dashboard'),['']) !!}</li>
            <li class="breadcrumb-item">{{ __('Faqs') }}</li>
        </ul>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive py-5 pb-4">
                        <div class="container-fluid">
                            {{ $dataTable->table(['width' => '100%']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('style')
    @include('layouts.includes.datatable_css')
@endpush
@push('script')
    @include('layouts.includes.datatable_js')
    {{ $dataTable->scripts() }}
    <script>
        $(function() {
            $('.add_role').on('click', function() {
                var modal = $('#common_modal');
                $.ajax({
                    type: "GET",
                    url: '{{ route('roles.create') }}',
                    data: {},
                    success: function(response) {
                        modal.find('.modal-title').html('{{ __('Create Role') }}');
                        modal.find('.body').html(response.html);
                        modal.modal('show');
                    },
                    error: function(error) {
                    }
                });
            });
            $('body').on('click', '.edit_role', function() {
                var action = $(this).data('url');
                var modal = $('#common_modal');
                $.get(action, function(response) {
                    modal.find('.modal-title').html('{{ __('Edit Role') }}');
                    modal.find('.body').html(response.html);
                    modal.modal('show');
                })
            });
        });
    </script>
@endpush
