<ul class="{{ $class }}">
    @if ( !empty($contactLink) )
        <li><a href="{{ routeWithLocale('site.contact_us') }}">{{ translate(73) }}</a></li>
    @endif

    <li><a href="{{ routeWithLocale('site.legal_notice') }}">{{ translate(76) }}</a></li>
    <li><a href="{{ routeWithLocale('site.cookie_policy') }}">{{ translate(77) }}</a></li>
    <li><a href="{{ routeWithLocale('site.how_it_works') }}">{{ translate(78) }}</a></li>
</ul>