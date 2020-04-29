<?php

class DataFormCest
{
    public function _before(\FunctionalTester $I)
    {
        $I->amOnPage(['site/index']);
    }

    public function openIndexPage(\FunctionalTester $I)
    {
        $I->see('Index HTTP', 'h1');
    }

    public function submitEmptyForm(\FunctionalTester $I)
    {
        $I->submitForm('#data-form', []);
        $I->expectTo('see validations errors');
        $I->see('Index HTTP', 'h1');
        $I->see('Name cannot be blank');
    }

    public function submitFormWithIncorrectName(\FunctionalTester $I)
    {
        $I->submitForm('#data-form', [
            'DataForm[name]' => '',
            'DataForm[surname]' => 'tester.surname',
        ]);
        $I->see('Name cannot be blank');
    }

}
