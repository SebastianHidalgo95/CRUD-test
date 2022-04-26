
@extends('adminlte::page')

@section('title', 'Entries')
@section('content_header')
<h1>
    Entries
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-category">
        Create Entry
    </button>
</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado de categorías</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="categories" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($entries as $entry)
                        <tr>
                            <td>{{ $entry->title}}</td>
                            <td>{{ $entry->name}}
                            </td>
                            <td>{{ $entry->text}}</td>
                            <td> {{ $entry->date}}</td>
                            <td>
                                <button class="btn btn-outline-success"
                                    data-toggle="modal" data-target="#modal-update-entry-{{$entry->_id}}"
                                    ><i class="far fa-edit"></i>
                                </button>
                                
                                <form class="d-inline" action="{{ route('user.entries.delete', $entry->_id) }}" method="POST">
                                    {{ csrf_field() }}
                                    @method('DELETE')
                                    
                                    <button class="btn btn-outline-danger" >
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <!-- modal -->
                        @include('user.entries.modal-update-entry')
                        <!-- /.modal -->
                        @endforeach
                    </tbody>
                    <tfoot>
                        
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>

<!-- modal -->
@include('user.entries.modal-create-entry')
<!-- /.modal -->
@stop

@section('js')
<script>
$(document).ready(function() {
    $('#categories').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );

function deleteConfirmation(id) {
        swal({
            title: "Delete?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (e) {

            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'POST',
                    url: "{{url('/users')}}/" + id,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {

                        if (results.success === true) {
                            swal("Done!", results.message, "success");
                        } else {
                            swal("Error!", results.message, "error");
                        }
                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })
    }

</script>
@stop