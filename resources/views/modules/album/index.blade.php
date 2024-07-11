@extends('layouts.app')

@section('extra-css')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-12">

                <div class="card">
                    <div class="card-header fw-bold text-uppercase">
                        Album List
                    </div>

                    <div class="card-body">

                        {{-- Search & Add New Button --}}
                        <div class="row pb-3">
                            <div class="col-6">
                                <button class="btn btn-primary float-start add-album">Add New</button>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control float-end" id="search-albums" style="width: 50%;"
                                    placeholder="Search...">
                            </div>
                        </div>

                        {{-- List --}}
                        <table id="album-table" class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="col-1">#</th>
                                    <th class="col-3">Artist</th>
                                    <th class="col-4">Name</th>
                                    <th class="col-2">Release Date</th>
                                    <th class="col-2">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('modules.album.modals.create')
    @include('modules.album.modals.edit')
    @include('modules.album.modals.view')
@endsection

@section('extra-js')
    <script>
        const albumListURL = "{{ route('album.list') }}";
        const detailAlbumURL = "{{ route('album.details', ['id' => ':id']) }}";
        const addAlbumURL = "{{ route('album.add') }}";
        const editAlbumURL = "{{ route('album.edit') }}";
        const deleteAlbumURL = "{{ route('album.delete', ['id' => ':id']) }}";
        const artistListURL = "{{ route('artist.get_all') }}";
    </script>

    <script type="text/javascript" src="{{ asset('js/album/index.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/album/add.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/album/edit.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/album/delete.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/album/view.js') }}"></script>
@endsection
