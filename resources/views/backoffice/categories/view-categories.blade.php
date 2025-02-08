@extends('backoffice.layouts.master')

@section('page-title')
@include("backoffice.layouts.common.page-title", ["pagetitle" => "Dashboard", "title" => "Categories"])
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-body p-4">

                <div class="row">
                        @foreach($categories as $category)
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="row g-0 align-items-center">
                                        <div class="col-md-4">
                                            <img class="card-img img-fluid" src="{{ $category->image }}" alt="Card image">
                                        </div>
                                        <div class="col-md-5">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $category->name }}</h5>
                                                <p class="card-text">{{ $category->vehicle_count }} Vehicles in the Fleet.</p>
                                                <p class="card-text">Slug: {{ $category->slug }}</p>
                                                <!-- Additional information if needed -->
                                            </div>
                                        </div>
                                        <div class="col-md-3 text-center">
                                        <a href="{{url('admin/edit-categories/'.$category->id)}}" type="button" class="btn btn-success waves-effect waves-light">
                                            <i class="mdi mdi-pencil font-size-16"></i> Edit
                                        </a>
                                            <hr style="transform: translate(50%, -50%);" class="w-50">
                                            <button type="button" class="btn btn-danger waves-effect waves-light" onclick="confirmDelete({{ $category->id }}, '{{ csrf_token() }}')">
                                                <i class="mdi mdi-trash-can font-size-16"></i> Delete
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                </div>
                <!-- end row -->


            </div>
        </div>
    </div> <!-- end col -->
</div>
@endsection

@section('scripts')
<script>

    function confirmDelete(categoryId, token) {
        Notiflix.Confirm.Show(
            'Confirmation',
            'Are you sure you want to delete this category?',
            'Yes, Delete',
            'Cancel',
            function(){
                // Delete category with categoryId
                console.log('Delete Category Id:', categoryId);
                console.log('CSRF Token:', token);
                
                // Make AJAX call to delete category
                $.ajax({
                    url: '{{url('admin/delete-categories-data')}}', // Replace with your actual delete route
                    type: 'POST',
                    data: {
                        _token: token,
                        category_id: categoryId
                    },
                    beforeSend: function() {
                    Notiflix.Loading.Pulse();
                    },
                    complete: function() {
                        Notiflix.Loading.Remove();
                    },
                    success: function(response) {
                        // Handle success response from server
                        if(response.status=="SUCCESS"){
                            Notiflix.Notify.Success('Deleted Successfully');
                            window.location.reload();
                        }
                        else{
                            Notiflix.Report.Failure('Error', 'Delete failed!', 'Try Again');
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle error response from server
                        Notiflix.Report.Failure('Error', 'Delete failed!', 'Try Again');
                    }
                });
            },
            function(){
                // Cancel deletion
                console.log('Deletion Canceled');
            }
        );
    }
    
</script>
@endsection