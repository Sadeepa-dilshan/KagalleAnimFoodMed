<div class="modal fade" id="addFoodModal" tabindex="-1" aria-labelledby="addFoodModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addFoodModalLabel">Add New Food</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addFoodForm">
                    @csrf
                    <div class="mb-3">
                        <label for="add-food-name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="add-food-name" required>
                    </div>
                    <div class="mb-3">
                        <label for="add-food-category" class="form-label">Category</label>
                        <select id="add-food-category" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }} ({{ $category->species }})</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveNewFood">Add Food</button>
            </div>
        </div>
    </div>
</div>
