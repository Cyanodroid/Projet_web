<?php
// montre moi ton code. ah vous avez fait comme ça ? ça marche pas ça ...
class PaypalController extends AppController{
	
	public $uses = array('User','Transaction');

	function notify() {
		$email_account = Configure::read('Paypal.mail');
		$req = 'cmd=_notify-validate';

		foreach ($_POST as $key => $value) {
		    $value = urlencode(stripslashes($value));
		    $req .= "&$key=$value";
		}

		$header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
		$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
		$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
		$fp = fsockopen('ssl://www.'.Configure::read('Paypal.sandbox').'paypal.com', 443, $errno, $errstr, 30);
		
		$item_name        = $_POST['item_name'];
		$item_number      = $_POST['item_number'];
		$payment_status   = $_POST['payment_status'];
		$payment_amount   = $_POST['mc_gross'];
		$payment_tax      = $_POST['tax'];
		$payment_ht       = $payment_amount - $payment_tax; 
		$payment_currency = $_POST['mc_currency'];
		$address          = $_POST['address_street'];
		$country          = $_POST['address_country'];
		$city             = $_POST['address_city'];
		$name             = $_POST['address_name'];
		$txn_id           = $_POST['txn_id'];
		$receiver_email   = $_POST['receiver_email'];
		$payer_email      = $_POST['payer_email'];
		parse_str($_POST['custom'],$custom);

		if (!$fp) {

		} else {
		fputs ($fp, $header . $req);
		while (!feof($fp)) {
		    $res = fgets ($fp, 1024);
		    if (strcmp ($res, "VERIFIED") == 0) {
		        // vérifier que payment_status a la valeur Completed
		        if ( $payment_status == "Completed") {
		               if ( $email_account == $receiver_email) {
		                
		               		if($custom['action'] == 'subscribe'){
		               			$duration = $custom['duration'];
		               			$uid = $custom['uid']; 
		               			if($payment_ht == Configure::read("Site.prices.$duration")){

		               				$this->Transaction->save(array(
		               					'price'	=> $payment_ht,
		               					'tax'	=> $payment_tax,
		               					'txnid' => $txn_id,
		               					'user_id'=> $uid,
		               					'action' => 'subscribe',
		               					'amount' => $duration
		               				));

		               				$this->User->id = $uid; 
		               				if($this->User->field('premium')){
		               					$end = $this->User->field('end_subscribtion');
		               					$date = new DateTime($end);
		               				}else{
		               					$date = new DateTime();
		               				}

		               				$date->add(new DateInterval('P'.$duration.'M'));
		               				$this->User->saveField('end_subscribtion',$date->format('Y-m-d H:i:s'));

		               			} else {
		               				$this->log("Paiement $duration mois = $payment_ht Ne correspond pas ",'paypal'); 
		               			}
		               		}

		               }
		        }
		        else {
		                // Statut de paiement: Echec
		        }
		        exit();
		   }
		    else if (strcmp ($res, "INVALID") == 0) {
				// Transaction invalide
		    }
		}
		fclose ($fp);
		}	
	}

	function success() {
		if( !$this->Auth->user("id")){
			throw new NotFoundException();
		}

		$this->User->id =  $this->Auth->user("id");
		$this->Session->write('Auth',$this->User->read()); 
		$this->redirect(array('controller'=>'posts','action'=>'index'));
		$this->Session->setFlash("Vous êtes maintenant abonné !", "succes");
	}

	function cancel() {
		
	}
}
