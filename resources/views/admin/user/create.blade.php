<x-admin.layout>

  <x-slot:page_heading>
    <div class="flex items-center justify-between">
      {{ isset($user->id) ? 'Edit User' : 'Add User' }}
      <a href="/admin/users" class="px-4 py-2 text-white bg-gray-900 text-sm rounded-md">Back</a>
    </div>
  </x-slot:page_heading>

  <div class="container p-2 mx-auto sm:p-4 max-w-2xl">
    @if(isset($user->id))
    <form method="POST" action="/admin/user/update/{{$user->id}}">
      @else
      <form method="POST" action="/admin/user/store">
        @endif
        @csrf
        <div class="space-y-12">
          <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base/7 font-semibold text-gray-900">Profile</h2>
            <p class="mt-1 text-sm/6 text-gray-600">This information will be displayed publicly so be careful what you share.</p>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="sm:col-span-3">
                <label for="name" class="block text-sm/6 font-medium text-gray-900">Name</label>
                <div class="mt-2">
                  <div class="flex items-center rounded-md bg-white pl-3 outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                    <input
                      type="text"
                      name="name"
                      id="name"
                      value="{{old('name', isset($user->id) ? $user->userData->name : '' )}}"
                      class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6"
                      placeholder="Enter name">

                  </div>
                  @error('name')
                  <p class="text-red-400 text-sm">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="sm:col-span-3">
                <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
                <div class="mt-2">
                  <input
                    id="email"
                    name="email"
                    type="email"
                    autocomplete="email"
                    value="{{old('email',isset($user->id) ? $user->email : '' )}}"
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                  @error('email')
                  <p class="text-red-400 text-sm">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="sm:col-span-4">
                <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                <div class="mt-2">
                  <input
                    id="password"
                    name="password"
                    type="password"
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                  @error('password')
                  <p class="text-red-400 text-sm">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="sm:col-span-4">
                <label for="confirm_password" class="block text-sm/6 font-medium text-gray-900">Confirm Password</label>
                <div class="mt-2">
                  <input
                    id="confirm_password"
                    name="password_confirmation"
                    type="password"
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                </div>
              </div>
            </div>
          </div>

          <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base/7 font-semibold text-gray-900">Personal Information</h2>
            <p class="mt-1 text-sm/6 text-gray-600">Use a permanent address where you can receive mail.</p>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="sm:col-span-3">
                <label for="phone_number" class="block text-sm/6 font-medium text-gray-900">Phone Number</label>
                <div class="mt-2">
                  <input
                    type="text"
                    name="phone_number"
                    id="phone_number"
                    value="{{old('phone_number', isset($user->id) ? $user->userData->phone_number : '' )}}"
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                </div>
              </div>

              <div class="sm:col-span-3">
                <label for="designation" class="block text-sm/6 font-medium text-gray-900">Designation</label>
                <div class="mt-2">
                  <input
                    type="text"
                    name="designation"
                    id="designation"
                    value="{{old('designation', isset($user->id) ? $user->userData->designation : '')}}"
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                </div>
              </div>

              <div class="sm:col-span-full">
                <label for="email" class="block text-sm/6 font-medium text-gray-900">About User</label>
                <div class="mt-2">
                  <textarea
                    name="about_user"
                    id="about_user"
                    rows="3"
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">{{old('about_user', isset($user->id) ? $user->userData->about_user : '')}}</textarea>
                </div>
              </div>

              <div class="sm:col-span-4">
                <label for="facebook_url" class="block text-sm/6 font-medium text-gray-900">Facebook Url</label>
                <div class="mt-2 grid grid-cols-1">
                  <input
                    type="text"
                    name="facebook_url"
                    id="facebook_url"
                    value="{{old('facebook_url', isset($user->id) ? $user->userData->facebook_url : '')}}"
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                </div>
              </div>

              <div class="sm:col-span-4">
                <label for="twitter_url" class="block text-sm/6 font-medium text-gray-900">Twitter Url</label>
                <div class="mt-2 grid grid-cols-1">
                  <input
                    type="text"
                    name="twitter_url"
                    id="twitter_url"
                    value="{{old('twitter_url',isset($user->id) ? $user->userData->twitter_url : '')}}"
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                </div>
              </div>

              <div class="sm:col-span-4">
                <label for="linkedin_url" class="block text-sm/6 font-medium text-gray-900">Linkedin Url</label>
                <div class="mt-2 grid grid-cols-1">
                  <input
                    type="text"
                    name="linkedin_url"
                    id="linkedin_url"
                    value="{{old('linkedin_url', isset($user->id) ? $user->userData->linkedin_url : '')}}"
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                </div>
              </div>

            </div>
          </div>

          @if($roles)
          <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base/7 font-semibold text-gray-900">Access</h2>
            <div class="space-y-10">
              <fieldset>
                <div class="mt-6 space-y-6">
                  @foreach( $roles as $role )
                  <div class="flex gap-3">
                    <div class="flex h-6 shrink-0 items-center">
                      <div class="group grid size-4 grid-cols-1">
                        <input
                          id="role_{{$role->id}}"
                          aria-describedby="roles-description"
                          name="role[]"
                          type="checkbox"
                          value="{{$role->id}}"
                          {{ ( is_array(old('role', isset($user->id) ? $user->roles->pluck('id')->all() : '')) && in_array($role->id, old('role', isset($user->id) ? $user->roles->pluck('id')->all() : '')))  ? 'checked' : '' }}
                          class="col-start-1 row-start-1 appearance-none rounded border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                        <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                          <path class="opacity-0 group-has-[:checked]:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                          <path class="opacity-0 group-has-[:indeterminate]:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                      </div>
                    </div>
                    <div class="text-sm/6">
                      <label for="role_{{$role->id}}" class="font-medium text-gray-900">{{$role->role_name}}</label>
                    </div>
                  </div>
                  @endforeach
                </div>
                @error('role')
                <p class="text-red-400 text-sm mt-5">{{ $message }}</p>
                @enderror
              </fieldset>
            </div>
          </div>
          @endif

          <div class="border-b border-gray-900/10 pb-12">
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="sm:col-span-3">
                <label for="status" class="block text-sm/6 font-medium text-gray-900">Status</label>
                <div class="mt-2 grid grid-cols-1">
                  <select id="status" name="status" autocomplete="status-name" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    <option
                      value="1"
                      {{ old('is_active', isset($user->id) ? $user->is_active : '') == '1' ? 'selected' : ''  }}>
                      Active
                    </option>
                    <option
                      value="0"
                      {{ old('is_active', isset($user->id) ? $user->is_active : '') == '0' ? 'selected' : ''  }}>
                      Inactive
                    </option>
                  </select>
                  <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                    <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                  </svg>
                </div>
              </div>
            </div>
          </div>

          <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
            <button type="submit" class="rounded-md bg-gray-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
          </div>
      </form>
  </div>

</x-admin.layout>