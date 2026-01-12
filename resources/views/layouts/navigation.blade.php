<div class="shrink-0 flex items-center">
    <a href="{{ route('tickets.index') }}">
        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
    </a>
</div>

<!-- Navigation Links -->
<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
    <x-nav-link :href="route('tickets.index')" 
                :active="request()->routeIs('tickets.*')">
        {{ __('Tickets') }}
    </x-nav-link>
</div>
