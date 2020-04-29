<?php

use yii\helpers\Url;

class IndexCest
{
    public function _before(\AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/index'));
    }

    public function httpPageWorks(AcceptanceTester $I)
    {
        $I->wantTo('ensure that index page works');
        $I->see('Index HTTP', 'h1');
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
