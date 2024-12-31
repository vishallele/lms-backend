<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>LMS</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="h-full">
  <div class="min-h-full">
    <nav class="bg-gray-800">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
          <div class="flex items-center">
            <div class="shrink-0">
              <img class="size-8" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
            </div>
            <div class="hidden md:block">
              <div class="ml-10 flex items-baseline space-x-4">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <x-admin.nav-link
                  href="/admin/dashboard"
                  :active="request()->is('admin/dashboard')">
                  Dashboard
                </x-admin.nav-link>

                <x-admin.nav-link
                  href="/admin/users"
                  :active="request()->is('admin/users')">
                  Users
                </x-admin.nav-link>

                <x-admin.nav-link
                  href="/admin/courses"
                  :active="request()->is('admin/courses')">
                  Courses
                </x-admin.nav-link>

                <x-admin.nav-link
                  href="/admin/payments"
                  :active="request()->is('admin/payments')">
                  Payments
                </x-admin.nav-link>

                <x-admin.nav-link
                  href="/admin/configuration"
                  :active="request()->is('admin/configuration')">
                  Configuration
                </x-admin.nav-link>

                <x-admin.nav-link
                  href="/admin/reports"
                  :active="request()->is('admin/reports')">
                  Reports
                </x-admin.nav-link>

              </div>
            </div>
          </div>
          <div class="hidden md:block">
            <div class="ml-4 flex items-center md:ml-6 gap-4">
              <span class="text-sm text-white">Vishal Lele</span>
              <button class="py-4 px-2 hover:bg-gray-700 text-white font-bold text-sm">
                Logout
              </button>
            </div>
          </div>
          <div class="-mr-2 flex md:hidden">
            <!-- Mobile menu button -->
            <button type="button" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
              <span class="absolute -inset-0.5"></span>
              <span class="sr-only">Open main menu</span>
              <!-- Menu open: "hidden", Menu closed: "block" -->
              <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
              </svg>
              <!-- Menu open: "block", Menu closed: "hidden" -->
              <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>
      </div>

      <!-- Mobile menu, show/hide based on menu state. -->
      <div class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
          <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
          <x-admin.nav-link
            href="/admin/dashboard"
            :active="request()->is('admin/dashboard')">
            Dashboard
          </x-admin.nav-link>

          <x-admin.nav-link
            href="/admin/users"
            :active="request()->is('admin/users')">
            Users
          </x-admin.nav-link>

          <x-admin.nav-link
            href="/admin/courses"
            :active="request()->is('admin/courses')">
            Courses
          </x-admin.nav-link>

          <x-admin.nav-link
            href="/admin/payments"
            :active="request()->is('admin/payments')">
            Payments
          </x-admin.nav-link>

          <x-admin.nav-link
            href="/admin/configuration"
            :active="request()->is('admin/configuration')">
            Configuration
          </x-admin.nav-link>

          <x-admin.nav-link
            href="/admin/reports"
            :active="request()->is('admin/reports')">
            Reports
          </x-admin.nav-link>
        </div>
        <div class="border-t border-gray-700 pb-3 pt-4">
          <div class="flex items-center justify-between px-4">
            <span class="text-sm text-white">Vishal Lele</span>
            <button class="py-4 px-2 hover:bg-gray-700 text-white font-bold text-sm">
              Logout
            </button>
          </div>
        </div>
      </div>
    </nav>

    <header class="bg-white shadow">
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{$page_heading}}</h1>
      </div>
    </header>
    <main>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        {{$slot}}
      </div>
    </main>
  </div>
</body>

</html>