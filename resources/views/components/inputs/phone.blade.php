<div class="col-4 col-md-3">
    @component('components.inputs.select', ['options' => array_column(__('prefixes'), 'prefix', key(current(__('prefixes'))))])
        @slot('name', 'prefix')
    @endcomponent
</div>
<div class="col-8 col-md-9">
    @component('components.inputs.text')
        @slot('name', $name)
        @slot('type', 'tel')
        @if(isset($value))
            @slot('value', $value)
        @endif
    @endcomponent
</div>