<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
          <img src="{{ Storage::url('images/imagen1.jpg') }}" class="h-8" alt="Flowbite Logo" />
          <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Sitio</span>
      </a>
      <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
        <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
            <x-nav-link href="{{ route('humans.index') }}" :active="request()->routeIs('humans.*')">
                <i class="fas fa-users mr-2"></i>Usuarios
            </x-nav-link>
            <x-nav-link href="{{ route('departaments.index') }}" :active="request()->routeIs('departaments.*')">
                <i class="fa-solid fa-house-user mr-2"></i>Departamentos
            </x-nav-link>
            <x-nav-link href="{{ route('roles.index') }}" :active="request()->routeIs('roles.*')">
                <i class="fa-solid fa-gears mr-2"></i>Roles
            </x-nav-link>
        </ul>
      </div>
    </div>
  </nav>