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
        <div class="block xl:hidden space-y-3">
            <div class="flex gap-2">
                <input type="text" class="input input-bordered input-sm md:input-md flex-1" placeholder="{{ __('Caută...') }}" />
            </div>
            <!-- Row -->
            <div class="flex gap-2">
                <select class="select select-bordered select-sm md:select-md flex-1">
                    <option>{{ __('Sortează după') }}</option>
                    <option>{{ __('Rol') }}</option>
                    <option>{{ __('ID') }}</option>
                </select>
                <select class="select select-bordered select-sm md:select-md flex-1">
                    <option>{{ __('Selectează rolul') }}</option>
                    <option>Administrator</option>
                    <option>Utilizator</option>
                </select>
            </div>
        </div>

        <!-- Desktop -->
        <div class="hidden xl:flex items-center gap-3">
            <div class="flex flex-1 gap-2 min-w-0">
                <input type="text" class="input input-bordered input-md w-full min-w-0" placeholder="{{ __('Caută...') }}" />
            </div>
            <select class="select select-bordered select-md w-44 flex-shrink-0">
                <option>{{ __('Sortează după') }}</option>
                <option>{{ __('Rol') }}</option>
                <option>{{ __('ID') }}</option>
            </select>
            <select class="select select-bordered select-md w-44 flex-shrink-0">
                <option>{{ __('Selectează rolul') }}</option>
                <option>Administrator</option>
                <option>Utilizator</option>
            </select>
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