<div class="modal fade" id="addAnimalModal" tabindex="-1" aria-labelledby="addAnimalModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAnimalModalLabel">Add New Animal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addAnimalForm">
                    @csrf
                    <div class="mb-3">
                        <label for="add-name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="add-name" required>
                    </div>
                    <div class="mb-3">
                        <label for="add-species" class="form-label">Species</label>
                        <input type="text" class="form-control" id="add-species" required>
                    </div>
                    <div class="mb-3">
                        <label for="add-breed" class="form-label">Breed</label>
                        <input type="text" class="form-control" id="add-breed">
                    </div>
                    <div class="mb-3">
                        <label for="add-age-group" class="form-label">Age Group</label>
                        <select id="add-age-group" class="form-control">
                            <option value="">All</option>
                            <option value="Puppy">Puppy</option>
                            <option value="Adult">Adult</option>
                            <option value="Senior">Senior</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="saveNewAnimal">Add Animal</button>
            </div>
        </div>
    </div>
</div>
