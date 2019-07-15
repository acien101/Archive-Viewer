<?php

class CesarObservatory{
  private $id;
  private $name;
  private $shortdescription;
  private $sectionurl;
  private $datecreated;
  private $dateupdated;
  private $iduserupdate;
  private $loginuserupdate;

  /**
   * CesarObservatory constructor.
   * @param $id
   * @param $name
   * @param $shortdescription
   * @param $sectionurl
   * @param $datecreated
   * @param $dateupdated
   * @param $iduserupdate
   * @param $loginuserupdate
   */
  public function __construct($id, $name, $shortdescription, $sectionurl, $datecreated, $dateupdated, $iduserupdate, $loginuserupdate){
    $this->id = $id;
    $this->name = $name;
    $this->shortdescription = $shortdescription;
    $this->sectionurl = $sectionurl;
    $this->datecreated = $datecreated;
    $this->dateupdated = $dateupdated;
    $this->iduserupdate = $iduserupdate;
    $this->loginuserupdate = $loginuserupdate;
  }

  /**
   * @return mixed
   */
  public function getId(){
    return $this->id;
  }

  /**
   * @param mixed $id
   */
  public function setId($id){
    $this->id = $id;
  }

  /**
   * @return mixed
   */
  public function getName(){
    return $this->name;
  }

  /**
   * @param mixed $name
   */
  public function setName($name){
    $this->name = $name;
  }

  /**
   * @return mixed
   */
  public function getShortDescription(){
    return $this->shortdescription;
  }

  /**
   * @param mixed $shortdescription
   */
  public function setShortDescription($shortdescription){
    $this->shortdescription = $shortdescription;
  }

  /**
   * @return mixed
   */
  public function getSectionUrl(){
    return $this->sectionurl;
  }

  /**
   * @param mixed $sectionurl
   */
  public function setSectionURL($sectionurl){
    $this->sectionurl = $sectionurl;
  }

  /**
   * @return mixed
   */
  public function getDateCreated(){
    return $this->datecreated;
  }

  /**
   * @param mixed $datecreated
   */
  public function setDateCreated($datecreated){
    $this->datecreated = $datecreated;
  }

  /**
   * @return mixed
   */
  public function getDateUpdated(){
    return $this->dateupdated;
  }

  /**
   * @param mixed $dateupdated
   */
  public function setDateUpdated($dateupdated){
    $this->dateupdated = $dateupdated;
  }

  /**
   * @return mixed
   */
  public function getIdUserUpdate(){
    return $this->iduserupdate;
  }

  /**
   * @param mixed $iduserupdate
   */
  public function setIdUserUpdate($iduserupdate){
    $this->iduserupdate = $iduserupdate;
  }

  /**
   * @return mixed
   */
  public function getLoginUserUpdate(){
    return $this->loginuserupdate;
  }

  /**
   * @param mixed $loginuserupdate
   */
  public function setLoginUserUpdate($loginuserupdate){
    $this->loginuserupdate = $loginuserupdate;
  }
}