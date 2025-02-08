<!-- resources/views/admin/dashboard.blade.php -->

@extends('backoffice.layouts.master')

@section('page-title')
    @include("backoffice.layouts.common.page-title", ["pagetitle" => "Dashboard", "title" => "Addons"])
@endsection

@section('content')
<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Addons</h4>
                    <p class="card-title-desc">Add your addons you want for any type</p>
                </div>
                <div class="card-body p-4">
                   <form id="AddAddonsForm" action="">
                    @csrf
                    <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <label for="example-text-input" class="form-label">Name</label>
                                        <input class="form-control" name="name" type="text" id="example-text-input">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="example-url-input" class="form-label">Description</label>
                                        <input class="form-control" name="description" type="url" id="example-url-input">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="example-number-input" class="form-label">Price</label>
                                        <input class="form-control" name="price" type="number" id="example-number-input">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <button type="button" id="submit-btn" class="btn btn-secondary">Submit</button>
                                        <div class="vr"></div>
                                        <button type="reset" class="btn btn-outline-danger">Reset</button>
                                    </div>
                                </div>
                            </div>
                   </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#submit-btn').on('click', function() {
                var formData = new FormData($('#AddAddonsForm')[0]);

                $.ajax({
                    url: '{{ url('/admin/add-addons-data') }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        Notiflix.Loading.Pulse('Sending...');
                    },
                    success: function(response) {
                        Notiflix.Loading.Remove();
                        if (response.status == "SUCCESS") {
                            Notiflix.Notify.Success('Addon Added Successfully');
                            window.location.reload();
                        } else {
                            Notiflix.Report.Failure('Error', 'Adding Addon failed!', 'Try Again');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        Notiflix.Loading.Remove();
                        Notiflix.Report.Failure('Error', 'Adding Addon failed!', 'Try Again');
                    }
                });
            });
        });
    </script>
@endsection
