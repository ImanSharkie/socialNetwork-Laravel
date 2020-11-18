@include('socialNetworkViews.head')
<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>



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
                                <div class="update-btn-container">
@if(Auth::user()->username==$user->username)
    <button> 
    Update Profile
    </button>
@endif
</div>
                            </div>
                        </div>
                    </div>
                </div>
</x-app-layout>



