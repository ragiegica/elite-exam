<!-- Modal -->
<div class="modal fade" id="edit-artist-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Artist</h5>
            </div>

            <form id="edit-artist-form">
                <div class="modal-body">
                    <input hidden type="hidden" class="d-none" id="artist-id" name="artist_id">

                    <div class="form-group mb-3">
                        <label for="edit-code">Code</label>
                        <input type="text" class="form-control" id="edit-code" name="code"
                            placeholder="Enter..." required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="name">Artist Name</label>
                        <input type="text" class="form-control" id="edit-name" name="name"
                            placeholder="Enter..." required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

            </form>
        </div>
    </div>
</div>
