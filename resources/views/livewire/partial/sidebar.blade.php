<ul class="sidebar menu p-4 w-80 min-h-full text-base-content space-y-6">
    <li>
        <h2 class="menu-title">Dashboard</h2>
        <ul>
            @can('home')
                <li>
                    <a href="{{ route('home') }}" @class(['active' => Route::is('home')]) wire:navigate>
                        <x-tabler-home class="size-5" />
                        <span>Dashboard</span>
                    </a>
                </li>
            @endcan
        </ul>
    </li>
    @canany(['user.index', 'permission.index', 'database'])
        <li>
            <h2 class="menu-title">Pengaturan</h2>
            <ul>
                @can('bank.index')
                    <li>
                        <a href="{{ route('bank.index') }}" @class(['active' => Route::is('bank.index')]) wire:navigate>
                            <x-tabler-users class="size-5" />
                            <span>Daftar bank</span>
                        </a>
                    </li>
                @endcan
                @can('shop.index')
                    <li>
                        <a href="{{ route('shop.index') }}" @class(['active' => Route::is('shop.index')]) wire:navigate>
                            <x-tabler-users class="size-5" />
                            <span>Shop Management</span>
                        </a>
                    </li>
                @endcan
                @can('user.index')
                    <li>
                        <a href="{{ route('user.index') }}" @class(['active' => Route::is('user.index')]) wire:navigate>
                            <x-tabler-users class="size-5" />
                            <span>User Management</span>
                        </a>
                    </li>
                @endcan
                @can('permission.index')
                    <li>
                        <a href="{{ route('permission.index') }}" @class(['active' => Route::is('permission.index')]) wire:navigate>
                            <x-tabler-key class="size-5" />
                            <span>Role & Permission</span>
                        </a>
                    </li>
                @endcan
                @can('database')
                    <li>
                        <a href="/adminer">
                            <x-tabler-database class="size-5" />
                            <span>Adminer Database</span>
                        </a>
                    </li>
                @endcan
            </ul>
        </li>
    @endcan
    <li>
        <h2 class="menu-title">Lainnya</h2>
        <ul>
            @can('about')
                <li>
                    <a href="{{ route('about') }}" @class(['active' => Route::is('about')]) wire:navigate>
                        <x-tabler-file class="size-5" />
                        <span>Tentang Aplikasi</span>
                    </a>
                </li>
            @endcan
            @can('profile')
                <li>
                    <a href="{{ route('profile') }}" @class(['active' => Route::is('profile')]) wire:navigate>
                        <x-tabler-user-circle class="size-5" />
                        <span>Edit Profile</span>
                    </a>
                </li>
            @endcan
            <li>
                <button wire:click="$dispatch('logout')">
                    <x-tabler-logout class="size-5" />
                    <span>Keluar Aplikasi</span>
                </button>
            </li>
        </ul>
    </li>
</ul>
