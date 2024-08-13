<x-frontend-layout>
    <section>
        <div class="container mx-auto md:px-4 md:py-7">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
                <!-- Main Content Area -->
                <div class="md:col-span-8 space-y-4">
                    @foreach ($posts as $post)
                        <a href="{{ route('news', $post->id) }}" class="block bg-white shadow-md rounded-lg overflow-hidden">
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 p-4">
                                <div class="md:col-span-1">
                                    <img src="{{ asset($post->images) }}" alt="{{ $post->title }}" class="w-full h-auto object-cover rounded">
                                </div>
                                <div class="md:col-span-3">
                                    <h3 class="text-xl font-semibold">{{ $post->title }}</h3>
                                    <p class="description mt-2 text-gray-700">{!! Str::limit(strip_tags($post->description), 250) !!}</p>
                                    <small class="text-gray-600 flex items-center gap-x-2">
                                        <i class="fas fa-calendar-alt"></i>{{ $post->created_at->format('M d, Y') }}
                                        <a href="{{ route('news', $post->id) }}"class="bg-red text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 px-2 py-1 text-xs inline-block ml-2 rounded">
                                            Read More
                                        </a>
                                    </small>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <!-- Sidebar / Advertisements -->
                <div class="md:col-span-4 space-y-4">
                    @foreach ($advertise as $ad)
                    <div class="py-3 col-6">
                        @if ($ad->status == 1)
                        <a href="{{ $ad->link }}" target="_blank" class="block mt-2">
                            <img src="{{ asset($ad->logo) }}" alt="Advertisement Image" class="w-full h-auto">
                        </a>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</x-frontend-layout>
