@extends('admin.layout.app')
@section('content')

<main class="h-full pb-16 overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Contact US
        </h2>
        <!-- General elements -->
        {{-- <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Elements
        </h4> --}}
      
        @if(isset($contactus))
            <form id="myForm" method="POST" action="{{route('admin.contact-us.update',$contactus->id)}}">
            @method("PUT")
        @else
            <form id="myForm" method="POST" action="{{route('admin.contact-us.store')}}">
            @method("POST")
        @endif
            @csrf

            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Name</span>
                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    type="text" placeholder="Name" value="{{$contactus->name." ".$contactus->last_name}}" disabled>
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Email</span>
                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    type="text" placeholder="Email" value="{{$contactus->email}}" disabled>
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Subject</span>
                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    type="text" placeholder="Email" value="{{$contactus->subject}}" disabled>
                </label>
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Message</span>
                    <textarea
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        rows="3" name="message" rows="15" id="message" placeholder="Description" disabled>{{ $contactus->message  }}</textarea>
                </label>

                
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Reply</span>
                    <textarea
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        rows="3" name="reply" id="reply" class="form-control"  placeholder="Reply" required  @if($contactus->status == 2) disabled @endif  >{{ old('reply') ?? $contactus->reply ?? "" }}</textarea>
                        @error('reply')
                        {{ $message }}
                        @enderror
                </label>
                @if($contactus->status == 1)
                    <button type="submit" name="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Save</button>
                @endif
            </div>
        </form>      
    </div>
</main>
<script>      
             
$(document).ready(function() {
    $("#myForm").validate({
        rules: {
            reply: {
                required: true,
                minlength: 3
            }
        },
        messages: {
            reply: {
                required: "Please enter reply",
                minlength: "Your reply must consist of at least 3 characters"
            }
        },
        submitHandler: function(form) {
            form.submit(); 
        }
    });
});
</script>
@endsection