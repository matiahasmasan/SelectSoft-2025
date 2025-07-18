<div class="card shadow-lg container mx-auto px-2 sm:px-4 lg:px-6 py-6 w-full max-w-7xl">
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-4 gap-4">
        <span class="card-title">{{ __('Permisiuni') }}</span>
        <button class="btn btn-primary btn-sm lg:btn-md flex items-center gap-2 px-4 py-2 text-sm lg:text-base font-semibold rounded-lg shadow hover:bg-primary-focus transition w-full sm:w-auto" @click="addRoleModalOpen = true">
            <span class="icon-[tabler--edit] text-base lg:text-lg"></span>
            <span>{{ __('Editează') }}</span>
        </button>
    </div>
    
    <!-- FILTERS -->
    <div class="space-y-3 xl:space-y-0 mb-2 xl:mb-6">
        <!-- Mobile Tablet-->
        <div class="block xl:hidden space-y-4">
            <div class="flex gap-2">
                <div class="relative flex-1">
                    <input type="text" class="input input-bordered input-sm w-full pr-10 min-h-[2.5rem] px-4" placeholder="{{ __('Caută...') }}" />
                    <span class="icon-[tabler--search] size-3 absolute right-2 top-1/2 -translate-y-1/2 pointer-events-none"></span>
                </div>
            </div>
            <!-- Row -->
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
                <!-- Custom Roles Dropdown -->
                <div x-data="{ open: false, selected: '{{ __('Selectează rolul') }}' }" class="relative flex-1">
                    <button @click="open = !open" type="button"
                        class="select select-bordered select-sm md:select-md w-full text-left bg-base-100 text-base-content flex items-center px-4 py-2 rounded-box"
                        style="min-height: 2.5rem;">
                        <span x-text="selected" class="flex-1"></span>
                    </button>
                    <ul x-show="open" @click.away="open = false"
                        class="absolute z-10 mt-1 w-full bg-base-100 border border-base-300 rounded-box shadow max-h-48 overflow-y-auto text-base-content">
                        <li @click="selected = '{{ __('Selectează rolul') }}'; open = false"
                            class="px-4 py-2 cursor-pointer hover:bg-primary hover:text-primary-content transition rounded-box"
                            :class="{ 'bg-primary text-primary-content': selected === '{{ __('Selectează rolul') }}' }">
                            {{ __('Selectează rolul') }}
                        </li>
                        @foreach($roles as $role)
                        <li @click="selected = '{{ $role['rol'] }}'; open = false"
                            class="px-4 py-2 cursor-pointer hover:bg-primary hover:text-primary-content transition rounded-box"
                            :class="{ 'bg-primary text-primary-content': selected === '{{ $role['rol'] }}' }">
                            {{ $role['rol'] }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Desktop -->
        <div class="hidden xl:flex items-center gap-3">
            <div class="flex flex-1 gap-2 min-w-0">
                <div class="relative w-full min-w-0">
                    <input type="text" class="input input-bordered input-md w-full pr-10 min-w-0" placeholder="{{ __('Caută...') }}" />
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
            <div x-data="{ open: false, selected: '{{ __('Selectează rolul') }}' }" class="relative w-44 flex-shrink-0">
                <button @click="open = !open" type="button"
                    class="select select-bordered select-md w-full text-left bg-base-100 text-base-content flex items-center px-4 py-2 rounded-box"
                    style="min-height: 2.5rem;">
                    <span x-text="selected" class="flex-1"></span>
                </button>
                <ul x-show="open" @click.away="open = false"
                    class="absolute z-10 mt-1 w-full bg-base-100 border border-base-300 rounded-box shadow max-h-48 overflow-y-auto text-base-content">
                    <li @click="selected = '{{ __('Selectează rolul') }}'; open = false"
                        class="px-4 py-2 cursor-pointer hover:bg-primary hover:text-primary-content transition rounded-box"
                        :class="{ 'bg-primary text-primary-content': selected === '{{ __('Selectează rolul') }}' }">
                        {{ __('Selectează rolul') }}
                    </li>
                    @foreach($roles as $role)
                    <li @click="selected = '{{ $role['rol'] }}'; open = false"
                        class="px-4 py-2 cursor-pointer hover:bg-primary hover:text-primary-content transition rounded-box"
                        :class="{ 'bg-primary text-primary-content': selected === '{{ $role['rol'] }}' }">
                        {{ $role['rol'] }}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <!-- Permissions  -->
    <div class="w-full space-y-3 lg:space-y-4">
        <!-- CATEGORIES -->
        @foreach($permissions as $category)
            <div x-data="{ open: false }" class="border rounded-lg bg-base-100 shadow transition-all duration-500">
                <button @click="open = !open" class="w-full flex justify-between items-center px-4 lg:px-6 py-3 lg:py-4 text-base lg:text-lg font-semibold focus:outline-none">
                    <span>{{ __($category['category']) }}</span>
                    <span :class="open ? 'rotate-180' : ''" class="transition-transform icon-[tabler--chevron-down] size-5 lg:size-6"></span>
                </button>
                <div x-show="open" x-transition:enter="transition-all ease-in-out duration-500" x-transition:enter-start="opacity-0 max-h-0" x-transition:enter-end="opacity-100 max-h-96" x-transition:leave="transition-all ease-in-out duration-400" x-transition:leave-start="opacity-100 max-h-96" x-transition:leave-end="opacity-0 max-h-0" class="overflow-hidden px-4 lg:px-6 pb-4 lg:pb-6">
                    <div class="flex flex-col gap-3 lg:gap-4">
                        <!-- PERMISSIONS -->
                        @foreach($category['items'] as $item)
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 sm:gap-0">
                                <span class="text-sm lg:text-base">{{ __($item['name']) }}</span>
                                <div class="flex gap-2 lg:gap-3">
                                    @foreach($item['rights'] as $right)
                                        <label class="cursor-pointer flex items-center gap-1">
                                            <input type="checkbox" class="checkbox checkbox-primary checkbox-sm lg:checkbox-md transition-all duration-200" />
                                            <span class="label-text text-xs lg:text-sm">{{ $right }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>