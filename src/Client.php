<?php

    class Client
    {
        private $id;
        private $client_name;
        /*private $contact;
        private $stylist_id;
*/
        function __construct($id, $client_name/*, $contact, $stylist_id*/)
        {
            $this->id = $id;
            $this->client_name = $client_name;
            /*$this->contact = $contact;
            $this->stylist_id = $stylist_id;*/
        }

    //------ SETTERS 'n GETTERS ------------------
            // ------- ID ----------------------
        function setId($new_id){
            $this->id = (int) $new_id;
        }
        function getId(){
            return $this->id;
        }
            // ------- CLIENT_NAME ---------------------
        function setName($new_client_name){
            $this->client_name = (int) $new_client_name;
        }
        function getName(){
            return $this->client_name;
        }
/*            // ------- CONTACT/STYLIST SET-GET --------------------
        function setContact($new_contact)
        {
            $this->contact = (int) $new_contact;
        }
        function getContact()
        {
            return $this->contact;
        }
            // ------- STYLIST_ID -------------------
        function setStylistId($new_stylist_id)
        {
            $this->stylist_id = (int) $new_stylist_id;
        }
        function getStylistId()
        {
            return $this->stylist_id;
        }
*/

        function Save(){
            $statement = $GLOBALS['DB']->query("INSERT INTO clients (client_name) VALUES ('{$this->getName()}') RETURNING id;");
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $this->setId($result['id']);
        }

        static function deleteAll(){
            $GLOBALS['DB']->exec("DELETE FROM clients *;");
        }

        static function getAll(){
            $returned_clients = $GLOBALS['DB']->query('SELECT * FROM clients;');
            $clients = array();
            foreach($returned_clients as $client){
                $id = $client['id'];
                $client_name = $client['client_name'];
                $new_client = new Client($id, $client_name);
                array_push($clients, $new_client);
            }
            return $clients;
        }
    //------ SAVERS 'n DELETERS ------------------


    //------ FINDER 'n UPDATER -------------------

    }


?>
