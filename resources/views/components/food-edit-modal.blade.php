<div class="modal fade" id="editFoodModal" tabindex="-1" aria-labelledby="editFoodModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editFoodModalLabel">Edit Food</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editFoodForm">
                    @csrf
                    <input type="hidden" id="edit-food-id">
                    <div class="mb-3">
                        <label for="edit-food-name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="edit-food-name" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-food-category" class="form-label">Category</label>
                        <select id="edit-food-category" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="updateFood">Save Changes</button>
            </div>
        </div>
    </div>
</div>
