<div class="container mx-auto">
    <div class="flex items-center justify-between">
        <div>
            <img src="{{ asset($company->logo) }}" alt="Logo" class="w-20 md:w-56"  >
        </div>
        <div class="text-sm md:text-2xl">
            {{ now()->format('l d M Y') }}
        </div>
    </div>
</div>
<section class="bg-red text-white h-10 flex items-center ">
    <div class="container mx-auto px-4">
        <nav class="hidden md:flex">
            <ul class="flex flex-wrap gap-4">
                <li>
                    <a href="{{ route('home') }}" class="yellow">Home</a>
                </li>
                @foreach ($categories as $category)
                <li>
                    <a href="{{route('categories',$category->slug)}}">{{ $category->title }}</a>
                </li>
                @endforeach
            </ul>
        </nav>
        <nav class="md:hidden">
            <button type="button" data-drawer-target="drawer-example" data-drawer-show="drawer-example" aria-controls="drawer-example">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div id="drawer-example" class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-red w-80 dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-label">
                <button type="button" data-drawer-hide="drawer-example" aria-controls="drawer-example" class="rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 flex items-center justify-center yellow">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only yellow">Close menu</span>
                </button>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('home') }}" class="yellow">Home</a>
                    </li>
                    @foreach ($categories as $category)
                    <li>
                        <a href="#">{{ $category->title }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </nav>
    </div>
</section>
