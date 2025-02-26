<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Discount management',
    ])
    <div class="table-filter-wrapper">
        <input type="search" wire:model.live="cari" class="input input-bordered" placeholder="Pencarian">
        @can('discount.create')
            <button class="btn btn-primary" wire:click="$dispatch('createDiscount')">
                <x-tabler-plus class="size-5" />
                <span>Tambah discount</span>
            </button>
        @endcan
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Other</th>
                @canany(['discount.edit', 'discount.delete'])
                    <th class="text-center">Actions</th>
                @endcanany
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr wire:key="{{ $data->id }}">
                        <td>{{ $no++ }}</td>
                        <td></td>
                        @canany(['discount.edit', 'discount.delete'])
                            <td>
                                <div class="flex gap-1 justify-center">
                                    @can('discount.edit')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('editDiscount', {discount: {{ $data->id }}})">
                                            <x-tabler-edit class="size-4" />
                                        </button>
                                    @endcan
                                    @can('discount.delete')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('deleteDiscount', {discount: {{ $data->id }}})">
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

    @livewire('pages.discount.actions')
</div>
