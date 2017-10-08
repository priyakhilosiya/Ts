<?php
global $access;
$access = array
(
	"dashboard" => array
	(
		"index" => array("A"),
		"ajax_list" => array("A"),
		"details" => array("A"),
	),
	
	"sponsor" => array
	(
		"index" => array("A"),
	
	),	
	
	"users" => array
	(
		"index" => array("A","S"),
        'addattendee'=> array("A","S"),
        'editAttendee'=> array("A","S"),
        'inviteAttendees'=> array("A","S"),
        'messageAll'=> array("A","S"),
        'messageAttendee'=> array("A","S"),
        'resendTicket'=> array("A","S"),
        'cancelAttendee'=> array("A","S"),
        'orderView'=> array("A","S"),         
	),
	"events" => array
	(
		"index" => array("A"),
	
	),	
	"tickets" => array
	(
		"index" => array("A"),
	
	),
	"orders" => array
	(
		"index" => array("A"),
	
	),
);
?>