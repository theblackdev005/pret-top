<div class="form-group">
    @if ( !empty($selectLabel) )
        <label for="" class="form-label">{{ $selectLabel }}</label>
    @endif

    <select class="form-control @error($selectName) is-invalid @enderror" name="{{ $selectName }}" id="" required>
    @foreach ($options as $i => $option)
        @php
            $value = !empty($optionValueKey) ? $option[$optionValueKey] : $option;
            $label = !empty($optionLabelKey) ? $option[$optionLabelKey] : $option;
            $selected = ($defaultValue == $value) ? 'selected="selected"' : null;
        @endphp
        <option value="{{ $value }}" {{ $selected }}>{{ $label }}</option>
    @endforeach
</select>
</div> 