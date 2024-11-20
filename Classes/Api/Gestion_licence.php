<?php

namespace fand\Classes\Api;
use WP_REST_Request;
use WP_REST_Response;

class Gestion_licence {
    
    static function verify_licence_key(WP_REST_Request $request) {
        // Récupérer le token d'autorisation
        $licence_token = $request->get_header('Authorization');
        $decoded_token = base64_decode(str_replace('Bearer ', '', $licence_token));
        list($licence_key, $timestamp) = explode('.', $decoded_token);
    
        // Vérifiez si le token n'est pas expiré (par exemple, 5 minutes)
        if (time() - (int)$timestamp > 300) {
            return new WP_REST_Response(['success' => false, 'message' => 'Token expired'], 403);
        }
    
        $plugin_name = $request->get_param('plugin_name');
    
        // Chemin du plugin sans guillemets autour
        $plugin_path = $plugin_name . '/' . $plugin_name . '.php';
    
        if (is_plugin_active($plugin_path)) {
            return new WP_REST_Response(['success' => true, 'message' => 'Plugin is active'], 200);
        } else {
            return new WP_REST_Response(['success' => true, 'message' => 'Plugin is inactive'], 200);
        }
    }
}    
