        <!-- Modal -->
        <div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="modal-create" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-create">Add {{ $title_page }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('products.store') }}" method="post" id="formProduct">
                            @csrf
                            <div class="row d-block">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="name">Product Name</label>
                                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                                                <div class="invalid-feedback" id="invalidName"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="quantity">Quantity</label>
                                                <input type="number" min="0" class="form-control" value="{{ old('quantity') }}" name="quantity" id="quantity">
                                                <div class="invalid-feedback" id="invalidQuantity"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="price">Price</label>
                                                <input type="number" min="1" class="form-control" value="{{ old('price') }}" name="price" id="price">
                                                <div class="invalid-feedback" id="invalidPrice"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="saveProduct">Save Data</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>