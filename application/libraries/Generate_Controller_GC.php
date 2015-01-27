<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Library Generate Controller GC for CodeIgniter 2.x
 *
 * A Codeigniter library for generate a complete controller Grocery CRUD.
 * 
 * Cette librairie permet de générer des controllers Grocery CRUD très rapidement et très simplement
 * Très utile pour la génération de CRUD basique (exemple administration des données d'une liste déroulante) mais également de CRUD complexe
 * Un CRUD complexe étant au début un CRUD basique
 * Cela permet générer un nouvel l'espace de travail pour le développeur sans se poser de question sur ce qu'on a généré
 * 
 * Tout se génère automatiquement :
	•	Fichier de langage
	•	Controller
	•	Model
	•	Table en base de données
 * 
 * 
 * Gain de temps, standardisation des fichiers CRUD d'un controller à un autre
 *
 * Copyright (C) 2015 Gaëtan Cottrez.
 *
 *
 * @package    	Generate Controller GC
 * @copyright  	Copyright (c) 2015, Gaëtan Cottrez
 * @license 	GNU GENERAL PUBLIC LICENSE
 * @license 	http://www.gnu.org/licenses/gpl.txt GNU GENERAL PUBLIC LICENSE
 * @version    	1.0.0
 * @author 		Gaëtan Cottrez <gaetan.cottrez@laviedunwebdeveloper.com>
 */


class Generate_Controller_GC {

    public $ci;
    private $config_vars;
    public $errors = array();
    public $infos = array();
    public $file_language = 'generate_controller_gc';
    public $generate_controller_gc_model;
    private $treatment_form_url='';
	private $session;
	private $success_url;
	private $validation_url;
	private $add_line_url;
	private $option_field_on_table_url;
    public function __construct() {
		$this->ci = &get_instance();
		$this->ci->config->load('generate_controller_gc');
    	$this->config_vars = & $this->ci->config->item('generate_controller_gc');
        
        $this->ci->load->model('generate_controller_gc_model');
    	$this->generate_controller_gc_model = new generate_controller_gc_model();

        $this->ci->lang->load($this->file_language);
		// load ressources
		$this->ci->load->helper('html');
		$this->ci->load->helper('url');
		$this->ci->load->helper('form');
		$this->ci->load->helper('url');
		$this->ci->load->helper('generate_controller_gc');
		$this->ci->load->database();
		$this->ci->load->library('form_validation');
		
    }
    
	public function set_option_field_on_table($option_field_on_table){
    	$this->option_field_on_table_url = $option_field_on_table;
    }
    
	public function set_add_line_url($add_line_url){
    	$this->add_line_url = $add_line_url;
    }
    
	public function set_treatment_form_url($form_url){
    	$this->treatment_form_url = $form_url;
    }
    
	public function set_validation_url($validation_url){
    	$this->validation_url = $validation_url;
    }
    
	public function set_success_url($success_url){
    	$this->success_url = $success_url;
    }
    
    private function set_line_form($label,$field,$required='*'){
    	return '<div class="form-display-as-box" style="width:300px;">'.$label.' '.$required.' :</div>
			<div class="form-input-box">'.$field.'</div><div class="clear"></div><br />';
    }
    
    public function get_option_field_on_table($table){
    	$query = $this->generate_controller_gc_model->get_field_on_table($table);
    	$options = array();
    	$options .= "<option></option>";
    	$field = 'Field';
    	foreach ($query->result() as $row)
    	{
    		$options .= '<option value="'.$row->{$field}.'">'.$row->{$field}.'</option>';
    	}
    	
    	echo $options;
    }
    
	public function set_line_field_form($num=1){
		if($this->ci->input->post('index') != false) $num = $this->ci->input->post('index');
		$query = $this->generate_controller_gc_model->show_tables();
		$options_relation = array();
		$options_relation[''] = "";
		$field = 'Tables_in_'.$this->ci->db->database;
		foreach ($query->result() as $row)
		{
			$options_relation[$row->{$field}] = $row->{$field};
		}
    	return '<tr>
    				<td>
    				'.form_input(array( 'name' => 'fields['.$num.'][name_field_table]', 'value'=> '', 'size' => '30')).'
    				'.form_hidden('index',$num).'
    				</td>
    				<td>
    					<select name="fields['.$num.'][type_field_table]">
    						<optgroup label="'.$this->ci->lang->line('generate_controller_gc_title_option_date_number').'">
    							<option value="tinyint">tinyint</option>
    							<option value="smallint">smallint</option>
    							<option value="mediumint">mediumint</option>
    							<option value="int">int</option>
    							<option value="bigint">bigint</option>
    							<option value="decimal">decimal</option>
    							<option value="float">float</option>
    							<option value="double">double</option>
    						</optgroup>
    						<optgroup label="'.$this->ci->lang->line('generate_controller_gc_title_option_date_hour').'">
    							<option value="date">date</option>
    							<option value="datetime">datetime</option>
    							<option value="timestamp">timestamp</option>
    							<option value="time">time</option>
    							<option value="year">year</option>
    						</optgroup>
    							<optgroup label="'.$this->ci->lang->line('generate_controller_gc_title_option_char').'">
    							<option value="char">char</option>
    							<option value="varchar">varchar</option>
    							<option value="tinytext">tinytext</option>
    							<option selected="" value="text">text</option>
    							<option value="mediumtext">mediumtext</option>
    							<option value="longtext">longtext</option>
    						</optgroup>
    						<optgroup label="'.$this->ci->lang->line('generate_controller_gc_title_option_list').'">
    							<option value="enum">enum</option>
    							<option value="set">set</option>
    						</optgroup>
    						<optgroup label="'.$this->ci->lang->line('generate_controller_gc_title_option_binary').'">
    							<option value="bit">bit</option>
    							<option value="binary">binary</option>
    							<option value="varbinary">varbinary</option>
    							<option value="tinyblob">tinyblob</option>
    							<option value="blob">blob</option>
    							<option value="mediumblob">mediumblob</option>
    							<option value="mediumblob">longblob</option>
    						</optgroup>
    					</select>
    				</td>
    				<td>'.form_input(array( 'name' => 'fields['.$num.'][lenght_field_table]', 'value'=> '', 'size' => '30')).'</td>
    				<td>'.form_input(array( 'name' => 'fields['.$num.'][appellation_field_gc]', 'value'=> '', 'size' => '30')).'</td>
    				<td>
    					<select name="fields['.$num.'][type_field_gc]">
    						<option value="">'.$this->ci->lang->line('generate_controller_gc_title_identical_table').'</option>
    						<option value="hidden">hidden</option>
							<option value="invisible">invisible</option>
							<option value="password">password</option>
							<option value="enum">enum</option>
							<option value="set">set</option>
							<option value="dropdown">dropdown</option>
							<option value="multiselect">multiselect</option>
							<option value="integer">integer</option>
							<option value="true_false">true_false</option>
							<option value="string">string</option>
							<option value="text">text</option>
							<option value="date">date</option>
							<option value="datetime">datetime</option>
							<option value="readonly">readonly</option>
    						<option value="upload">upload</option>
    					</select>
    				</td>
    				<td>'.form_input(array( 'name' => 'fields['.$num.'][value_type_field_gc]', 'value'=> '', 'size' => '30')).'</td>
    				<td style="text-align:center;">
    					'.form_checkbox(array('name' => 'fields['.$num.'][list_gc]', 'value' => 'true', 'checked' => TRUE)).'
    				</td>
    				<td style="text-align:center;">
    					'.form_checkbox(array('name' => 'fields['.$num.'][create_gc]', 'value' => 'true', 'checked' => TRUE)).'
    				</td>
    				<td style="text-align:center;">
    					'.form_checkbox(array('name' => 'fields['.$num.'][modify_gc]', 'value' => 'true', 'checked' => TRUE)).'
    				</td>
    				<td style="text-align:center;">
    					'.form_checkbox(array('name' => 'fields['.$num.'][read_gc]', 'value' => 'true', 'checked' => TRUE)).'
    				</td>
    				<td style="text-align:center;">
    					'.form_checkbox(array('name' => 'fields['.$num.'][required_gc]', 'value' => 'true')).'
    				</td>
    				<td style="text-align:center;">
    					'.form_checkbox(array('name' => 'fields['.$num.'][texteditor_gc]', 'value' => 'true')).'
    				</td>
    				<td style="text-align:center;">
    					'.form_checkbox(array('name' => 'fields['.$num.'][unique_gc]', 'value' => 'true')).'
    				</td>
    				<td>'.form_input(array( 'name' => 'fields['.$num.'][rules_gc]', 'value'=> 'trim|xss_clean', 'size' => '30')).'</td>
    				<td style="text-align:center;">
    					'.form_checkbox(array('name' => 'fields['.$num.'][activate_relation_n_n_gc]', 'value' => 'true', 'id' => 'activate_relation_n_n_gc_'.$num.'', 'class' => 'activate_relation_n_n')).'
    				</td>
    				<td>
    					<span class="relation-display-'.$num.'" style="display:none;">'.$this->ci->lang->line('generate_controller_gc_relation_table').'<br /></span>
    					'.form_dropdown('fields['.$num.'][relations_gc]', $options_relation, array(), 'class="relation_n_n" id="relation_'.$num.'"').'
    					<span class="relation-display-'.$num.'" style="display:none;"><br />'.$this->ci->lang->line('generate_controller_gc_selection_table').'<br /></span>
    					'.form_dropdown('fields['.$num.'][selection_gc]', $options_relation, array(), 'id="selection_'.$num.'" class="selection_n_n relation-display-'.$num.'" style="display:none;"').'
    					<span class="relation-display-'.$num.'" style="display:none;"><br />'.$this->ci->lang->line('generate_controller_gc_primary_key_controller_table').'<br /></span>
    					'.form_dropdown('fields['.$num.'][primary_key_controller_gc]', array("" => ""), array(), 'id="primary_key_controller_'.$num.'" class="relation-display-'.$num.'" style="display:none;"').'
    					<span class="relation-display-'.$num.'" style="display:none;"><br />'.$this->ci->lang->line('generate_controller_gc_primary_key_selection_table').'<br /></span>
    					'.form_dropdown('fields['.$num.'][primary_key_selection_gc]', array("" => ""), array(), 'id="primary_key_selection_'.$num.'" class="relation-display-'.$num.'" style="display:none;"').'
    					<span class="relation-display-'.$num.'" style="display:none;"><br />'.$this->ci->lang->line('generate_controller_gc_title_field_selection').'<br /></span>
    					'.form_dropdown('fields['.$num.'][title_field_selection_gc]', array("" => ""), array(), 'id="title_field_selection_'.$num.'" class="relation-display-'.$num.'" style="display:none;"').'
    					<span class="relation-display-'.$num.'" style="display:none;"><br />'.$this->ci->lang->line('generate_controller_priority_field_relation').'<br /></span>
    					'.form_dropdown('fields['.$num.'][priority_field_relation_gc]', array("" => ""), array(), 'id="priority_field_relation_'.$num.'" class="relation-display-'.$num.'" style="display:none;"').'
    				</td>
    			</tr>';
    }
    
    private function set_h3($label){
    	return '<h3 class="fieldsetflexigrid ui-accordion-header ui-helper-reset form-title">
    	<div class="floatL form-title-left">'.$label.'</div></h3><br />';
    }
    
    public function treatment(){
    	$error = false;
    	$error_message ='';
    	$name_controller = $this->ci->input->post('name_controller');
    	$name_table = $this->ci->input->post('name_table');
    	$subject = $this->ci->input->post('subject');
    	$create = $this->ci->input->post('create');
    	$edit = $this->ci->input->post('edit');
    	$read = $this->ci->input->post('read');
    	$list = $this->ci->input->post('list');
    	$delete = $this->ci->input->post('delete');
    	$export = $this->ci->input->post('export');
    	$print = $this->ci->input->post('print');
    	$theme = $this->ci->input->post('theme');
    	$render_view = $this->ci->input->post('render_view');
    	$load_helper_url = $this->ci->input->post('load_helper_url');
    	
    	$where = $this->ci->input->post('where');
    	if($where != false){
    		$where_sprintf = '->where(array('.$where.'))';
    	}else{
    		$where_sprintf = '//->where(array())';
    	}
    	$like = $this->ci->input->post('like');
   		if($like != false){
    		$like_sprintf = '->like(array('.$like.'))';
    	}else{
    		$like_sprintf = '//->like(array())';
    	}
    	$or_where = $this->ci->input->post('or_where');
   	 	if($or_where != false){
    		$or_where_sprintf = '->or_where(array('.$or_where.'))';
    	}else{
    		$or_where_sprintf = '//->or_where(array())';
    	}
    	$or_like = $this->ci->input->post('or_like');
    	if($or_like != false){
    		$or_like_sprintf = '->or_like(array('.$or_like.'))';
    	}else{
    		$or_like_sprintf = '//->or_like(array())';
    	}
    	$primary_key = $this->ci->input->post('primary_key');
    	if($primary_key != false){
    		$primary_key_sprintf = '->set_primary_key('.$primary_key.')';
    	}else{
    		$primary_key_sprintf = '//->set_primary_key()';
    	}
    	 
    	$limit = $this->ci->input->post('limit');
    	if($limit != false){
    		$limit_sprintf = '->limit('.$limit.')';
    	}else{
    		$limit_sprintf = '//->limit()';
    	}
    	
    	$order_by = $this->ci->input->post('order_by');
    	if($order_by != false){
    		$order_by_sprintf = '->order_by('.$order_by.')';
    	}else{
    		$order_by_sprintf = '//->order_by()';
    	}
    	
    	if($load_helper_url ==false) $load_helper_url = '//'; else $load_helper_url = '';
    	$load_jquery = $this->ci->input->post('load_jquery');
    	if($load_jquery ==false) $load_jquery = '//'; else $load_jquery = '';
    	$load_jquery_ui = $this->ci->input->post('load_jquery_ui');
    	if($load_jquery_ui ==false) $load_jquery_ui = '//'; else $load_jquery_ui = '';
    	$load_export = $this->ci->input->post('load_export');
    	if($load_export ==false) $load_export = ''; else $load_export = '//';
    	$load_print = $this->ci->input->post('load_print');
    	if($load_print ==false) $load_print = ''; else $load_print = '//';
    	$load_db = $this->ci->input->post('load_db');
    	if($load_db ==false) $load_db = '//'; else $load_db = '';
    	$load_gc = $this->ci->input->post('load_gc');
    	if($load_gc ==false) $load_gc = '//'; else $load_gc = '';
    	$load_config_gc = $this->ci->input->post('load_config_gc');
    	if($load_config_gc ==false) $load_config_gc = '//'; else $load_config_gc = '';
    	if($create ==false) $create = ''; else $create = '//';
    	if($edit ==false) $edit = ''; else $edit = '//';
    	if($read ==false) $read = ''; else $read = '//';
    	if($delete ==false) $delete = ''; else $delete = '//';
    	if($list ==false) $list = ''; else $list = '//';
    	$grocery_crud_file_upload_allow_file_types = $this->ci->input->post('grocery_crud_file_upload_allow_file_types');
    	if($grocery_crud_file_upload_allow_file_types != ''){
    		$grocery_crud_file_upload_allow_file_types = "\$this->config->set_item('grocery_crud_file_upload_allow_file_types','".$grocery_crud_file_upload_allow_file_types."');";
    	}else{
    		$grocery_crud_file_upload_allow_file_types = '';
    	}
    	
    	$subject_lang = $name_table.'_title';
    	$contents_page_lang = '$lang[\''.$subject_lang.'\'] ="'.$subject.'";
';
    	/*$string_create_table = "
    		CREATE TABLE `".$this->ci->db->dbprefix.$name_table."` (
			  `id` smallint(6) NOT NULL AUTO_INCREMENT,
    	";*/
    	$string_create_table = "
    		CREATE TABLE `".$name_table."` (
			  `id` smallint(6) NOT NULL AUTO_INCREMENT,
    	";
    	$string_key_table ="";
    	$string_display_as = "";
    	$string_language = '';
    	$array_columns = "";
    	$array_unset_texteditor = "";
    	$add_fields = "";
    	$edit_fields = "";
    	$required_fields = "";
    	$unique_fields = "";
    	$set_rules = "";
    	$set_relation = "";
    	$set_relation_n_n = "";
    	$string_change_field_type = "";
    	$nb_filter = 0;
    	foreach($this->ci->input->post('fields') as $row){
    		$string_key_table_tmp ="";
    		$string_create_table_tmp = "";
    		if($row['name_field_table'] != "" && $row['appellation_field_gc'] != ""){
    			switch($row['type_field_table']){
    				case 'tinyint':
						if($row['lenght_field_table'] == "") $row['lenght_field_table'] = "2";
						$string_create_table_tmp = "`".$row['name_field_table']."` ".$row['type_field_table']."(".$row['lenght_field_table'].") NOT NULL DEFAULT '0',
								";
					break;
					
					case 'smallint':
						if($row['lenght_field_table'] == "") $row['lenght_field_table'] = "2";
						$string_create_table_tmp = "`".$row['name_field_table']."` ".$row['type_field_table']."(".$row['lenght_field_table'].") DEFAULT NULL,
								";
						$string_key_table_tmp =", KEY `fk_".$name_table."_".$row['name_field_table']."` (`".$row['name_field_table']."`)
								";
					break;
					case 'mediumint':
					case 'int':
					case 'bigint':
					case 'char':
					case 'varchar':
					case 'enum':
					case 'set':
					case 'bit':
					case 'binary':
					case 'varbinary':
						if($row['lenght_field_table'] == "") $row['lenght_field_table'] = "2";
						$string_create_table_tmp = "`".$row['name_field_table']."` ".$row['type_field_table']."(".$row['lenght_field_table'].") DEFAULT NULL,
								";
					break;
					
					case 'decimal':
					case 'float':
					case 'double':
						if($row['lenght_field_table'] == "") $row['lenght_field_table'] = "10,2";
						$string_create_table_tmp = "`".$row['name_field_table']."` ".$row['type_field_table']."(".$row['lenght_field_table'].") DEFAULT NULL,
								";
					break;
					
					case 'text':
						$string_create_table_tmp = "`".$row['name_field_table']."` ".$row['type_field_table']." DEFAULT NULL,
								";
					break;
					
					default:
						$string_create_table_tmp = "`".$row['name_field_table']."` ".$row['type_field_table']." NULL DEFAULT NULL,
								";
    			}
    			
    			$string_display_as .= "->display_as('".$row['name_field_table']."',\$this->lang->line('".$name_table."_".$row['name_field_table']."'))
							 ";
    			if($row['type_field_gc'] != ""){
    				if($row['value_type_field_gc'] != ""){
						switch($row['type_field_gc']){
							case 'hidden':
							case 'enum':
							case 'set':
							case 'dropdown':
							case 'multiselect':
								$type_field_gc = ', '.$row['value_type_field_gc'];
								$string_change_field_type .= "->field_type('".$row['name_field_table']."', '".$row['type_field_gc']."'".$type_field_gc.")
";
							break;
							
							case 'upload':
								$type_field_gc = '';
								$upload .="->set_field_upload('".$row['name_field_table']."','".$row['value_type_field_gc']."')
";
							default:
								$type_field_gc = '';
								$string_change_field_type .= "->field_type('".$row['name_field_table']."', '".$row['type_field_gc']."'".$type_field_gc.")
";
						}
					}else{
	    			$string_change_field_type .= "->field_type('".$row['name_field_table']."', '".$row['type_field_gc']."')
";
					}
    			}
    			
    			if($row['type_field_gc'] == 'text' || ($row['type_field_gc'] == '' && $row['type_field_table'] == 'text')){
    				if(!isset($row['texteditor_gc'])) $array_unset_texteditor .= "'".$row['name_field_table']."', ";
    			}
    			$string_language .= '$lang[\''.$name_table.'_'.$row['name_field_table'].'\'] = "'.$row['appellation_field_gc'].'";
';
    			
    			if(isset($row['list_gc'])) $array_columns .= "'".$row['name_field_table']."', ";
    			if(isset($row['create_gc'])) $add_fields .= "'".$row['name_field_table']."', ";
    			if(isset($row['modify_gc'])) $edit_fields .= "'".$row['name_field_table']."', ";
    			if(isset($row['required_gc'])){ 
					$required_fields .= "'".$row['name_field_table']."', ";
					$required_rules ='|required';
				}else{
					$required_rules = '';
				}
				
    			if(isset($row['unique_gc'])){ 
					$unique_fields .= "'".$row['name_field_table']."', ";
					/*$unique_rules ='|is_unique[\'.$this->db->dbprefix.\'.'.$name_table.'.'.$row['name_field_table'].']';*/
					$unique_rules ='|is_unique[\'.$this->table.\'.'.$row['name_field_table'].']';
				}else{
					$unique_rules = '';
				}
				
    			
    			if($row['rules_gc'] != ""){
					$row['rules_gc'] = str_replace('|required','',$row['rules_gc']);
    				$row['rules_gc'] = str_replace('required|','',$row['rules_gc']);
					$row['rules_gc'] = str_replace('required','',$row['rules_gc']);
					$row['rules_gc'] = $row['rules_gc'].$required_rules.$unique_rules;
    				$set_rules .= "->set_rules('".$row['name_field_table']."', \$this->lang->line('".$name_table."_".$row['name_field_table']."'), '".$row['rules_gc']."')
    						 ";
    			}
    			
    			if(isset($row['activate_relation_n_n_gc']) && $row['title_field_selection_gc'] != "" && $row['relations_gc'] != "" && $row['selection_gc'] != "" && $row['primary_key_controller_gc'] != "" && $row['primary_key_selection_gc'] != ""){
    				if($row['priority_field_relation_gc'] != "") $row['priority_field_relation_gc'] = ", '".$row['priority_field_relation_gc']."'";
    				$set_relation_n_n .= "->set_relation_n_n('".$row['name_field_table']."', '".$row['relations_gc']."', '".$row['selection_gc']."', '".$row['primary_key_controller_gc']."', '".$row['primary_key_selection_gc']."', '".$row['title_field_selection_gc']."'".$row['priority_field_relation_gc'].")
    						 ";
    				
    			} else if($row['relations_gc'] != ""){
    				$set_relation .= "->set_relation('".$row['name_field_table']."', '".$row['relations_gc']."', 'name')
    						 ";
    				$string_create_table .= $string_create_table_tmp;
    				$string_key_table .= $string_key_table_tmp;
    			}else{
    				$string_create_table .= $string_create_table_tmp;
    				$string_key_table .= $string_key_table_tmp;
    			}

    		}
    	}
    	
    	$add_fields = substr($add_fields,0,-2);
    	$edit_fields = substr($edit_fields,0,-2);
    	$array_columns = substr($array_columns,0,-2);
    	$required_fields = substr($required_fields,0,-2);
    	$unique_fields = substr($unique_fields,0,-2);
    	$array_unset_texteditor = substr($array_unset_texteditor,0,-2);
    	 
    	$string_create_table .="
		  PRIMARY KEY (`id`)
    	";
    	$string_create_table .= $string_key_table."
		) ENGINE=InnoDB DEFAULT CHARSET=".$this->ci->db->char_set.";
    	";
    	// Création de la table en base de données
    	$query = $this->generate_controller_gc_model->create_table($string_create_table);
    	
    	// Création du fichier model
    	if(!$error){
	    	if(!fopen('./'.APPPATH.'/models/'.strtolower($name_controller).'_model.php', 'a')){
	    		$error_message = $this->ci->lang->line('generate_controller_gc_error_file_model');
	    		$error = true;
	    	}else{
	    		$file_model = fopen('./'.APPPATH.'/models/'.strtolower($name_controller).'_model.php', 'r+');
	    		fseek($file_model, 0); // On remet le curseur au début du fichier
	    		fputs($file_model, sprintf(
	    		$this->ci->lang->line('generate_controller_gc_contents_model'), 
	    		str_replace('_','',$name_controller.' Model'), 
	    		$this->config_vars['created_by'], 
	    		str_replace('_','',$name_controller), 
	    		$this->config_vars['created_by'], 
	    		$this->config_vars['created_by'], 
	    		$this->config_vars['email_by'], 
	    		$name_controller.'_model', 
	    		strtolower($name_controller.'_model'), 
	    		strtolower($name_controller.'_model')
    			));
	    		fclose($file_model);
	    	}
    	}
    	
    	// Création du fichier controller
    	if(!$error){
	    	if(!fopen('./'.APPPATH.'/controllers/'.strtolower($name_controller).'.php', 'a')){
	    		$error_message = $this->ci->lang->line('generate_controller_gc_error_file_controller');
	    		$error = true;
	    	}else{
	    		/*if($this->ci->db->dbprefix != "")
	    			$sprintf_table = "\$this->db->dbprefix.'".$name_table."'";
	    		else */
	    			$sprintf_table = "'".$name_table."'";
	    		
	    		$file_controller = fopen('./'.APPPATH.'/controllers/'.strtolower($name_controller).'.php', 'r+');
	    		fseek($file_controller, 0); // On remet le curseur au début du fichier
	    		fputs($file_controller, sprintf(
		    		$this->ci->lang->line('generate_controller_gc_contents_controller'), 
		    		str_replace('_','',$name_controller), 
		    		$this->config_vars['created_by'], 
		    		str_replace('_','',$name_controller), 
		    		$this->config_vars['created_by'], 
		    		$this->config_vars['created_by'], 
		    		$this->config_vars['email_by'], 
		    		$name_controller,
		    		$theme,
		    		strtolower($name_controller), 
		    		$render_view,
		    		$load_helper_url,
		    		$load_db,
		    		$load_gc,
		    		$load_config_gc,
	    			$sprintf_table,
	    			$subject_lang, 
	    			$name_controller.'_model',
	    			$array_columns,
	    			$add_fields,
	    			$edit_fields,
	    			$required_fields,
	    			$unique_fields,
	    			$array_unset_texteditor,
	    			$grocery_crud_file_upload_allow_file_types, 
	    			$string_display_as,
	    			$string_change_field_type,
	    			$set_rules,
	    			$set_relation,
	    			$set_relation_n_n,
	    			$create,
					$edit,
					$delete,
					$read,
					$list,
					$load_jquery,
					$load_jquery_ui,
					$export,
					$print,
					$primary_key_sprintf,
					$where_sprintf,
					$or_where_sprintf,
					$like_sprintf,
					$or_like_sprintf,
					$limit_sprintf,
					$order_by_sprintf,
					strtolower($name_controller), 
	    			strtolower($name_controller)
        		));
	    		fclose($file_controller);
	    	}
    	}
    	
    	// Création du fichier language
    	if(!$error){
    		if(!fopen('./'.APPPATH.'/language/'.$this->ci->config->item('language').'/'.strtolower($name_controller).'_lang.php', 'a')){
    			$error_message = $this->ci->lang->line('generate_controller_gc_error_file_lang');
    			$error = true;
    		}else{
    			$file_lang = fopen('./'.APPPATH.'/language/'.$this->ci->config->item('language').'/'.strtolower($name_controller).'_lang.php', 'r+');
    			fseek($file_lang, 0); // On remet le curseur au début du fichier
    			fputs($file_lang, sprintf($this->ci->lang->line('generate_controller_gc_contents_lang'), str_replace('_','',$name_controller), $this->config_vars['created_by'], str_replace('_','',$name_controller), $this->config_vars['created_by'], $this->config_vars['created_by'], $this->config_vars['email_by'], $contents_page_lang.$string_language, strtolower($name_controller), strtolower($name_controller)));
    			fclose($file_lang);
    		}
    	}
    	
    	if ($error)
    	{
    		//$this->db->trans_rollback();
    		echo "<textarea>".json_encode(array(
    				'success' => false ,
    				'error_message' => $error_message
    		))."</textarea>";
    		die();
    	}else{
    		echo "<textarea>".json_encode(array(
    				'success' => true ,
    				'success_message' => $this->ci->lang->line('generate_controller_gc_insert_success'),
    				'success_list_url'=> site_url($this->success_url)
    		))."</textarea>";
    		die();
    	}
    }
    
    public function render($data,$view='generate_controller_gc/form'){
    	$this->ci->load->view($view, $data);
    }
    
    public function validation(){
    	$this->ci->form_validation->set_rules('name_controller', $this->ci->lang->line('generate_controller_gc_name_controller'), 'trim|required|xss_clean');
    	$this->ci->form_validation->set_rules('name_table', $this->ci->lang->line('generate_controller_gc_name_table'), 'trim|required|xss_clean|callback_check_table_exist');
    	$this->ci->form_validation->set_rules('subject', $this->ci->lang->line('generate_controller_gc_subject'), 'trim|required|xss_clean');
    	//$this->ci->form_validation->set_rules('primary_key', $this->ci->lang->line('generate_controller_gc_primary_key'), 'trim|required|xss_clean');
    	$this->ci->form_validation->set_rules('theme', $this->ci->lang->line('generate_controller_gc_theme'), 'trim|required|xss_clean');
    	$this->ci->form_validation->set_rules('render_view', $this->ci->lang->line('generate_controller_gc_render_view'), 'trim|required|xss_clean');
    	
    	if(!$this->ci->form_validation->run()) {
    		echo "<textarea>".json_encode(array(
    				'success' => false ,
    				'error_message' => validation_errors()
    		))."</textarea>";
    	}else{
    		echo json_encode(array('success' => true));
    	}
    }
    
    public function set_form(){
    	$form['title_page'] = $this->ci->lang->line('generate_controller_gc_title');
    	
    	$form['lang']['title_success'] = $this->ci->lang->line('generate_controller_gc_title_success');
    	$form['lang']['message_success'] = $this->ci->lang->line('generate_controller_gc_insert_success');
    	$form['lang']['cancel'] = $this->ci->lang->line('generate_controller_gc_cancel');
    	$form['lang']['add'] = $this->ci->lang->line('generate_controller_gc_add');
    	$form['lang']['loading'] = $this->ci->lang->line('generate_controller_gc_loading');
    	
    	
    	$form['validation_url'] = base_url($this->validation_url);
		$form['list_url'] = base_url('ask_holidays');
    	$form['message_alert_form'] = $this->ci->lang->line('generate_controller_gc_alert_form');
    	$form['message_insert_error'] = $this->ci->lang->line('generate_controller_gc_alert_form');
    	$form['success_list_url'] = site_url($this->success_url);
		$form['option_field_on_table_url'] = site_url($this->option_field_on_table_url);
		$form['form'] = form_open( $this->treatment_form_url, 'method="post" id="form" autocomplete="off" enctype="multipart/form-data"');
		/* Pré-requis */
		$form['form'] .= $this->set_h3($this->ci->lang->line('generate_controller_gc_prerequisites'));
		$form['form'] .= $this->set_line_form($this->ci->lang->line('generate_controller_gc_title_load_helper_url'),form_checkbox(array('name' => 'load_helper_url', 'value' => 'true', 'checked' => true)), '');
		$form['form'] .= $this->set_line_form($this->ci->lang->line('generate_controller_gc_title_load_db'),form_checkbox(array('name' => 'load_db', 'value' => 'true', 'checked' => true)), '');
		$form['form'] .= $this->set_line_form($this->ci->lang->line('generate_controller_gc_title_load_gc'),form_checkbox(array('name' => 'load_gc', 'value' => 'true', 'checked' => true)), '');
		$form['form'] .= $this->set_line_form($this->ci->lang->line('generate_controller_gc_title_load_config_gc'),form_checkbox(array('name' => 'load_config_gc', 'value' => 'true', 'checked' => true)), '');
		$form['form'] .= $this->set_line_form($this->ci->lang->line('generate_controller_gc_title_jquery'),form_checkbox(array('name' => 'load_jquery', 'value' => 'true')), '');
		$form['form'] .= $this->set_line_form($this->ci->lang->line('generate_controller_gc_title_jquery_ui'),form_checkbox(array('name' => 'load_jquery_ui', 'value' => 'true')), '');
		/* Identification */
		$form['form'] .= $this->set_h3($this->ci->lang->line('generate_controller_gc_identification'));
		$data = array(
				'name'        => 'theme',
				'id'          => 'theme',
				'value'       => $this->config_vars['default_theme'],
				'size'        => '30',
				'style'       => '',
				'placeholder' => '',
		);
		$form['form'] .= $this->set_line_form($this->ci->lang->line('generate_controller_gc_theme'),form_input($data));

    	$data = array(
				'name'        => 'render_view',
				'id'          => 'render_view',
				'value'       => $this->config_vars['render_view'],
				'size'        => '30',
				'style'       => '',
				'placeholder' => '',
		);
		$form['form'] .= $this->set_line_form($this->ci->lang->line('generate_controller_gc_render_view'),form_input($data));
		
    	$data = array(
				'name'        => 'subject',
				'id'          => 'subject',
				'value'       => '',
				'size'        => '30',
				'style'       => '',
				'placeholder' => 'List of users',
		);
		$form['form'] .= $this->set_line_form($this->ci->lang->line('generate_controller_gc_subject'),form_input($data));
		
		$data = array(
				'name'        => 'name_controller',
				'id'          => 'name_controller',
				'value'       => '',
				'size'        => '30',
				'style'       => '',
				'placeholder' => 'Users',
		);
		$form['form'] .= $this->set_line_form($this->ci->lang->line('generate_controller_gc_name_controller'),form_input($data));
		$data = array(
				'name'        => 'name_table',
				'id'          => 'name_table',
				'value'       => '',
				'size'        => '30',
				'style'       => '',
				'placeholder' => 'users',
		);
    	$form['form'] .= $this->set_line_form($this->ci->lang->line('generate_controller_gc_name_table'),form_input($data));
    	
    	$data = array(
    			'name'        => 'grocery_crud_file_upload_allow_file_types',
    			'id'          => 'grocery_crud_file_upload_allow_file_types',
    			'value'       => '',
    			'size'        => '30',
    			'style'       => '',
    			'placeholder' => 'gif|jpeg|jpg|png',
    	);
    	$form['form'] .= $this->set_line_form($this->ci->lang->line('generate_controller_gc_name_allow_files_types'),form_input($data),'');
    	 
    	
    	/* Actions */
		$form['form'] .= $this->set_h3($this->ci->lang->line('generate_controller_gc_actions'));
		$form['form'] .= $this->set_line_form($this->ci->lang->line('generate_controller_gc_title_list'),form_checkbox(array('name' => 'list', 'value' => 'true', 'checked' => true)), '');
    	$form['form'] .= $this->set_line_form($this->ci->lang->line('generate_controller_gc_title_create'),form_checkbox(array('name' => 'create', 'value' => 'true', 'checked' => true)), '');
    	$form['form'] .= $this->set_line_form($this->ci->lang->line('generate_controller_gc_title_edit'),form_checkbox(array('name' => 'edit', 'value' => 'true', 'checked' => true)), '');
    	$form['form'] .= $this->set_line_form($this->ci->lang->line('generate_controller_gc_title_read'),form_checkbox(array('name' => 'read', 'value' => 'true', 'checked' => true)), '');
    	$form['form'] .= $this->set_line_form($this->ci->lang->line('generate_controller_gc_title_delete'),form_checkbox(array('name' => 'delete', 'value' => 'true', 'checked' => true)), '');
    	$form['form'] .= $this->set_line_form($this->ci->lang->line('generate_controller_gc_title_export'),form_checkbox(array('name' => 'load_export', 'value' => 'true', 'checked' => true)), '');
    	$form['form'] .= $this->set_line_form($this->ci->lang->line('generate_controller_gc_title_print'),form_checkbox(array('name' => 'load_print', 'value' => 'true', 'checked' => true)), '');
    	$form['form'] .= $this->set_h3($this->ci->lang->line('generate_controller_gc_fields'));
		$form['form'] .= '<p>'.$this->ci->lang->line('generate_controller_gc_informations_table').'</p>
						 <div class="CSSTableGenerator" >
						 <table id="table_lines">
							<tr><td colspan="3">'.$this->ci->lang->line('generate_controller_gc_title_database').'</td><td colspan="13">'.$this->ci->lang->line('generate_controller_gc_title_gc').'</td></tr>
							<tr>
								<td>'.$this->ci->lang->line('generate_controller_gc_title_name_field').'</td>
								<td>'.$this->ci->lang->line('generate_controller_gc_title_type_field').'</td>
								<td>'.$this->ci->lang->line('generate_controller_gc_title_lenght_field').'</td>
								<td>'.$this->ci->lang->line('generate_controller_gc_title_naming_field').'</td>
								<td>'.$this->ci->lang->line('generate_controller_gc_title_type_field').'</td>
								<td>'.$this->ci->lang->line('generate_controller_gc_title_value_type_field').'</td>
								<td>'.$this->ci->lang->line('generate_controller_gc_title_list').'</td>
								<td>'.$this->ci->lang->line('generate_controller_gc_title_create').'</td>
								<td>'.$this->ci->lang->line('generate_controller_gc_title_edit').'</td>
								<td>'.$this->ci->lang->line('generate_controller_gc_title_read').'</td>
								<td>'.$this->ci->lang->line('generate_controller_gc_title_required').'</td>
								<td>'.$this->ci->lang->line('generate_controller_gc_title_texteditor').'</td>
								<td>'.$this->ci->lang->line('generate_controller_gc_title_unique').'</td>
								<td>'.$this->ci->lang->line('generate_controller_gc_title_rules').'</td>
								<td>'.$this->ci->lang->line('generate_controller_gc_title_activate_relation_n_n').'</td>
								<td>'.$this->ci->lang->line('generate_controller_gc_title_relation_with').'</td>
							</tr>
		';
		$form['form'] .= $this->set_line_field_form();
		$form['form'] .= '</table></div>';
		$form['form'] .= '<br /><p>'.form_button(array('type' => 'button', 'id' => 'add', 'content' => $this->ci->lang->line('generate_controller_gc_add_line'), 'onclick' => "var new_index = get_new_index(); $.ajax({ url: '".$this->add_line_url."', type: 'POST', data: {index : new_index}, dataType: 'html', success: function(html){\$('#table_lines tr:last').after(html);}});")).'</p>';
		$form['form'] .= $this->set_h3($this->ci->lang->line('generate_controller_gc_contrainst'));
		$data = array(
				'name'        => 'where',
				'id'          => 'where',
				'value'       => '',
				'size'        => '30',
				'style'       => '',
				'placeholder' => "'field' => 'value'",
		);
		$form['form'] .= $this->set_line_form($this->ci->lang->line('generate_controller_gc_where'),form_input($data),'');
		
		$data = array(
				'name'        => 'like',
				'id'          => 'like',
				'value'       => '',
				'size'        => '30',
				'style'       => '',
				'placeholder' => "'field' => 'value'",
		);
		$form['form'] .= $this->set_line_form($this->ci->lang->line('generate_controller_gc_like'),form_input($data),'');
		
		$data = array(
				'name'        => 'or_where',
				'id'          => 'or_where',
				'value'       => '',
				'size'        => '30',
				'style'       => '',
				'placeholder' => "'field' => 'value'",
		);
		$form['form'] .= $this->set_line_form($this->ci->lang->line('generate_controller_gc_or_where'),form_input($data),'');
		
		$data = array(
				'name'        => 'or_like',
				'id'          => 'or_like',
				'value'       => '',
				'size'        => '30',
				'style'       => '',
				'placeholder' => "'field' => 'value'",
		);
		$form['form'] .= $this->set_line_form($this->ci->lang->line('generate_controller_gc_or_like'),form_input($data),'');
		
		$data = array(
				'name'        => 'limit',
				'id'          => 'limit',
				'value'       => '',
				'size'        => '30',
				'style'       => '',
				'placeholder' => "100",
		);
		$form['form'] .= $this->set_line_form($this->ci->lang->line('generate_controller_gc_limit'),form_input($data),'');
		
		$data = array(
				'name'        => 'order_by',
				'id'          => 'order_by',
				'value'       => '',
				'size'        => '30',
				'style'       => '',
				'placeholder' => "'field', 'asc/desc'",
		);
		$form['form'] .= $this->set_line_form($this->ci->lang->line('generate_controller_gc_order_by'),form_input($data),'');
		
		$data = array(
				'name'        => 'primary_key',
				'id'          => 'primary_key',
				'value'       => '',
				'size'        => '30',
				'style'       => '',
		);
		$form['form'] .= $this->set_line_form($this->ci->lang->line('generate_controller_gc_primary_key'),form_input($data),'');
		
		$form['form'] .= form_close();
    	
    	$this->render($form);
    }

}

?>