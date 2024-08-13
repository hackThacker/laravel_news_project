<x-frontend-layout>
    <section>
        <div class="container mx-auto md:px-4 md:py-7">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="md:col-span-2">
                    <h1 class="text-2xl md:text-3xl font-bold mb-4">{{ $news->title }}</h1>
                    <img src="{{ asset($news->images) }}" alt="" class="w-full h-auto mb-4">
                    <div class="prose">
                        {!! $news->description !!}
                    </div>
                </div>
                <div class="md:col-span-1">
                    <div class="space-y-4">
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
        </div>
    </section>
</x-frontend-layout>
