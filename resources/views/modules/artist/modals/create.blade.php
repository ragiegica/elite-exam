<!-- Modal -->
<div class="modal fade" id="add-artist-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New artist</h5>
            </div>

            <form id="add-artist-form">
                <div class="modal-body">

                    <div class="form-group mb-3">
                        <label for="code">Code</label>
                        <input type="text" class="form-control" id="code" name="code"
                            placeholder="Enter..." required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="name">Artist Name</label>
                        <input type="text" class="form-control" id="name" name="name"
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
