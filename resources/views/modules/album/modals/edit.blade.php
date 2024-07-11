<!-- Modal -->
<div class="modal fade" id="edit-album-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Album</h5>
            </div>

            <form id="edit-album-form" enctype="multipart/form-data">
                <div class="modal-body">
                    <input hidden type="hidden" class="d-none" id="album-id" name="album_id">

                    <div class="form-group mb-3">
                        <select class="form-control" id="edit-artist-selector" name="artist" required>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="name">Album Name</label>
                        <input type="text" class="form-control" id="edit-name" name="name"
                            placeholder="Enter..." required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="edit-sales-data">Sales 2022</label>
                        <input type="number" class="form-control" id="edit-sales-data" name="sales_data"
                            placeholder="Enter..." required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="release-date">Release Date</label>
                        <input type="date" class="form-control" id="edit-release-date" name="release_date" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="last-date">Last Update</label>
                        <input type="date" class="form-control" id="edit-last-date" name="last_date" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="cover">Cover Image</label><br>
                        <input type="file" class="form-control-file" id="edit-cover" name="cover">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

            </form>
        </div>
    </div>
</div>
