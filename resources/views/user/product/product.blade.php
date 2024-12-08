    @extends('user.layout.app')
    @section('content')
        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Shop</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Shop</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        <!-- Fruits Shop Start-->
        <div class="container-fluid fruite py-5">
            <div class="container py-5">
                <h1 class="mb-4">Fresh fruits shop</h1>
                <div class="row g-4">
                    <div class="col-lg-12">
                        <form action="" method="get"></form>
                        <div class="row g-4">
                            <div class="col-xl-3">
                                <div class="input-group w-100 mx-auto d-flex">
                                    <input type="hidden" name="category" value="{{request('category')}}">
                                    <input type="search" class="form-control p-3" placeholder="keywords" value="{{request('search')}}" name="search" id="search" aria-describedby="search-icon-1">
                                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>                                    
                                </div>
                            </div>
                            <div class="col-6"></div>
                            <div class="col-xl-3">
                                <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                                    <label for="fruits">Default Sorting:</label>
                                    <select id="sort_by" name="sort_by" class="border-0 form-select-sm bg-light me-3" form="fruitform">
                                        <option value="name_asc">Name (A-Z)</option>
                                        <option value="name_desc">Name (Z-A)</option>
                                        <option value="price_asc">Price (Low-High)</option>
                                        <option value="price_desc">Price (High-Low)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row g-4">
                            <div class="col-lg-3">
                                <div class="row g-4">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h4>Categories</h4>
                                            <ul class="list-unstyled fruite-categorie">
                                                @foreach($categories as $category)
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="{{route('product.index').'?'.http_build_query(['category_id'=>$category->slug])}}"><i class="fas fa-apple-alt me-2"></i>{{$category->name}}</a>
                                                        <span>({{$category->activeProductCount()}})</span>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h4 class="mb-2">Minumum Price</h4>
                                            <input type="range" class="form-range w-100" id="minimum" name="minimum" min="0" max="500" value="0" oninput="amount.value=minimum.value">
                                            <output id="amount" name="amount" min-velue="0" max-value="500" for="minimum">0</output>
                                        </div>
                                        <div class="mb-3">
                                            <h4 class="mb-2">Maximum Price</h4>
                                            <input type="range" class="form-range w-100" id="maximum" name="maximum" min="0" max="500" value="0" oninput="amount2.value=maximum.value">
                                            <output id="amount2" name="amount2" min-velue="0" max-value="500" for="maximum">0</output>
                                        </div>                                   
                                    </div> --}}
                                    {{-- <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h4>Additional</h4>
                                            <div class="mb-2">
                                                <input type="radio" class="me-2" id="Categories-1" name="Categories-1" value="Beverages">
                                                <label for="Categories-1"> Organic</label>
                                            </div>
                                            <div class="mb-2">
                                                <input type="radio" class="me-2" id="Categories-2" name="Categories-1" value="Beverages">
                                                <label for="Categories-2"> Fresh</label>
                                            </div>
                                            <div class="mb-2">
                                                <input type="radio" class="me-2" id="Categories-3" name="Categories-1" value="Beverages">
                                                <label for="Categories-3"> Sales</label>
                                            </div>
                                            <div class="mb-2">
                                                <input type="radio" class="me-2" id="Categories-4" name="Categories-1" value="Beverages">
                                                <label for="Categories-4"> Discount</label>
                                            </div>
                                            <div class="mb-2">
                                                <input type="radio" class="me-2" id="Categories-5" name="Categories-1" value="Beverages">
                                                <label for="Categories-5"> Expired</label>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="col-lg-12">
                                        <h4 class="mb-3">Featured products</h4>
                                      @foreach ($featured_products as $product) 
                                          <div class="d-flex align-items-center justify-content-start">
                                              <div class="rounded me-4" style="width: 100px; height: 100px;">
                                                  <img style="width: 118px !important; height: 118px  !important;" data-url="{{asset('storage/'.$product->image)}}" alt="{{asset('storage/'.$product->image)}}" class="img-fluid rounded">
                                              </div>
                                              <div>
                                                  <h6 class="mb-2">{{$product->name}}</h6>
                                                  <div class="d-flex mb-2">
                                                      <i class="fa fa-star text-secondary"></i>
                                                      <i class="fa fa-star text-secondary"></i>
                                                      <i class="fa fa-star text-secondary"></i>
                                                      <i class="fa fa-star text-secondary"></i>
                                                      <i class="fa fa-star"></i>
                                                  </div>
                                                  <div class="d-flex mb-2">
                                                      <h5 class="fw-bold me-2">{{$product->price}}</h5>
                                                      {{-- <h5 class="text-danger text-decoration-line-through">4.11 $</h5> --}}
                                                  </div>
                                              </div>
                                          </div>
                                      @endforeach
                                        <div class="d-flex justify-content-center my-4">
                                            <a href="{{route('product.index')}}" class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-100">Vew More</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="position-relative">
                                            <img src="img/banner-fruits.jpg" class="img-fluid w-100 rounded" alt="">
                                            <div class="position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%);">
                                                <h3 class="text-secondary fw-bold">Fresh <br> Fruits <br> Banner</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="row g-4 justify-content-center">
                                   @foreach ($products as $product) 
                                     <div class="col-md-6 col-lg-6 col-xl-4">
                                         <div class="rounded position-relative fruite-item">
                                             <div class="fruite-img">
                                                 <img style="width: 261px !important; height: 183px  !important;" data-url="{{asset('storage/'.$product->image)}}" class="img-fluid w-100 rounded-top" alt="">
                                             </div>
                                             <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">{{$product->category->name}}</div>
                                             <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                 <h4>{{$product->name}}</h4>
                                                 <p>{{$product->description}}</p>
                                                 <div class="d-flex justify-content-between flex-lg-wrap">
                                                     <p class="text-dark fs-5 fw-bold mb-0">{{$product->price}}</p>
                                                     <a href="{{route('product.show', $product->uuid)}}" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                   @endforeach                                    
                                    {{ $products->links('user.layout.pagination') }}                                    
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fruits Shop End-->






        <script>
            $(document).ready(function () {
                // Set up CSRF token
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                });
        
                function loadImages() {
                    $('img').each(function(index, element) {
                        var newSource = $(this).data('url');
                        $(this).attr('src', newSource);
                    });
                }
                // loadImages();


                function submitform()
                {
                    search = $('#search').val();
                    sort_by = $('#sort_by').val();
                    category = $('#category').val();
                    // $('#myForm').submit();
                    var form = new FormData();
                    form.append('search', search);
                    form.append('sort_by', sort_by);
                    form.append('category', category);
                    form.submit();
                }


                $('#sort_by', '#search').on('change', function() {
                    alert('change');
                    submitform();
                });
                $('#search-icon-1').on('click', function() {
                    alert('click');
                    submitform();
                });

                






            });
        </script>

        @endsection