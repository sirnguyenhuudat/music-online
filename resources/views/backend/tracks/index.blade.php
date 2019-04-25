@extends ('backend.template')

@section ('title_page')
    {{ $title_page }}
@endsection

@section ('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">{{ $title_page }}</h2>
                            <a class="au-btn au-btn-icon au-btn--blue" href="{{ route('backend.tracks.create') }}">
                                <i class="zmdi zmdi-plus"></i>{{ trans('backend_track.label_add') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row m-t-25">
                    <div class="col-lg-12">
                        <div class="table-responsive table--no-card m-b-40">
                            @if (session('success'))
                                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                    <span class="badge badge-pill badge-success">{{ trans('backend_track.label_success') }}</span>
                                    {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                    <span class="badge badge-pill badge-danger">{{ trans('backend_track.label_error') }}</span>
                                    {{ session('error') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                            @endif
                            <table id="trackTable" class="table table-borderless table-striped table-earning">
                                <thead>
                                <tr>
                                    <th class="th-sm">#</th>
                                    <th class="th-sm">{{ trans('backend_track.td_name') }}</th>
                                    <th class="th-sm">{{ trans('backend_track.td_author') }}</th>
                                    <th class="th-sm">{{ trans('backend_track.td_artist') }}</th>
                                    <th class="th-sm">{{ trans('backend_track.td_source') }}</th>
                                    <th class="th-sm">{{ trans('backend_track.td_genre') }}</th>
                                    <th class="th-sm">{{ trans('backend_track.td_action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($tracks as $key => $track)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td><a href="javascript:void(0)" data-toggle="modal" data-target="#track_name_{{ $track->id }}">{{ $track->name }}</a></td>
                                        <td>{{ $track->author }}</td>
                                        <td>{{ $track->artist->name }}</td>
                                        <td>{{ $track->source }}</td>
                                        <td>
                                            @forelse($track->genres as $genre)
                                                {{ $genre->name }},&nbsp;
                                            @empty
                                                {{ trans('backend_track.empty_genre') }}
                                            @endforelse
                                        </td>
                                        <td>
                                            <a href="{{ route('backend.tracks.edit', $track->id) }}" class="btn btn-primary"><i class="zmdi zmdi-edit"></i></a>
                                            <a href="{{ route('backend.tracks.destroy', $track->id) }}" class="btn btn-danger" onclick="event.preventDefault();
                                                    !window.confirm('{{ trans('backend_track.alert_script', ['name' => $track->name,]) }}') ? false : document.getElementById('delete_track_{{ $track->id }}').submit();">
                                                <i class="zmdi zmdi-delete"></i>
                                            </a>
                                            <form action="{{ route('backend.tracks.destroy', $track->id) }}" method="post" id="delete_track_{{ $track->id }}">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th class="th-sm">#</th>
                                    <th class="th-sm">{{ trans('backend_track.td_name') }}</th>
                                    <th class="th-sm">{{ trans('backend_track.td_author') }}</th>
                                    <th class="th-sm">{{ trans('backend_track.td_artist') }}</th>
                                    <th class="th-sm">{{ trans('backend_track.td_source') }}</th>
                                    <th class="th-sm">{{ trans('backend_track.td_genre') }}</th>
                                    <th class="th-sm">{{ trans('backend_track.td_action') }}</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section ('style')
    <link rel="stylesheet" href="{{ asset(config('bower.css') . 'jquery.dataTables.min.css') }}">
@endsection

@section ('script')
    <script type="text/javascript" src="{{ asset(config('bower.js') . 'jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset(config('bower.js') . 'backend_script.js') }}"></script>
@endsection

