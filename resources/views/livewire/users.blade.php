<div x-data="{ deleteUserModalOpen: false, userToDelete: null, editUserModalOpen: false, userToEdit: null }" class="card shadow-lg container mx-auto px-2 sm:px-4 lg:px-6 py-6 w-full max-w-7xl">
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-4 gap-4">
        <span class="card-title">{{ __('Utilizatori') }}</span>
        <button class="btn btn-primary btn-sm lg:btn-md flex items-center gap-2 px-4 py-2 text-sm lg:text-base font-semibold rounded-lg shadow hover:bg-primary-focus transition w-full sm:w-auto">
            <span class="icon-[tabler--plus] text-base lg:text-lg"></span>
            <a href="{{ route('register') }}" wire:navigate>{{ __('Adaugă utilizator') }}</a>
        </button>
    </div>

    <!-- FILTERS (unchanged) -->
    <div class="space-y-3 xl:space-y-0 mb-2 xl:mb-6">
        <!-- Mobile Tablet -->
        <div class="block xl:hidden space-y-4">
            <div class="flex gap-2">
                <div class="relative flex-1">
                    <input type="text" wire:model.live.debounce.200ms="term" class="input input-bordered input-sm w-full pr-10 min-h-[2.5rem] px-4" placeholder="{{ __('Caută...') }}" />
                    <span class="icon-[tabler--search] size-3 absolute right-2 top-1/2 -translate-y-1/2 pointer-events-none"></span>
                </div>
            </div>
            <!-- Row 1: Custom Dropdowns -->
            <div class="flex gap-2">
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
                <!-- Filtrează după Dropdown -->
                <div x-data="{ open: false, selected: '{{ __('Filtrează după') }}' }" class="relative flex-1">
                    <button @click="open = !open" type="button"
                        class="select select-bordered select-sm md:select-md w-full text-left bg-base-100 text-base-content flex items-center px-4 py-2 rounded-box"
                        style="min-height: 2.5rem;">
                        <span x-text="selected" class="flex-1"></span>
                    </button>
                    <ul x-show="open" @click.away="open = false"
                        class="absolute z-10 mt-1 w-full bg-base-100 border border-base-300 rounded-box shadow max-h-48 overflow-y-auto text-base-content">
                        <li @click="selected = '{{ __('Filtrează după') }}'; open = false"
                            class="px-4 py-2 cursor-pointer hover:bg-primary hover:text-primary-content transition rounded-box"
                            :class="{ 'bg-primary text-primary-content': selected === '{{ __('Filtrează după') }}' }">
                            {{ __('Filtrează după') }}
                        </li>
                        <li @click="selected = '{{ __('Rol') }}'; open = false"
                            class="px-4 py-2 cursor-pointer hover:bg-primary hover:text-primary-content transition rounded-box"
                            :class="{ 'bg-primary text-primary-content': selected === '{{ __('Rol') }}' }">
                            {{ __('Rol') }}
                        </li>
                        <li @click="selected = '{{ __('Companie') }}'; open = false"
                            class="px-4 py-2 cursor-pointer hover:bg-primary hover:text-primary-content transition rounded-box"
                            :class="{ 'bg-primary text-primary-content': selected === '{{ __('Companie') }}' }">
                            {{ __('Companie') }}
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Row 2 -->
            <div class="flex gap-2">
                <div class="relative flex-1">
                    <input type="text" class="input input-bordered input-sm w-full pr-10 min-h-[2.5rem] px-4" placeholder="{{ __('Atasati la ...') }}" />
                    <span class="icon-[tabler--user-cog] size-3 absolute right-2 top-1/2 -translate-y-1/2 pointer-events-none"></span>
                </div>
                <label class="flex items-center gap-2 whitespace-nowrap flex-1 min-h-[2.5rem] px-4">
                    <input type="checkbox" class="checkbox checkbox-primary checkbox-xs" id="showAllUsers" />
                    <span class="label-text text-xs">{{ __('Afișează toți') }}</span>
                </label>
            </div>
        </div>

        <!-- Desktop -->
        <div class="hidden xl:flex items-center gap-3">
            <div class="flex flex-1 gap-2 min-w-0">
                <div class="relative w-full min-w-0">
                    <input type="text" wire:model.live.debounce.200ms="term" class="input input-bordered input-md w-full pr-10 min-w-0" placeholder="{{ __('Caută...') }}" />
                    <span class="icon-[tabler--search] size-4 absolute right-2 top-1/2 -translate-y-1/2 pointer-events-none"></span>
                </div>
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
            <!-- Filtrează după Dropdown -->
            <div x-data="{ open: false, selected: '{{ __('Filtrează după') }}' }" class="relative w-44 flex-shrink-0">
                <button @click="open = !open" type="button"
                    class="select select-bordered select-md w-full text-left bg-base-100 text-base-content flex items-center px-4 py-2 rounded-box"
                    style="min-height: 2.5rem;">
                    <span x-text="selected" class="flex-1"></span>
                </button>
                <ul x-show="open" @click.away="open = false"
                    class="absolute z-10 mt-1 w-full bg-base-100 border border-base-300 rounded-box shadow max-h-48 overflow-y-auto text-base-content">
                    <li @click="selected = '{{ __('Filtrează după') }}'; open = false"
                        class="px-4 py-2 cursor-pointer hover:bg-primary hover:text-primary-content transition rounded-box"
                        :class="{ 'bg-primary text-primary-content': selected === '{{ __('Filtrează după') }}' }">
                        {{ __('Filtrează după') }}
                    </li>
                    <li @click="selected = '{{ __('Rol') }}'; open = false"
                        class="px-4 py-2 cursor-pointer hover:bg-primary hover:text-primary-content transition rounded-box"
                        :class="{ 'bg-primary text-primary-content': selected === '{{ __('Rol') }}' }">
                        {{ __('Rol') }}
                    </li>
                    <li @click="selected = '{{ __('Companie') }}'; open = false"
                        class="px-4 py-2 cursor-pointer hover:bg-primary hover:text-primary-content transition rounded-box"
                        :class="{ 'bg-primary text-primary-content': selected === '{{ __('Companie') }}' }">
                        {{ __('Companie') }}
                    </li>
                </ul>
            </div>
            <div class="relative w-40 flex-shrink-0">
                <input type="text" class="input input-bordered input-md w-full pr-10" placeholder="{{ __('Atasati la ...') }}" />
                <span class="icon-[tabler--user-cog] size-4 absolute right-2 top-1/2 -translate-y-1/2 pointer-events-none"></span>
            </div>
            <label class="flex items-center gap-2 whitespace-nowrap flex-shrink-0">
                <input type="checkbox" class="checkbox checkbox-primary checkbox-md" id="showAllUsers" />
                <span class="label-text text-sm">{{ __('Afișează toți') }}</span>
            </label>
        </div>
    </div>

    <!-- Users Table (Desktop Only) -->
    <div class="overflow-x-auto rounded-lg shadow-sm bg-base-100 hidden xl:block">
        <table class="table w-full min-w-[600px] lg:min-w-[800px]">
            <thead>
                <tr class="bg-base-200 text-base-content/80">
                    <th class="py-3 lg:py-4 px-2 lg:px-3 text-xs lg:text-sm">{{ __('ID') }}</th>
                    <th class="py-3 lg:py-4 px-2 lg:px-3 text-xs lg:text-sm">{{ __('Email') }}</th>
                    <th class="py-3 lg:py-4 px-2 lg:px-3 text-xs lg:text-sm">{{ __('Companie') }}</th>
                    <th class="py-3 lg:py-4 px-2 lg:px-3 text-xs lg:text-sm">{{ __('Rol') }}</th>
                    <th class="py-3 lg:py-4 px-2 lg:px-3 text-xs lg:text-sm">{{ __('Subordonat') }}</th>
                    <th class="py-3 lg:py-4 px-2 lg:px-3 text-xs lg:text-sm">{{ __('Acțiune') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="hover">
                    <td class="py-3 lg:py-4 px-2 lg:px-3 text-xs lg:text-sm">{{ $user['id'] }}</td>
                    <td class="py-3 lg:py-4 px-2 lg:px-3 text-xs lg:text-sm">{{ $user['email'] }}</td>
                    <td class="py-3 lg:py-4 px-2 lg:px-3 text-xs lg:text-sm">{{ $user['companie'] }}</td>
                    <td class="py-3 lg:py-4 px-2 lg:px-3 text-xs lg:text-sm">{{ $user['rol'] }}</td>
                    <td class="py-3 lg:py-4 px-2 lg:px-3 text-xs lg:text-sm">{{ $user['subordonat'] }}</td>
                    <td class="py-3 lg:py-4 px-2 lg:px-3">
                        <div class="flex gap-2">
                            <button class="btn btn-xs lg:btn-sm btn-primary" @click="editUserModalOpen = true; userToEdit = { id: '{{ $user['id'] }}', rol: '{{ $user['rol'] }}', subordonat: '{{ $user['subordonat'] }}' }">
                                <span class="icon-[tabler--edit] size-4 lg:size-5"></span>
                            </button>
                            <button class="btn btn-xs lg:btn-sm btn-error" @click="deleteUserModalOpen = true; userToDelete = { id: '{{ $user['id'] }}', email: '{{ $user['email'] }}' }">
                                <span class="icon-[tabler--eraser] size-4 lg:size-5"></span>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <!-- Simple Pagination -->
        <x-pagination :paginator="$users" />
    </div>

    <!-- User List (Mobile/Tablet Only) -->
    <div class="block xl:hidden w-full">
        <ul class="border-base-content/25 divide-base-content/25 *:last:rounded-b-md divide-y rounded-md border *:p-3 *:first:rounded-t-md">
            @foreach($users as $user)
            <li class="flex items-center gap-3">
                <div class="flex grow flex-col min-w-0">
                    <h6 class="text-base text-base-content truncate">{{ $user['email'] }}</h6>
                    <small class="text-base-content/50 text-xs truncate block">{{ $user['companie'] }}</small>
                    <div class="flex items-center gap-2 mt-1">
                        <span class="badge badge-outline badge-sm text-gray-800 dark:text-gray-300">#{{ $user['id'] }}</span>
                        <span class="badge badge-ghost badge-sm"><span class="icon-[tabler--user] size-3 lg:size-4"></span>{{ $user['rol'] }}</span>
                    </div>
                    <div class="flex items-center gap-2 mt-2">
                        @if(!empty($user['subordonat']) && $user['subordonat'] !== '-')
                        <span class="badge badge-ghost badge-xs"><span class="icon-[tabler--user-cog] size-3 lg:size-4"></span>{{ $user['subordonat'] }}</span>
                        @endif
                    </div>
                </div>
                <div class="flex gap-2 items-end ms-auto">
                    <button class="btn btn-xs btn-primary" @click="editUserModalOpen = true; userToEdit = { id: '{{ $user['id'] }}', rol: '{{ $user['rol'] }}', subordonat: '{{ $user['subordonat'] }}' }">
                        <span class="icon-[tabler--edit] size-4"></span>
                    </button>
                    <button class="btn btn-xs btn-error" @click="deleteUserModalOpen = true; userToDelete = { id: '{{ $user['id'] }}', email: '{{ $user['email'] }}' }">
                        <span class="icon-[tabler--eraser] size-4"></span>
                    </button>
                </div>
            </li>
            @endforeach
        </ul>
        
        <!-- Simple Pagination (Mobile) -->
        <x-pagination :paginator="$users" />
    </div>

    <!-- DELETE USER MODAL -->
    <div x-show="deleteUserModalOpen" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center bg-black/40">
        <div class="bg-base-100 rounded-lg shadow-lg w-full max-w-md p-6 relative">
            <h2 class="text-lg font-semibold mb-4">{{ __('Șterge utilizator') }}</h2>
            <p class="mb-4">{{ __('Ești sigur că vrei să ștergi acest utilizator?') }}</p>
            <template x-if="userToDelete">
                <div class="mb-4">
                    <span class="font-semibold">{{ __('Email:') }}</span>
                    <span class="ml-2 text-error" x-text="userToDelete.email"></span>
                </div>
            </template>
            <div class="flex justify-end gap-2">
                <button class="btn btn-primary" @click="deleteUserModalOpen = false">{{ __('Șterge') }}</button>
                <button class="btn btn-error" @click="deleteUserModalOpen = false">{{ __('Renunță') }}</button>
            </div>
        </div>
    </div>

    <!-- EDIT USER MODAL -->
    <div x-show="editUserModalOpen" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center bg-black/40">
        <div class="bg-base-100 rounded-lg shadow-lg w-full max-w-md p-6 relative">
            <h2 class="text-lg font-semibold mb-4">{{ __('Editează utilizator') }}</h2>
            <template x-if="userToEdit">
                <form @submit.prevent>
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">{{ __('Rol') }}</label>
                        <div x-data="{ 
                            open: false, 
                            selected: userToEdit.rol, 
                            init() { this.$watch('userToEdit.rol', value => this.selected = value); } 
                        }" class="relative">
                            <button
                                @click="open = !open"
                                type="button"
                                class="select select-bordered w-full text-left bg-base-100 text-base-content flex items-center px-4 py-2"
                                style="min-height: 2.5rem;"
                            >
                                <span x-text="selected || 'Selectează rolul'" class="flex-1"></span>
                            </button>
                            <ul x-show="open" @click.away="open = false"
                                class="absolute z-10 mt-1 w-full bg-base-100 border border-base-300 rounded-box shadow max-h-48 overflow-y-auto text-base-content">
                                @foreach($roles as $role)
                                    <li @click="selected = '{{ $role['rol'] }}'; userToEdit.rol = '{{ $role['rol'] }}'; open = false"
                                        class="px-4 py-2 cursor-pointer hover:bg-primary hover:text-primary-content transition"
                                        :class="{ 'bg-primary text-primary-content': selected === '{{ $role['rol'] }}' }">
                                        {{ $role['rol'] }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">{{ __('Subordonat') }}</label>
                        <div x-data="{ 
                            open: false, 
                            selected: userToEdit.subordonat, 
                            init() { this.$watch('userToEdit.subordonat', value => this.selected = value); } 
                        }" class="relative">
                            <button @click="open = !open" type="button"
                                class="select select-bordered w-full text-left bg-base-100 text-base-content flex items-center px-4 py-2"
                                style="min-height: 2.5rem;">
                                <span x-text="selected || 'Niciunul'" class="flex-1"></span>
                            </button>
                            <ul x-show="open" @click.away="open = false"
                                class="absolute z-10 mt-1 w-full bg-base-100 border border-base-300 rounded-box shadow max-h-48 overflow-y-auto text-base-content">
                                <li @click="selected = ''; userToEdit.subordonat = ''; open = false"
                                    class="px-4 py-2 cursor-pointer hover:bg-primary hover:text-primary-content transition"
                                    :class="{ 'bg-primary text-primary-content': selected === '' }">
                                    {{ __('Niciunul') }}
                                </li>
                                @foreach($allUsers->pluck('subordonat')->unique()->filter(fn($s) => $s && $s !== '-') as $subordonat)
                                    <li @click="selected = '{{ $subordonat }}'; userToEdit.subordonat = '{{ $subordonat }}'; open = false"
                                        class="px-4 py-2 cursor-pointer hover:bg-primary hover:text-primary-content transition"
                                        :class="{ 'bg-primary text-primary-content': selected === '{{ $subordonat }}' }">
                                        {{ $subordonat }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="flex justify-end gap-2">
                        <button class="btn btn-primary" type="submit">{{ __('Salvează') }}</button>
                        <button class="btn btn-error" type="button" @click="editUserModalOpen = false">{{ __('Renunță') }}</button>
                    </div>
                </form>
            </template> 
        </div>
    </div>
</div>