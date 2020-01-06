<section class="arrow-slider arrow-slider__holder">
    <div class="arrow-slider__carousel">
        @foreach (__('content.courses') as $key => $course)
            @if (Browser::isDesktop())
                @if (isset($slider))
                    @switch($key)
                        @case($slider['next']['key'])
                            <div class="arrow-slider__slide--right">
                            @break
                        @case($slider['previous']['key'])
                            <div class="arrow-slider__slide--left">
                            @break
                        @case($slider['current']['key'])
                            <div class="arrow-slider__slide--current">
                            @break
                        @default
                            <div class="arrow-slider__slide">
                            @break
                    @endswitch
                @else
                    @if ($loop->first)
                        <div class="arrow-slider__slide--current">
                    @endif

                    @if ($loop->iteration === 2)
                        <div class="arrow-slider__slide--right">
                    @endif
                @endif
            @endif
            <div class="arrow-slider__slide-header">
                <h2>{{ $course['text'] }} {!! $course['slider'] !!}</h2>
                @auth
                    @if(Auth::user()->type !== 'admin')
                        <form action="{{ route('update.program') }}" method="POST">
                            @csrf
                            <input type="hidden" value="learn-chinese" name="program">
                            <input type="hidden" value="{{ $key }}" name="course" id="study">
                            <button type="submit" class="cta">{{ __('content.also interested') }}</button>
                        </form>
                    @endif
                @else
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <input type="hidden" value="learn-chinese" name="program">
                        <input type="hidden" value="{{ $key }}" name="course" id="study">
                        <button type="submit" class="cta">{{ __('content.apply for') }}</button>
                    </form>
                @endauth
            </div>
            <p>
                {{ $course['description'] }}
            </p>
        </div>
        @endforeach
    </div>
    <div class="arrow-slider__controllers">
        @foreach (__('content.courses') as $key => $course)
            @if (isset($slider))
                <a href="#" class="{{ $key === $slider['current']['key'] ? 'selected' : '' }}"><span>{{ $course['text'] }}</span></a>
            @else
                <a href="#" class="{{ $key === array_key_first(__('content.courses')) ? 'selected' : '' }}"><span>{{ $course['text'] }}</span></a>
            @endif
        @endforeach
    </div>
</section>
