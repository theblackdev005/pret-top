<?php

use App\Http\Middleware\ValidLanguage;
use Illuminate\Support\Facades\Route;

Route::get('/admin/loan-requests/approve/{requestId}', [\App\Http\Controllers\Financing::class, 'approve'])
    ->name('admin.loan_requests.approve');
    
    Route::get('/test-simple', function () {
    return 'OK SIMPLE';
});

Route::prefix('/theme')->group(function () {
    Route::get('/', [\App\Http\Controllers\Theme::class, 'index']);
    Route::get('/config', [\App\Http\Controllers\Theme::class, 'generate_config']);
});

Route::prefix('/{language}')->middleware([ValidLanguage::class])->group(function () {

    Route::get('/index', [\App\Http\Controllers\App::class, 'index'])->name('site.index');

    Route::get('/contact-us', [\App\Http\Controllers\Contact::class, 'create'])->name('site.contact_us');
    Route::post('/contact-us', [\App\Http\Controllers\Contact::class, 'store'])->name('site.contact_us.post');
    
    Route::get('/obtain-financing', [\App\Http\Controllers\Financing::class, 'create'])->name('site.obtain_financing');
    Route::post('/obtain-financing', [\App\Http\Controllers\Financing::class, 'store'])->name('site.obtain_financing.post');

    Route::get('/how-it-works', [\App\Http\Controllers\App::class, 'how_it_works'])->name('site.how_it_works');
    Route::get('/loans/{type?}', [\App\Http\Controllers\App::class, 'loan_offers'])->name('site.loan_offers');
    Route::get('/insurances/{type?}', [\App\Http\Controllers\App::class, 'assurances'])->name('site.assurances');
    
    Route::get('/complete-financing', function ($language) {

    if ($language === 'fr') {
        return redirect('/fr/mon-dossier');
    }

    if ($language === 'es') {
        return redirect('/es/mi-expediente');
    }

    if ($language === 'it') {
        return redirect('/it/mio-dossier');
    }

    if ($language === 'de') {
        return redirect('/de/mein-dossier');
    }

    return redirect('/' . $language . '/complete-financing');

});
    
    Route::get('/mon-dossier', [\App\Http\Controllers\Financing::class, 'showCompleteFinancingForm'])
    ->name('site.complete_financing.fr');

Route::get('/mi-expediente', [\App\Http\Controllers\Financing::class, 'showCompleteFinancingForm'])
    ->name('site.complete_financing.es');

Route::post('/complete-financing', [\App\Http\Controllers\Financing::class, 'completeFinancing'])
    ->name('site.complete_financing.submit');

    Route::get('/test-contract', function () {
        $financing = [
            'prenom' => 'Juan',
            'nom' => 'Dupont',
            'adresse_complete' => '123 rue Exemple',
            'adresse_pays' => 'Espagne',
            'email' => 'juan@example.com',
            'telephone' => '+34 612 345 678',
            'montant_du_pret' => '5000',
            'duree_totale_du_pret' => '120',
            'mensualite_estimee' => '50.02 €',
            'montant_total_a_rembourser' => '6002.40 €',
            'taux_TEAG' => '3.75%',
        ];

        return view('contracts.loan-contract', compact('financing'));
    });

    Route::get('/test-pdf', function () {
        $financing = [
            'prenom' => 'Juan',
            'nom' => 'Dupont',
            'adresse_complete' => '123 rue Exemple',
            'adresse_pays' => 'Espagne',
            'email' => 'juan@example.com',
            'telephone' => '+34 612 345 678',
            'montant_du_pret' => '5000',
            'duree_totale_du_pret' => '120',
            'mensualite_estimee' => '50.02 €',
            'montant_total_a_rembourser' => '6002.40 €',
            'taux_TEAG' => '3.75%',
        ];

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('contracts.loan-contract', [
            'financing' => $financing
        ]);

        return $pdf->stream('contrat-test.pdf');
    });

    Route::prefix('/legal')->group(function () {
        Route::get('/cookie-policy', [\App\Http\Controllers\App::class, 'cookie_policy'])->name('site.cookie_policy');
        Route::get('/legal-notice', [\App\Http\Controllers\App::class, 'legal_notice'])->name('site.legal_notice');
    });
});

Route::get('/merci', function () {
    return view('pages.thank-you');
})->name('thankyou');

Route::get('/complete-financing-success', function () {
    return view('pages.complete_financing_success');
})->name('site.complete_financing.success');


Route::get('/{language?}', [\App\Http\Controllers\App::class, 'index'])
    ->middleware([ValidLanguage::class])
    ->name('site.index.root');