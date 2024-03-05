<div>
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="localeModalLabel">Add Locale</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            <div class="mt-4">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="code">Code</label>
                                <input type="text" wire:model="code" placeholder="ex: uz" class="form-control"
                                    id="code">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="name">Name</label>
                                <input type="text" wire:model="name" class="form-control" id="name">
                            </div>
                        </div>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" wire:model="is_published" class="form-check-input" id="is_published">
                        <label class="form-check-label" for="is_published">Is Published</label>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
            <button type="button" wire:click="store" class="btn btn-primary waves-effect waves-light"
                data-bs-dismiss="modal">Save</button>
        </div>
    </div>
</div>
