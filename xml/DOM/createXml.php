<?php

$doc = new DOMDocument();// $doc->documentElement to get root element
$doc->preserveWhiteSpace=false;
$doc->formatOutput = true;
$root = new DOMElement("data");

$doc->appendChild($root);
for ($i = 0; $i < 3; $i++){
    $person = $doc->createElement("person");// or new DomElement
    $name = $doc->createElement("name", "mohammad$i");
    $family = $doc->createElement("family", "barbast$i");
    $id = $doc->createElement("id", "000$i");
    $root->appendChild($person);
    $person->appendChild($name);
    $person->appendChild($family);
    $person->appendChild($id);
}
echo $doc->saveXML();
echo "------------------------------<br/>";


//remove *child*
$data = $doc->getElementsByTagName("data")->item(0);
$targetPerson = $doc->getElementsByTagName("person")->item(0);
$data->removeChild($targetPerson);
echo $doc->saveXML();
echo "------------------------------<br/>";

//insert *child* before
$new = $doc->createElement("newElement","this is the best");
$ref = $doc->getElementsByTagName("data")->item(0);
$doc->insertBefore($new, $ref);// just we can add child not subchild
echo $doc->saveXML();
echo "------------------------------<br/>";

// replce *child* before
$new = $doc->createElement("bigPerson","no data");
$old = $doc->getElementsByTagName("data")->item(0);
$doc->replaceChild($new,$old);
echo $doc->saveXML();
echo "------------las--------------<br/>";
//clone node
$mydoc = new DOMDocument();
$mydoc->load("persons.xml");
$person1 = $mydoc->getElementsByTagName("person")->item(0)->cloneNode();
$mydoc->documentElement->appendChild($person1);
echo $mydoc->saveXML();
echo "------------las--------------<br/>";
$mydoc1 = new DOMDocument();
$mydoc1->load("persons.xml");
echo $mydoc->getElementsByTagName("person")->item(1)->getLineNo();
echo "------------las--------------<br/>";
foreach ($mydoc1->getElementsByTagName('*') as $node) {
    echo $node->getNodePath() . "\n";
}
echo "------------las--------------<br/>";
echo $mydoc1->documentElement->getElementsByTagName('family')->item(0)->hasAttributes()?1:0;
echo $mydoc1->documentElement->getElementsByTagName('family')->item(0)->hasChildNodes()?1:0;
echo "------------111--------------<br/>";
$mydoc1 = new DOMDocument();
