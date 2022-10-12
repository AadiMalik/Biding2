
@extends('layouts.admin')
@section('content')

<div class="page-wrapper">
   
			<div class="page-content">

                <div class="card">
				    <div class="card-body p-4">
					  <h5 class="card-title">Add New Product</h5>
					  <hr/>
                      
                        
                       <div class="form-body mt-4">
					     <form method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
                          @csrf
							<div class="row">
								<div class="col-lg-8">
									<div class="border border-3 p-4 rounded">
										<div class="mb-3">
											<label for="inputProductTitle" class="form-label">Product Title</label>
											<input type="text" class="form-control" id="inputProductTitle" name="name" id="name" value="{{ old('name', '') }}" placeholder="Enter product title" required>
										</div>
										<div class="mb-3">
											<label for="inputProductDescription" class="form-label">Description</label>
											<textarea class="form-control" id="inputProductDescription" name="description" id="description" value="{{ old('description', '') }}" rows="3"></textarea>
										</div>
										<div class="mb-3">
											<label for="inputProductDescription" class="form-label">Banner Image</label>
											<input class="form-control" type="file" name="image1" id="image1" required>
										</div>
										<div class="mb-3">
											<label for="inputProductDescription" class="form-label">Product Images</label>
											<input id="image-uploadify" name="image[]" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
										</div>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="border border-3 p-4 rounded">
										<div class="row g-3">
											<div class="col-md-6">
												<label for="inputPrice" class="form-label">Price</label>
												<input type="text" class="form-control" id="inputPrice" placeholder="00.00" name="price" value="{{ old('price', '') }}" required>
											</div>
											<div class="col-md-6">
												<label for="inputCompareatprice" class="form-label">Shipping Price</label>
												<input type="text" class="form-control" id="inputCompareatprice" placeholder="00.00" name="shipping_price" value="{{ old('shipping_price', '') }}" required>
											</div>
											<div class="col-md-6">
												<label for="inputCostPerPrice" class="form-label">Start time</label>
												<input type="time" class="form-control" id="inputCostPerPrice" name="from" value="{{ old('from', '') }}" required>
											</div>
											<div class="col-md-6">
												<label for="inputCostPerPrice" class="form-label">End time</label>
												<input type="time" class="form-control" id="inputCostPerPrice" name="to" value="{{ old('to', '') }}" required>
											</div>
											<div class="col-md-6">
												<label for="inputStarPoints" class="form-label">Star Points</label>
												<input type="number" class="form-control" id="inputStarPoints" name="points" placeholder="00.00">
											</div>
											<div class="col-12">
												<label for="inputProductType" class="form-label">Category</label>
												<select name="category" class="form-select" id="inputProductType" required>
													@foreach ($category as $item)
													<option value="{{$item->id}}">{{$item->name??''}}</option>
													@endforeach
												</select>
											</div>
											<div class="col-12">
												<label for="inputVendor" class="form-label">stock</label>
												<input type="number" class="form-control" id="inputStarPoints" name="limit" id="limit" value="{{ old('limit', '') }}" required>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary">Save Product</button>
												</div>
											</div>
										</div> 
										</div>
									</div>
							</div><!--end row-->
						 </form>	
						</div>
						
				    </div>
			    </div>
            </div>
			
</div>

@endsection
@section('script')
    

@endsection