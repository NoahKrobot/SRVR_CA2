@extends('layouts.app')

@section('content')
    <div class="background-image grid grid-cols-1 m-auto">
        <div class="flex text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">

    @if (Auth::check())
                <h1 class="sm:text-white text-5xl uppercase font-bold text-shadow-md pb-14">
                <span>{{ Auth::user()->name }}, </span>
                    have you found the perfect workout for you?
                </h1>
    @else
    <h1 class="sm:text-white text-5xl uppercase font-bold text-shadow-md pb-14">
                    have you found the perfect workout for you?
                </h1>

    @endif
                <a 
                    href="/blog"
                    class="text-center bg-gray-50 text-gray-700 py-2 px-4 font-bold text-xl uppercase">
                    -If Not, Click To Explore the workout world-
                </a>
            </div>
        </div>
    </div>

    <div class="secondDiv">
        <div>
            <img src="https://cdn.pixabay.com/photo/2014/05/03/01/03/laptop-336704_960_720.jpg" width="700" alt="">
        </div>

        <div class="m-auto sm:m-auto text-left w-4/5 block">
            <h2 class="text-3xl font-extrabold text-gray-600">
                Do you need help with your meal prep?
            </h2>
            
            <p class="py-8 text-gray-500 text-s">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus.
            </p>

            <p class="font-extrabold text-gray-600 text-s pb-9">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente magnam vero nostrum! Perferendis eos molestias porro vero. Vel alias.
            </p>

            <a 
                href="/meal"
                class="uppercase bg-blue-500 text-gray-100 text-s font-extrabold py-3 px-8 rounded-3xl">
                To the kitchen!
            </a>
        </div>

       
    </div>

    <div class="background-image2 grid grid-cols-1 m-auto">
        <br/>
        <br/>
        <br/><br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/><br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
    </div>

    @if (Auth::check())

    <div class="lastDivPage">
        

        <h2 class="text-4xl font-bold py-10">
            Become a creator
        </h2>

        <div id="creatorsOption">
    <div class="creator" id="posterr">
        <button>Create a post</button>
    </div>

    <div class="creator" id="mealerr">
        <button>Create a meal</button>
    </div>
</div>
    </div>

    @endif


    

   
@endsection