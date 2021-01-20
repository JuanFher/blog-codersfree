<x-app-layout>
	<div class="container py-8">
		<h1 class="text-4xl text-gray-600 font-bold">{{ $post->name }}</h1>
		<div class="text-lg text-gray-500 mb-2">
			{{$post->extract}}
		</div>

		<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
			{{-- conteido principal --}}
			<div class="lg:col-span-2">
				<figure>
					<img src="{{ Storage::url($post->image->url) }}" alt="{{ $post->name }}" class="w-full h-80 object-cover object-center ">
				</figure>
				<div class="text-base text-gray-500 mt-4">
					{{$post->body}}
				</div>
				<div class="px-6 pt-4 pb-2">
					@foreach ($post->tags as $tag)
						<a href="{{ route('posts.tag', $tag) }}" class="inline-block bg-green-200 rounded-full px-3 py-1 text-sm text-green-700 mr-2 ">{{ $tag->name }}</a>
					@endforeach
				</div>
			</div>

			{{-- conteinod relacionado --}}
			<aside>
				<h1 class="text-2xl font-bold text-gray-600 mb-4">Más en {{ $post->category->name }}</h1>
				<ul>
					@foreach ($similares as $similar)
						<li class="mb-4">
							<a class="flex" href="{{ route('posts.show', $similar) }}">
								<img src="{{ Storage::url($similar->image->url) }}" alt="" class="w-36 h-20 object-cover object-center">
								<span class="ml-2 text-gray-600">{{ $similar->name }}</span>
							</a>

						</li>

					@endforeach
				</ul>
			</aside>
		</div>
	</div>
</x-app-layout>	