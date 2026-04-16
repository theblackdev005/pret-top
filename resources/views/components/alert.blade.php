@if( $errors->any() )
    @if ( !empty($only) )

        @php
            $data = $errors->get($only);
        @endphp

        @if ($data)
            <div class="alert alert-{{ $only }}">
                @foreach ( (is_array($data) ? $data : [$data]) as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif
        
    @else
        <div class="alert alert-{{ $errors->has('success') ? 'success' : 'danger' }}">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif
@endif