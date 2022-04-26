<div class="modal fade" id="modal-create-category">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Create Entry</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('user.entries.create')}}" method="POST" target="_self">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <p >Title </p>
                                <input type="text" name="title" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <p>Name</p>
                                <input type="text" name="name" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6" style="width: 98%">
                            <div class="form-group">
                                <p >Description</p>
                                <input type="text" name="text" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-6" style="width: 98%">
                            <div class="form-group">
                                <p>Date</p>
                                <input type="date" name="date" class="form-control"/>
                            </div>
                        </div>
                    </div
                    
                </div>
                <div class="modal-footer justify-content-end">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-success">Save changes</button>
                </div>
            </form>
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>