<ul class="{{ $class }}">
    @foreach (assuranceOffersLists() as $offer_uri => $offer)
        <li><a href="{{ routeWithLocale('site.assurances', $offer_uri) }}">{{ translate($offer[0]) }}</a></li>
    @endforeach
</ul>