<div class="col-lg-12">
    <div class="card">
        <h5 class="card-header d-flex justify-content-between align-items-center">

            Albums List
            <div class="col-6">
                <input type="text" class="form-control float-end" id="search-albums" style="width: 50%;"
                    placeholder="Search...">
            </div>

        </h5>
        <div class="card-body">
            {{-- List --}}
            <table id="album-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="col-4">Artist</th>
                        <th class="col-6">Name</th>
                        <th class="col-2">Release Date</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                </tbody>
            </table>
        </div>
      </div>
</div>
