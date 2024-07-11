@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            {{-- Page title --}}
            <div class="col-lg-12">
                <h5 class="float-start">Dashboard</h5>
            </div>

            {{-- Left Column --}}
            @include('modules.dashboard.items.leftcolumn')

            {{-- Overview --}}
            @include('modules.dashboard.items.overview')

            {{-- album list --}}
            @include('modules.dashboard.items.albumlist')

        </div>
    </div>
@endsection

@section('extra-js')
    <script>
        const overviewURL = "{{ route('dashboard.total_overview_per_artist', ['id' => ':id']) }}";
        const artistListURL = "{{ route('artist.get_all') }}";
        const topArtistURL = "{{ route('dashboard.top_one_artist') }}";
        const albumListURL = "{{ route('album.list') }}";
    </script>

    <script type="text/javascript" src="{{ asset('js/dashboard/overview.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/dashboard/leftcolumn.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/dashboard/albumlist.js') }}"></script>
@endsection
