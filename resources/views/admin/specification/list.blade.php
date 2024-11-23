@extends('admin.layout.app')
@section('content')

<main class="h-full pb-16 overflow-y-auto">
  <div class="container grid px-6 mx-auto">
      <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Specifications
      </h2>
      <!-- With actions -->
      <a href="{{route('admin.specification.create')}}">
        <button class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Create Specification</button>
      </a>
      <div class="w-full overflow-hidden rounded-lg shadow-xs">
          <div class="w-full overflow-x-auto">
              <table class="w-full whitespace-no-wrapp">
                  <thead>
                      <tr
                          class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                          <th class="px-4 py-3">No</th>
                          <th class="px-4 py-3">Name</th>
                          <th class="px-4 py-3">Status</th>
                          <th class="px-4 py-3">Action</th>
                      </tr>
                  </thead>
                  <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                      @foreach ($specifications as $specification)
                        <tr class="text-gray-700 dark:text-gray-400">                          
                          <td class="px-4 py-3 text-sm">
                            {{$loop->iteration + ($specifications->currentPage() - 1) * $specifications->perPage()}}
                          </td>
                          <td class="px-4 py-3 text-sm">{{$specification->specification}}</td>
                          <td>
                              @if($specification->is_active == 1)
                                  <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                  Active </span>
                              @elseif($specification->is_active == 0)
                                  <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                                    Inactive </span>
                              @endif
                          </td>                           
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <a href="{{route('admin.specification.edit',$specification->id)}}">
                                      <button
                                          class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                          aria-label="Edit">
                                          <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                              viewBox="0 0 20 20">
                                              <path
                                                  d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                              </path>
                                          </svg>
                                      </button>
                                    </a>
                                    <a href="javascript:void(0)" class="delete" data-id="{{$specification->id}}">
                                      <button
                                          class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                          aria-label="Delete">
                                          <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                              viewBox="0 0 20 20">
                                              <path fill-rule="evenodd"
                                                  d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                  clip-rule="evenodd"></path>
                                          </svg>
                                      </button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>

          {{-- Pagination --}}
          {{ $specifications->links('admin.layout.pagination', ['paginate' => $specifications]) }}
         
      </div>
  </div>
</main>


<script>
$(document).ready(function() {
    $('.delete').on('click', function() {
        var id = $(this).data('id');
        // var form = $('#delete_' + id);
        if (confirm("Are you sure you want to delete this product category?")) {
            var current = $(this);
            var currentRow = $(this).closest('tr');
            var form = new FormData();
            form.append("id", id);
            form.append("_token", "{{csrf_token()}}");
            form.append("_method", "DELETE");
            url = "{{route('admin.specification.destroy',':id')}}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                method: 'DELETE',
                // _token: "{{csrf_token()}}",
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}" // Add CSRF token in headers
                },
                data: null,
                processData: false,
                contentType: false,
                success: function(response) {
                  if(response == 1) {
                    toastr.success("Product Category deleted successfully");
                    currentRow.remove();
                  }else {
                    toastr.error("Something went wrong");
                  }
                },
                error: function(xhr, status, error) {
                    console.error("Error deleting item:", error);
                }
            });
          }
    });
});
</script>
@endsection