<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 space-y-4">
    <x-ui.breadcrumbs>
        <x-ui.breadcrumbs.link href="/dashboard"
            >Dashboard</x-ui.breadcrumbs.link
        >
        <x-ui.breadcrumbs.separator />
        <x-ui.breadcrumbs.link href="{{ route('dashboard.products.index') }}"
            >{{ __('crud.products.collectionTitle') }}</x-ui.breadcrumbs.link
        >
        <x-ui.breadcrumbs.separator />
        <x-ui.breadcrumbs.link active
            >Create {{ __('crud.products.itemTitle') }}</x-ui.breadcrumbs.link
        >
    </x-ui.breadcrumbs>

    <div class="w-full text-gray-500 text-lg font-semibold py-4 uppercase">
        <h1>Create {{ __('crud.products.itemTitle') }}</h1>
    </div>

    <div class="overflow-hidden border rounded-lg bg-white">
        <form class="w-full mb-0" wire:submit.prevent="save">
            <div class="p-6 space-y-3">
                <div class="w-full">
                    <x-ui.label for="name"
                        >{{ __('crud.products.inputs.name.label') }}</x-ui.label
                    >
                    <x-ui.input.text
                        class="w-full"
                        wire:model="form.name"
                        name="name"
                        id="name"
                        placeholder="{{ __('crud.products.inputs.name.placeholder') }}"
                    />
                    <x-ui.input.error for="form.name" />
                </div>

                <div class="w-full">
                    <x-ui.label for="description"
                        >{{ __('crud.products.inputs.description.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.text
                        class="w-full"
                        wire:model="form.description"
                        name="description"
                        id="description"
                        placeholder="{{ __('crud.products.inputs.description.placeholder') }}"
                    />
                    <x-ui.input.error for="form.description" />
                </div>

                <div class="w-full">
                    <x-ui.label for="price"
                        >{{ __('crud.products.inputs.price.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.number
                        class="w-full"
                        wire:model="form.price"
                        name="price"
                        id="price"
                        placeholder="{{ __('crud.products.inputs.price.placeholder') }}"
                        step="1"
                    />
                    <x-ui.input.error for="form.price" />
                </div>

                <div class="w-full">
                    <x-ui.label for="stock_keeping_unit"
                        >{{ __('crud.products.inputs.stock_keeping_unit.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.text
                        class="w-full"
                        wire:model="form.stock_keeping_unit"
                        name="stock_keeping_unit"
                        id="stock_keeping_unit"
                        placeholder="{{ __('crud.products.inputs.stock_keeping_unit.placeholder') }}"
                    />
                    <x-ui.input.error for="form.stock_keeping_unit" />
                </div>

                <div class="w-full">
                    <x-ui.label for="category_id"
                        >{{ __('crud.products.inputs.category_id.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.select
                        wire:model="form.category_id"
                        name="category_id"
                        id="category_id"
                        class="w-full"
                    >
                        <option value="">Select data</option>
                        @foreach ($categories as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </x-ui.input.select>
                    <x-ui.input.error for="form.category_id" />
                </div>
            </div>

            <div class="flex justify-between mt-4 border-t border-gray-50 p-4">
                <div>
                    <!-- Other buttons here -->
                </div>
                <div>
                    <x-ui.button type="submit">Save</x-ui.button>
                </div>
            </div>
        </form>
    </div>
</div>
