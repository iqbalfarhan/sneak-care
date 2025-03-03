<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Order management',
    ])
    <div class="table-filter-wrapper">
        <input type="search" wire:model.live="cari" class="input input-bordered" placeholder="Pencarian">
        @can('order.create')
            <button class="btn btn-primary" wire:click="$dispatch('createOrder')">
                <x-tabler-plus class="size-5" />
                <span>Tambah order</span>
            </button>
        @endcan
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Other</th>
                @canany(['order.edit', 'order.delete'])
                    <th class="text-center">Actions</th>
                @endcanany
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr wire:key="{{ $data->id }}">
                        <td>{{ $no++ }}</td>
                        <td></td>
                        @canany(['order.edit', 'order.delete'])
                            <td>
                                <div class="flex gap-1 justify-center">
                                    @can('order.edit')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('editOrder', {order: {{ $data->id }}})">
                                            <x-tabler-edit class="size-4" />
                                        </button>
                                    @endcan
                                    @can('order.delete')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('deleteOrder', {order: {{ $data->id }}})">
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

    @livewire('pages.order.actions')
</div>
