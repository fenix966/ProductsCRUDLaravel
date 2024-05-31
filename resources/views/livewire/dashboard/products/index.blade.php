<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 space-y-4">
    <x-ui.breadcrumbs>
        <x-ui.breadcrumbs.link href="/dashboard"
            >Dashboard</x-ui.breadcrumbs.link
        >
        <x-ui.breadcrumbs.separator />
        <x-ui.breadcrumbs.link active
            >{{ __('crud.products.collectionTitle') }}</x-ui.breadcrumbs.link
        >
    </x-ui.breadcrumbs>

    <div class="flex justify-between align-top py-4">
        <x-ui.input
            wire:model.live="search"
            type="text"
            placeholder="Search {{ __('crud.products.collectionTitle') }}..."
        />

        @can('create', App\Models\Product::class)
        <a wire:navigate href="{{ route('dashboard.products.create') }}">
            <x-ui.button>New</x-ui.button>
        </a>
        @endcan
    </div>

    {{-- Delete Modal --}}
    <x-ui.modal.confirm wire:model="confirmingDeletion">
        <x-slot name="title"> {{ __('Delete') }} </x-slot>

        <x-slot name="content"> {{ __('Are you sure?') }} </x-slot>

        <x-slot name="footer">
            <x-ui.button
                wire:click="$toggle('confirmingDeletion')"
                wire:loading.attr="disabled"
            >
                {{ __('Cancel') }}
            </x-ui.button>

            <x-ui.button.danger
                class="ml-3"
                wire:click="delete({{ $deletingProduct }})"
                wire:loading.attr="disabled"
            >
                {{ __('Delete') }}
            </x-ui.button.danger>
        </x-slot>
    </x-ui.modal.confirm>

    {{-- Index Table --}}
    <x-ui.container.table>
        <x-ui.table>
            <x-slot name="head">
                <x-ui.table.header for-crud wire:click="sortBy('name')"
                    >{{ __('crud.products.inputs.name.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('description')"
                    >{{ __('crud.products.inputs.description.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('price')"
                    >{{ __('crud.products.inputs.price.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header
                    for-crud
                    wire:click="sortBy('stock_keeping_unit')"
                    >{{ __('crud.products.inputs.stock_keeping_unit.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('category_id')"
                    >{{ __('crud.products.inputs.category_id.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.action-header>Actions</x-ui.table.action-header>
            </x-slot>

            <x-slot name="body">
                @forelse ($products as $product)
                <x-ui.table.row wire:loading.class.delay="opacity-75">
                    <x-ui.table.column for-crud
                        >{{ $product->name }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $product->description }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $product->price }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $product->stock_keeping_unit }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $product->category_id }}</x-ui.table.column
                    >
                    <x-ui.table.action-column>
                        @can('update', $product)
                        <x-ui.action
                            wire:navigate
                            href="{{ route('dashboard.products.edit', $product) }}"
                            >Edit</x-ui.action
                        >
                        @endcan @can('delete', $product)
                        <x-ui.action.danger
                            wire:click="confirmDeletion({{ $product->id }})"
                            >Delete</x-ui.action.danger
                        >
                        @endcan
                    </x-ui.table.action-column>
                </x-ui.table.row>
                @empty
                <x-ui.table.row>
                    <x-ui.table.column colspan="6"
                        >No {{ __('crud.products.collectionTitle') }} found.</x-ui.table.column
                    >
                </x-ui.table.row>
                @endforelse
            </x-slot>
        </x-ui.table>

        <div class="mt-2">{{ $products->links() }}</div>
    </x-ui.container.table>
</div>
