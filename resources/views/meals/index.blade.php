@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

@section('content')
<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl">
            Meals
        </h1>
    </div>
</div>

@if (session()->has('message'))
    <div class="w-4/5 m-auto mt-10 pl-2">
        <p class="w-2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4">
            {{ session()->get('message') }}
        </p>
    </div>
@endif

@if (Auth::check())
    <div class="pt-15 w-4/5 m-auto">
        <a 
            href="/meal/create"
            class="bg-blue-500 uppercase bg-transparent text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
            Create post
        </a>
    </div>
@endif

@foreach ($meals as $post)
    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
        <div>
            <img src="{{ asset('images/' . $post->image_path) }}" alt="">
        </div>
        <div>
            <h2 class="text-gray-700 font-bold text-5xl pb-4">
                {{ $post->title }}
            </h2>

            
            <p class="text-xl text-gold-700 pt-8 pb-10 leading-8 font-light">
            Meal's rating:
                <span class="starsInIndexBladeWithIcons">
                    @php
    $fStar = (int) $post->rating;
    $hStar = $post->rating - (int) $post->rating;
    $eStar = (int) 5 - $fStar - $hStar;
                    @endphp

                    @for ($i = 0; $i < $fStar; $i++)
                        <i class="fas fa-star"></i>
                    @endfor

                    @if ($hStar > 0)
                        <i class="fas fa-star-half-alt"></i>
                    @endif

                    @for ($i = 0; $i < (int) $eStar; $i++)
                        <i class="far fa-star"></i>
                    @endfor
                    <!-- 
                    <p>f star is: {{$fStar}}</p>
                    <p>h star is: {{$hStar}}</p>
                    <p>e star is: {{$eStar}}</p> -->
                </span>
            </p>
            

            <span class="text-gray-500">
                By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
            </span>
            
            <!-- <a href="/meal/{{ $post->slug }}" class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                Keep Reading
            </a> -->


            @if (Auth::check())
            @php
        //App\Models\Ratings because php[premium] tool requested so?
        $userRating = App\Models\Ratings::where('user_id', Auth::id())->where('meal_id', $post->id)->first();
                @endphp

                @if ($userRating)
                    <p>Change your rating:</p>
                @else
                    <p>You haven't rated this meal yet.</p>
                @endif

            <form id="ratingForm" action="/meal/{{ $post->slug }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- <label for="rating">Rate this meal:</label> -->

                <div class="rating">
                    @for ($i = 1; $i <= 5; $i++)
                        <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}"  style="display: none;"
                        onchange="submitForm()" 
                        
                            @if($userRating && $userRating->rating == $i)
                                checked
                            @endif
                            >
                        <label for="star{{ $i }}" class="star-icon" title="{{ $i }}">
                            @if($userRating && $userRating->rating >= $i)
                                <i class="fas fa-star"></i> 
                            @else
                                <i class="far fa-star"></i> 
                            @endif
                        </label>
                    @endfor
                </div>
            </form>
            
            <p class="descriptionText" >
                {{ $post->description }}
                <span class="toggleButton">▼</span>
            </p>


            <script>
                function submitForm() {
                    document.getElementById("ratingForm").submit(); 
                }
                
             
                document.querySelectorAll('.toggleButton').forEach(button => {
                button.addEventListener('click', function() {
                    const descriptionText = this.parentElement;
                    descriptionText.classList.toggle('showFullText');
                         
                    if (descriptionText.classList.contains('showFullText')) {
                        this.textContent = '▲';
                    } else {
                        this.textContent = '▼'; 
                    }
                })
            })

            </script>

        @endif
            @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
                <span class="float-right">
                     <form 
                        action="/meal/{{ $post->slug }}"
                        method="POST">
                        @csrf
                        @method('delete')

                        <button
                            class="text-red-500 pr-3"
                            type="submit">
                            Delete
                        </button>
                    </form>
                </span>
            @endif
        </div>
    </div>    
@endforeach

@endsection

