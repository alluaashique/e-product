@extends('admin.layout.app')
@section('content')

<main class="h-full pb-16 overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Specifications
        </h2>

        <!-- General elements -->
        {{-- <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Elements
        </h4> --}}
        @if(isset($specification))
        <form id="myForm" method="POST" action="{{route('admin.specification.update',$specification->id)}}" enctype="multipart/form-data">
        @method("PUT")
        @else
        <form id="myForm" method="POST" action="{{route('admin.specification.store')}}" enctype="multipart/form-data">
        @method("POST")
        @endif
            @csrf

            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
             
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Specification</span>
                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    type="text" id="specification" name="specification" placeholder="Specification"
                    value="{{ old('specification') ?? $specification->specification ?? "" }}" />
                    @error('specification')
                        <span class="text-xs text-red-600 dark:text-red-400"> {{ $message }}  </span>                    
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Values</span>


                    <table>
                        <tr>
                            <td>
                                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                type="text" id="value" name="values[]" placeholder="value"
                                value="{{ old('value') }}"  />
                                <input type="hidden" name="ids[]" value="0">

                            </td>
                            <td>
                                <div class="bg-blue-500 text-white font-bold py-2 px-4 rounded add-row">ADD +</div>
                            </td>
                        </tr> 
                        @if(isset($specification->values))
                        @foreach($specification->values as $value)
                            <tr>
                                <td>
                                    <input type="hidden" name="ids[]" value="{{$value->id}}">
                                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    type="text" id="value" name="values[]" placeholder="value"
                                    value="{{ old('value') ?? $value->value ?? "" }}"  />
                                </td>  
                                <td>
                                    <div class="bg-blue-500 text-white font-bold py-2 px-4 rounded remove-row">REMOVE -</div>        
                                </td>                       
                            </tr>
                        @endforeach
                        @endif
                    </table>

                    
                    


                    @error('values')
                        <span class="text-xs text-red-600 dark:text-red-400"> {{ $message }}  </span>                    
                    @enderror
                </label>

                @if(isset($specification))
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Is Active</span>
                        <input type="checkbox" id="is_active" name="is_active" value="1" {{ $specification->is_active == 1 ? 'checked' : '' }} >
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
    $('.add-row').click(function(){
        $('table').append('<tr><td>'+
            '<input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"'+
            'type="text" id="value" name="values[]" placeholder="value" value="{{ old('value') ?? $specification->value ?? "" }}" />'+
                                '</td><td><div class="btn btn-danger remove-row"> REMOVE-</div></td></tr>');
    });
    $('body').on('click', '.remove-row', function() {
        $(this).closest('tr').remove();
    });

    $("#myForm").validate({
        rules: {
            product_category: {
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
            product_category: {
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