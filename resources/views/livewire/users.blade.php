<div class="container mx-auto px-2 sm:px-4 py-6 w-full max-w-7xl">
    <!-- Title and Add User Button -->
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-6 gap-4">
        <h1 class="text-2xl sm:text-3xl font-bold text-base-content">{{ __('Utilizatori') }}</h1>
        <button class="btn btn-primary flex items-center gap-2 px-4 py-2 text-sm font-semibold rounded-lg shadow hover:bg-primary-focus transition">
            <span class="icon-[tabler--plus] text-lg"></span>
            <span>{{ __('Adaugă utilizator') }}</span>
        </button>
    </div>

    <!-- Search, Sort, Filter Bar -->
    <div class="flex flex-col md:flex-row items-stretch md:items-center gap-4 mb-4">
        <div class="flex-1">
            <input type="text" class="input input-bordered w-full" placeholder="{{ __('Caută...') }}" />
        </div>
        <div class="flex gap-2 flex-1 md:flex-none">
            <select class="select select-bordered w-full md:w-auto">
                <option>{{ __('Sortează după') }}</option>
                <option>{{ __('Nume') }}</option>
                <option>{{ __('Data adăugării') }}</option>
            </select>
            <select class="select select-bordered w-full md:w-auto">
                <option>{{ __('Filtrează după') }}</option>
                <option>{{ __('Rol') }}</option>
                <option>{{ __('Companie') }}</option>
            </select>
        </div>
    </div>

    <!-- Thin Divider -->
    <div class="border-t border-base-200 mb-4"></div>

    <!-- Extra Widgets Row -->
    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4 mb-4">
        <div class="flex items-center gap-2 flex-1">
            <span class="text-base-content/70">{{ __('Atasat la') }}</span>
            <input type="text" class="input input-bordered w-full max-w-xs" placeholder="{{ __('mail, rol...') }}" />
        </div>
        <div class="flex items-center gap-2 flex-1 sm:justify-end">
            <input type="checkbox" class="checkbox checkbox-primary" id="showAllUsers" />
            <label for="showAllUsers" class="label-text">{{ __('Afișează toți') }}</label>
        </div>
    </div>

    <!-- Users Table -->
    <div class="overflow-x-auto rounded-lg shadow bg-base-100">
        <table class="table w-full min-w-[600px]">
            <thead>
                <tr class="bg-base-200 text-base-content/80">
                    <th class="py-3 px-2">{{ __('ID') }}</th>
                    <th class="py-3 px-2">{{ __('Email') }}</th>
                    <th class="py-3 px-2">{{ __('Companie') }}</th>
                    <th class="py-3 px-2">{{ __('Rol') }}</th>
                    <th class="py-3 px-2">{{ __('Subordonat') }}</th>
                    <th class="py-3 px-2">{{ __('Acțiune') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr class="hover">
                    <td class="py-2 px-2">1</td>
                    <td class="py-2 px-2">john.doe@email.com</td>
                    <td class="py-2 px-2">SRL</td>
                    <td class="py-2 px-2">Administrator</td>
                    <td class="py-2 px-2">-</td>
                    <td class="py-2 px-2">
                        <button class="btn btn-xs btn-primary">
                            <span class="icon-[tabler--edit] size-5 "></span>
                        </button>
                        <button class="btn btn-xs btn-error ml-2">
                            <span class="icon-[tabler--eraser] size-5"></span>
                        </button>
                    </td>
                </tr>
                <tr class="hover">
                    <td class="py-2 px-2">2</td>
                    <td class="py-2 px-2">jane.smith@email.com</td>
                    <td class="py-2 px-2">SRL</td>
                    <td class="py-2 px-2">Utilizator</td>
                    <td class="py-2 px-2">john.doe@email.com</td>
                    <td class="py-2 px-2">
                        <button class="btn btn-xs btn-primary">
                            <span class="icon-[tabler--edit] size-5"></span>
                        </button>
                        <button class="btn btn-xs btn-error ml-2">
                            <span class="icon-[tabler--eraser] size-5"></span>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- Pagination/Load More -->
        <div class="flex flex-col sm:flex-row items-center justify-between px-4 py-3 border-t border-base-200 bg-base-100">
            <!-- <button class="btn btn-ghost btn-sm">Încarcă mai multe</button> -->
            <div class="flex gap-1 mt-2 sm:mt-0">
                <button class="btn btn-ghost btn-xs">1</button>
                <button class="btn btn-ghost btn-xs">2</button>
                <button class="btn btn-ghost btn-xs">3</button>
                <span class="px-2 text-base-content/50">...</span>
                <button class="btn btn-ghost btn-xs">10</button>
            </div>
        </div>
    </div>
</div>
