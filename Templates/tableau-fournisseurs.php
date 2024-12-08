<!-- Tab panes -->
<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="add">		
        <div class="div_conteneur_parent">
            <div class="div_conteneur_page"  >
                <div class="div_int_page">			
                    <div class="div_h1" >
                        <h1>Tableau des fournisseurs</h1>
                    </div>

                    <div class="div_saut_ligne" style="height:50px;"></div>	

                    <div style="width:100%;height:auto;text-align:center;">                              
                        <div style="display:inline-block;" id="conteneur">
                            <div class="centre">
                                <div class="titre_centre">
                                    <!-- Ajouter les boutons d'actions au-dessus du tableau -->
                                    <div class="d-flex justify-content-center mb-3">
                                        <div>
                                            <button id="openModalBtn" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                Ajouter
                                            </button>
                                        </div>

                                        <div>
                                            <button id="import" class="btn btn-secondary" disabled title="Import désactivée sans licence">Importer</button>
                                        </div>
                                        <div>
                                        <form id="form" name="form" enctype="multipart/form-data" method="post" action="<?php echo esc_url(home_url('export_csv')) ?>">
                                            <?php wp_nonce_field('export_fournisseurs_action', 'export_fournisseurs_nonce'); ?>
                                            <button type="submit" name="action" value="export" class="btn btn-secondary">Exporter</button>
                                        </form>
                                        </div>
                                    </div>
                                </div>	
                            </div>

                            <div class="div_saut_ligne" style="height:50px;"></div>

                            <div class="centre">

                                <div id="auto-dismiss-licence" class="alert alert-warning">
                                    La modification et la suppression sont désactivées. Veuillez activer votre licence pour utiliser toutes les fonctionnalités.
                                </div>
                            <?php
                                if ($message): 
                            ?>
                                <div id="auto-dismiss" class="alert <?php echo esc_attr($message_type === 'error' ? 'alert-danger' : 'alert-success'); ?>" style="display: inline-block;">
                                    <?php echo esc_html($message); ?>
                                </div>
                            <?php endif; ?>
                            </div>

                            <div class="div_saut_ligne" style="height:50px;"></div>

                            <!-- Ajoutez filtre alphabetique -->
                            <div id="alphabet-filter" style="margin-bottom: 20px;"></div>

                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nom</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Voir</th>
                                            <th scope="col">Modifier</th>
                                            <th scope="col">Supprimer</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        global $wpdb;
                                        // Récupérer les données de la table 'fournisseurs'
                                        $fournisseurs = $wpdb->get_results($wpdb->prepare("SELECT * FROM %i", FAND_FOURNISSEURS_TABLE));

                                        // Vérifier si des résultats ont été trouvés
                                        if (!empty($fournisseurs)) {

                                            foreach ($fournisseurs as $index => $fournisseur) {

                                                echo "<tr>";
                                                echo "<th scope='row'>" . esc_html($index + 1) . "</th>"; // Index + 1 pour numéroter les lignes
                                                echo "<td>" . esc_html($fournisseur->nom) . "</td>";
                                                echo "<td>" . esc_html($fournisseur->email) . "</td>";
                                                echo "<td>";

                                                // afficher le bouton voir fiche fournisseur
                                                echo '<button type="button" class="openFicheBtn btn btn-primary" title="Voir" 
                                                        data-id="'. esc_attr($fournisseur->id) .'"
                                                        data-nom="'. esc_attr($fournisseur->nom) .'"
                                                        data-adresse="'. esc_attr($fournisseur->adresse) .'"
                                                        data-cp="'. esc_attr($fournisseur->cp) .'"
                                                        data-ville="'. esc_attr($fournisseur->ville) .'"
                                                        data-pays="'. esc_attr($fournisseur->pays) .'"
                                                        data-email="'. esc_attr($fournisseur->email) .'"
                                                        data-telephone="'. esc_attr($fournisseur->telephone) .'">
                                                        <i class="fas fa-eye"></i>
                                                    </button>';

                                                echo "</td>";
                                                echo "<td>";
                                                // Si la licence est valide, afficher le bouton Modifier
                                                ?>
                                                    <button class="btn btn-secondary" disabled title="Modification désactivée sans licence"><i class="fas fa-pencil-alt"></i></button>
                                               <?php 
                                                echo "</td>";
                                                echo "<td>";

                                                // Si la licence est valide, afficher le bouton Supprimer
                                                ?>
                                                    <button class="btn btn-secondary" disabled title="Suppression désactivée sans licence"><i class='fas fa-times'></i></button>
                                                </td>
                                            </tr>
                                                <?php
                                            }
                                        } else {
                                            echo "<tr><td colspan='10'>Aucun fournisseur trouvé</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            <div class="div_saut_ligne" style="height:50px;"></div>
                        </div>
                    </div>								
                </div>
            </div>	
        </div>
    </div>
</div>

