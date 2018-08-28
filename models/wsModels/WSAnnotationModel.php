<?php
//******************************************************************************
//                          WSAnnotationModel.php
// SILEX-PHIS
// Copyright © INRA 2018
// Creation date: Jun, 2018
// Contact: arnaud.charleroy@inra.fr, anne.tireau@inra.fr, pascal.neveu@inra.fr
//******************************************************************************

namespace app\models\wsModels;

include_once '../config/web_services.php';

/**
 * Encapsulate the access to the annotations service
 * @see \openSILEX\guzzleClientPHP\WSModel
 * @author Morgane Vidal <morgane.vidal@inra.fr>
 * @author Arnaud Charleroy <arnaud.charleroy@inra.fr>
 */
class WSAnnotationModel extends \openSILEX\guzzleClientPHP\WSModel {

    /**
     * initialize access to the annotations service. Calls super constructor
     */
    public function __construct() {
        parent::__construct(WS_PHIS_PATH, "annotations");
    }
    
    /**
     * Finds and returns a single instance of annotation model by this uri
     * @param String $sessionToken connection user token
     * @param String $uri uri of the searched annotation
     * @param Array $params contains the data to send to the get service 
     * e.g.
     * [
     *  "page" => "0",
     *  "pageSize" => "1000",
     *  "uri" => "http://uri/of/my/entity" 
     * ]
     * @return mixed if the annotation exist, an array representing the annotation 
     *               else the error message 
     */
    public function getAnnotationByURI($sessionToken, $uri, $params) {
        $subService = "/" . urlencode($uri);
        $requestRes = $this->get($sessionToken, $subService, $params);
        if (isset($requestRes->{WSConstants::RESULT}->{WSConstants::DATA}))  {
            return (array) $requestRes->{WSConstants::RESULT}->{WSConstants::DATA}[0];
        } else {
            return $requestRes;
        }
    }
}
