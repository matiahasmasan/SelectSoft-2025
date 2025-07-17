<div x-data="{ addRoleModalOpen: false, roleName: '', deleteRoleModalOpen: false, roleToDelete: null }" class="card shadow-lg container mx-auto px-2 sm:px-4 lg:px-6 py-6 w-full max-w-7xl">
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-4 gap-4">
        <span class="card-title">{{ __('Roluri') }}</span>
        <button class="btn btn-primary btn-sm lg:btn-md flex items-center gap-2 px-4 py-2 text-sm lg:text-base font-semibold rounded-lg shadow hover:bg-primary-focus transition w-full sm:w-auto" @click="addRoleModalOpen = true">
            <span class="icon-[tabler--plus] text-base lg:text-lg"></span>
            <span>{{ __('Adaugă rol') }}</span>
        </button>   
    </div>
    <!-- FILTERS -->
    <div class="space-y-3 xl:space-y-0 mb-2 xl:mb-6">
        <!-- Mobile Tablet -->
        <div class="block xl:hidden space-y-4">
            <div class="flex gap-2">
                <div class="relative flex-1">
                    <input type="text" class="input input-bordered input-sm w-full pr-10 min-h-[2.5rem] px-4" placeholder="{{ __('Caută...') }}" />
                    <span class="icon-[tabler--search] size-3 absolute right-2 top-1/2 -translate-y-1/2 pointer-events-none"></span>
                </div>
                <!-- Sortează după Dropdown -->
                <div x-data="{ open: false, selected: '{{ __('Sortează după') }}' }" class="relative flex-1">
                    <button @click="open = !open" type="button"
                        class="select select-bordered select-sm md:select-md w-full text-left bg-base-100 text-base-content flex items-center px-4 py-2 rounded-box"
                        style="min-height: 2.5rem;">
                        <span x-text="selected" class="flex-1"></span>
                    </button>
                    <ul x-show="open" @click.away="open = false"
                        class="absolute z-10 mt-1 w-full bg-base-100 border border-base-300 rounded-box shadow max-h-48 overflow-y-auto text-base-content">
                        <li @click="selected = '{{ __('Sortează după') }}'; open = false"
                            class="px-4 py-2 cursor-pointer hover:bg-primary hover:text-primary-content transition rounded-box"
                            :class="{ 'bg-primary text-primary-content': selected === '{{ __('Sortează după') }}' }">
                            {{ __('Sortează după') }}
                        </li>
                        <li @click="selected = '{{ __('Nume') }}'; open = false"
                            class="px-4 py-2 cursor-pointer hover:bg-primary hover:text-primary-content transition rounded-box"
                            :class="{ 'bg-primary text-primary-content': selected === '{{ __('Nume') }}' }">
                            {{ __('Nume') }}
                        </li>
                        <li @click="selected = '{{ __('Data adăugării') }}'; open = false"
                            class="px-4 py-2 cursor-pointer hover:bg-primary hover:text-primary-content transition rounded-box"
                            :class="{ 'bg-primary text-primary-content': selected === '{{ __('Data adăugării') }}' }">
                            {{ __('Data adăugării') }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Desktop -->
        <div class="hidden xl:flex items-center gap-3">
            <div class="relative w-full min-w-0">
                <input type="text" class="input input-bordered input-md w-full pr-10 min-w-0" placeholder="{{ __('Caută...') }}" />
                <span class="icon-[tabler--search] size-4 absolute right-2 top-1/2 -translate-y-1/2 pointer-events-none"></span>
            </div>
            <!-- Sortează după Dropdown -->
            <div x-data="{ open: false, selected: '{{ __('Sortează după') }}' }" class="relative w-44 flex-shrink-0">
                <button @click="open = !open" type="button"
                    class="select select-bordered select-md w-full text-left bg-base-100 text-base-content flex items-center px-4 py-2 rounded-box"
                    style="min-height: 2.5rem;">
                    <span x-text="selected" class="flex-1"></span>
                </button>
                <ul x-show="open" @click.away="open = false"
                    class="absolute z-10 mt-1 w-full bg-base-100 border border-base-300 rounded-box shadow max-h-48 overflow-y-auto text-base-content">
                    <li @click="selected = '{{ __('Sortează după') }}'; open = false"
                        class="px-4 py-2 cursor-pointer hover:bg-primary hover:text-primary-content transition rounded-box"
                        :class="{ 'bg-primary text-primary-content': selected === '{{ __('Sortează după') }}' }">
                        {{ __('Sortează după') }}
                    </li>
                    <li @click="selected = '{{ __('Nume') }}'; open = false"
                        class="px-4 py-2 cursor-pointer hover:bg-primary hover:text-primary-content transition rounded-box"
                        :class="{ 'bg-primary text-primary-content': selected === '{{ __('Nume') }}' }">
                        {{ __('Nume') }}
                    </li>
                    <li @click="selected = '{{ __('Data adăugării') }}'; open = false"
                        class="px-4 py-2 cursor-pointer hover:bg-primary hover:text-primary-content transition rounded-box"
                        :class="{ 'bg-primary text-primary-content': selected === '{{ __('Data adăugării') }}' }">
                        {{ __('Data adăugării') }}
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Roles Table (Desktop Only) -->
    <div class="overflow-x-auto rounded-lg shadow-sm bg-base-100 hidden xl:block">
        <table class="table w-full min-w-[400px] lg:min-w-[600px]">
            <thead>
                <tr class="bg-base-200 text-base-content/80">
                    <th class="py-3 lg:py-4 px-2 lg:px-4 text-center text-sm lg:text-base">{{ __('ID') }}</th>
                    <th class="py-3 lg:py-4 px-2 lg:px-4 text-center text-sm lg:text-base">{{ __('Rol') }}</th>
                    <th class="py-3 lg:py-4 px-2 lg:px-4 text-center text-sm lg:text-base">{{ __('Acțiune') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                <tr class="hover">
                        <td class="py-3 lg:py-4 px-2 lg:px-4 text-center text-sm lg:text-base">{{ $role['id'] }}</td>
                        <td class="py-3 lg:py-4 px-2 lg:px-4 text-center text-sm lg:text-base">{{ $role['rol'] }}</td>
                    <td class="py-3 lg:py-4 px-2 lg:px-4 text-center">
                        <div class="flex justify-center gap-2">
                            <button class="btn btn-xs lg:btn-sm btn-primary">
                                <span class="icon-[tabler--eye] size-4 lg:size-5"></span>
                            </button>
                            <button class="btn btn-xs lg:btn-sm btn-error" @click="deleteRoleModalOpen = true; roleToDelete = { id: '{{ $role['id'] }}', rol: '{{ $role['rol'] }}' }">
                                <span class="icon-[tabler--eraser] size-4 lg:size-5"></span>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Pagination -->
        <x-pagination :paginator="$roles" />
    </div>
    <!-- Roles List (Mobile/Tablet Only) -->
    <div class="block xl:hidden w-full">
      <ul class="border-base-content/25 divide-base-content/25 *:last:rounded-b-md divide-y rounded-md border *:p-3 *:first:rounded-t-md">
        @foreach($roles as $role)
        <li class="flex items-center gap-3">
          <!-- ID Badge -->
          <div class="flex grow flex-col min-w-0">
            <h6 class="text-base text-base-content truncate">{{ $role['rol'] }}</h6>
            <div class="flex items-center gap-2 mt-1">
                <span class="badge badge-outline badge-sm  text-gray-800 dark:text-gray-300">#{{ $role['id'] }}</span>
            </div>
          </div>
          <div class="flex gap-2 items-end ms-auto">
            <button class="btn btn-xs btn-primary">
              <span class="icon-[tabler--eye] size-4"></span>
            </button>
            <button class="btn btn-xs btn-error" @click="deleteRoleModalOpen = true; roleToDelete = { id: '{{ $role['id'] }}', rol: '{{ $role['rol'] }}' }">
              <span class="icon-[tabler--eraser] size-4"></span>
            </button>
          </div>
        </li>
        @endforeach
      </ul>
      <!-- Pagination (Mobile) -->
      <x-pagination :paginator="$roles" />
    </div>
    <!-- MODAL -->
    <x-modal x-show="addRoleModalOpen" title="{{ __('Adaugă rol nou') }}">
        <x-slot name="body">
            <input type="text" x-model="roleName" class="input input-bordered w-full mb-4" placeholder="{{ __('Nume rol') }}" />
        </x-slot>
        <x-slot name="footer">
            <button class="btn btn-primary" @click="addRoleModalOpen = false">{{ __('Adaugă') }}</button>
            <button class="btn btn-error" @click="addRoleModalOpen = false">{{ __('Renunță') }}</button>
        </x-slot>
    </x-modal>
    <!-- DELETE ROLE MODAL -->
    <x-modal x-show="deleteRoleModalOpen" title="{{ __('Șterge rol') }}">
        <x-slot name="body">
            <p class="mb-4">{{ __('Ești sigur că vrei să ștergi acest rol?') }}</p>
            <template x-if="roleToDelete">
                <div class="mb-4">
                    <span class="font-semibold">{{ __('Rol:') }}</span>
                    <span class="ml-2 text-error" x-text="roleToDelete.rol"></span>
                </div>
            </template>
        </x-slot>
        <x-slot name="footer">
            <button class="btn btn-primary" @click="deleteRoleModalOpen = false">{{ __('Șterge') }}</button>
            <button class="btn btn-error" @click="deleteRoleModalOpen = false">{{ __('Renunță') }}</button>
        </x-slot>
    </x-modal>
</div>