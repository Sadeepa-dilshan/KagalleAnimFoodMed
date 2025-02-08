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
                                        <h4 class="card-title">Table Edit</h4>
                                        <p class="card-title-desc">Table Edits is a lightweight jQuery plugin for making table rows editable.</p>
                                    </div>
                                    <div class="card-body">
        
                                        <div class="table-responsive">
                                            <table class="table table-nowrap align-middle table-edits">
                                                <thead>
                                                    <tr style="cursor: pointer;">
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Description</th>
                                                        <th>Price</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                               <tbody>
                                                   @foreach($addons as $addon)
                                                   <tr data-id="{{ $addon->id }}" style="cursor: pointer;">
                                                       <td>{{ $addon->id }}</td>
                                                       <td><input type="text" name="name" value="{{ $addon->name }}"></td>
                                                       <td><input type="text" name="description" value="{{ $addon->description }}"></td>
                                                       <td><input type="text" name="price" value="{{ $addon->price }}"></td>
                                                       <td>
                                                         <a class="btn btn-outline-secondary btn-sm edit" title="Edit" onclick="editAddon('{{ $addon->id }}' , '{{ csrf_token() }}')">
                                                             <i class="fas fa-pencil-alt"></i>
                                                         </a>
                                                         
                                                         <a class="btn btn-outline-danger btn-sm delete" title="Delete" onclick="deleteAddon('{{ $addon->id }}' , '{{ csrf_token() }}')">
                                                             <i class="fas fa-trash-alt"></i>
                                                         </a>
                                                       </td>
                                                   </tr>
                                                   @endforeach
                                               </tbody>
                                               
                                               
                                               
                                                </table>
                                        </div>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
    </div>
@endsection

@section('scripts')
<script>
    function editAddon(id, _token) {
        const row = event.target.closest('tr');
        const name = row.querySelector('input[name="name"]').value;
        const description = row.querySelector('input[name="description"]').value;
        const price = row.querySelector('input[name="price"]').value;

        $.ajax({
            url: '/admin/update-addons-data', // Update the URL endpoint for updating addon data
            type: 'POST',
            data: {
                id: id,
                name: name,
                description: description,
                price: price,
                _token: _token
            },
            beforeSend: function() {
                        Notiflix.Loading.Pulse('Sending...');
            },
            success: function (response) {
                Notiflix.Loading.Remove();
                if(response.status=="SUCCESS"){
                    Notiflix.Notify.Success('Edited Successfully');
                }
                else{
                    Notiflix.Report.Failure('Error', 'Edit failed!', 'Try Again');
                }
            },
            error: function (xhr, status, error) {
                Notiflix.Loading.Remove();
                Notiflix.Report.Failure('Error', 'Edit failed!', 'Try Again');
            }
        });
    }


   function deleteAddon(id, _token) {
       // Ask for confirmation using Notiflix
       Notiflix.Confirm.Show(
           'Confirmation', 'Are you sure you want to delete this addon?', 
           'Yes', 'No', 
           function () {
               // Show loading animation before sending the request
               Notiflix.Loading.Pulse('Sending...');
   
               $.ajax({
                url: '{{ url('admin/delete-addons-data') }}',
                   type: 'DELETE',
                   data: {
                       id: id,
                       _token: _token
                   },
                   beforeSend: function() {
                       // Show loading animation before sending the request
                       Notiflix.Loading.Pulse('Sending...');
                   },
                   success: function (response) {
                       // Handle the response from the server after successful deletion
                       if (response.status == "SUCCESS") {
                           Notiflix.Notify.Success('Deleted Successfully');
                       } else {
                           Notiflix.Report.Failure('Error', 'Deletion failed!', 'Try Again');
                       }
                   },
                   error: function (xhr, status, error) {
                       // Handle any errors that occur during the request
                       Notiflix.Report.Failure('Error', 'An error occurred while deleting', 'OK');
                   },
                   complete: function() {
                       // Remove loading animation once the request is complete
                       Notiflix.Loading.Remove();
                   }
               });
           },
           function () {
               // If user cancels deletion, do nothing or provide optional callback
           }
       );
   }
   
    

</script>
@endsection