<div class="modal fade" id="editAnimalFoodModal" tabindex="-1" aria-labelledby="editAnimalFoodModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAnimalFoodModalLabel">Edit Assigned Foods</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editAnimalFoodForm">
                    @csrf
                    <input type="hidden" id="edit-animal-id">
                    
                    <div class="mb-3">
                        <label for="edit-animal-name" class="form-label">Animal</label>
                        <input type="text" class="form-control" id="edit-animal-name" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="edit-animal-foods" class="form-label">Select Foods</label>
                        <select id="edit-animal-foods" class="form-control" multiple>
                            @foreach($foods as $food)
                                <option value="{{ $food->id }}">{{ $food->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="updateAnimalFood">Save Changes</button>
            </div>
        </div>
    </div>
</div>
