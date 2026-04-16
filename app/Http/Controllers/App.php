<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class App extends Controller
{
	
	/**
	 * Page d'accueil
	 */
	public function index(){
		return view('pages.index');
	}
	
	/**
	 * Politique de confidentialité privée
	 */
	public function legal_notice(){
		return view('pages.legal-notice');
	}

	/**
	 * Politique de cookie
	 */
	public function cookie_policy(){
		return view('pages.cookie-policy');
	}

	/**
	 * Comment ça marche ?
	 */
	public function how_it_works(){
		return view('pages.how-it-works');
	}


	/**
	 * Nos offres de prêt
	 */
	public function loan_offers( Request $request ){
		$type = $request->route('type') ?? false;
		$records = loanOffersLists( $type );

		return view('pages.loan-offers', compact('type', 'records'));
	}


	/**
	 * Nos assurances
	 */
	public function assurances( Request $request ){
		$type = $request->route('type') ?? false;
		$records = assuranceOffersLists( $type );

		return view('pages.insurances', compact('type', 'records'));
	}
}
