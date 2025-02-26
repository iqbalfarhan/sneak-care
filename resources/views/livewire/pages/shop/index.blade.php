<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Shop management',
    ])
    <div class="table-filter-wrapper">
        <input type="search" wire:model.live="cari" class="input input-bordered" placeholder="Pencarian">
        @can('shop.create')
            <button class="btn btn-primary" wire:click="$dispatch('createShop')">
                <x-tabler-plus class="size-5" />
                <span>Tambah shop</span>
            </button>
        @endcan
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Nama shoes care</th>
                <th>Alamat</th>
                <th>User</th>
                <th>Customer</th>
                <th>Premium</th>
                @canany(['shop.edit', 'shop.delete'])
                    <th class="text-center">Actions</th>
                @endcanany
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr wire:key="{{ $data->id }}">
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->address }}</td>
                        <td>{{ $data->users_count }}</td>
                        <td>{{ $data->customers_count }}</td>
                        <td>{{ $data->premium ? 'Yes' : 'No' }}</td>
                        @canany(['shop.edit', 'shop.delete'])
                            <td>
                                <div class="flex gap-1 justify-center">
                                    @can('shop.edit')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('editShop', {shop: {{ $data->id }}})">
                                            <x-tabler-edit class="size-4" />
                                        </button>
                                    @endcan
                                    @can('shop.delete')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('deleteShop', {shop: {{ $data->id }}})">
                                            <x-tabler-trash class="size-4" />
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        @endcanany
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @livewire('pages.shop.actions')
</div>
