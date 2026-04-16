@extends('layouts.default')

@section('content')

<!-- HERO FINAL JEMLOPAY -->
<section class="jp-final-hero">
    <div class="jp-final-overlay"></div>

    <div class="container">
        <div class="row align-items-center">

            <!-- LEFT -->
            <div class="col-lg-6">
                <div class="jp-final-content">

                    <span class="jp-final-badge">
                        {{ translate(577) }}
                    </span>

                    <h1 class="jp-final-title">
                        {{ translate(578) }}
                    </h1>

                    <p class="jp-final-desc">
                        {{ translate(579) }}
                    </p>

                    <a href="{{ routeWithLocale('site.obtain_financing') }}" class="jp-final-btn">
                        {{ translate(583) }}
                    </a>

                    <div class="jp-final-actions">

                        <a href="{{ routeWithLocale('site.obtain_financing') }}" class="jp-final-item">
                            <span class="jp-dot"></span>
                            <span>{{ translate(580) }}</span>
                        </a>

                        <a href="{{ routeWithLocale('site.obtain_financing') }}" class="jp-final-item">
                            <span class="jp-dot"></span>
                            <span>{{ translate(581) }}</span>
                        </a>

                        <a href="{{ routeWithLocale('site.obtain_financing') }}" class="jp-final-item">
                            <span class="jp-dot"></span>
                            <span>{{ translate(582) }}</span>
                        </a>

                    </div>

                </div>
            </div>

            <!-- RIGHT IMAGE -->
            <div class="col-lg-6">
                <div class="jp-final-image">
                    <img src="{{ asset_img('slider/style1/h1-1.jpg') }}" alt="JemloPay financement">
                </div>
            </div>

        </div>
    </div>
</section>

<style>
.jp-final-hero{
    position:relative;
    padding:90px 0 70px;
    background:url('{{ asset_img("slider/style1/h1-2.jpg") }}') center/cover no-repeat;
    overflow:hidden;
}

.jp-final-overlay{
    position:absolute;
    inset:0;
    background:linear-gradient(90deg, rgba(20,20,30,0.86) 0%, rgba(20,20,30,0.62) 42%, rgba(20,20,30,0.22) 100%);
}

.jp-final-content{
    position:relative;
    z-index:2;
    max-width:680px;
}

.jp-final-badge{
    display:inline-block;
    background:rgba(255,255,255,0.14);
    color:#fff;
    padding:8px 14px;
    border-radius:999px;
    font-size:13px;
    font-weight:600;
    margin-bottom:15px;
}

.jp-final-title{
    color:#fff;
    font-size:48px;
    font-weight:800;
    line-height:1.08;
    margin-bottom:16px;
}

.jp-final-desc{
    color:rgba(255,255,255,0.92);
    font-size:16px;
    line-height:1.75;
    margin-bottom:26px;
    max-width:620px;
}

.jp-final-btn{
    display:inline-block;
    background:#b91c1c;
    color:#fff;
    padding:14px 28px;
    border-radius:999px;
    font-weight:700;
    margin-bottom:28px;
    text-decoration:none;
    transition:.2s ease;
}

.jp-final-btn:hover{
    background:#991b1b;
    color:#fff;
    transform:translateY(-2px);
}

.jp-final-actions{
    display:flex;
    flex-direction:column;
    gap:14px;
    max-width:720px;
}

.jp-final-item{
    display:flex;
    align-items:center;
    gap:12px;
    background:rgba(255,255,255,0.94);
    padding:14px 18px;
    border-radius:999px;
    font-weight:600;
    color:#1e293b;
    text-decoration:none;
    transition:.2s ease;
}

.jp-final-item:hover{
    transform:translateX(6px);
    background:#fff;
    box-shadow:0 8px 20px rgba(0,0,0,0.08);
    color:#1e293b;
}

.jp-dot{
    width:12px;
    height:12px;
    min-width:12px;
    background:#b91c1c;
    border-radius:50%;
}

.jp-final-image{
    position:relative;
    z-index:2;
    text-align:right;
}

.jp-final-image img{
    width:100%;
    max-width:560px;
    border-radius:20px;
    box-shadow:0 18px 40px rgba(0,0,0,0.16);
}

@media (max-width:991px){
    .jp-final-hero{
        padding:70px 0 55px;
    }

    .jp-final-title{
        font-size:38px;
    }

    .jp-final-desc{
        font-size:15px;
        line-height:1.7;
    }

    .jp-final-image{
        margin-top:28px;
        text-align:center;
    }
}

@media (max-width:768px){
    .jp-final-title{
        font-size:32px;
    }

    .jp-final-btn{
        width:100%;
        text-align:center;
    }

    .jp-final-item{
        font-size:15px;
        padding:14px 16px;
    }

    .jp-final-image img{
        max-width:100%;
    }
}
</style>

	<!-- About Choose Start -->
	<div class="rs-about about-style1 pt-120 pb-120 md-pb-80">
		<div class="container">
			<div class="row y-middle">
				<div class="col-lg-6 md-mb-50">
					<div class="images-part">
						<img class="js-tilt" src="{{ asset_img('about/style1/about.png') }}" alt="About">
					</div>
				</div>
				<div class="col-lg-6 pl-40 md-pl-15">
					<div class="sec-title mb-40 md-mb-25">
						<span class="sub-text">{{ translate(296) }}</span>
						<h2 class="title pb-25">{{ translate(298) }}</h2>
						<p class="desc mb-1">{{ translate(297) }}</p>
						<p class="desc">{{ translate(60) }}</p>
					</div>
					<div class="rs-addon-services">
						<div class="row hover-effect">
							<div class="col-lg-6 col-md-6 sm-mb-30">
								<div class="services-item active">
									<div class="services-wrap">
										<div class="services-icon">
											<img src="{{ asset_img('about/style1/icons/1.png') }}" alt="">
										</div>
										<div class="services-content">
											<h3 class="title">{{ translate(262) }}</h3>
											<p class="services-txt">{{ translate(263) }}</p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="services-item">
									<div class="services-wrap">
										<div class="services-icon">
											<img src="{{ asset_img('about/style1/icons/2.png') }}" alt="">
										</div>
										<div class="services-content">
											<h3 class="title">{{ translate(266) }}</h3>
											<p class="services-txt">{{ translate(267) }}</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- About Choose End -->

	<!-- Why Choose Start -->
	<div class="rs-choose choose-style1 pt-120 pb-120 md-pt-80 md-pb-80">
		<div class="container">
			<div class="row y-middle">
				<div class="col-lg-5 md-mb-50">
					<div class="rs-videos">
	                    <div class="images-video">
	                        <img class="js-tilt" src="{{ asset_img('choose/style1/choose-video.jpg') }}" alt="images">
	                    </div>
	                </div>
				</div>
				<div class="col-lg-7 pl-50 md-pl-15 pr-36 md-pr-15">
					<div class="sec-title mb-30">
						<span class="sub-text">{{ translate(233) }}</span>
						<h2 class="title">{!! translate(293) !!}</h2>
					</div>
					<div class="services-item mb-20">
						<div class="services-icon">
							<img src="{{ asset_img('choose/style1/icons/1.png') }}" alt="Images">
						</div>
						<div class="services-content">
							<h3 class="title">{{ translate(234) }}</h3>
							<p class="services-txt">{{ translate(236) }}</p>
						</div>
					</div>
					<div class="services-item mb-20">
						<div class="services-icon">
							<img src="{{ asset_img('choose/style1/icons/2.png') }}" alt="Images">
						</div>
						<div class="services-content">
							<h3 class="title">{{ translate(237) }}</h3>
							<p class="services-txt">{{ translate(238) }}</p>
						</div>
					</div>
					<div class="services-item">
						<div class="services-icon">
							<img src="{{ asset_img('choose/style1/icons/3.png') }}" alt="Images">
						</div>
						<div class="services-content">
							<h3 class="title">{{ translate(239) }}</h3>
							<p class="services-txt">{{ translate(241) }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Why Choose End -->

	<!-- Cta Start -->
	<div class="rs-cta pt-116 pb-115 bg3 md-pt-76 md-pb-75">
		<div class="container">
			<div class="sec-title text-center ">
				<h2 class="title title2">{!! translate(291) !!}</h2>
	            <div class="btn-part mt-45 md-mt-30">
	               	<a class="readon cta-started" href="{{ routeWithLocale('site.obtain_financing') }}">{{ translate(303) }}</a>
	           	
					<a class="readon cta-started" href="https://api.whatsapp.com/send?phone={{ SITE_PHONE }}&text={{ translate(304) }}" target="_blank">
						<i class="fa fa-whatsapp" aria-hidden="true"></i> {{ translate(370) }}
					</a>
				</div>
			</div>
		</div>
	</div>
	<!-- Cta End -->

	<!-- Faq Start -->
	<div class="rs-faq faq-style1 pt-120 pb-120 md-pt-80 md-pb-80">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 pr-55 md-pr-15 md-mb-50">
					<div class="sec-title mb-45">
						<span class="sub-text">{{ translate(80) }}</span>
						<h2 class="title">{{ translate(81) }}</h2>
					</div>
					<div class="row">
						<div class="col-lg-6 pr-55 md-pr-15 md-mb-50">
							<div class="faq-content">
			                   <div id="accordion" class="accordion">
			                   		
			                   		@foreach (FaqsListing(1, 5) as $fq_index => $faq)
			                   			<div class="card">
			                   			    <div class="card-header py-2">
			                   			        <a class="card-link{{ ($fq_index == 0) ? '' : ' collapsed' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $fq_index }}" aria-expanded="{{ ($fq_index == 0) ? 'true' : 'false' }}">{{ translate($faq[0]) }}</a>
			                   			    </div>
			                   			    <div id="collapse-{{ $fq_index }}" class="collapse{{ ($fq_index == 0) ? ' show' : '' }}" data-bs-parent="#accordion">
			                   			        <div class="card-body">{!! translate($faq[1]) !!}</div>
			                   			    </div>
			                   			</div>
			                   		@endforeach

			                   </div>
			               </div>
						</div>
						<div class="col-lg-6">
							<div class="faq-content">
			                   <div id="accordi6on" class="accordion">
			                   		
			                   		@foreach (FaqsListing(6, 5) as $fq_index => $faq)
				                   		@php
				                   			$fq_index = $fq_index + 100
				                   		@endphp
			                   			<div class="card">
			                   			    <div class="card-header py-2">
			                   			        <a class="card-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $fq_index }}" aria-expanded="false">{{ translate($faq[0]) }}</a>
			                   			    </div>
			                   			    <div id="collapse-{{ $fq_index }}" class="collapse" data-bs-parent="#accordion">
			                   			        <div class="card-body">{!! translate($faq[1]) !!}</div>
			                   			    </div>
			                   			</div>
			                   		@endforeach

			                   </div>
			               </div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<!-- Faq End -->

	<!-- Testimonial Section Start -->
	<div id="rs-testimonial" class="rs-testimonial testimonial-style1 bg4 pt-120 pb-115 md-pt-80 md-pb-75">
	    <div class="container">
	    	<div class="sec-title mb-45">
	    		<h2 class="title text-theme">{{ translate(82) }}</h2>
	    		<p class="ti0tle col-lg-6">{{ translate(83) }}</p>
	    	</div>
	       	<div class="rs-carousel owl-carousel" data-loop="true" data-items="2" data-margin="30" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="true" data-ipad-device2="2" data-ipad-device-nav2="false" data-ipad-device-dots2="true" data-md-device="2" data-md-device-nav="false" data-md-device-dots="true">
	    		@foreach (testimonials() as $testimonial)
		    		<div class="testi-item">
		    			<div class="testi-wrap">
		    				<div class="item-content-basic">
		    					<span>
		    						<img src="{{ asset_img('testimonial/style1/quote.png') }}">
		    					</span>
		    					<p>{{ translate($testimonial['comment']) }}</p>
		    				</div>
		    				<div class="testi-content">
		    					<div class="image-wrap">
		    						<img src="{{ $testimonial['avatar'] }}">
		    					</div>
			                    <div class="testi-information">
		                            <div class="testi-name">{{ $testimonial['name'] }}</div>
		                            <span class="designation">{{ translate($testimonial['country']) }}</span>
		                        </div>
		    				</div>
		    			</div>
		    		</div>
	    		@endforeach

	       	</div>
	    </div>
	</div>
	<!-- Testimonial Section End -->

	<!-- Blog Section Start -->
	<div id="rs-blog" class="rs-blog blog-main-home pt-120 pb-115 md-pt-80 md-pb-75">
	    <div class="container">  
	        <div class="sec-title text-center mb-45">
	         	<span class="sub-text">{{ translate(113) }}</span>
	         	<h2 class="title">{{ translate(265) }}</h2>
	        </div>
	        <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="true" data-ipad-device2="2" data-ipad-device-nav2="false" data-ipad-device-dots2="true" data-md-device="3" data-md-device-nav="false" data-md-device-dots="true">
	            
	            @foreach (loanOffersLists() as $slug => $loan)
	              	<div class="blog-item">
	              	    <div class="image-wrap">
	              	        <a href="{{ routeWithLocale('site.loan_offers', $slug) }}">
	              	        	<img src="{{ asset_img('loans/'. $slug .'.jpg') }}" alt="">
	              	        </a>
	              	        <div class="date">
	              	            <i class="fi fi-rr-time-add"></i>
	              	            {{ translate(113) }}
	              	        </div>
	              	    </div>
	              	    <div class="blog-content">
	              	        <h3 class="blog-title">
	              	        	<a href="{{ routeWithLocale('site.loan_offers', $slug) }}">{{ translate($loan[0]) }}</a>
	              	        </h3>
	              	        <div class="desc">{{ translate($loan[1][0], 100) }}</div>
	              	        <div class="blog-button">
	              	        	<a href="{{ routeWithLocale('site.obtain_financing', $slug) }}">{{ translate(227) }}</a>
	              	        </div>
	              	    </div>
	              	</div>
	            @endforeach

	        </div>
	    </div>
	</div>
	<!-- Blog Section End -->

	<!-- Partner Start -->
	<x-partners></x-partners>
	<!-- Partner End -->	
@stop