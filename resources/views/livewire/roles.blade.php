<div x-data="{ addRoleModalOpen: false, roleName: '' }" class="card shadow-lg container mx-auto px-2 sm:px-4 lg:px-6 py-6 w-full max-w-7xl">
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-4 gap-4">
        <span class="card-title">{{ __('Roluri') }}</span>
        <button class="btn btn-primary btn-sm lg:btn-md flex items-center gap-2 px-4 py-2 text-sm lg:text-base font-semibold rounded-lg shadow hover:bg-primary-focus transition w-full sm:w-auto" @click="addRoleModalOpen = true">
            <span class="icon-[tabler--plus] text-base lg:text-lg"></span>
            <span>{{ __('Adaugă rol') }}</span>
        </button>   
    </div>

    <!-- MODAL -->
    <!-- 
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
    -->
    <!-- FILTERS -->
    <div class="space-y-3 xl:space-y-0 mb-2 xl:mb-6">
        <!-- Mobile Tablet -->
        <div class="block xl:hidden space-y-3">
            <div class="flex gap-2">
                <input type="text" class="input input-bordered input-sm md:input-md max-w-xs" placeholder="{{ __('Caută...') }}" />
                <select class="select select-bordered select-sm md:select-md max-w-xs">
                    <option>{{ __('Sortează după') }}</option>
                    <option>{{ __('Rol') }}</option>
                    <option>{{ __('ID') }}</option>
                </select>
            </div>
        </div>

        <!-- Desktop -->
        <div class="hidden xl:flex items-center gap-3">
            <input type="text" class="input input-bordered input-md w-full min-w-0" placeholder="{{ __('Caută...') }}" />
            <select class="select select-bordered select-md w-44 flex-shrink-0">
                <option>{{ __('Sortează după') }}</option>
                <option>{{ __('Rol') }}</option>
                <option>{{ __('ID') }}</option>
            </select>
        </div>
    </div>

    <!-- Roles Table -->
    <div class="overflow-x-auto rounded-lg shadow-sm bg-base-100">
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
                                <button class="btn btn-xs lg:btn-sm btn-error">
                                    <span class="icon-[tabler--eraser] size-4 lg:size-5"></span>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
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