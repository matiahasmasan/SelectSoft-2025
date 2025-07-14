<div class="card shadow-lg container mx-auto px-2 sm:px-4 lg:px-6 py-6 w-full max-w-7xl">
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-4 gap-4">
        <span class="card-title">{{ __('Utilizatori') }}</span>
        <button class="btn btn-primary btn-sm lg:btn-md flex items-center gap-2 px-4 py-2 text-sm lg:text-base font-semibold rounded-lg shadow hover:bg-primary-focus transition w-full sm:w-auto">
            <span class="icon-[tabler--plus] text-base lg:text-lg"></span>
            <a href="{{ route('register') }}" wire:navigate>{{ __('Adaugă utilizator') }}</a>
        </button>
    </div>

    <!-- FILTERS -->
    <div class="space-y-3 xl:space-y-0 mb-2 xl:mb-6">
        <!-- Mobile Tablet -->
        <div class="block xl:hidden space-y-3">
            <div class="flex gap-2">
                <input type="text" class="input input-bordered input-sm md:input-md flex-1" placeholder="{{ __('Caută...') }}" />
            </div>
            <!-- Row 1 -->
            <div class="flex gap-2">
                <select class="select select-bordered select-sm md:select-md flex-1 ">
                    <option>{{ __('Sortează după') }}</option>
                    <option>{{ __('Nume') }}</option>
                    <option>{{ __('Data adăugării') }}</option>
                </select>
                <select class="select select-bordered select-sm md:select-md flex-1 ">
                    <option>{{ __('Filtrează după') }}</option>
                    <option>{{ __('Rol') }}</option>
                    <option>{{ __('Companie') }}</option>
                </select>
            </div>
            <!-- Row 2 -->
            <div class="flex gap-2">
                <input type="text" class="input input-bordered input-sm md:input-md flex-1" placeholder="{{ __('Atasati la ...') }}" />
                <label class="flex items-center gap-2 whitespace-nowrap flex-1">
                    <input type="checkbox" class="checkbox checkbox-primary checkbox-sm md:checkbox-md" id="showAllUsers" />
                    <span class="label-text text-xs md:text-sm">{{ __('Afișează toți') }}</span>
                </label>
            </div>
        </div>

        <!-- Desktop -->
        <div class="hidden xl:flex items-center gap-3">
            <div class="flex flex-1 gap-2 min-w-0">
                <input type="text" class="input input-bordered input-md w-full min-w-0" placeholder="{{ __('Caută...') }}" />
            </div>
            <select class="select select-bordered select-md w-44 flex-shrink-0">
                <option>{{ __('Sortează după') }}</option>
                <option>{{ __('Nume') }}</option>
                <option>{{ __('Data adăugării') }}</option>
            </select>
            <select class="select select-bordered select-md w-44 flex-shrink-0">
                <option>{{ __('Filtrează după') }}</option>
                <option>{{ __('Rol') }}</option>
                <option>{{ __('Companie') }}</option>
            </select>
            <input type="text" class="input input-bordered input-md w-40 flex-shrink-0" placeholder="{{ __('Atasati la ...') }}" />
            <label class="flex items-center gap-2 whitespace-nowrap flex-shrink-0">
                <input type="checkbox" class="checkbox checkbox-primary checkbox-md" id="showAllUsers" />
                <span class="label-text text-sm">{{ __('Afișează toți') }}</span>
            </label>
        </div>
    </div>

    <!-- Users Table -->
    <div class="overflow-x-auto rounded-lg shadow-sm bg-base-100">
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
                                <button class="btn btn-xs lg:btn-sm btn-primary">
                                    <span class="icon-[tabler--edit] size-4 lg:size-5"></span>
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