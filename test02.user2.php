<?php

        require("class.user2.php");
        require("class.pdofactory.php");

        print "Running...<br />";

        $strDSN = "pgsql:dbname=uf301;";
        $objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root",array());
        $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //CREAMOS EL OBJETO CON LOS PARAMETROS DE CONEXION A LA BASE DE DATOS
        $objUser = new User($objPDO);
        $objUser2 = new User($objPDO);
        $objUser3 = new User($objPDO);
        $objUser4 = new User($objPDO);
        //CREAMOS UN USUARIO
        $objUser->setFirstName("Steve");
        $objUser->setLastName("Nowicki");
        $objUser->setDateAccountCreated(date("Y-m-d"));

        //CREO TRES USUARIOS DE EJEMPLO
        $objUser2->setFirstName("Alex");
        $objUser2->setLastName("Román");
        $objUser2->setDateAccountCreated(date("Y-m-d"));

        $objUser3->setFirstName("Pedro");
        $objUser3->setLastName("Max");
        $objUser3->setDateAccountCreated(date("Y-m-d"));

        $objUser4->setFirstName("Juan");
        $objUser4->setLastName("García");
        $objUser4->setDateAccountCreated(date("Y-m-d"));

        
        
        print "First name is " . $objUser->getFirstName() . "<br />";
        print "Last name is " . $objUser->getLastName() . "<br />";

        print "Saving...<br />";

        //GUARDAMOS LOS USUARIOS EN LA BD
        $objUser->Save();
        $objUser2->Save();
        $objUser3->Save();
        $objUser4->Save();

        //ACTUALIZAMOS USUARIO
        $objUser2->setFirstName("Alejandro");
        $objUser2->Save();

        //BORRAMOS USUARIO
        $objUser3->MarkForDeletion();
        print "<br>USUARIO 2: " . $objUser2->getFirstName();
        print "<br>ID in database is " . $objUser->getID() . "<br />";



?>
