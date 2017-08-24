<?php

class Custom_Api extends SugarApi
{
    public function registerApiRest()
    {
        return array(
            //GET & POST
            'MyGetEndpoint' => array (
                //request type
                'reqType' => array ('GET','POST'),

                //set authentication
                'noLoginRequired' => true,

                //endpoint path
                'path' => array('CustomEndpoint', 'GetRecord', '?'),

                //endpoint variables
                'pathVars' => array('', '', 'data'),

                //method to call
                'method' => 'get_record',

                //short help string to be displayed in the help documentation
                'shortHelp' => 'An example of a custom Api that will get record from the table',

                //long help to be displayed in the help documentation
                'longHelp' => 'custom/clients/base/api/help/CustomEndpoint_MyGetEndPoint_help.html',
            ),
        );
    }

    /**
     * Method to be used for my MyEndpoint/GetExample endpoint
     */
    public function get_record($api, $args)
    {
      /**
      *
      *database insertion code
      */
       $server='localhost';
       $db_user='admin';
       $db_password='admin';
       $db_name='sugarcrm77';

      /**
      *
      *this will create the connection to the server
      *@param $server name of the server
      *@param $db_user user name of the database
      *@param $db_password password of the database uner
      *@param $db_name name of the database which one you want to to connect
      *@return it will return the connection variable
      */
       $conn=new mysqli($server,$db_user,$db_password,$db_name);
       //test connection
       if(!$conn)
       {
       	die("unable to connect to the database");
       }
       /**
       *database select code
        */
       // query for select data from database
       $selectStatement="SELECT * FROM  accounts";

       /**
       *execution of the query
       *@param $selectStatement this is the query you want to Execute
       *@return it will return the selected row
       */
       $result=$conn->query($selectStatement);
       return $result;


    }

}

?>
