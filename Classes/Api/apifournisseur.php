<?php

namespace fand\Classes\Api;

class apifournisseur {

    static public function check_licence_key($licence_key ) {

			$current_user = wp_get_current_user();
			$user_email = $current_user->user_email;
			$licence_token = self::generate_licence_token($licence_key);
			$response = wp_remote_post('https://fan-develop.fr/wp-json/licence/v1/verify', array(
			//$response = wp_remote_post('http://localhost/apimailfournisseur/wp-json/licence/v1/verify', array(
				'headers' => array(
					'Authorization' => 'Bearer ' . $licence_token // Envoyer le token dans l'en-tête Authorization
				),
				'body' => array(
					'licence_key' => $licence_key,
					'user_email' => $user_email,
					'domain' => home_url(),
				),
			));

			if (is_wp_error($response)) {
				return false;
			}

			$body = json_decode(wp_remote_retrieve_body($response), true);

			if (isset($body) && $body['success']) {
				return true;
			} else {
				if (isset($body) && $body['message']==='Votre licence est expirée') {
					// Supprimer la licence de la base de données
					delete_option('fand_licence_key');
				}
				return false;
			}
	}
	
	static function generate_licence_token($licence_key) {
		$timestamp = time();
		return base64_encode($licence_key . '.' . $timestamp); // Encodage de la clé de licence et de l'horodatage
	}
}