@component('components.dialog-box')
    @slot('title', __('Thank you for applying'))

    @slot('dialog')
        <div class="col-12">
            {!!
                __('component.dialog.user.verified', ['program' => Auth::user()->program->name])
            !!}
        </div>
    @endslot

    @slot('action')
        <div class="col-12 col-sm-4 dialog-box__action--alternate">
            <form action="{{ route('home') }}" method="GET">
                @component('components.inputs.alternative-button')
                    @slot('content', __('Home'))
                @endcomponent
            </form>
        </div>

        <div class="col-12 col-sm-8 dialog-box__action--main">
            <form action="{{ route('payments.' . Auth::user()->program->value) }}" method="POST" id="proceed-payment">
                @csrf
                @component('components.inputs.cta-button')
                    @slot('content', __('Pay Now'))
                    @slot('variant', 'primary')
                @endcomponent
            </form>
        </div>
    @endslot

    @slot('footer')
        <ul class="col-12 dialog-box__list">
            <li>
                {!! __('content.are you in doubt') !!}
            </li>
        </ul>
    @endslot
@endcomponent