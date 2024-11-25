@extends('admin.layout.app')
@section('content')

<main class="h-full pb-16 overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Products
        </h2>

        <!-- General elements -->
        {{-- <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Elements
        </h4> --}}
        @if(isset($product))
        <form id="myForm" method="POST" action="{{route('admin.product.update',$product->id)}}" enctype="multipart/form-data">
        @method("PUT")
        @else
        <form id="myForm" method="POST" action="{{route('admin.product.store')}}" enctype="multipart/form-data">
        @method("POST")
        @endif
            @csrf
           
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">                
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Brand</span>
                    <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    name="brand_id" id="brand_id" required>
                    <option value="">SELECT</option>
                    @foreach ($brands as $brand)
                        <option value="{{$brand->id}}" 
                            @if(old("brand_id"))
                                @if($brand->id == old("brand_id")) selected @endif
                            @else
                                @if(isset($product))
                                    @if($product->brand_id == $brand->id) selected @endif
                                @endif
                            @endif                            
                            >{{$brand->name}}</option>
                      @endforeach
                    </select>
                </label>
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Category</span>
                    <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    name="category_id" id="category_id" required>
                      <option value="">SELECT</option>
                      @foreach ($categories as $category)
                        <option value="{{$category->id}}" 
                            @if(old("category_id"))
                                @if($brand->id == old("category_id")) selected @endif
                            @else
                                @if(isset($product))
                                    @if($product->category_id == $category->id) selected @endif
                                @endif
                            @endif  
                        >{{$category->name}}</option>
                      @endforeach
                    </select>
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Name</span>
                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    type="text" id="name" name="name" placeholder="Product"
                    value="{{ old('name') ?? $product->name ?? "" }}" />
                    @error('name')
                        <span class="text-xs text-red-600 dark:text-red-400"> {{ $message }}  </span>                    
                    @enderror
                </label>

                
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Unit</span>
                    <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    name="unit" id="unit" required>
                    <option value="">SELECT</option>
                        @foreach ($project_units as $key => $value) 
                            <option value="{{$key}}" 
                            @if(old("unit"))
                                @if($key == old("unit")) selected @endif
                            @else
                                @if(isset($product))
                                    @if($product->unit == $key) selected @endif
                                @endif
                            @endif 
                        > {{$value}}</option>
                        @endforeach
                    </select>                    
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Price</span>
                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    type="text" id="price" name="price" placeholder="Price"
                    value="{{ old('price') ?? $product->price ?? "" }}" />
                    @error('price')
                        <span class="text-xs text-red-600 dark:text-red-400"> {{ $message }}  </span>                    
                    @enderror
                </label>
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Description</span>
                    <textarea
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        rows="3" name="description" rows="15" id="description" placeholder="Description">{{ old('description') ?? $product_category->description ?? "" }}</textarea>
                    @error('description')
                        <span class="text-xs text-red-600 dark:text-red-400"> {{ $message }} </span>                    
                    @enderror
                </label>
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Image (530x391)</span>
                    <input type="file" id="image" name="image" class="form-control" accept="image/*" @if(!isset($product)) required @endif >
                    @error('image')
                    <span class="text-xs text-red-600 dark:text-red-400"> {{ $message }} </span>                    
                    @enderror
                </label>
                @if(isset($product))
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Is Active</span>
                        <input type="checkbox" id="is_active" name="is_active" value="1" {{ $product->is_active == 1 ? 'checked' : '' }} >
                        @error('is_active')
                        {{ $message }}
                        @enderror
                    </label>              
                @endif      
                <button type="submit" name="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Save</button>
            </div>
        </form>      
    </div>
</main>

<script>             
$(document).ready(function() {
    $("#myForm").validate({
        rules: {
            brand_id: {
                required: true
            },
            price:{
                required: true
            }
            category_id: {
                required: true
            },
            unit: {
                required: true
            },
            product: {
                required: true,
                minlength: 3
            },          
            description: {
                required: true
            },
            image: {
                accept: "image/*"
            }
        },
        messages: {
            brand_id: {
                required: "Please select brand"
            },
            category_id: {
                required: "Please select category"
            },
            price : {
                required: "Please enter price"
            },
            unit: {
                required: "Please select unit"
            },
            product: {
                required: "Please enter product category name",
                minlength: "Your name must consist of at least 3 characters"
            },
            description: {
                required: "Please enter description"
            },
            image: {
                accept: "Please select valid image"
            }
        },
        invalidHandler: function(event, validator) {
            // Display error alert on form submit
            // alert('something went wrong');
            return false;
        },
        submitHandler: function(form) {
            // Form submission code here
            // alert("Form submitted successfully!");
            return true;
            form.submit(); // or perform an AJAX request here
        }
    });
});

</script>
@endsection