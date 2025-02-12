<div class="modal fade" id="assignFoodModal" tabindex="-1" aria-labelledby="assignFoodModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="assignFoodModalLabel">Assign Foods to Animal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="assignFoodForm">
                    @csrf
                    <div class="mb-3">
                        <label for="assign-animal" class="form-label">Select Animal</label>
                        <select id="assign-animal" class="form-control">
                            @foreach($animals as $animal)
                                <option value="{{ $animal->id }}">{{ $animal->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="assign-foods" class="form-label">Select Foods</label>
                        <select id="assign-foods" class="form-control" multiple>
                            @foreach($foods as $food)
                                <option value="{{ $food->id }}">{{ $food->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveAssignFood">Assign Foods</button>
            </div>
        </div>
    </div>
</div>
