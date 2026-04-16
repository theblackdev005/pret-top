@extends('layouts.default')

@section('content')
	
	<!-- Banner Start -->
	<x-breadcrumb></x-breadcrumb>
	<!-- Banner End -->

	<!-- Appointment Start -->
	<div class="rs-appointment pt-150 pb-115 md-pt-110 md-pb-75">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="title-part">
						<h2 class="title">{{ translate(258) }}</h2>
					</div>
				</div>
				<div class="col-lg-6">
					<p class="desc-part">{{ translate(307) }}</p>
				</div>
			</div>
			<div class="border-divider py-4">
				<div class="boder-shape"></div>
			</div>
			<div class="row">
				<div class="col-lg-12 md-mb-30">
					<ul class="check-lists m-0">
            			<li>{{ translate(259) }}</li>
            			<li>{{ translate(260) }}</li>
            			<li>{{ translate(261) }}</li>
        			</ul>
        			<a href="{{ routeWithLocale('site.obtain_financing') }}" class="readon submit mt-4">{{ translate(302) }}</a>
				</div>
			</div>
		</div>
	</div>
	<!-- Appointment End -->

	<!-- Cta Start -->
	<x-rs-cta></x-rs-cta>
	<!-- Cta End -->
@endsection