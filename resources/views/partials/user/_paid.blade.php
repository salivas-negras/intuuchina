@component('components.banner')
    @slot('variant', 'success')
    @slot('text', __('content.paid user'))

    @slot('action')
        <div class="col-12 col-md-4 p-0">
            @component('components.inputs.alternative-button')
                @slot('name', 'home')
                @slot('href', route('home'))
                @slot('content', __('Back To Profile'))
            @endcomponent
        </div>
        <div class="col-12 col-md-8 p-0">
            @component('components.inputs.cta-button', ['variant' => 'primary'])
                @slot('name', 'billing')
                @slot('id', 'billing')
                @slot('href', $receipt_url)
                @slot('fas', 'file-alt')
                @slot('content', __('See Billing'))
            @endcomponent
        </div>
    @endslot
@endcomponent