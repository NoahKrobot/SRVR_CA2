<nav class="space-x-4 text-gray-300 text-sm sm:text-base">
                    <a class="no-underline hover:underline" class="linksNav" href="/">Home</a>
                    <a class="no-underline hover:underline" class="linksNav" href="/blog">Workouts</a>
                    <a class="no-underline hover:underline" class="linksNav" href="/meal">Meals</a>
                    @guest
                        <a class="no-underline hover:underline" class="linksNav"  href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="no-underline hover:underline" class="linksNav"  href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        

                        <a href="{{ route('logout') }}"
                           class="no-underline hover:underline"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </nav>