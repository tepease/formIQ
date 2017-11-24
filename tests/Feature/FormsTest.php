<?php

namespace Tests\Feature;

use App\Form;
use Tests\ApiTest;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FormsTest extends ApiTest
{
    /**
     * @return void
     */
    public function fetches_form()
    {
        $form = $this->makeForm();

        $response = $this->getJson("api/forms/{$form->id}");

        $response->assertStatus(200);
    }

    private function makeForm($formFields = [])
    {
        $form = array_merge([
            'anonymous' => $this->fake->boolean
        ], $formFields);

        return Form::create($form);
    }


}
