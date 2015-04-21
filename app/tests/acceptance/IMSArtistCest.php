<?php

class IMSArtistCest {

  public function retrieveATableOfAllArtists(AcceptanceTester $I)
  {
    $I->am('An Administrator');
    $I->amGoingTo('navigate to the artists page of the IMS. I should see a table of all artists, with relevant details.
    First I am going to log into the IMS.');
    $I->amOnPage('/admin');
    $I->fillField('username', 'admin');
    $I->fillField('password', 'admin');
    $I->click('Submit');
    $I->seeCurrentUrlEquals('/ims/dashboard');
    $I->amGoingTo('navigate to the artist section of IMS located at /ims/artists');
    $I->amOnPage('/ims/artists');
    $I->expect('to see information regarding each artist in the database');
    $I->canSee('Thumbnail');
    $I->canSee('Artist#');
    $I->canSee('First Name');
    $I->canSee('Last Name');
    $I->canSee('City');
    $I->canSee('Country');
    $I->canSee('Email');
    $I->canSee('Phone#1');
    $I->canSee('Last Updated');
    $I->expect('to see a link to view any artist on the main website. Here we will test the first artist');
    $I->canSeeLink('', 'artist/1'); //this is a link
    $I->expect('to see a link to edit any artist from the table. Here we will test the first artist');
    $I->canSeeLink('', 'ims/artists/1/edit'); //this is a link
    $I->expect('to see a glyph-icon to delete any artist from the table. Here we will test whether we can see the icon');
    $I->canSeeElement(['class' => 'glyphicon-trash']); //this is a link
  }

  public function createANewArtist(AcceptanceTester $I)
  {
    $I->am('An Administrator');
    $I->amGoingTo('create a new artist using the IMS. I will login to the IMS first.');
    $I->amOnPage('/admin');
    $I->fillField('username', 'admin');
    $I->fillField('password', 'admin');
    $I->click('Submit');
    $I->seeCurrentUrlEquals('/ims/dashboard');
    $I->amGoingTo('navigate to the artist section of IMS located at /ims/artists');
    $I->amOnPage('/ims/artists');
    $I->click('Add an artist');
    $I->fillField('first_name', 'FirstNameTest'); //filling out the form for creating a new artist
    $I->fillField('middle_name', 'MiddleNameTest');
    $I->fillField('second_name', 'LastNameTest');
    $I->fillField('address1', 'Address1Test');
    $I->fillField('address2', 'Address2Test');
    $I->fillField('address3', 'Address3Test');
    $I->fillField('city', 'CityTest');
    $I->fillField('country', 'CountryTest');
    $I->fillField('about', 'AboutTest');
    $I->fillField('quote', 'QuoteTest');
    $I->fillField('email', 'test@test.com');
    $I->fillField('phone1', '+00-1234-56789');
    $I->fillField('phone2', '+00-1234-56789');
    $I->fillField('facebook', 'http://www.testfacebook.com');
    $I->fillField('twitter', 'http://www.testtwitter.com');
    $I->fillField('pinterest', 'http://www.testpinterest.com');
    $I->fillField('google', 'http://www.testgoogle.com');
    $I->attachFile('picture', 'testArtistPicture.png');
    $I->click('Create the Artist!');
    $I->seeCurrentUrlEquals('/ims/artists'); //confirm that the newly created artist is present.
    $I->canSee('Successfully created the Artist!');
    $I->click('Last Updated'); //filter the list based on 'last updated'
    $I->click('Last Updated'); //in order to put in desc mode
    $I->canSee('FirstNameTest');
    $I->canSee('LastNameTest');
    $I->canSee('CityTest');
    $I->canSee('CountryTest');
    $I->canSee('test@test.com');
    $I->canSee('+00-1234-56789');
  }

  public function createNewArtistWithoutFillingInAnyFormDetails(AcceptanceTester $I)
  {
    $I->am('An Administrator');
    $I->amGoingTo('create a new artist by trying to click create on a blank form. I will login to the IMS first.');
    $I->amOnPage('/admin');
    $I->fillField('username', 'admin');
    $I->fillField('password', 'admin');
    $I->click('Submit');
    $I->seeCurrentUrlEquals('/ims/dashboard');
    $I->amGoingTo('navigate to the artist section of IMS located at /ims/artists');
    $I->amOnPage('/ims/artists');
    $I->click('Add an artist');
    //just click create without filling in the form
    $I->click('Create the Artist!');
    //confirm that field validation is working
    $I->seeCurrentUrlEquals('/ims/artists/create');
    $I->canSee('The first name field is required.'); //flash messages...
    $I->canSee('The second name field is required.');
    $I->canSee('The address1 field is required.');
    $I->canSee('The address2 field is required.');
    $I->canSee('The address3 field is required.');
    $I->canSee('The city field is required.');
    $I->canSee('The country field is required.');
    $I->canSee('The about field is required.');
    $I->canSee('The quote field is required.');
    $I->canSee('The email field is required.');
  }

  public function createNewArtistUsingIncorrectDataTypes(AcceptanceTester $I)
  {
    $I->am('An Administrator');
    $I->amGoingTo('create a new artist using incorrect data types for the form fields. I will login to the IMS first.');
    $I->amOnPage('/admin');
    $I->fillField('username', 'admin');
    $I->fillField('password', 'admin');
    $I->click('Submit');
    $I->seeCurrentUrlEquals('/ims/dashboard');
    $I->amGoingTo('navigate to the artist section of IMS located at /ims/artists');
    $I->amOnPage('/ims/artists');
    $I->click('Add an artist');
    //use of incorrect data types for filling out the form.
    $I->fillField('email', 'test');
    $I->fillField('facebook', 'test');
    $I->fillField('twitter', 'test');
    $I->fillField('pinterest', 'test');
    $I->fillField('google', 'test');
    $I->attachFile('picture', 'testExcelFile.xlsx');
    $I->click('Create the Artist!');
    //confirm that field validation is working
    $I->expect('that the artist will not be created, and that field validation messages will appear.');
    $I->seeCurrentUrlEquals('/ims/artists/create');
    $I->canSee('The email must be a valid email address.');
    $I->canSee('The facebook format is invalid.');
    $I->canSee('The twitter format is invalid.');
    $I->canSee('The pinterest format is invalid.');
    $I->canSee('The google format is invalid.');
    $I->canSee('The picture must be an image.');
  }

  public function editNewArtist(AcceptanceTester $I)
  {
    $I->am('An Administrator');
    $I->amGoingTo('edit an artist. I will login to the IMS first.');
    $I->amOnPage('/admin');
    $I->fillField('username', 'admin');
    $I->fillField('password', 'admin');
    $I->click('Submit');
    $I->seeCurrentUrlEquals('/ims/dashboard');
    $I->amGoingTo('navigate to the artist section of IMS located at /ims/artists');
    $I->amOnPage('/ims/artists');
    $I->amGoingTo('edit the first artist in the test database.');
    $I->click(['class' => 'btn-info']); //click on link to show details of the first artist in the list
    $I->seeCurrentUrlEquals('/ims/artists/1/edit'); //confirm on edit page of newly created artist
    //perform edits
    $I->fillField('first_name', 'FirstNameTestEdit');
    $I->fillField('middle_name', 'MiddleNameTestEdit');
    $I->fillField('second_name', 'LastNameTestEdit');
    $I->fillField('address1', 'Address1TestEdit');
    $I->fillField('address2', 'Address2TestEdit');
    $I->fillField('address3', 'Address3TestEdit');
    $I->fillField('city', 'CityTestEdit');
    $I->fillField('country', 'CountryTestEdit');
    $I->fillField('about', 'AboutTestEdit');
    $I->fillField('quote', 'QuoteTestEdit');
    $I->fillField('email', 'test@testedit.com');
    $I->fillField('phone1', '+00');
    $I->fillField('phone2', '+00');
    $I->fillField('facebook', 'http://www.testfacebookedit.com');
    $I->fillField('twitter', 'http://www.testtwitteredit.com');
    $I->fillField('pinterest', 'http://www.testpinterestedit.com');
    $I->fillField('google', 'http://www.testgoogleedit.com');
    $I->attachFile('picture', 'testArtistPictureTwo.jpg');
    $I->click('Edit the Artist!');
    //confirm that the newly edited artist is present.
    $I->seeCurrentUrlEquals('/ims/artists');
    $I->canSee('Successfully updated the Artist!');
    $I->click('Last Updated'); //filter the list based on 'last updated'
    $I->click('Last Updated'); //double click in order to put in desc mode
    $I->canSee('FirstNameTestEdit');
    $I->canSee('LastNameTestEdit');
    $I->canSee('CityTestEdit');
    $I->canSee('CountryTestEdit');
    $I->canSee('test@testedit.com');
    $I->canSee('+00');
  }

  public function editArtistUsingIncorrectDataTypes(AcceptanceTester $I)
  {
    $I->am('An Administrator');
    $I->amGoingTo('edit the first artist on list using incorrect data types for the form fields. I will login to the IMS first.');
    $I->amOnPage('/admin');
    $I->fillField('username', 'admin');
    $I->fillField('password', 'admin');
    $I->click('Submit');
    $I->seeCurrentUrlEquals('/ims/dashboard');
    $I->amGoingTo('navigate to the artists section of IMS located at /ims/artists');
    $I->amOnPage('/ims/artists');
    $I->click(['class' => 'btn-info']); //click on link to show details of the first artist
    $I->seeCurrentUrlEquals('/ims/artists/1/edit'); //confirm on edit page of newly created artist
    //use of incorrect data types for filling out the form.
    $I->fillField('email', 'test');
    $I->fillField('facebook', 'test');
    $I->fillField('twitter', 'test');
    $I->fillField('pinterest', 'test');
    $I->fillField('google', 'test');
    $I->attachFile('picture', 'testExcelFile.xlsx'); //use of an excel file when it should be an image
    $I->click('Edit the Artist!');
    $I->expect('to see field validation messages');
    //confirm that field validation is working
    $I->seeCurrentUrlEquals('/ims/artists/1/edit');
    $I->canSee('The email must be a valid email address.');
    $I->canSee('The facebook format is invalid.');
    $I->canSee('The twitter format is invalid.');
    $I->canSee('The pinterest format is invalid.');
    $I->canSee('The google format is invalid.');
    $I->canSee('The picture must be an image.');
  }

  public function deleteArtist(AcceptanceTester $I)
  {
    $I->am('An Administrator');
    $I->amGoingTo('delete an artist. I will login to the IMS first.');
    $I->amOnPage('/admin');
    $I->fillField('username', 'admin');
    $I->fillField('password', 'admin');
    $I->click('Submit');
    $I->seeCurrentUrlEquals('/ims/dashboard');
    $I->amGoingTo('navigate to the artists section of IMS located at /ims/artists');
    $I->amOnPage('/ims/artists');
    $I->click(['class' => 'btn-danger']); //click on button to delete the first artist from the list
    $I->seeCurrentUrlEquals('/ims/artists'); //confirm still on index page of artists
    $I->canSee('Successfully deleted the Artist!');
  }
}
