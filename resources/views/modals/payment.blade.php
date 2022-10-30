<!-- Modal -->
@foreach ($package as $item)
    <div class="modal fade" id="paymentModal{{ $item->id }}" tabindex="-1" role="dialog"
        aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">Total ${{ $item->price ?? '0' }}</h5>
                    <button type="button" class="close modal_close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('payment.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="package_id" value="{{ $item->id }}">
                    <div class="modal-body">
                        <div class="form-row">
                            @auth
                            @foreach ($payment_method->where('user_id',Auth()->user()->id) as $item1)
                                <div class="alert alert-danger col-md-12"
                                    style="padding: 0px 1.25rem; margin-bottom:0px;">
                                    <b>{{$item1->name??''}}</b><br>
                                    <span>{{$item1->number??''}}</span><br>
                                    <input type="radio" name="payment_method" value="{{$item1->id}}" id="" checked style="float: right;" required>
                                    <span>{{$item1->month??''}}/{{$item1->year??''}}</span>
                                </div>
                            @endforeach
                            {!! $errors->first('payment_method', "<span class='text-danger'>:message</span>") !!}
                            @endauth
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="button" class="btn btn-warning showmodal" data-toggle="modal"
                                        data-target="#payment_methodModal" data-dismiss="modal">Add New</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer modale_buttons">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Pay</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
