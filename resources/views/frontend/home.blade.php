<x-frontend-layout>
    {{--  this is for the latest news section of this main contain --}}
    <section class="py-2 md:py-6">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-12 gap-4">
                <!-- Main Content -->
                <div class="md:col-span-8">
                    <a href="{{ route('news', $latest_news->id) }}">
                    <div>
                        <img src="{{ asset($latest_news->images) }}" alt="{{ $latest_news->title }}"
                            class="w-full h-auto max-w-xl">
                        <h5 class="title mt-4 text-2xl font-bold">{{ $latest_news->title }}</h5>
                        <p class="description mt-2 text-gray-700">{!! Str::limit(strip_tags($latest_news->description), 150) !!}</p>
                    </div>
                    </a>
                </div>

{{--  this is trending topics where all treding acccording to the views are show into this pages --}}
                <!-- Sidebar -->
                <div class="md:col-span-4">
                    <div class="bg-red-100 text-red-600 py-2 border-l-8 border-red-600 mb-4">
                        <h3 class="text-lg font-semibold px-4">Trending Topics</h3>
                    </div>

                    <div class="space-y-5">
                        @foreach ($trending_news as $news)
                            <div
                                class="grid md:grid-cols-12 overflow-hidden items-center gap-4 hover:shadow-md transition-shadow duration-300 shadow-gray-200 p-2 rounded">
                                <div class="col-span-4">
                                    <img src="{{ asset($news->images) }}" alt="{{ $news->title }}"
                                        class="w-full h-auto max-w-xs">
                                </div>
                                <div class="col-span-8">
                                    <a href="{{ route('news', $news->id) }}">
                                        <h5 class="text-lg title font-semibold">{{ $news->title }}</h5>
                                    </a>
                                    <small class="text-gray-600 flex items-center gap-x-2">
                                        <i class="fas fa-calendar-alt"></i>{{ $news->created_at->format('M d, Y') }}
                                        <a href="{{ route('news', $news->id) }}"
                                            class="bg-red text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 px-2 py-1 text-xs inline-block ml-2 rounded">
                                            Read More
                                        </a>
                                    </small>

                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
{{-- this is section for 4 colums where the latest 4 data are showing into this  --}}
<section>
    <div class="grid grid-cols-12 gap-5">
        @foreach ($latest_post as $news)
        <div class="col-span-6 md:col-span-6 lg:col-span-6 h-auto hover:bg-gray-100 hover:shadow-lg overflow-hidden mb-4 p-4 transition-colors duration-300">
            <!-- Image Section -->
            <div class="grid grid-cols-12 gap-2 items-center">
                <div class="col-span-4">
                    <img src="{{ asset($news->images) }}" class="w-full h-20 md:h-28 object-cover rounded" alt="">
                </div>
                <!-- Title and Date Section -->
                <div class="col-span-8 flex flex-col justify-center">
                    <h5 class="text-base md:text-lg font-semibold mb-1">{{ $news->title }}</h5>
                    <p class="text-sm text-gray-500 flex items-center">
                        <i class="fa fa-calendar mr-1"></i> {{ $news->created_at->format('M d, Y') }}
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>






{{-- this is the section where the ca --}}
    <section class="py-6">
        <div class="container mx-auto px-4">
            <div>
                @foreach ($categories as $category)
                    @if ($category->posts->count() > 0)
                        <h1 class="text-3xl font-bold mb-4">{{ $category->title }}</h1>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                            @foreach ($category->posts as $post)
                                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                                    <img src="{{ asset($post->images) }}" alt="{{ $post->title }}"
                                        class="w-full h-40 object-cover">
                                    <div class="p-4">
                                        <a href="{{ route('news', $post->id) }}">
                                            <h3 class="text-xl font-semibold">{{ $post->title }}</h3>
                                        </a>
                                        <small class="text-gray-600 flex items-center gap-x-2">
                                            <i
                                                class="fas fa-calendar-alt"></i>{{ $post->created_at->format('M d, Y') }}
                                            <a href="{{ route('news', $post->id) }}"
                                                class="bg-red text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 px-2 py-1 text-xs inline-block ml-2 rounded">
                                                Read More
                                            </a>
                                        </small>

                                    </div>
                                </div>
                            @endforeach

                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
</x-frontend-layout>
