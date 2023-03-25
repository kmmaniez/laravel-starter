        <!-- Modal -->
        <div class="modal fade" id="modal-update" tabindex="-1" aria-labelledby="modal-update" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-update">Edit Categories</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="category_name_update" class="control-label">Category Name</label>
                            <input type="text" class="form-control" id="category_name_update" name="category_name_update" required autofocus>
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert_category_update"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="update">Update Data</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>