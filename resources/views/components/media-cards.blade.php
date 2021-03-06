<div id="{{ isset($id) ? $id : 'media-cards' }}" class="media-card">
    @if(isset($items) && $items->total() > 0)
        <ul class="media-card__list">
            @foreach($items as $key => $item)
                <li class="media-card__list-item">
                    <div class="media-card__card card">
                        <div class="media-card__card-image">
                            <img src="{{ asset('storage/images/' . $item->picture) }}" alt="{{ __('pictures.a descriptive image', ['item' => Str::singular($id)]) }}">
                        </div>
                        <div class="media-card__card-content">
                            <h4 class="media-card__heading">
                                <a href="{{ Str::contains(URL::current(), $id) ? URL::current() . '/edit/' . $item->id : URL::current() . '/' . $id . '/edit/' . $item->id }}">
                                    {{ $item->title }}
                                </a>
                            </h4>

                            <p>
                                {{ $item->description !== null ? $item->description : __('messages.resource not provided', ['resource' => ucfirst('description')])}}
                            </p>
                            <h6 class="text-uppercase letter-spacing letter-spacing--location">{{ $item->location }}</h6>
                            @if(isset($action))
                                @include($action)
                            @endif
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <ul class="media-card__list media-card__list--empty">
            <li class="media-card__list-item">
                <div class="media-card__card card">
                    <div class="media-card__card-content">
                        <p class="alert-message alert-message--empty-list">
                            <i class="fas fa-wind"></i>
                            <span>{{ __('component.media-cards.' . $id . '.not found') }}</span>
                        </p>
                    </div>
                </div>
            </li>
        </ul>
    @endif
</div>
@if (isset($pagination))
    {!! $pagination !!}
@endif