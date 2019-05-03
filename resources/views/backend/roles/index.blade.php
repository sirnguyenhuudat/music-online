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
                            <a class="au-btn au-btn-icon au-btn--blue" href="javascript:void(0)" data-toggle="modal" data-target="#modal_create">
                                <i class="zmdi zmdi-plus"></i>{{ trans('backend_role.label_add') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row m-t-25">
                    <div class="col-lg-12">
                        <div class="table-responsive table--no-card m-b-40">
                            @if (session('success'))
                                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                    <span class="badge badge-pill badge-success">{{ trans('backend_role.label_success') }}</span>
                                    {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                    <span class="badge badge-pill badge-danger">{{ trans('backend_role.label_error') }}</span>
                                    {{ session('error') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                            @endif
                            <table id="roleTable" class="table table-borderless table-striped table-earning">
                                <thead>
                                <tr>
                                    <th class="th-sm">#</th>
                                    <th class="th-sm">{{ trans('backend_role.td_role') }}</th>
                                    <th class="th-sm">{{ trans('backend_role.td_description') }}</th>
                                    <th class="th-sm">{{ trans('backend_role.td_action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($roles as $key => $role)
                                    <tr attr-num='{{ $role->id }}'>
                                        <td>{{ ++$key }}</td>
                                        <td attr-slug='1'>{{ $role->slug }}</td>
                                        <td attr-description='1'>{{ $role->description }}</td>
                                        <td>
                                            <a href="{{ route('backend.roles.edit', $role->id) }}" class="btn btn-primary update_role" data-toggle="modal" data-target="#modal_update"><i class="zmdi zmdi-edit"></i></a>
                                            <a href="{{ route('backend.roles.destroy', $role->id) }}" class="btn btn-danger" onclick="event.preventDefault();
                                                    !window.confirm('{{ trans('backend_role.alert_script', ['slug' => $role->slug,]) }}') ? false : document.getElementById('delete_role_{{ $role->id }}').submit();">
                                                <i class="zmdi zmdi-delete"></i>
                                            </a>
                                            <form action="{{ route('backend.roles.destroy', $role->id) }}" method="post" id="delete_role_{{ $role->id }}">
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
                                    <th class="th-sm">{{ trans('backend_role.td_role') }}</th>
                                    <th class="th-sm">{{ trans('backend_role.td_description') }}</th>
                                    <th class="th-sm">{{ trans('backend_role.td_action') }}</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--  Modal Create--}}
    <div class="modal fade" id="modal_create" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="modal-title" id="mediumModalLabel">{!! trans('backend_role.label_form') !!}</span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class=" form-control-label">{{ trans('backend_role.td_role') }}</label>
                            <small class="form-text text-muted" id="error_create_slug"></small>
                            <input type="text" class="form-control-success form-control" id="create_form_slug" name="name" value="" required>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">{{ trans('backend_role.td_description') }}</label>
                            <small class="form-text text-muted" id="error_create_description"></small>
                            <textarea name="info" id="create_form_description" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" id="create_submit" name="submit" class="btn btn-primary">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('backend_role.label_cancel') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{--Modal Update--}}
    <div class="modal fade" id="modal_update" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="modal-title" id="mediumModalLabel">{!! trans('backend_role.label_form_update') !!}</span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" method="put" id='form-update' enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class=" form-control-label">{{ trans('backend_role.td_role') }}</label>
                            <small class="form-text text-muted" id="error_update_slug"></small>
                            <input type="text" class="form-control-success form-control" id="update_form_slug" name="name" value="" required>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">{{ trans('backend_role.td_description') }}</label>
                            <small class="form-text text-muted" id="error_update_description"></small>
                            <textarea name="info" id="update_form_description" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" id="update_submit" name="submit" class="btn btn-primary">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('backend_role.label_cancel') }}</button>
                        </div>
                    </form>
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
    <script>
        $(document).ready(function () {
            $('#roleTable').DataTable();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // Create Role
            $('#create_submit').on('click', function () {
                var role = $('#create_form_slug').val();
                var description = $('#create_form_description').val();
                $.ajax({
                    'type' : 'POST',
                    'url' : '{{ route('backend.roles.store') }}',
                    'data' : {
                        'slug' : role,
                        'description' : description
                    },
                    'success' : function (result) {
                        // Show alert
                        var xhtml = '';
                        xhtml += '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">';
                        xhtml += '<span class="badge badge-pill badge-success">{{ trans("backend_role.label_success") }}</span> ';
                        xhtml += result.message;
                        xhtml += '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                        xhtml += '<span aria-hidden="true">×</span>';
                        xhtml += '</button>';
                        xhtml += '</div>';
                        $('div.table-responsive').prepend(xhtml);
                        // Show data created
                        var data_xhtml = '';
                        data_xhtml += '<tr class="table-success">';
                        data_xhtml += '<td>#</td>';
                        data_xhtml += '<td>' + result.role.slug + '</td>';
                        data_xhtml += '<td>' + result.role.description + '</td>';
                        data_xhtml += '<td>';
                        data_xhtml += '<a href="javascript:void(0)" class="btn btn-primary disabled"><i class="zmdi zmdi-edit"></i></a> ';
                        data_xhtml += '<a href="javascriot:void(0)" class="btn btn-danger disabled"><i class="zmdi zmdi-delete"></i></a>';
                        data_xhtml += '</td>';
                        data_xhtml += '</tr>';
                        $('#roleTable tbody').prepend(data_xhtml);
                        // Hiden form create when create success
                        $('.dataTables_empty').remove();
                        $('#modal_create').fadeOut();
                        $('div.modal-backdrop').remove();
                        $('#body').removeClass('modal-open');
                        $('#create_form_slug').val('');
                        $('#create_form_description').val('');
                    },
                    'error' :function( data ) {
                        if (data.status === 422) {
                            var messages = $.parseJSON(data.responseText);
                            $.each(messages.errors, function (key, val) {
                                $('#create_form_' + key).addClass('is-invalid');
                                $('#error_create_' + key).html(val);
                            });
                        }
                    }
                });
            });
            // Update Role
            $('a.update_role').on('click', function () {
                var id = $(this).parent().parent().attr('attr-num');
                var slug = $(this).parent().siblings('td[attr-slug]').html();
                var description = $(this).parent().siblings('td[attr-description]').html();
                $('#update_form_slug').val(slug);
                $('#update_form_description').val(description);
                $('#update_submit').on('click', function () {
                    var slug = $('#update_form_slug').val();
                    var description = $('#update_form_description').val();
                    var urlUpdate = '{{ url('backend/roles') }}' + '/' + id;
                    var methodUpdate = $('#form-update').attr('method');
                    $.ajax({
                        'type' : methodUpdate,
                        'url' : urlUpdate,
                        'data' : {
                            'slug' : slug,
                            'description' : description
                        },
                        'success' : function (result) {
                            // Show alert
                            var xhtml = '';
                            xhtml += '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">';
                            xhtml += '<span class="badge badge-pill badge-success">{{ trans("backend_role.label_success") }}</span> ';
                            xhtml += result.message;
                            xhtml += '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                            xhtml += '<span aria-hidden="true">×</span>';
                            xhtml += '</button>';
                            xhtml += '</div>';
                            $('div.table-responsive').prepend(xhtml);
                            // Show data updated
                            $('tr[attr-num=' + id + ']').addClass('table-info');
                            $('tr[attr-num=' + id + '] td[attr-slug=1]').html(result.role.slug);
                            $('tr[attr-num=' + id + '] td[attr-description=1]').html(result.role.description);
                            // Hiden form create when updated success
                            $('#modal_update').fadeOut();
                            $('div.modal-backdrop').remove();
                            $('#body').removeClass('modal-open');
                            $('#update_form_slug').val('');
                            $('#update_form_description').val('');
                        },
                        'error' :function( data ) {
                            if (data.status === 422) {
                                var messages = $.parseJSON(data.responseText);
                                $.each(messages.errors, function (key, val) {
                                    $('#update_form_' + key).addClass('is-invalid');
                                    $('#error_update_' + key).html(val);
                                });
                            }
                        }
                    });
                })
            });
        });
    </script>
@endsection

