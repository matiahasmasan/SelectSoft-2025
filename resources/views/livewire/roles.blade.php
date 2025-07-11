<div x-data="{ addRoleModalOpen: false, roleName: '' }" class="card shadow-lg container mx-auto px-2 sm:px-4 lg:px-6 py-6 w-full max-w-7xl">
    <!-- Title and Add Role Button -->
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-6 gap-4">
        <span class="card-title">{{ __('Roluri') }}</span>
        <button class="btn btn-primary btn-sm lg:btn-md flex items-center gap-2 px-4 py-2 text-sm lg:text-base font-semibold rounded-lg shadow hover:bg-primary-focus transition w-full sm:w-auto" @click="addRoleModalOpen = true">
            <span class="icon-[tabler--plus] text-base lg:text-lg"></span>
            <span>{{ __('Adaugă rol') }}</span>
        </button>
    </div>

    <!-- Add Role Modal -->
    <div x-show="addRoleModalOpen" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center bg-black/40">
        <div class="bg-base-100 rounded-lg shadow-lg w-full max-w-md p-6 relative">
            <h2 class="text-lg font-semibold mb-4">{{ __('Adaugă rol nou') }}</h2>
            <input type="text" x-model="roleName" class="input input-bordered w-full mb-4" placeholder="{{ __('Nume rol') }}" />
            <div class="flex justify-end gap-2">
                <button class="btn btn-primary" @click="addRoleModalOpen = false">{{ __('Adaugă') }}</button>
                <button class="btn btn-ghost" @click="addRoleModalOpen = false">{{ __('Renunță') }}</button>
            </div>
            <button class="absolute top-2 right-2 btn btn-ghost btn-sm" @click="addRoleModalOpen = false">
                <span class="icon-[tabler--x] size-5"></span>
            </button>
        </div>
    </div>

    <!-- Search and Sort Bar (Responsive Layout) -->
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
            
            <!-- Sort Row -->
            <div class="flex">
                <select class="select select-bordered select-sm md:select-md max-w-xs">
                    <option>{{ __('Sortează după') }}</option>
                    <option>{{ __('Rol') }}</option>
                    <option>{{ __('ID') }}</option>
                </select>
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
        </div>
    </div>

    <!-- Roles Table -->
    <div class="overflow-x-auto rounded-lg shadow-xl bg-base-100">
        <table class="table w-full min-w-[400px] lg:min-w-[600px]">
            <thead>
                <tr class="bg-base-200 text-base-content/80">
                    <th class="py-3 lg:py-4 px-2 lg:px-4 text-center text-sm lg:text-base">{{ __('ID') }}</th>
                    <th class="py-3 lg:py-4 px-2 lg:px-4 text-center text-sm lg:text-base">{{ __('Rol') }}</th>
                    <th class="py-3 lg:py-4 px-2 lg:px-4 text-center text-sm lg:text-base">{{ __('Acțiune') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr class="hover">
                    <td class="py-3 lg:py-4 px-2 lg:px-4 text-center text-sm lg:text-base">1</td>
                    <td class="py-3 lg:py-4 px-2 lg:px-4 text-center text-sm lg:text-base">Administrator</td>
                    <td class="py-3 lg:py-4 px-2 lg:px-4 text-center">
                        <div class="flex justify-center gap-2">
                            <button class="btn btn-sm lg:btn-md btn-primary">
                                <span class="icon-[tabler--eye] size-4 lg:size-5"></span>
                            </button>
                            <button class="btn btn-sm lg:btn-md btn-error">
                                <span class="icon-[tabler--eraser] size-4 lg:size-5"></span>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr class="hover">
                    <td class="py-3 lg:py-4 px-2 lg:px-4 text-center text-sm lg:text-base">2</td>
                    <td class="py-3 lg:py-4 px-2 lg:px-4 text-center text-sm lg:text-base">Utilizator</td>
                    <td class="py-3 lg:py-4 px-2 lg:px-4 text-center">
                        <div class="flex justify-center gap-2">
                            <button class="btn btn-sm lg:btn-md btn-primary">
                                <span class="icon-[tabler--eye] size-4 lg:size-5"></span>
                            </button>
                            <button class="btn btn-sm lg:btn-md btn-error">
                                <span class="icon-[tabler--eraser] size-4 lg:size-5"></span>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- Pagination/Load More -->
        <div class="flex flex-col sm:flex-row items-center justify-between px-4 lg:px-6 py-3 lg:py-4 border-t border-base-200 bg-base-100">
            <div class="flex gap-1 lg:gap-2 mt-2 sm:mt-0">
                <button class="btn btn-ghost btn-xs lg:btn-sm">1</button>
                <button class="btn btn-ghost btn-xs lg:btn-sm">2</button>
                <button class="btn btn-ghost btn-xs lg:btn-sm">3</button>
                <span class="px-2 text-base-content/50 text-xs lg:text-sm">...</span>
                <button class="btn btn-ghost btn-xs lg:btn-sm">10</button>
            </div>
        </div>
    </div>
</div>