@extends('backoffice.layouts.master')

@section('page-title')
    @include("backoffice.layouts.common.page-title", ["pagetitle" => "Dashboard", "title" => "User Management"])
@endsection


@section('content')
<div class="container">
    <!-- Search Input -->
<div class="d-flex gap-4">
<select id="userTypeFilter" class="form-select h-100" style="width: 200px;">
            <option value="all">All Types</option>
            <option value="admin" {{ request('type') == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="agent" {{ request('type') == 'agent' ? 'selected' : '' }}>Dispatcher</option>
            <option value="user" {{ request('type') == 'user' ? 'selected' : '' }}>User</option>
        </select>
    <input type="text" id="search" placeholder="Search by name" class="form-control mb-3">
</div>
    <!-- Users Table -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        
        <tbody id="user-table">
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->mobile }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <button class="btn btn-primary btn-sm edit-btn" data-id="{{ $user->id }}">Edit</button>
                        <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $user->id }}">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
      <!-- Create Button -->
      <button class="btn btn-primary mb-3" onclick="openCreateModal()">Create New User</button>
</div>
<!-- Edit User Modal -->
<div id="editModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="editUserForm">
                <div class="modal-header">
                    <h5 class="modal-title">Edit User</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit-user-id">
                    <div class="form-group">
                        <label for="edit-name">Name</label>
                        <input type="text" id="edit-name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="edit-email">Email</label>
                        <input type="email" id="edit-email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="edit-mobile">Mobile</label>
                        <input type="text" id="edit-mobile" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="edit-role">Role</label>
                        <select id="edit-role" class="form-control">
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit-password">Password</label>
                        <input type="password" id="edit-password" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- User Creation Modal -->
<div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createUserModalLabel">Create New User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- User Creation Form -->
                <form id="createUserForm">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile</label>
                        <input type="text" class="form-control" id="mobile" name="mobile" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-control" id="role" name="role" required>
                            <option value="admin">Admin</option>
                            <option value="agent">Agent</option>
                            <option value="user">User</option>
                        </select>
                    </div>                    
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submitUserFormButton">Save User</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function () {
         // User Type Filter
        $('#userTypeFilter').on('change', function() {
            const selectedType = $(this).val();
            const url = new URL(window.location.href);
            if (selectedType) {
                url.searchParams.set('type', selectedType);
            } else {
                url.searchParams.delete('type');
            }
            window.location.href = url.toString();
        });
        // Search functionality (filter users)
        $('#search').on('keyup', function () {
            const query = $(this).val().toLowerCase();
            $("#user-table tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(query) > -1)
            });
        });
        // Edit button click event
        $(document).on('click', '.edit-btn', function () {
            const id = $(this).data('id');
            axios.get(`/users/${id}`).then(response => {
                const user = response.data;
                $('#edit-user-id').val(user.id);
                $('#edit-name').val(user.name);
                $('#edit-email').val(user.email);
                $('#edit-mobile').val(user.mobile);
                $('#edit-role').val(user.role);
                $('#editModal').modal('show');
            });
        });
        // Save edited user
        $('#editUserForm').on('submit', function (e) {
            e.preventDefault();
            const id = $('#edit-user-id').val();
            axios.put(`/users/${id}`, {
                name: $('#edit-name').val(),
                email: $('#edit-email').val(),
                mobile: $('#edit-mobile').val(),
                role: $('#edit-role').val(),
                password: $('#edit-password').val() 
            }).then(response => {
                $('#editModal').modal('hide');
                Notiflix.Notify.Success('User Updated successfully!');
            }).catch(error => {
                console.error(error);
            });
        });
        // Delete button click event
        $(document).on('click', '.delete-btn', function () {
            const id = $(this).data('id');
            if (confirm('Are you sure you want to delete this user?')) {
                axios.delete(`/users/${id}`).then(response => {
                    location.reload();
                }).catch(error => {
                    console.error(error);
                });
            }
        });
    });
    function openCreateModal() {
        $('#createUserModal').modal('show');
    }
    // Handle form submission
    $('#submitUserFormButton').on('click', function() {
        // Collect form data
        const formData = {
            name: $('#name').val(),
            email: $('#email').val(),
            mobile: $('#mobile').val(),
            role: $('#role').val(),
            password: $('#password').val(),
            password_confirmation: $('#password_confirmation').val(),
        };
        axios.post("{{ route('users.store') }}", formData)
            .then(response => {
                Notiflix.Notify.Success('User created successfully!');
                $('#createUserModal').modal('hide'); 
                $('#createUserForm')[0].reset(); 
            })
            .catch(error => {
                if (error.response && error.response.data.errors) {
                    for (let key in error.response.data.errors) {
                        Notiflix.Notify.Failure(error.response.data.errors[key][0]);
                    }
                } else {
                    Notiflix.Notify.Failure('Failed to create user. Please try again.');
                }
            });
    });
</script>
@endsection




