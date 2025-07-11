<div class="card shadow-lg container mx-auto px-2 sm:px-4 lg:px-6 py-6 w-full max-w-7xl">
    <!-- Title Row -->
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-6 gap-4">
        <span class="card-title">{{ __('Permisiuni') }}</span>
        
    </div>
    
    <!-- Search, Sort, and Role Bar (Responsive Layout) -->
    <div class="space-y-3 xl:space-y-0 mb-4">
        <!-- Mobile/Tablet: Stacked Layout -->
        <div class="block xl:hidden space-y-3">
            <!-- Search Row -->
            <div class="flex gap-2">
                <input type="text" class="input input-bordered input-sm md:input-md flex-1" placeholder="{{ __('Caută...') }}" />
                <button class="btn btn-primary btn-sm md:btn-md px-3">
                    <span class="icon-[tabler--search] size-4 md:size-5"></span>
                </button>
            </div>
            
            <!-- Filters Row -->
            <div class="flex flex-col sm:flex-row gap-2">
                <select class="select select-bordered select-sm md:select-md flex-1 sm:max-w-xs">
                    <option>{{ __('Sortează după') }}</option>
                    <option>{{ __('Rol') }}</option>
                    <option>{{ __('ID') }}</option>
                </select>
                <select class="select select-bordered select-sm md:select-md flex-1 sm:max-w-xs">
                    <option>{{ __('Selectează rolul') }}</option>
                    <option>Administrator</option>
                    <option>Utilizator</option>
                </select>
                <button class="btn btn-primary btn-sm md:btn-md px-6">{{ __('Editează') }}</button>
            </div>
        </div>

        <!-- Desktop: Horizontal Layout -->
        <div class="hidden xl:flex items-center gap-3">
            <div class="flex flex-1 gap-2 min-w-0">
                <input type="text" class="input input-bordered input-md w-full min-w-0" placeholder="{{ __('Caută...') }}" />
                <button class="btn btn-primary btn-md px-3 flex-shrink-0">
                    <span class="icon-[tabler--search] size-5"></span>
                </button>
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
            <button class="btn btn-primary btn-md px-6 flex-shrink-0">{{ __('Editează') }}</button>
        </div>
    </div>

    <!-- Permissions Accordions -->
    <div class="w-full space-y-3 lg:space-y-4">
        <!-- Accordion 1 -->
        <div x-data="{ open: false }" class="border rounded-lg bg-base-100 shadow transition-all duration-500">
            <button @click="open = !open" class="w-full flex justify-between items-center px-4 lg:px-6 py-3 lg:py-4 text-base lg:text-lg font-semibold focus:outline-none">
                <span>{{ __('Gestionare utilizatori') }}</span>
                <span :class="open ? 'rotate-180' : ''" class="transition-transform icon-[tabler--chevron-down] size-5 lg:size-6"></span>
            </button>
            <div x-show="open" x-transition:enter="transition-all ease-in-out duration-500" x-transition:enter-start="opacity-0 max-h-0" x-transition:enter-end="opacity-100 max-h-96" x-transition:leave="transition-all ease-in-out duration-400" x-transition:leave-start="opacity-100 max-h-96" x-transition:leave-end="opacity-0 max-h-0" class="overflow-hidden px-4 lg:px-6 pb-4 lg:pb-6">
                <div class="flex flex-col gap-3 lg:gap-4">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 sm:gap-0">
                        <span class="text-sm lg:text-base">{{ __('Vizualizare utilizatori') }}</span>
                        <div class="flex gap-2 lg:gap-3">
                            <label class="cursor-pointer flex items-center gap-1">
                                <input type="checkbox" class="checkbox checkbox-primary checkbox-sm lg:checkbox-md transition-all duration-200" />
                                <span class="label-text text-xs lg:text-sm">R</span>
                            </label>
                            <label class="cursor-pointer flex items-center gap-1">
                                <input type="checkbox" class="checkbox checkbox-primary checkbox-sm lg:checkbox-md transition-all duration-200" />
                                <span class="label-text text-xs lg:text-sm">W</span>
                            </label>
                            <label class="cursor-pointer flex items-center gap-1">
                                <input type="checkbox" class="checkbox checkbox-primary checkbox-sm lg:checkbox-md transition-all duration-200" />
                                <span class="label-text text-xs lg:text-sm">U</span>
                            </label>
                            <label class="cursor-pointer flex items-center gap-1">
                                <input type="checkbox" class="checkbox checkbox-primary checkbox-sm lg:checkbox-md transition-all duration-200" />
                                <span class="label-text text-xs lg:text-sm">D</span>
                            </label>
                        </div>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 sm:gap-0">
                        <span class="text-sm lg:text-base">{{ __('Adaugă utilizator') }}</span>
                        <div class="flex gap-2 lg:gap-3">
                            <label class="cursor-pointer flex items-center gap-1">
                                <input type="checkbox" class="checkbox checkbox-primary checkbox-sm lg:checkbox-md transition-all duration-200" />
                                <span class="label-text text-xs lg:text-sm">R</span>
                            </label>
                            <label class="cursor-pointer flex items-center gap-1">
                                <input type="checkbox" class="checkbox checkbox-primary checkbox-sm lg:checkbox-md transition-all duration-200" />
                                <span class="label-text text-xs lg:text-sm">W</span>
                            </label>
                            <label class="cursor-pointer flex items-center gap-1">
                                <input type="checkbox" class="checkbox checkbox-primary checkbox-sm lg:checkbox-md transition-all duration-200" />
                                <span class="label-text text-xs lg:text-sm">U</span>
                            </label>
                            <label class="cursor-pointer flex items-center gap-1">
                                <input type="checkbox" class="checkbox checkbox-primary checkbox-sm lg:checkbox-md transition-all duration-200" />
                                <span class="label-text text-xs lg:text-sm">D</span>
                            </label>
                        </div>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 sm:gap-0">
                        <span class="text-sm lg:text-base">{{ __('Șterge utilizator') }}</span>
                        <div class="flex gap-2 lg:gap-3">
                            <label class="cursor-pointer flex items-center gap-1">
                                <input type="checkbox" class="checkbox checkbox-primary checkbox-sm lg:checkbox-md transition-all duration-200" />
                                <span class="label-text text-xs lg:text-sm">R</span>
                            </label>
                            <label class="cursor-pointer flex items-center gap-1">
                                <input type="checkbox" class="checkbox checkbox-primary checkbox-sm lg:checkbox-md transition-all duration-200" />
                                <span class="label-text text-xs lg:text-sm">W</span>
                            </label>
                            <label class="cursor-pointer flex items-center gap-1">
                                <input type="checkbox" class="checkbox checkbox-primary checkbox-sm lg:checkbox-md transition-all duration-200" />
                                <span class="label-text text-xs lg:text-sm">U</span>
                            </label>
                            <label class="cursor-pointer flex items-center gap-1">
                                <input type="checkbox" class="checkbox checkbox-primary checkbox-sm lg:checkbox-md transition-all duration-200" />
                                <span class="label-text text-xs lg:text-sm">D</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Accordion 2 -->
        <div x-data="{ open: false }" class="border rounded-lg bg-base-100 shadow transition-all duration-500">
            <button @click="open = !open" class="w-full flex justify-between items-center px-4 lg:px-6 py-3 lg:py-4 text-base lg:text-lg font-semibold focus:outline-none">
                <span>{{ __('Gestionare rapoarte') }}</span>
                <span :class="open ? 'rotate-180' : ''" class="transition-transform icon-[tabler--chevron-down] size-5 lg:size-6"></span>
            </button>
            <div x-show="open" x-transition:enter="transition-all ease-in-out duration-500" x-transition:enter-start="opacity-0 max-h-0" x-transition:enter-end="opacity-100 max-h-96" x-transition:leave="transition-all ease-in-out duration-400" x-transition:leave-start="opacity-100 max-h-96" x-transition:leave-end="opacity-0 max-h-0" class="overflow-hidden px-4 lg:px-6 pb-4 lg:pb-6">
                <div class="flex flex-col gap-3 lg:gap-4">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 sm:gap-0">
                        <span class="text-sm lg:text-base">{{ __('Vizualizare rapoarte') }}</span>
                        <div class="flex gap-2 lg:gap-3">
                            <label class="cursor-pointer flex items-center gap-1">
                                <input type="checkbox" class="checkbox checkbox-primary checkbox-sm lg:checkbox-md transition-all duration-200" />
                                <span class="label-text text-xs lg:text-sm">R</span>
                            </label>
                            <label class="cursor-pointer flex items-center gap-1">
                                <input type="checkbox" class="checkbox checkbox-primary checkbox-sm lg:checkbox-md transition-all duration-200" />
                                <span class="label-text text-xs lg:text-sm">W</span>
                            </label>
                            <label class="cursor-pointer flex items-center gap-1">
                                <input type="checkbox" class="checkbox checkbox-primary checkbox-sm lg:checkbox-md transition-all duration-200" />
                                <span class="label-text text-xs lg:text-sm">U</span>
                            </label>
                            <label class="cursor-pointer flex items-center gap-1">
                                <input type="checkbox" class="checkbox checkbox-primary checkbox-sm lg:checkbox-md transition-all duration-200" />
                                <span class="label-text text-xs lg:text-sm">D</span>
                            </label>
                        </div>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 sm:gap-0">
                        <span class="text-sm lg:text-base">{{ __('Generează raport') }}</span>
                        <div class="flex gap-2 lg:gap-3">
                            <label class="cursor-pointer flex items-center gap-1">
                                <input type="checkbox" class="checkbox checkbox-primary checkbox-sm lg:checkbox-md transition-all duration-200" />
                                <span class="label-text text-xs lg:text-sm">R</span>
                            </label>
                            <label class="cursor-pointer flex items-center gap-1">
                                <input type="checkbox" class="checkbox checkbox-primary checkbox-sm lg:checkbox-md transition-all duration-200" />
                                <span class="label-text text-xs lg:text-sm">W</span>
                            </label>
                            <label class="cursor-pointer flex items-center gap-1">
                                <input type="checkbox" class="checkbox checkbox-primary checkbox-sm lg:checkbox-md transition-all duration-200" />
                                <span class="label-text text-xs lg:text-sm">U</span>
                            </label>
                            <label class="cursor-pointer flex items-center gap-1">
                                <input type="checkbox" class="checkbox checkbox-primary checkbox-sm lg:checkbox-md transition-all duration-200" />
                                <span class="label-text text-xs lg:text-sm">D</span>
                            </label>
                        </div>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 sm:gap-0">
                        <span class="text-sm lg:text-base">{{ __('Șterge raport') }}</span>
                        <div class="flex gap-2 lg:gap-3">
                            <label class="cursor-pointer flex items-center gap-1">
                                <input type="checkbox" class="checkbox checkbox-primary checkbox-sm lg:checkbox-md transition-all duration-200" />
                                <span class="label-text text-xs lg:text-sm">R</span>
                            </label>
                            <label class="cursor-pointer flex items-center gap-1">
                                <input type="checkbox" class="checkbox checkbox-primary checkbox-sm lg:checkbox-md transition-all duration-200" />
                                <span class="label-text text-xs lg:text-sm">W</span>
                            </label>
                            <label class="cursor-pointer flex items-center gap-1">
                                <input type="checkbox" class="checkbox checkbox-primary checkbox-sm lg:checkbox-md transition-all duration-200" />
                                <span class="label-text text-xs lg:text-sm">U</span>
                            </label>
                            <label class="cursor-pointer flex items-center gap-1">
                                <input type="checkbox" class="checkbox checkbox-primary checkbox-sm lg:checkbox-md transition-all duration-200" />
                                <span class="label-text text-xs lg:text-sm">D</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>