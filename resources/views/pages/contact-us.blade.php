@extends('layouts.default')

@section('content')
	<!-- Banner Start -->
	<x-breadcrumb></x-breadcrumb>
	<!-- Banner End -->

	<style>
		.whatsapp-button {
			background-color: #25D366 !important; /* Couleur verte WhatsApp */
			border: none;
			color: white !important;
			display: inline-flex;
			align-items: center;
			font-weight: 600;
			transition: background-color 0.3s ease;
		}
	
		.whatsapp-button:hover {
			background-color: #1ebe5d !important;
			text-decoration: none;
		}
	
		.whatsapp-button i {
			font-size: 18px;
		}
	</style>
	
	
	<!-- Contact Section Start -->
	<div class="rs-contact contact-style3 pt-120 md-pt-80">
	    <div class="container">
	        <div class="row">
	            <div class="col-lg-4 md-mb-60">
	               <div class="contact-box">
	                    <div class="sec-title mb-45 md-mb-30">
	                        <span class="title">{{ translate(266) }}</span><br><br>
	                        <p class="title0">{{ translate(251) }}</p>
	                    </div>
	                   <div class="address-box mb-25">
	                       <div class="address-icon">
	                           <i class="fa fa-home"></i>
	                       </div>
	                       <div class="address-text">
	                            <span class="label">{{ translate(271) }}:</span>
	                            <a href="tel:{{ SITE_PHONE }}">{{ SITE_PHONE }}</a>
	                       </div>
	                   </div>
	                   <div class="address-box mb-25">
	                       <div class="address-icon">
	                           <i class="fa fa-phone"></i>
	                       </div>
	                       <div class="address-text">
	                           <span class="label">{{ translate(270) }}:</span>
	                           <a href="mailto:{{ SITE_EMAIL }}">{{ SITE_EMAIL }}</a>
	                       </div>
	                   </div>
	                   <div class="address-box">
	                       <div class="address-icon">
	                           <i class="fa fa-map-marker"></i>
	                       </div>
	                       <div class="address-text">
	                           <span class="label">{{ translate(272) }}:</span>
	                           <div class="desc">{!! SITE_ADDRESS !!}</div>
	                       </div>
	                   </div>
					   <div class="btn-part mt-45 md-mt-30">
						<a class="readon cta-started whatsapp-button" 
						   href="https://api.whatsapp.com/send?phone={{ SITE_PHONE }}&text={{ translate(304) }}" 
						   target="_blank">
							<i class="fa fa-whatsapp" aria-hidden="true" style="margin-right: 8px;"></i>
							{{ translate(370) }}
						</a>
					</div>
					
	               </div>
	            </div> 
	            <div class="col-lg-8 pl-70 md-pl-15">
                    <div class="contact-wrap">
                    	<x-alert only="success"></x-alert>
                        <form id="contact-form" method="post" action="{{ routeWithLocale('site.contact_us.post') }}">
                        	@csrf
                        	
                            <fieldset>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 mb-25">
                                    	<x-form-input label="{{ translate(107) }}" name="contact.name" />
                                    </div> 
                                    <div class="col-lg-6 col-md-6 col-sm-6 mb-25">
                                    	<x-form-input type="email" label="{{ translate(108) }}" name="contact.email" />
                                    </div>   
                                    <div class="col-lg-6 col-md-6 col-sm-6 mb-25">
                                    	<x-form-input type="number" label="{{ translate(273) }}" name="contact.phone" />
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 mb-25">
                                    	<x-form-input type="text" label="{{ translate(109) }}" name="contact.subject" />
                                    </div>
                                    <div class="col-lg-12 mb-30">
                                    	<x-form-textarea label="{{ translate(110) }}" name="contact.message" />
                                    </div>
                                </div>
                                <div class="btn-part">                                            
                                    <div class="form-group mb-0">
                                        <input class="readon submit" type="submit" value="{{ translate(111) }}">
                                    </div>
                                </div> 
                            </fieldset>
                        </form> 
                    </div>
	            </div>
	        </div>
	    </div>
	    <div class="map-canvas pt-120 md-pt-80">
	    	<x-google-maps />
	    </div> 
	</div>
	<!-- Contact Section Start -->

	<!-- Cta Start -->
	<x-rs-cta></x-rs-cta>
	<!-- Cta End -->
@endsection