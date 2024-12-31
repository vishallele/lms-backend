<x-admin.layout>

  <x-slot:page_heading>
    <div class="flex items-center justify-between">
      Users
      <a href="/admin/user/create" class="px-4 py-2 text-white bg-gray-900 text-sm rounded-md">Add User</a>
    </div>
  </x-slot:page_heading>

  <div class="container p-2 mx-auto sm:p-4">

    @if( Session::has('success'))
    <div class="flex w-full bg-green-200 p-4 rounded-md items-center mb-5">
      <span>{!! Session::get('success') !!}</span>
    </div>
    @endif

    @if( Session::has('error'))
    <div class="flex w-full bg-red-200 p-4 rounded-md items-center mb-5">
      <span>{!! Session::get('error') !!}</span>
    </div>
    @endif

    <form method="get">
      @csrf
      <div class="flex flex-col md:flex-row items-center gap-2 md:gap-1 justify-end">
        <input
          type="text"
          name="search"
          class="rounded-md w-full md:w-96 px-4 py-2 border"
          placeholder="Enter name, email or phone number"
          value="{{ request()->query('search') }}" />
        <select class="rounded-md w-full md:w-44 px-4 py-2 border" name="user_type">
          <option {{ request()->query('user_type') == '' ? 'selected' : '' }} value="">Select user type</option>
          <option value="1" {{ request()->query('user_type') == '1' ? 'selected' : '' }}>Admin</option>
          <option value="2" {{ request()->query('user_type') == '2' ? 'selected' : '' }}>Sub Admin</option>
          <option value="3" {{ request()->query('user_type') == '3' ? 'selected' : '' }}>Instructor</option>
          <option value="4" {{ request()->query('user_type') == '4' ? 'selected' : '' }}>Member</option>
        </select>
        <select class="rounded-md w-full md:w-40 px-4 py-2 border" name="status">
          <option value="">Select Status</option>
          <option value="1" {{ request()->query('status') == '1' ? 'selected' : '' }}>Active</option>
          <option value="0" {{ request()->query('status') == '0' ? 'selected' : '' }}>Inactive</option>
        </select>
        <button class="px-4 w-full md:w-24 py-2 text-white bg-gray-900 text-sm rounded-md font-bold shadow-md">Search</button>
      </div>
    </form>

    <form method="POST" action="/admin/user/bulkaction">
      @csrf
      <div class="flex flex-col md:flex-row items-center gap-2 md:gap-1 mt-5">
        <select class="rounded-md w-full md:w-40 px-4 py-2 border" name="bulk_action">
          <option value="">Bulk Action</option>
          <option value="active">Active</option>
          <option value="inactive">Inactive</option>
          <option value="delete">Delete</option>
        </select>
        <button
          type="submit"
          class="px-2 w-full md:w-20 py-2 text-white bg-gray-900 text-sm rounded-md font-bold shadow-md">
          Submit
        </button>
      </div>

      <div class="overflow-x-auto rounded-md shadow-md mt-5">
        <table class="w-full p-6 text-sm text-left whitespace-nowrap">
          <thead>
            <tr class="bg-gray-800 text-white font-bold tracking-wide">
              <th class="p-4">
                <input type="checkbox" class="p-check" />
              </th>
              <th class="p-4">Name</th>
              <th class="p-4">Phone</th>
              <th class="p-4">Email</th>
              <th class="p-4">
                <span class="sr-only">Edit</span>
              </th>
            </tr>
          </thead>
          <tbody class="border-b dark:bg-gray-50 dark:border-gray-300">
            @if($users->total() > 0)
            @foreach( $users as $user )
            <tr class="font-normal tracking-wide text-md">
              <td class="px-4">
                <input class="c-check" name="u[]" type="checkbox" value="{{$user->id}}" />
              </td>
              <td class="px-3 py-4">
                <p>{{ $user->name }}</p>
              </td>
              <td class="px-3 py-4">
                <p>{{ $user->phone_number }}</p>
              </td>
              <td class="px-3 py-4">
                <p>{{ $user->email }}</p>
              </td>
              <td class="px-2 py-4">
                <a
                  class="px-2 py-2  text-white bg-gray-900 text-sm rounded-md"
                  href="/admin/user/edit/{{$user->id}}">
                  Edit
                </a>
              </td>
            </tr>
            @endforeach
            @else
            <tr>
              <td colspan="4" class="p-4">No records found.</td>
            </tr>
            @endif
          </tbody>
        </table>
      </div>

    </form>

    <div class="mt-5">
      {{ $users->withQueryString()->links() }}
    </div>

  </div>

</x-admin.layout>