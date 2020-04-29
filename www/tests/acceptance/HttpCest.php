<?php

use yii\helpers\Url;

class HttpCest
{
    public function _before(\AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/http'));
    }
    
    public function httpPageWorks(AcceptanceTester $I)
    {
        $I->wantTo('ensure that http page works');
        $I->see('HTTP Request', 'h1');
    }

    public function dataFormCanBeSubmitted(AcceptanceTester $I)
    {
        $I->amGoingTo('submit contact form with correct data');
        $I->fillField('#dataform-name', 'tester');
        $I->fillField('#dataform-surname', 'surnametester');

        $I->click('data-button');
        
        $I->wait(2); // wait for button to be clicked

        $I->see('Form submitted');
    }
}
