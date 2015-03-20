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
        // public function testOne(){
        //    $this->assertTrue(FALSE);
        // }

        protected function tearDown(){
            Client::deleteAll();
        }

        function test_save()
        {
            //Arrange
            $id = 1;
            $client_name = "Sal";
            /*$contact = 500-503-0000;
            $stylist_id = 1;*/
            $test_client = new Client($id, $client_name/*, $contact, $stylist_id*/);

            //Act
            $test_client->save();
            $result = Client::getAll();

            //Assert
            $this->assertEquals($test_client, $result[0]);

        }

        function test_getAll(){
            //Arrange
            $id = 1;
            $client_name1 = "Sal";
            $client_name2 = "Dicky";
            $test_client1 = new Client($id, $client_name1);
            $test_client2 = new Client($id, $client_name2);
            $test_client1->save();
            $test_client2->save();

            //Act
            $result = Client::getAll();

            //Assert
            $this->assertEquals([$test_client1, $test_client2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $id = 1;
            $client_name1 = "Sal";
            $client_name2 = "Dick";
            $test_client1 = new Client($id, $client_name1);
            $test_client2 = new Client($id, $client_name2);
            $test_client1->save();
            $test_client2->save();

            //Act
            Client::deleteAll();

            //Assert
            $result = Client::getAll();
            $this->assertEquals([], $result);
        }

        function test_setId(){
            //Arrange
            $id = null;
            $client_name = "Mr setId";
            $test_client = new Client($id, $client_name);

            //Act
            $test_client->setId(2);
            $result = $test_client->getId();

            //Assert
            $this->assertEquals(2, $result);
        }

        function test_getId(){
            //Arrange
            $id = 1;
            $client_name = "Mrs GetId";
            $test_client = new Client($id, $client_name);

            //Act
            $result = $test_client->getId();

            //Assert
            $this->assertEquals(1, $result);
        }
/*
        function test_()
        {
            //Arrange
            //Act
            //Assert

        }
*/

    //------ GETTERS 'n SETTERS ------------------



    //------ SAVERS 'n DELETERS ------------------


    //------ FINDER 'n UPDATER -------------------

    }


?>
