@include('socialNetworkViews.head')
<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <div class="py-8" id="newPost">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="create-post-container ">
                    <form method="POST" action="" enctype="multipart/form-data">
                        @csrf

                        @if (count($errors))
                        <textarea class="postTextarea" type="text" placeholder="You can't publish an empty post!" name="description"></textarea>
                        @else
                        <textarea class="postTextarea" type="text" placeholder="Post something..." name="description"></textarea>
                        @endif
                        <!--<img src="{{ $user->profile_photo_path }}"/>-->
                        <div class="footerPost">
                            <div class="nameUserPost">{{ $user->name }} <small style="color: gray;">&#64{{ $user->username }} </small></div>
                            <input class="postButton py-2 px-4 rounded-full" value="Post" type="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="py-1" id="allPost">
        <div class="postsContainer max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @foreach($posts as $post)
                <div class="postName">{{ $post->name }} <small style="color: gray;">&#64{{ $post->username }} </small></div>
                <div class="postDescription">{{ $post->description }}</div>
                <div class="iconsPost">
                    <img src="{{ asset('icons/corazon.svg') }}" alt="like" width="20" height="auto">{{ $post->likes }}
                    <img src="{{ asset('icons/charla.svg') }}" alt="like" width="20" height="auto">{{ $post->comments }}
                </div>
                <br>
                <hr>
                @endforeach
            </div>
        </div>
</x-app-layout>
<div class="unfollowers-container">
    <a class="unfollower" style="color:red"></a>
</div>