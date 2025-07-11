<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data>

<head>
  @include('partials.head')
</head>

<body class="bg-base-200">


  <header class="bg-base-100 fixed inset-x-0 top-0 z-50 flex h-14 items-center px-4 shadow-md sm:hidden">

    <button type="button" class="btn btn-text btn-square" aria-controls="logo-sidebar" data-overlay="#logo-sidebar">
      <span class="icon-[tabler--menu-2] text-base-content size-6"></span>
    </button>
  </header>
  <div class="flex h-screen overflow-hidden pt-14 sm:pt-0">


    <aside id="logo-sidebar"
      class="overlay overlay-open:translate-x-0 drawer drawer-start lef-0 z-2 fixed inset-y-0 mt-14 hidden h-screen w-64 max-w-64 [--auto-close:sm] sm:static sm:z-auto sm:mt-0 sm:flex sm:translate-x-0 sm:shadow-none"
      role="dialog" tabindex="-1">
      <div class="drawer-header">
        <div class="flex items-center gap-3">
          <a href="{{ route('dashboard') }}" class="flex h-24 w-48 items-center justify-center rounded-md">
            <x-app-logo-icon class="text-primary h-24 w-48 fill-current" />
          </a>
        </div>
      </div>
      <div class="drawer-body px-2">
        <ul class="menu p-0">
          <li>
            <a href="{{ route('dashboard') }}" wire:navigate
              class="text-ghost text-base-content/70 hover:text-base-content w-full justify-start"
              wire:current="text-primary w-full justify-start">
              <span class="icon-[tabler--home] me-2 size-5"></span>
              {{ __('Tablou de bord') }}
            </a>
          </li>

          <li>
            <a href="{{ route('users') }}" wire:navigate
              class="text-ghost text-base-content/70 hover:text-base-content w-full justify-start"
              wire:current="text-primary w-full justify-start">
              <span class="icon-[tabler--user] me-2 size-5"></span>
              {{ __('Utilizatori') }}
            </a>
          </li>

          <li>
            <a href="{{ route('roles') }}" wire:navigate
              class="text-ghost text-base-content/70 hover:text-base-content w-full justify-start"
              wire:current="text-primary w-full justify-start">
              <span class="icon-[tabler--file] me-2 size-5"></span>
              {{ __('Roluri') }}
            </a>
          </li>

          <li>
            <a href="{{ route('permissions') }}" wire:navigate
              class="text-ghost text-base-content/70 hover:text-base-content w-full justify-start"
              wire:current="text-primary w-full justify-start">
              <span class="icon-[tabler--shield-lock] me-2 size-5"></span>
              {{ __('Permisiuni') }}
            </a>
          </li>

          <li>
            <a href="{{ route('settings') }}" wire:navigate
              class="text-ghost text-base-content/70 hover:text-base-content w-full justify-start"
              wire:current="text-primary w-full justify-start">
              <span class="icon-[tabler--settings] me-2 size-5"></span>
              {{ __('Setări') }}
            </a>
          </li>
          {{-- <li class="space-y-0.5">
              <a class="collapse-toggle collapse-open:bg-base-content/10 text-ghost hover:text-base-content text-base-content/70"
                id="menu-settings" data-collapse="#menu-settings-collapse">

                <span class="icon-[tabler--settings] me-2 size-5"></span>
                {{ __('Setari') }}
                <span
                  class="icon-[tabler--chevron-down] collapse-open:rotate-180 size-4 transition-all duration-300"></span>
              </a>
              <ul id="menu-settings-collapse"
                class="collapse hidden w-auto space-y-0.5 overflow-hidden transition-[height] duration-300"
                aria-labelledby="menu-settings">
                <li>
                  <a wire:navigate class="text-ghost text-base-content/70 hover:text-base-content w-full justify-start"
                    wire:current="text-primary w-full justify-start" href="{{ route('settings.profile') }}">
                    <span class="icon-[tabler--user] me-2 size-5"></span>
                    {{ __('Profil') }}
                  </a>
                </li>
                <li>
                  <a wire:navigate class="text-ghost text-base-content/70 hover:text-base-content w-full justify-start"
                    wire:current="text-primary w-full justify-start" href="{{ route('settings.password') }}">
                    <span class="icon-[tabler--key] me-2 size-5"></span>
                    {{ __('Parola') }}
                  </a>
                </li>
                <li>
                  <a wire:navigate class="text-ghost text-base-content/70 hover:text-base-content w-full justify-start"
                    wire:current="text-primary w-full justify-start" href="{{ route('settings.appearance') }}">
                    <span class="icon-[tabler--brush] me-2 size-5"></span>
                    {{ __('Afisare') }}
                  </a>
                </li>
              </ul>
            </li> --}}
          <li>
            <a href="{{ route('logout') }}"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
              class="text-base-content/70 hover:text-base-content inline-flex w-full items-center justify-start gap-2">
              <span class="icon-[tabler--logout-2] me-2 size-5"></span>
              {{ __('Deconectare') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
              @csrf
            </form>


          </li>
        </ul>
      </div>
    </aside>
    {{-- Content --}}
    <main class="flex-1 overflow-y-auto overflow-x-hidden sm:p-4 sm:pt-0">
      {{ $slot }}
    </main>
  </div>

</body>


</html>
