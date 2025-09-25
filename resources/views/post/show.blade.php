<x-app-layout>
    <div class="py-4">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <h1 class="text-5xl mb-4">{{ $post->title }}</h1>
                <div class="flex gap-4">
                    <!-- User Avatar  -->
                        <x-user-avatar :user="$post->user" />
                    <!-- /User Avatar  -->

                    <!-- User Info  -->
                    <div>
                        <x-follow-ctn :user="$post->user" class="flex gap-2">
                            <a href="{{ route('profile.show', $post->user) }}" class="hover:underline">
                                {{ $post->user->name }}
                            </a>
                            @auth
                            &middot;
                            <button
                                x-text="following ? 'Unfollow' : 'Follow'"
                                :class="following ? 'text-red-600' : 'text-emerald-500'"
                                @click="follow()"
                            ></button>
                            @endauth
                        </x-follow-ctn>
                        <div class="flex gap-2 text-sm text-gray-500">
                            {{ $post->readTime() }} min read
                            &middot;
                            {{ $post->created_at->diffForHumans() }}
                        </div>
                    </div>
                    <!-- /User Info  -->
                </div>


                <!-- Clap Section  -->
                <x-clap-btn :post="$post"/>
                <!-- /Clap Section  -->

                {{-- content section --}}
                <div class="mt-8">
                    <img src="{{ $post->imgUrl() }}" alt="{{ $post->title }}"
                        class="w-full h-64 object-cover rounded-lg mb-4">

                    <div class="mt-4">
                        {{ $post->content }}
                    </div>
                </div>
                <!-- Content Section  -->

                <!-- Category Section  -->
                <div class="mt-8">
                    <span class="px-4 py-2 bg-gray-200 rounded-2xl">
                    {{ $post->category ? $post->category->name : 'Uncategorized' }}
                    </span>
                </div>
                <!-- Category Section  -->

                <!-- Clap Section  -->
                <x-clap-btn :post="$post"/>
                <!-- /Clap Section  -->
            </div>
        </div>
    </div>
</x-app-layout>