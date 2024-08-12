<x-frontend-layout>
    <section class="py-2 md:py-6">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-12 gap-4">
                <!-- Main Content -->
                <div class="md:col-span-8">
                    <div>
                        <img src="{{ asset($latest_news->images) }}" alt="{{ $latest_news->title }}"
                            class="w-full h-auto">
                        <h5 class="title mt-4">{{ $latest_news->title }}</h5>
                        <p class="description mt-2">{!! Str::limit(strip_tags($latest_news->description), 150) !!}</p>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="md:col-span-4">
                    <div class="bg-red-100 text-red-600 py-2 border-l-8 border-red-600 mb-4">
                        <h3 class="text-lg font-semibold px-4">Trending Topics</h3>
                    </div>

                    <div class="space-y-5">
                        @foreach ($trending_news as $news)
                        <div
                            class="grid md:grid-cols-12  overflow-hidden items-center gap-4 hover:shadow-md transition-shadow duration-300 shadow-gray-200 p-2 rounded ">
                            <div class="col-span-4">
                                <img src="{{ asset($news->images) }}" alt="{{ $news->title }}" class="w-full h-auto">
                            </div>
                            <div class="col-span-8">
                                <h5 class="text-lg title">{{ $news->title }}</h5>
                                <small class="text-gray-600 gap-x-4 ">
                                    <i class="fas fa-calendar-alt "></i>
                                    {{ $news->created_at->format('M d, Y') }}
                                </small>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div>
                @foreach ($categories as $category)
                @if (count($category->posts) > 0 )
                <h1>{{$category->title}}</h1>
                <div class="grid grid-cols-4">

                    @foreach ($category->posts as $post)
                    <div>
                        <img src="{{asset($post->images)}}" alt="">
                        <h3> {{$post->title}}</h3>
                        <small>{{$post->created_at}}</small>
                    </div>
                    @endforeach

                </div>
                @endif

                @endforeach
            </div>
        </div>
    </section>
</x-frontend-layout>
