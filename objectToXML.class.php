<?php
   class ObjectToXML {
   private $dom;
   private $root;
   public function __construct($obj) {
      $this->dom = new DOMDocument("1.0", "UTF8");
      $this->root = $this->dom->createElement('root', get_class($obj));
      foreach($obj as $key=>$value) {
        $node = $this->createNode($key, $value);
        if(is_array($key)){
           $this->processArray($key);
        }else{
           if($node != NULL) $this->root->appendChild($node);
        }
        
        
      }
      
      $this->dom->appendChild($this->root);
   }
  private function createNode($key, $value) {
      /*krumo($key);
      krumo($value);*/
  	$node = NULL;
  	if(is_string($value) || is_numeric($value) || is_bool($value) || $value == NULL) {
  	  if($value == NULL) $node = $this->dom->createElement($key);
	  else $node = $this->dom->createElement($key, (string)$value);
  	} else {
	  $node = $this->dom->createElement($key);
	  if($value != NULL) {
		foreach($value as $key=>$value) {
		  $sub = $this->createNode($key, $value);
	      if($sub != NULL)  $node->appendChild($sub);
		}
	  }
  	}
        
	return $node;
  }

  private function processArray($array){
      foreach($array as $key => $value){
          if(is_array($key)){

              $this->processArray($key);
          }else{

              $node = $this->createNode($key, $value);
              if($node != NULL) $this->root->appendChild($node);
          }
      }
  }

  public function __toString() {
    return $this->dom->saveXML();
  }
}