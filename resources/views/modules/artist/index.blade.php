@extends('layouts.app')

@section('extra-css')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-12">

                <div class="card">
                    <div class="card-header fw-bold text-uppercase">
                        Artist List
                    </div>

                    <div class="card-body">

                        {{-- Search & Add New Button --}}
                        <div class="row pb-3">
                            <div class="col-6">
                                <button class="btn btn-primary float-start add-artist">Add New</button>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control float-end" id="search-artists" style="width: 50%;"
                                    placeholder="Search...">
                            </div>
                        </div>

                        {{-- artist List --}}
                        <table id="artist-table" class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="col-1">#</th>
                                    <th class="col-3">Code</th>
                                    <th class="col-6">Name</th>
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
    @include('modules.artist.modals.create')
    @include('modules.artist.modals.edit')
    @include('modules.artist.modals.view')
@endsection

@section('extra-js')
    <script>
        const artistListURL = "{{ route('artist.list') }}";
        const detailArtistURL = "{{ route('artist.details', ['id' => ':id']) }}";
        const addArtistURL = "{{ route('artist.add') }}";
        const editArtistURL = "{{ route('artist.edit') }}";
        const deleteArtistURL = "{{ route('artist.delete', ['id' => ':id']) }}";
    </script>

    <script type="text/javascript" src="{{ asset('js/artist/index.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/artist/add.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/artist/edit.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/artist/delete.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/artist/view.js') }}"></script>

@endsection
