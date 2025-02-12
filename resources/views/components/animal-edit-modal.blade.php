<div class="modal fade" id="editAnimalModal" tabindex="-1" aria-labelledby="editAnimalModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAnimalModalLabel">Edit Animal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Animal Edit Form -->
                <form id="editAnimalForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit-animal-id">
                    <div class="mb-3">
                        <label for="edit-name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="edit-name" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-species" class="form-label">Species</label>
                        <input type="text" class="form-control" id="edit-species" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-breed" class="form-label">Breed</label>
                        <input type="text" class="form-control" id="edit-breed">
                    </div>
                    <div class="mb-3">
                        <label for="edit-age-group" class="form-label">Age Group</label>
                        <select id="edit-age-group" class="form-control">
                            <option value="Puppy">Puppy</option>
                            <option value="Adult">Adult</option>
                            <option value="Senior">Senior</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="saveAnimalChanges">Save Changes</button>
            </div>
        </div>
    </div>
</div>
