<ul class="{{ $class }}">
    @foreach (loanOffersLists() as $offer_uri => $offer)
        <li><a href="{{ routeWithLocale('site.loan_offers', $offer_uri) }}">{{ translate($offer[0]) }}</a></li>
    @endforeach
</ul>