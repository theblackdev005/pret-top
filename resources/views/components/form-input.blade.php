@if ( !$addons )
    <div class="form-group">
        @if ( !empty($label) )
            <label for="" class="form-label">{{ $label }}</label>
        @endif
        {{ $slot }}
        <input 
            step="{{ $step ?? 1 }}" 
            type="{{ $type ?? 'text' }}" 
            placeholder="{{ $placeholder }}" 
            autocomplete="nope" 
            value="{{ old( $old ) ?? $value }}" 
            name="{{ $name }}" 
            class="form-control @error($old) is-invalid @enderror" 
            required="required"
            @if(isset($min)) min="{{ $min }}" @endif
        >
    </div>
@else
    <div class="input-group">
        <input step="{{ $step ?? 1 }}" type="{{ $type ?? 'text' }}" placeholder="{{ $placeholder }}" autocomplete="nope" value="{{ old( $old ) ?? $value }}" name="{{ $name }}" class="form-control rounded @error($old) is-invalid @enderror">
        <span class="border-0 bg-transparent input-group-text">
            {!! $addons !!}
        </span>
    </div>
@endif