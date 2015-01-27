<?php
/**
 * Language for Generate Controller GC
 *
 *
 * Copyright (C) 2015 Gaëtan Cottrez.
 *
 *
 * @package    	Generate Controller GC
 * @copyright  	Copyright (c) 2015, Gaëtan Cottrez
 * @license GNU GENERAL PUBLIC LICENSE
 * @license http://www.gnu.org/licenses/gpl.txt GNU GENERAL PUBLIC LICENSE
 * @version    	1.0.0
 * @author 		Gaëtan Cottrez <gaetan.cottrez@laviedunwebdeveloper.com>
 */


$lang['generate_controller_gc_prerequisites'] ="Pré-requis";
$lang['generate_controller_gc_identification'] ="Identification";
$lang['generate_controller_gc_title'] ="Génération d'un nouveau controller Grocery CRUD";
$lang['generate_controller_gc_title_success'] ="Génération du nouveau controller générée avec succès";
$lang['generate_controller_gc_insert_error'] = "Une erreur est survenue lors de la génération du nouveau controller";
$lang['generate_controller_gc_insert_success'] = "Le nouveau controller a été créé avec succès";
$lang['generate_controller_gc_cancel'] = "Annuler";
$lang['generate_controller_gc_add'] = "Enregistrer";
$lang['generate_controller_gc_loading'] = "En attente, traitement des données...";
$lang['generate_controller_gc_name_controller'] = "Nom du controller";
$lang['generate_controller_gc_name_table'] = "Nom de la table";
$lang['generate_controller_gc_name_table_error'] = "La table existe déjà en base de données";
$lang['generate_controller_gc_theme'] = "Thème";
$lang['generate_controller_gc_render_view'] = "Vue pour le lancement du render";

$lang['generate_controller_gc_title_load_helper_url'] = "Charger manuellement le helper url";
$lang['generate_controller_gc_title_jquery'] = "Désactiver JQuery";
$lang['generate_controller_gc_title_jquery_ui'] = "Désactiver JQuery UI";
$lang['generate_controller_gc_title_export'] = "Export";
$lang['generate_controller_gc_title_print'] = "Impression";
$lang['generate_controller_gc_title_texteditor'] = "CKEDITOR";
$lang['generate_controller_gc_add_line'] = "Ajouter une ligne";

$lang['generate_controller_gc_title_load_db'] = "Charger manuellement la base de données";
$lang['generate_controller_gc_title_load_gc'] = "Charger la librairie Grocery CRUD";
$lang['generate_controller_gc_title_load_config_gc'] = "Charger la configuration Grocery CRUD";
$lang['generate_controller_gc_title_database'] = "Base de données";
$lang['generate_controller_gc_title_gc'] = "Grocery CRUD";
$lang['generate_controller_gc_title_name_field'] = "Nom du champ";
$lang['generate_controller_gc_title_type_field'] = "Type du champ";
$lang['generate_controller_gc_title_lenght_field'] = "Longueur";
$lang['generate_controller_gc_title_naming_field'] = "Appellation du champ";
$lang['generate_controller_gc_title_list'] = "Liste";
$lang['generate_controller_gc_title_create'] = "Création";
$lang['generate_controller_gc_title_read'] = "Lire";
$lang['generate_controller_gc_title_edit'] = "Modification";
$lang['generate_controller_gc_title_delete'] = "Suppression";
$lang['generate_controller_gc_title_required'] = "Requis";
$lang['generate_controller_gc_title_unique'] = "Unique";
$lang['generate_controller_gc_title_rules'] = "Rules";
$lang['generate_controller_gc_title_relation_with'] = "Relation avec";
$lang['generate_controller_gc_title_identical_table'] = "identique à la table";
$lang['generate_controller_gc_title_option_binary'] = "Binaires";
$lang['generate_controller_gc_title_option_list'] = "Listes";
$lang['generate_controller_gc_title_option_char'] = "Chaînes";
$lang['generate_controller_gc_title_option_date_hour'] = "Date et heure";
$lang['generate_controller_gc_title_option_date_number'] = "Nombres";
$lang['generate_controller_gc_actions'] = "Actions";
$lang['generate_controller_gc_title_value_type_field'] = "Valeur type du champ";
$lang['generate_controller_gc_contrainst'] = "Contraintes";
$lang['generate_controller_gc_where'] = "Where";
$lang['generate_controller_gc_like'] = "Like";
$lang['generate_controller_gc_or_where'] = "Or where";
$lang['generate_controller_gc_or_like'] = "Or like";
$lang['generate_controller_gc_primary_key'] = "Clé primaire";
$lang['generate_controller_gc_limit'] = "Limit";
$lang['generate_controller_gc_order_by'] = "Order by";
$lang['generate_controller_gc_relation_table'] = "relation table";
$lang['generate_controller_gc_selection_table'] = "sélection table";
$lang['generate_controller_gc_primary_key_controller_table'] = "clé primaire table controller";
$lang['generate_controller_gc_primary_key_selection_table'] = "clé primaire selection table";
$lang['generate_controller_gc_title_activate_relation_n_n'] = "Relation n n";
$lang['generate_controller_gc_title_field_selection'] = "Affichage champ selection";
$lang['generate_controller_priority_field_relation'] = "Priorité champ relation";

$lang['generate_controller_gc_error_mkdir'] = "Erreur lors de la création du dossier";
$lang['generate_controller_gc_contents_model'] = "<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Model %s
 *
 *
 * Copyright (C) ".date('Y')." %s.
 *
 *
 * @package    	%s
 * @copyright  	Copyright (c) ".date('Y').", %s
 * @license 	GNU GENERAL PUBLIC LICENSE
 * @license 	http://www.gnu.org/licenses/gpl.txt GNU GENERAL PUBLIC LICENSE
 * @version    	1.0.0
 * @author 		%s <%s>
 */

class %s extends CI_Model
{
	public function __construct() {
        parent::__construct();
    }
	
}

/* End of file %s.php */
/* Location: ./application/models/%s.php */";
$lang['generate_controller_gc_informations_table'] = "La table contiendra automatiquement un champ id (clé primaire). Inutile de le générer !<br />La colonne valeur type du champ est une valeur optionnelle mais complémentaire à la colonne type de champ (<a href='http://www.grocerycrud.com/documentation/options_functions/field_type' target='_blank'>voir Grocery CRUD</a>).<br />Lorsque vous cochez required, il s'ajoute automatiquement au champ rules. Inutile de l'insérer !<br />Lorsque vous cochez unique, il s'ajoute automatiquement au champ rules. Inutile de l'insérer !<br />Lorsque vous choisissez le type de champ upload, vous devez remplir le champ valeur type de champ avec le chemin de l'upload (<a href='http://www.grocerycrud.com/documentation/options_functions/set_field_upload' target='_blank'>voir Grocery CRUD</a>)";
$lang['generate_controller_gc_fields'] = "Liste des champs";
$lang['generate_controller_gc_error_file_model'] = "Erreur lors de la création du fichier model";
$lang['generate_controller_gc_error_file_lang'] = "Erreur lors de la création du fichier lang";
$lang['generate_controller_gc_error_file_controller'] = "Erreur lors de la création du fichier controller";
$lang['generate_controller_gc_subject'] = "Sujet";
$lang['generate_controller_gc_name_allow_files_types'] = "Types de fichiers permis";

$lang['generate_controller_gc_contents_controller'] = "<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Controller %s
 *
 *
 * Copyright (C) ".date('Y')." %s.
 *
 *
 * @package    	%s
 * @copyright  	Copyright (c) ".date('Y').", %s
 * @license 	GNU GENERAL PUBLIC LICENSE
 * @license 	http://www.gnu.org/licenses/gpl.txt GNU GENERAL PUBLIC LICENSE
 * @version    	1.0.0
 * @author 		%s <%s>
 */

class %s extends CI_Controller {
	protected \$table;
	protected \$theme='%s';
	protected \$name_class=\"%s\";
	protected \$array_columns;
	protected \$add_fields;
	protected \$edit_fields;
	protected \$required_fields;
	protected \$title=\"\";
 	protected \$view = '%s';

	function __construct()
	{
		 parent::__construct();
 		 %s\$this->load->helper('url');
 		 %s\$this->load->database();
		 %s\$this->load->library('grocery_CRUD');
		 %s\$this->load->config('grocery_crud');
 		 \$this->language = \$this->config->item('language');
		 \$this->grocery_crud->set_language(\$this->language);
		 \$this->table = %s;
		 \$this->lang->load(\$this->name_class,\$this->language);
		 \$this->title = \$this->lang->line('%s');

		 \$this->load->model('%s');

		 \$this->array_columns = array(%s);
		 \$this->add_fields = array(%s);
		 \$this->edit_fields = array(%s);
		 \$this->required_fields = array(%s);
		 \$this->unique_fields = array(%s);
		 \$this->unset_texteditor = array(%s);
		 %s
    
	}

	public function index()
	{
		 \$this->list_crud();
	}
 	
 	public function list_crud()
	{

 		// column
		\$this->grocery_crud->set_theme(\$this->theme)
							 ->set_table(\$this->table)
							 ->set_subject(\$this->title)
							 ->columns(\$this->array_columns)
							  // DISPLAY AS
							 %s
 							 // FIELDS
		 					 ->add_fields(\$this->add_fields)
		 					 // EDIT FIELDS
		 					 ->edit_fields(\$this->edit_fields)
		 					 // REQUIRED FIELDS
		 					 ->required_fields(\$this->required_fields)
 							 // UNIQUE FIELDS
 							 ->unique_fields(\$this->unique_fields)
 							 // UNSET TEXTEDITOR
 							 ->unset_texteditor(\$this->unset_texteditor)
		 					 // CHANGE FIELD TYPE
		 					 %s
 		    				 // SET RULES
							 %s
							 // SET RELATION
							 %s
							 // SET RELATION N N
							 %s
							 // CALLBACK ADD FIELD
							 // CALLBACK EDIT FIELD
							 // ADD ACTIONS
							 // ADD
							 %s->unset_add()
							 // MODIFY
							 %s->unset_edit()
							 // DELETE
							 %s->unset_delete()
							 // READ
							 %s->unset_read()
 							 // LIST
 							 %s->unset_list()
							 // UNSET JQUERY
 							 %s->unset_jquery()
							 // UNSET JQUERY UI
 							 %s->unset_jquery_ui()
							 // UNSET EXPORT
 							 %s->unset_export()
							 // UNSET PRINT
 							 %s->unset_print()
 							 // SET PRIMARY KEY
 							 %s
 							 // WHERE
 							 %s
 							 // OR WHERE
 							 %s
 							 // LIKE
 							 %s
 							 // OR LIKE
 							 %s
 							 // LIMIT
 							 %s
 							 // ORDER BY
 							 %s
							 ;

		 \$output = \$this->grocery_crud->render();
		 \$this->load->view(\$this->view,\$output);
	}

}

/* End of file %s.php */
/* Location: ./application/controllers/%s.php */
?>";

$lang['generate_controller_gc_contents_lang'] = '<?php

/**
 * Language for %s
 *
 * Copyright (C) '.date('Y').' %s.
 *
 *
 * @package    	%s
 * @copyright  	Copyright (c) '.date('Y').', %s
 * @license
 * @version    	1.0
 * @author 		%s <%s>
 *
 *
 */


%s

/* End of file %s_lang.php */
/* Location: ./system/language/french/%s_lang.php */';
/* End of file generate_controller_gc_lang.php */
/* Location: ./system/language/french/generate_controller_gc_lang.php */