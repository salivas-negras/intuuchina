<section class="content-tab">
    <div class="toolbox row">
        <div class="toolbox__tool col-8 col-sm-9">
            @component('components.inputs.searchbox', ['action' => route('admin.fees')])
                @slot('name', 'fees')
            @endcomponent
        </div>
        <div class="toolbox__tool col-3 offset-1 offset-sm-0 col-sm-3">
            @component('components.inputs.cta-button')
                @slot('variant', 'primary')
                @slot('href',  route('admin.new-fee'))
                @slot('content', __('New'))
                @slot('fas', 'plus')
            @endcomponent
        </div>
    </div>

    @component('components.flex-table', ['items' => $data['fees']])
        @slot('action', 'partials.forms.admin._fees-list')
    @endcomponent
</section>
