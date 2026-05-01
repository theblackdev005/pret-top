<?php

namespace Tests\Feature;

use App\Mail\FinancingPreAccepted;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class LocalizedLoanFlowTest extends TestCase
{
    public function test_polish_complete_financing_redirect_keeps_reference(): void
    {
        $this->get('/pl/complete-financing?reference=JEM-TEST')
            ->assertRedirect('/pl/moj-wniosek?reference=JEM-TEST');
    }

    public function test_greek_complete_financing_redirect_keeps_reference(): void
    {
        $this->get('/el/complete-financing?reference=JEM-TEST')
            ->assertRedirect('/el/o-fakelos-mou?reference=JEM-TEST');
    }

    public function test_polish_thank_you_page_uses_polish_locale(): void
    {
        $this->withSession([
            'nom' => 'Anna',
            'montant' => '5000',
            'duree' => '24',
            'reference' => 'JEM-TEST',
        ])
            ->get('/pl/merci')
            ->assertOk()
            ->assertSee('Dziękujemy', false);
    }

    public function test_loan_form_uses_country_placeholder_and_editable_phone_prefixes(): void
    {
        $response = $this->get('/pl/obtain-financing');

        $response->assertOk()
            ->assertSee('id="address-country"', false)
            ->assertSee('Wybierz swój kraj', false)
            ->assertDontSee('value="Spain" selected', false)
            ->assertSee('id="phone-country-code"', false)
            ->assertSee('data-dial-code="+48"', false)
            ->assertSee('data-dial-code="+30"', false)
            ->assertSee(LOAN_PROCESSING_FEE, false)
            ->assertSee('name="fees_notice"', false)
            ->assertDontSee('(LOAN_PROCESSING_FEE)', false);
    }

    public function test_preaccepted_email_does_not_include_complete_dossier_link(): void
    {
        app()->setLocale('pl');

        $html = (new FinancingPreAccepted([
            'name' => 'Anna Kowalska',
            'request_id' => 'JEM-TEST',
            'complete_financing_url' => 'https://example.test/pl/moj-wniosek?reference=JEM-TEST',
            'financing' => [
                'montant_du_pret' => '5000',
                'duree_totale_du_pret' => 24,
            ],
        ]))->render();

        $this->assertStringNotContainsString('https://example.test/pl/moj-wniosek', $html);
    }

    public function test_processing_fee_comes_from_constant(): void
    {
        app()->setLocale('fr');

        $this->assertStringContainsString(LOAN_PROCESSING_FEE, translate(475));
        $this->assertStringNotContainsString('(LOAN_PROCESSING_FEE)', translate(475));

        $html = view('contracts.loan-contract', [
            'financing' => [
                'reference' => 'JEM-TEST',
                'prenom' => 'Anna',
                'nom' => 'Kowalska',
                'adresse_complete' => 'Marszalkowska 1',
                'adresse_pays' => 'Poland',
                'email' => 'anna@example.com',
                'telephone' => '+48 123456789',
                'montant_du_pret' => '5000',
                'duree_totale_du_pret' => 24,
                'taux_TEAG' => TEAG,
                'mensualite_estimee' => '216.00 €',
                'montant_total_a_rembourser' => '5184.00 €',
            ],
        ])->render();

        $this->assertStringContainsString(LOAN_PROCESSING_FEE, $html);
    }

    public function test_legal_notice_shows_legal_information_from_constants(): void
    {
        $response = $this->get('/fr/legal/legal-notice');

        $response->assertOk()
            ->assertSee('Informations légales', false)
            ->assertSee('Nom complet', false)
            ->assertSee(LEGAL_FULL_NAME, false);

        if (trim(LEGAL_REGISTRATION_OR_VAT_NUMBER) !== '') {
            $response->assertSee("Numéro d'enregistrement / TVA")
                ->assertSee(LEGAL_REGISTRATION_OR_VAT_NUMBER, false);
        }

        $this->get('/en/legal/legal-notice')
            ->assertOk()
            ->assertSee('Legal information', false)
            ->assertSee('Full name', false)
            ->assertSee('Registration / VAT number', false)
            ->assertDontSee('Informations légales', false);
    }

    public function test_polish_loan_submission_redirects_to_localized_thank_you(): void
    {
        Mail::fake();
        Storage::fake('local');

        $this->post('/pl/obtain-financing', [
            'financing' => [
                'montant_du_pret' => '5000',
                'devise_du_pret' => 'EUR',
                'duree_totale_du_pret' => 24,
                'nom' => 'Kowalska',
                'prenom' => 'Anna',
                'adresse_complete' => 'Marszalkowska 1',
                'adresse_pays' => 'Poland',
                'email' => 'anna@example.com',
                'telephone' => '+48123456789',
                'sexe' => 'Kobieta',
            ],
        ])->assertRedirect('/pl/merci');
    }
}
