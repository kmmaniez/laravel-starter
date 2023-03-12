        <!-- Modal -->
        <div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="control-label">Name</label>
                            <input type="text" class="form-control" id="name">
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name"></div>
                        </div>
                        <div class="form-group">
                            <label for="price" class="control-label">Price</label>
                            <input type="text" class="form-control" id="price">
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-price"></div>
                        </div>
                        <div class="form-group">
                            <label for="quantity" class="control-label">Quantity</label>
                            <input type="number" min="1" class="form-control" id="quantity">
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-quantity"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="save">Save Data</button>
                    </div>
                </div>
            </div>
        </div>