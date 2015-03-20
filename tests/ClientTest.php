<?php


    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once __DIR__."/../src/Client.php";
    //require_once __DIR__."/../src/Stylist.php";

    $DB = new PDO('pgsql:host=localhost;dbname=hair_salon_test');

    class ClientTest extends PHPUnit_Framework_TestCase
    {

        function test_save()
        {
            //Arrange
            $id = 0;
            $client_name = "Sal";
            /*$contact = 500-503-0000;
            $stylist_id = 1;*/
            $new_client = new Client($id, $client_name/*, $contact, $stylist_id*/);

            //Act
            $new_client->save();
            $result = Client::getAll();

            //Assert
            $this->assertEquals($new_client, $result);

        }

    //------ GETTERS 'n SETTERS ------------------



    //------ SAVERS 'n DELETERS ------------------


    //------ FINDER 'n UPDATER -------------------

    }


?>
