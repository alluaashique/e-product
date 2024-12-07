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
        <a href="{{route('admin.product.edit',$product->id)}}">
            <button type="submit" name="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">back</button>
        </a>
        @endif
       
        <form id="myForm" method="POST" action="{{route('admin.product.specification.store')}}" enctype="multipart/form-data">
        @method("POST")
            @csrf
            <input type="hidden" name="product_id" value="{{$product->id}}">
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">                
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Specification</span>
                    <select class="specification block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    name="specification_id" id="specification_id" required>
                    <option value="">SELECT</option>
                    @foreach ($specifications as $specification)
                        <option value="{{$specification->id}}" 
                            @if(old("specification_id"))
                                @if($specification->id == old("specification_id")) selected @endif
                            @else
                                @if(isset($product))
                                    @if($product->specification_id == $specification->id) selected @endif
                                @endif
                            @endif                            
                            >{{$specification->specification}}</option>
                      @endforeach
                    </select>
                </label>
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Value</span>
                    <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    name="value_id[]" id="value_id" required>
                      <option value="">SELECT</option>
                     
                    </select>
                </label>  
                
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Amount</span>
                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    type="text" id="price" name="price" placeholder="Amount"
                    value="{{ old('price')}}" />
                    @error('price')
                        <span class="text-xs text-red-600 dark:text-red-400"> {{ $message }}  </span>                    
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Is Quantity</span>
                    <input  type="checkbox" id="is_quantity" name="is_quantity" 
                     @if(old('is_quantity')) checked @endif />
                    @error('is_quantity')
                        <span class="text-xs text-red-600 dark:text-red-400"> {{ $message }}  </span>                    
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Is Weight</span>
                    <input type="checkbox" id="is_weight" name="is_weight" 
                     @if(old('is_weight')) checked @endif />
                    @error('is_weight')
                        <span class="text-xs text-red-600 dark:text-red-400"> {{ $message }}  </span>                    
                    @enderror
                </label>
                <button type="submit" name="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Save</button>
            </div>
        </form>
        
      
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrapp">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">No</th>                            
                            <th class="px-4 py-3">Specification</th>
                            <th class="px-4 py-3">Values</th>
                            <th class="px-4 py-3">Amount</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @php  $i = 1; @endphp
                        @foreach ( $product->specification as $specs )
                          <tr class="text-gray-700 dark:text-gray-400">
                            @foreach ( $specs->values as $val )
                                <td class="px-4 py-3 text-sm">{{$i++}}</td>
                                <td class="px-4 py-3 text-sm">{{$specs->specification}}</td>
                                <td class="px-4 py-3 text-sm">{{$val->value}} 
                                    @if($specs->is_quantity || $specs->is_weight)
                                    {{$project_units[$product->unit]}}  
                                    @endif                              
                                </td>
                                <td class="px-4 py-3 text-sm">{{$val->price}}</td>
                               
                            @endforeach

                                                    
                              
                          </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
  
            {{-- Pagination
            {{ $blogs->links('admin.layout.pagination', ['paginate' => $blogs]) }} --}}
           
        </div>
    </div>
</main>

<script>             
$(document).ready(function() {
    $(".specification").change(function() {
        var specification_id = $(this).val();
        if (specification_id) {
            $.ajax({
                url: "{{route('admin.product.specification.getvalue')}}",
                method: "POST",
                data: {
                    specification_id: specification_id,
                    _token: "{{csrf_token()}}"
                },
                success: function(response) {
                    if (response) {
                        console.log(response);
                        console.log(typeof(response));
                        response = response.values;
                        $("#value_id").empty();
                        $("#value_id").append('<option value="">SELECT</option>');
                        $.each(response, function(key, value) {
                            $("#value_id").append('<option value="' + value.id + '">' + value.value + '</option>');
                        });
                    } else {
                        $("#value_id").empty();
                    }
                }
            });
        }       
    });
    $("#myForm").validate({
        rules: {
            specification_id: {
                required: true
            },
            value_id:{
                required: true,
                arrray: true
            }           
        },
        messages: {
            specification_id: {
                required: "Please select brand"
            },
            value_id: {
                required: "Please select category"
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