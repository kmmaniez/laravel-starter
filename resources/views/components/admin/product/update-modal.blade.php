        <!-- Modal -->
        <div class="modal fade" id="modal-update" tabindex="-1" aria-labelledby="modal-update" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-update">Add {{ $title_page }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            @method('put')
                            @csrf
                            <div class="row d-block">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="nameUpdate">Product Name</label>
                                                <input type="text" name="nameUpdate" id="nameUpdate" class="form-control">
                                                <div class="invalid-feedback" id="invalidNameUpdate"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="quantityUpdate">Quantity</label>
                                                <input type="number" min="0" class="form-control" name="quantityUpdate" id="quantityUpdate">
                                                <div class="invalid-feedback" id="invalidQuantityUpdate"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="priceUpdate">Price</label>
                                                <input type="number" min="1" class="form-control" name="priceUpdate" id="priceUpdate">
                                                <div class="invalid-feedback" id="invalidPriceUpdate"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="updateProduct">Update Data</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>