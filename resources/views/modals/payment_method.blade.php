<!-- Modal -->
<div class="modal" id="Payment_methodModal">
    <div class="modal-dialog  modal-dialog-centered" style="width:700px;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalLabel">Payment Method</h5>
                <button type="button" class="close modal_close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('payment_method.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Card Holder</label>
                            <div class="search">
                                <input type="text" name="card_name" class="form-control" id=""
                                    placeholder="" required>
                                {!! $errors->first('card_name', "<span class='text-danger'>:message</span>") !!}

                            </div>
                        </div>
                        <div class="form-group col-md-6  ">
                            <label for="">Card No</label>
                            <div class="search">
                                <input type="text" name="card_no" class="form-control card-number" id=""
                                    placeholder="" required>
                                    {!! $errors->first('card_no', "<span class='text-danger'>:message</span>") !!}
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Expiry Month</label>
                            <div class="search">
                                <input type="text" name="month" class="form-control card-expiry-month"
                                    id="" placeholder="" required>
                                    {!! $errors->first('month', "<span class='text-danger'>:message</span>") !!}
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Expiry Year</label>
                            <div class="search">
                                <input type="text" name="year" class="form-control card-expiry-year"
                                    id="" placeholder="" required>
                                    {!! $errors->first('year', "<span class='text-danger'>:message</span>") !!}
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">CVC</label>
                            <div class="search">
                                <input type="text" name="cvc" class="form-control card-cvc" id=""
                                    placeholder="" required>
                                    {!! $errors->first('cvc', "<span class='text-danger'>:message</span>") !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer modale_buttons">
                    {{-- <button type="button" class="btn btn-dark" data-dismiss="modal">Cancel</button> --}}
                    <button type="submit" class="btn btn-warning">Save</button>
                </div>
            </form>
        </div>
        <a href="#" class="modal__close">&times;</a>
    </div>
</div>
