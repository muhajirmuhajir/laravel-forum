<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{route('post.create')}}" method="post">
                        @csrf
                        <x-textarea name="content" placeholder="say something..."></x-textarea>
                        <x-button class="ml-auto mt-4 mr-0 w-auto block">Posting
                        </x-button>
                    </form>
                </div>
            </div>

            @foreach ($posts as $post)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-2">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="post">
                        <div class="profile">
                            <p class="font-bold -mb-2">{{$post->user->name}}</p>
                            <small
                                class="text-gray-300">{{Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</small>
                        </div>
                        <div class="content mb-2">
                            <p>
                                {{$post->content}}
                            </p>
                        </div>
                        <hr>
                        <div class="comments my-2">
                            @foreach ($post->comments as $comment)
                            <div class="comment mb-2 ml-2">
                                <div class="profile">
                                    <p class="font-bold -mb-2">{{$comment->user->name}}</p>
                                    <small
                                        class="text-gray-300">{{Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</small>
                                </div>
                                <p class="border rounded p-2 box-border bg-gray-100">{{$comment->content}}
                                </p>
                            </div>
                            @endforeach

                        </div>
                        <hr>
                        <div class="reply-form mt-2">
                            <form action="{{route('comment.create', $post->id)}}" method="post">
                                @csrf
                                <x-textarea name="content" class="bg-gray-100" placeholder="comment..."></x-textarea>
                                <x-button class="ml-auto mt-4 mr-0 w-auto block">Reply
                                </x-button>
                            </form>
                        </div>

                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </div>
</x-app-layout>
