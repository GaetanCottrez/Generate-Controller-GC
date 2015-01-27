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


$lang['generate_controller_gc_prerequisites'] ="Prerequisites";
$lang['generate_controller_gc_identification'] ="Identification";
$lang['generate_controller_gc_title'] ="Generating a new controller Grocery CRUD";
$lang['generate_controller_gc_title_success'] ="The new generation controller generated successfully";
$lang['generate_controller_gc_insert_error'] = "An error occured when the new controller generation";
$lang['generate_controller_gc_insert_success'] = "The new controller has been successfully created";
$lang['generate_controller_gc_cancel'] = "Cancel";
$lang['generate_controller_gc_add'] = "Register";
$lang['generate_controller_gc_loading'] = "Waiting, data processing ...";
$lang['generate_controller_gc_name_controller'] = "Name of the controller";
$lang['generate_controller_gc_name_table'] = "Name of the table";
$lang['generate_controller_gc_name_table_error'] = "The table already exists in the database";
$lang['generate_controller_gc_theme'] = "Theme";
$lang['generate_controller_gc_render_view'] = "View to launch the render";

$lang['generate_controller_gc_title_load_helper_url'] = "Manually load the url helper";
$lang['generate_controller_gc_title_jquery'] = "Disable JQuery";
$lang['generate_controller_gc_title_jquery_ui'] = "Disable JQuery UI";
$lang['generate_controller_gc_title_export'] = "Export";
$lang['generate_controller_gc_title_print'] = "Printing";
$lang['generate_controller_gc_title_texteditor'] = "CKEDITOR";
$lang['generate_controller_gc_add_line'] = "Add a line";

$lang['generate_controller_gc_title_load_db'] = "Manually load the database";
$lang['generate_controller_gc_title_load_gc'] = "Load library Grocery CRUD";
$lang['generate_controller_gc_title_load_config_gc'] = "Load config Grocery CRUD";
$lang['generate_controller_gc_title_database'] = "Database";
$lang['generate_controller_gc_title_gc'] = "Grocery CRUD";
$lang['generate_controller_gc_title_name_field'] = "Name of the field";
$lang['generate_controller_gc_title_type_field'] = "Type of the field";
$lang['generate_controller_gc_title_lenght_field'] = "Lenght";
$lang['generate_controller_gc_title_naming_field'] = "Name of the field";
$lang['generate_controller_gc_title_list'] = "List";
$lang['generate_controller_gc_title_create'] = "Creating";
$lang['generate_controller_gc_title_read'] = "Read";
$lang['generate_controller_gc_title_edit'] = "Modifying";
$lang['generate_controller_gc_title_delete'] = "Deleting";
$lang['generate_controller_gc_title_required'] = "Required";
$lang['generate_controller_gc_title_unique'] = "Unique";
$lang['generate_controller_gc_title_rules'] = "Rules";
$lang['generate_controller_gc_title_relation_with'] = "Relation with";
$lang['generate_controller_gc_title_identical_table'] = "identical of the table";
$lang['generate_controller_gc_title_option_binary'] = "Binary";
$lang['generate_controller_gc_title_option_list'] = "Lists";
$lang['generate_controller_gc_title_option_char'] = "String";
$lang['generate_controller_gc_title_option_date_hour'] = "Date and time";
$lang['generate_controller_gc_title_option_date_number'] = "Numbers";
$lang['generate_controller_gc_actions'] = "Actions";
$lang['generate_controller_gc_title_value_type_field'] = "Value type of the field";
$lang['generate_controller_gc_contrainst'] = "Constraints";
$lang['generate_controller_gc_where'] = "Where";
$lang['generate_controller_gc_like'] = "Like";
$lang['generate_controller_gc_or_where'] = "Or where";
$lang['generate_controller_gc_or_like'] = "Or like";
$lang['generate_controller_gc_primary_key'] = "Primary key";
$lang['generate_controller_gc_limit'] = "Limit";
$lang['generate_controller_gc_order_by'] = "Order by";
$lang['generate_controller_gc_relation_table'] = "relation table";
$lang['generate_controller_gc_selection_table'] = "selection table";
$lang['generate_controller_gc_primary_key_controller_table'] = "primary key table controller";
$lang['generate_controller_gc_primary_key_selection_table'] = "primary key selection table";
$lang['generate_controller_gc_title_activate_relation_n_n'] = "Relation n n";
$lang['generate_controller_gc_title_field_selection'] = "Display champ selection";
$lang['generate_controller_priority_field_relation'] = "Priority champ relation";

$lang['generate_controller_gc_error_mkdir'] = "Error creating folder";
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
$lang['generate_controller_gc_informations_table'] = "The table automatically contain an id field (primary key). Needless to generate !<br />
The value type of the field is an optional value, but complementary to the field type column (<a href='http://www.grocerycrud.com/documentation/options_functions/field_type' target='_blank'>see Grocery CRUD</a>).<br />
When you check required, it is automatically added to the field rules. Needless to insert !<br />
When you select one, it is automatically added to the field rules. Needless to insert !<br />
When you choose the type of upload control, you must fill the field type value field with the path to the upload (<a href='http://www.grocerycrud.com/documentation/options_functions/set_field_upload' target='_blank'>see Grocery CRUD</a>)";
$lang['generate_controller_gc_fields'] = "List of fields";
$lang['generate_controller_gc_error_file_model'] = "Error creating the model file";
$lang['generate_controller_gc_error_file_lang'] = "Error creating the lang file";
$lang['generate_controller_gc_error_file_controller'] = "Error creating the controller file";
$lang['generate_controller_gc_subject'] = "Subject";
$lang['generate_controller_gc_name_allow_files_types'] = "Permitted file types";

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
/* Location: ./system/language/english/generate_controller_gc_lang.php */