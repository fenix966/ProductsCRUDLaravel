@can('view-any', App\Models\Product::class)
<x-responsive-nav-link
    href="{{ route('dashboard.products.index') }}"
    :active="request()->routeIs('dashboard.products.index')"
>
    {{ __('navigation.products') }}
</x-responsive-nav-link>
@endcan @can('view-any', App\Models\Category::class)
<x-responsive-nav-link
    href="{{ route('dashboard.categories.index') }}"
    :active="request()->routeIs('dashboard.categories.index')"
>
    {{ __('navigation.categories') }}
</x-responsive-nav-link>
@endcan
