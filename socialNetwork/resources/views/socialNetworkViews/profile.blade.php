<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto ">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="containerProfile">
                    <div class="infoProfile">
                        <img class="imgProfile" src="https://los40es00.epimg.net/los40/imagenes/2020/06/24/bigbang/1592994697_993891_1592996689_noticia_normal.jpg" />
                        <div class="userDescriptionProfile">
                            <div class="userDescription">{{ $user->name }}<small style="color: gray;"> &#64{{ $user->username }} </small></div>
                            <div class="descriptionProfile">{{ $user->description }}</div>
                            <div class="profileFollowers">
                                <div class="followersFollowing">
                                    <div class="followers"><small style="color: rgb(75, 147, 255);">Followers |</small></div>
                                    <div class="following"><small style="color: rgb(75, 147, 255);"> Following</small></div>
                                </div>
                                <div class="buttonProfile">
                                    <button class="editSettings rounded-full"><a href="/user/profile">Edit profile</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-1">
        <div class="postsContainer max-w-xl mx-auto">
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
    </div>
</x-app-layout>