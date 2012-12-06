<?php

    class Mail{
	private $headers = "";
	private $message = "";
	private $subject = "";
	private $to = "";
	private $from = "";
	private $nom = "";

	/**
	 * constructor
	 * @param $to = Destinataire
	 * @param $nomProvenance = nom de l'expéditeur 
	 * @param $mailProvenance = adresse email de l'expéditeur 
	 * @param $messageProvenance = Message de l'expéditeur
	 */
	public function __construct($to, $nomProvenance , $mailProvenance, $messageProvenance){
	    $this->to = $to;
	    $this->nom = $nomProvenance;
	    $this->from = $mailProvenance;
	    $this->message = $messageProvenance;

	    // Construction du mail
	    $this->buildHeaders()->buildMessage();
	}
	/**
	 * buildHeaders
	 * Permet de construire l'en-tete du mail à envoyer
	     * @return $this
	 */
	private function buildHeaders() {
	    $this->headers = 'MIME-Version: 1.0' . "\r\n";
	    $this->headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

	    $this->headers .= 'To: ' . $this->to . "\r\n";
	    $this->headers .= 'From: WEBTUTS' . $this->nom . ' <' . $this->from . '>' . "\r\n";

	    return $this;
	}
	/**
	 * buildMessage 
	 * Permet de construire le corps du message
	     * @return $this
	 */
	private function buildMessage() {
	    $this->message = '
		    <html>
			    <head>
				    <title>' . $this->subject . '</title>
			    </head>
			    <body>
				    <p>' . nl2br($this->message) . '
				    </p>
			    </body>
		    </html>';

	    return $this;

	}
	/**
	 * setSubject 
	 * Permet de configurer un objet facultativement
	     * @param $subject
	 */
	public function setSubject($subject = "(Sans objet)"){
	    $this->subject = $subject;
	}
	/**
	 * sendMail 
	 * Envoie le mail retourne TRUE en cas de réussite et False en cas d'échec
	     * @return boolean
	 */
	public function sendMail(){
	    try{
		// La fonction mail ne marche pas en local il faut configurer le SMTP etc..
		mail($this->to, $this->subject, $this->message, $this->headers);
		return true;
	    } catch(Exception $e){
		   throw $e;
		return false;
	    }
	}    
    }

?>