<?php
/*
 * Copyright (C) 2014 OpenSIPS Project
 *
 * This file is part of opensips-cp, a free Web Control Panel Application for 
 * OpenSIPS SIP server.
 *
 * opensips-cp is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * opensips-cp is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

###############################################################################
# Attention : advanced options !!

 //this is a very important parameter
 $module_id = "whitelist";
 $custom_config[$module_id] = array ();

 // a custom global name for the tool
 $custom_config[$module_id]['custom_name'] = "Whitelist";
 

//if you want submenu (horizontal) items add them here:

 $custom_config[$module_id]['submenu_items'] = array(
 					"0"	=> "Whitelist",
	 				"1"	=> "Global blacklist",
					"3"	=> "Exceptions",
	 				"4"	=> "Fraud profiles",
	 				"5"	=> "Fraud detection",
					"6"	=> "Fraud exceptions"
				);




/* config for each submenu item */

/*
Example table: table1
+---------------+------------------+------+-----+---------+----------------+
| Field         | Type             | Null | Key | Default | Extra          |
+---------------+------------------+------+-----+---------+----------------+
| id            | int(10) unsigned | NO   | PRI | NULL    | auto_increment | 
| name          | char(128)        | NO   | UNI |         |                | 
| address       | char(128)        | NO   |     |         |                | 
| age           | int(10) unsigned | NO   |     | 0       |                | 
| married       | int(10) unsigned | NO   |     | 0       |                | 
+---------------+------------------+------+-----+---------+----------------+

####################################################################################
#																				   #
# Uncomment bellow this line - follow the example and adapt it to your DB table    #
#																				   #
####################################################################################
*/

 $custom_config[$module_id][0]['custom_table'] = "whitelist";
 $custom_config[$module_id][0]['custom_table_primary_key'] = "id";
 $custom_config[$module_id][0]['custom_table_order_by'] = $custom_config[$module_id][0]['custom_table_primary_key'];
 $custom_config[$module_id][0]['per_page'] = 300;
 $custom_config[$module_id][0]['page_range'] = 30;


 $custom_config[$module_id][1]['custom_table'] = "globalblacklist";
 $custom_config[$module_id][1]['custom_table_primary_key'] = "id";
 $custom_config[$module_id][1]['custom_table_order_by'] = $custom_config[$module_id][1]['custom_table_primary_key'];
 $custom_config[$module_id][1]['per_page'] = 300;
 $custom_config[$module_id][1]['page_range'] = 30;

 $custom_config[$module_id][3]['custom_table'] = "exception_list";
 $custom_config[$module_id][3]['custom_table_primary_key'] = "id";
 $custom_config[$module_id][3]['custom_table_order_by'] = $custom_config[$module_id][3]['custom_table_primary_key'];
 $custom_config[$module_id][3]['per_page'] = 300;
 $custom_config[$module_id][3]['page_range'] = 30;

 $custom_config[$module_id][4]['custom_table'] = "fraud_profiles";
 $custom_config[$module_id][4]['custom_table_primary_key'] = "user";
 $custom_config[$module_id][4]['custom_table_order_by'] = $custom_config[$module_id][4]['custom_table_primary_key'];
 $custom_config[$module_id][4]['per_page'] = 300;
 $custom_config[$module_id][4]['page_range'] = 30;

 $custom_config[$module_id][5]['custom_table'] = "fraud_detection";
 $custom_config[$module_id][5]['custom_table_primary_key'] = "ruleid";
 $custom_config[$module_id][5]['custom_table_order_by'] = $custom_config[$module_id][5]['custom_table_primary_key'];
 $custom_config[$module_id][5]['per_page'] = 300;
 $custom_config[$module_id][5]['page_range'] = 30;

 $custom_config[$module_id][6]['custom_table'] = "fraud_exception";
 $custom_config[$module_id][6]['custom_table_primary_key'] = "id";
 $custom_config[$module_id][6]['custom_table_order_by'] = $custom_config[$module_id][6]['custom_table_primary_key'];
 $custom_config[$module_id][6]['per_page'] = 300;
 $custom_config[$module_id][6]['page_range'] = 30;
/*
 Columns definition:
	- header - the header title used to label this column (mandatory)
	- type - how to display/handle the data - text / combo / textarea (mandatory)
	- key - the key restrictions for this column (they will be checked prior to DB op) - PRI/UNI (optional)
	- tip - tip/explanation to be attached to this column in the add/edit forms (optional)
	- validation_regex - a regular expression to check the inserted value; only for text type (optional)
	- is_optional - if a value must be provided or not for the column (mandatory)

	- show_in_add_form - if to be shown in the add form (optional)
	- show_in_edit_form - if to be shown in the edit form (optional)
	- searchable - if to be listed as field in the search form (optional)
	- disabled - if the disabled attribute should be set to this column (optional)
	- readonly - if the readonly attribute should be set to this column (optional)
	- visible - if the column should be displayed in the table (optional)
	- value_wrapper_func - php function like func($key, $text, $link) to return 
		a custom string to be displayed instead of the real value; parameters are:
		- $key - the name of the column
		- $text - the value of the column
		- $link - an assoc array with all the values of the DB row( i.e $text = $link[$key] )
		This function can be use to build links or images around the values to be displayed (optional).

	- default_value - optional default value to pre-populate the column in the add form
	- default_display - a default display text corresponding to the default value if the type is COMBO
	- combo_default_values - assoc array (value -> display) for definiting static COMBOs
		Example: array("1"=>"Yes","0"=>"No")
	- combo_table, combo_value_col, combo_display_col, combo_hook_col - set of attributes for
		defininig dynamic combos, with data from DB; table and value are mandatory in this
		configuration; display may be optionaly used; similar the hook - this has no impact
		over the display of the combo; it simply creates a "hook" attribute inside the
		"option" html tag, which may be used by JS function to enable/disable/remove 
		the value during runtime.
	
	- events - a string that optionaly may define JS events for the input/select field
		Example: "onChange=\"runJSfunction();\" "
 
	- textarea_display_size - optional value used when a textarea_label_column is not specified, and
		 indicates how many characters should be shown from the text area content. Default is 50.
*/


 $custom_config[$module_id][0]['custom_table_column_defs'] = array (	
			"id" 		=> 	array (
					"header" 			=> "ID",
					"type"				=> "text",
					"key"				=> "PRI",
					"show_in_add_form" 	=> false,
					"show_in_edit_form"	=> false,
					"searchable" 		=> false,
					"visible"			=> false
			), 
			"username"	=> 	array (
					"header" 			=> "Number",
					"type"				=> "text",
					"key"				=> "UNI",
					"tip"				=> "Number in E.164 format",
					"validation_regex" 	=> "^[1-9][0-9]+$",
					"show_in_add_form" 	=> true,
					"show_in_edit_form"	=> true,
					"searchable" 		=> true
			), 
			"domain" 	=> 	array (
					"header" 			=> "Domain",
					"type"				=> "combo",
					"key"				=> NULL,
					"tip"				=> "Specific domain or WILDCARD",
					"validation_regex" 	=> "^[A-Za-z0-9_ \.\-]+$",
					"show_in_add_form" 	=> true,
					"show_in_edit_form"	=> true,
					"searchable" 		=> false,
					"combo_table" 		=> "dr_carriers",
					"combo_value_col" 	=> "carrierid",
					"default_value" 	=> NULL
			)

	);

 $custom_config[$module_id][1]['custom_table_column_defs'] = array (	
			"id" 		=> 	array (
					"header" 			=> "ID",
					"type"				=> "text",
					"key"				=> "PRI",
					"show_in_add_form" 	=> false,
					"show_in_edit_form"	=> false,
					"searchable" 		=> false,
					"visible"			=> false
			), 
			"prefix"	=> 	array (
					"header" 			=> "Prefix",
					"type"				=> "text",
					"key"				=> "MUL",
					"tip"				=> "Prefix to globally blacklist on the system.",
					"validation_regex" 	=> "^[0-9]+$",
					"show_in_add_form" 	=> true,
					"show_in_edit_form"	=> true,
					"searchable" 		=> true
			), 
			"description" 	=> 	array (
					"header" 			=> "Description",
					"type"				=> "text",
					"key"				=> NULL,
					"tip"				=> "Description",
					"validation_regex" 	=> "^[A-Za-z0-9_ \.\-]*$",
					"show_in_add_form" 	=> true,
					"show_in_edit_form"	=> true,
					"searchable" 		=> false,
					"default_value" 	=> NULL
			)
	);

 $custom_config[$module_id][3]['custom_table_column_defs'] = array (	
			"id" 		=> 	array (
					"header" 			=> "ID",
					"type"				=> "text",
					"key"				=> "PRI",
					"show_in_add_form" 	=> false,
					"show_in_edit_form"	=> false,
					"searchable" 		=> false,
					"visible"			=> false
			), 
			"username"	=> 	array (
					"header" 			=> "Number",
					"type"				=> "text",
					"key"				=> "MUL",
					"tip"				=> "Number in E.164 format",
					"validation_regex" 	=> "^[1-9][0-9]+$",
					"show_in_add_form" 	=> true,
					"show_in_edit_form"	=> true,
					"searchable" 		=> true
			), 
			"prefix"	=> 	array (
					"header" 			=> "Prefix",
					"type"				=> "text",
					"key"				=> NULL,
					"tip"				=> "Can be blanc or contain some prefix.",
					"validation_regex" 	=> "^[0-9]*$",
					"show_in_add_form" 	=> true,
					"show_in_edit_form"	=> true,
					"keep_empty_str_val"    => true,
					"searchable" 		=> true
			)
	);

 $custom_config[$module_id][4]['custom_table_column_defs'] = array (
			"user"	=> 	array (
					"header" 			=> "Number",
					"type"				=> "text",
					"key"				=> "PRI",
					"tip"				=> "Number in E.164 format",
					"validation_regex" 	=> "^[1-9][0-9]+$",
					"show_in_add_form" 	=> true,
					"show_in_edit_form"	=> true,
					"searchable" 		=> true
			), 
			"profile"	=> 	array (
					"header" 			=> "Profile",
					"type"				=> "combo",
					"key"				=> NULL,
					"tip"				=> "light/heavy/default",
					"show_in_add_form" 	=> true,
					"show_in_edit_form"	=> true,
					"searchable" 		=> true,
					"combo_default_values"=>array("light"=>"light","heavy"=>"heavy","default"=>"default"),
					"default_value" 	=> "heavy"
			),
			"blocked_international"	=> 	array (
					"header" 			=> "Blocked international calls",
					"type"				=> "combo",
					"key"				=> NULL,
					"tip"				=> "Blocked international calls",
					"show_in_add_form" 	=> true,
					"show_in_edit_form"	=> true,
					"searchable" 		=> true,
					"combo_default_values"=>array(1=>"Blocked",0=>"Not blocked"),
					"default_value" 	=> 0
			)

	);

 $custom_config[$module_id][5]['custom_table_column_defs'] = array (
			"ruleid" 		=> 	array (
					"header" 			=> "ID",
					"type"				=> "text",
					"key"				=> "PRI",
					"show_in_add_form" 	=> false,
					"show_in_edit_form"	=> false,
					"searchable" 		=> false,
					"visible"			=> false
			), 
			"profileid"	=> 	array (
					"header" 			=> "Profileid",
					"type"				=> "combo",
					"key"				=> NULL,
					"tip"				=> "10-default;20-light;30-havy",
					"validation_regex" 	=> "^[0-9]+$",
					"show_in_add_form" 	=> true,
					"show_in_edit_form"	=> true,
					"combo_default_values"=>array(20=>"light",30=>"heavy",10=>"default"),
					"default_value" 	=> 10,
					"searchable" 		=> true
			), 
			"prefix"	=> 	array (
					"header" 			=> "Number prefix",
					"type"				=> "text",
					"key"				=> NULL,
					"tip"				=> "Number prefix. 100 by default",
					"validation_regex" 	=> "^[0-9]+$",
					"show_in_add_form" 	=> true,
					"show_in_edit_form"	=> true,
					"searchable" 		=> true
			),
			"start_hour"	=> 	array (
					"header" 			=> "start_hour",
					"type"				=> "text",
					"key"				=> NULL,
					"tip"				=> "start_hour",
					"validation_regex" 	=> "^[0-9][0-9]:[0-9][0-9]$",
					"show_in_add_form" 	=> true,
					"show_in_edit_form"	=> true,
					"searchable" 		=> false
			),
			"end_hour"	=> 	array (
					"header" 			=> "end_hour",
					"type"				=> "text",
					"key"				=> NULL,
					"tip"				=> "end_hour",
					"validation_regex" 	=> "^[0-9][0-9]:[0-9][0-9]$",
					"show_in_add_form" 	=> true,
					"show_in_edit_form"	=> true,
					"searchable" 		=> false
			),
			"daysoftheweek"	=> 	array (
					"header" 			=> "daysoftheweek",
					"type"				=> "text",
					"key"				=> NULL,
					"tip"				=> "daysoftheweek",
					"show_in_add_form" 	=> true,
					"show_in_edit_form"	=> true,
					"searchable" 		=> false
			),
			"cpm_warning"	=> 	array (
					"header" 			=> "cpm_warning",
					"type"				=> "text",
					"key"				=> NULL,
					"tip"				=> "cpm_warning",
					"validation_regex" 	=> "^[0-9]+$",
					"show_in_add_form" 	=> true,
					"show_in_edit_form"	=> true,
					"searchable" 		=> false
			),
			"cpm_critical"	=> 	array (
					"header" 			=> "cpm_critical",
					"type"				=> "text",
					"key"				=> NULL,
					"tip"				=> "cpm_critical",
					"validation_regex" 	=> "^[0-9]+$",
					"show_in_add_form" 	=> true,
					"show_in_edit_form"	=> true,
					"searchable" 		=> false
			),
			"call_duration_warning"	=> 	array (
					"header" 			=> "call_duration_warning",
					"type"				=> "text",
					"key"				=> NULL,
					"tip"				=> "call_duration_warning",
					"validation_regex" 	=> "^[0-9]+$",
					"show_in_add_form" 	=> true,
					"show_in_edit_form"	=> true,
					"searchable" 		=> false
			),
			"call_duration_critical"	=> 	array (
					"header" 			=> "call_duration_critical",
					"type"				=> "text",
					"key"				=> NULL,
					"tip"				=> "call_duration_critical",
					"validation_regex" 	=> "^[0-9]+$",
					"show_in_add_form" 	=> true,
					"show_in_edit_form"	=> true,
					"searchable" 		=> false
			),
			"total_calls_warning"	=> 	array (
					"header" 			=> "total_calls_warning",
					"type"				=> "text",
					"key"				=> NULL,
					"tip"				=> "total_calls_warning",
					"validation_regex" 	=> "^[0-9]+$",
					"show_in_add_form" 	=> true,
					"show_in_edit_form"	=> true,
					"searchable" 		=> false
			),
			"total_calls_critical"	=> 	array (
					"header" 			=> "total_calls_critical",
					"type"				=> "text",
					"key"				=> NULL,
					"tip"				=> "total_calls_critical",
					"validation_regex" 	=> "^[0-9]+$",
					"show_in_add_form" 	=> true,
					"show_in_edit_form"	=> true,
					"searchable" 		=> false
			),
			"concurrent_calls_warning"	=> 	array (
					"header" 			=> "concurrent_calls_warning",
					"type"				=> "text",
					"key"				=> NULL,
					"tip"				=> "concurrent_calls_warning",
					"validation_regex" 	=> "^[0-9]+$",
					"show_in_add_form" 	=> true,
					"show_in_edit_form"	=> true,
					"searchable" 		=> false
			),
			"concurrent_calls_critical"	=> 	array (
					"header" 			=> "concurrent_calls_critical",
					"type"				=> "text",
					"key"				=> NULL,
					"tip"				=> "concurrent_calls_critical",
					"validation_regex" 	=> "^[0-9]+$",
					"show_in_add_form" 	=> true,
					"show_in_edit_form"	=> true,
					"searchable" 		=> false
			),
			"sequential_calls_warning"	=> 	array (
					"header" 			=> "sequential_calls_warning",
					"type"				=> "text",
					"key"				=> NULL,
					"tip"				=> "sequential_calls_warning",
					"validation_regex" 	=> "^[0-9]+$",
					"show_in_add_form" 	=> true,
					"show_in_edit_form"	=> true,
					"searchable" 		=> false
			),
			"sequential_calls_critical"	=> 	array (
					"header" 			=> "sequential_calls_critical",
					"type"				=> "text",
					"key"				=> NULL,
					"tip"				=> "sequential_calls_critical",
					"validation_regex" 	=> "^[0-9]+$",
					"show_in_add_form" 	=> true,
					"show_in_edit_form"	=> true,
					"searchable" 		=> false
			),

	);

$custom_config[$module_id][6]['custom_table_column_defs'] = array (	
		"id" 		=> 	array (
				"header" 			=> "ID",
				"type"				=> "text",
				"key"				=> "PRI",
				"show_in_add_form" 	=> false,
				"show_in_edit_form"	=> false,
				"searchable" 		=> false,
				"visible"			=> false
		), 
		"username" 	=> 	array (
				"header" 			=> "Domain",
				"type"				=> "combo",
				"key"				=> NULL,
				"tip"				=> "Specific carrier",
				"validation_regex" 	=> "^[A-Za-z0-9_ \.\-]+$",
				"show_in_add_form" 	=> true,
				"show_in_edit_form"	=> true,
				"searchable" 		=> false,
				"combo_table" 		=> "dr_carriers",
				"combo_value_col" 	=> "carrierid",
				"default_value" 	=> NULL
		),
		"prefix"	=> 	array (
			"header" 			=> "Number",
			"type"				=> "text",
			"key"				=> "UNI",
			"tip"				=> "Number in E.164 format",
			"validation_regex" 	=> "^[1-9][0-9]+$",
			"show_in_add_form" 	=> true,
			"show_in_edit_form"	=> true,
			"searchable" 		=> true
		),

);
 //need to reload 0 or 1
 $custom_config[$module_id][0]['reload'] = 0;
 $custom_config[$module_id][1]['reload'] = 1;
 $custom_config[$module_id][3]['reload'] = 0;
 $custom_config[$module_id][4]['reload'] = 0;
 $custom_config[$module_id][5]['reload'] = 1;
 $custom_config[$module_id][6]['reload'] = 1;

 //if you need reload please specify the MI command to be ran
 $custom_config[$module_id][1]['custom_mi_command'] = "reload_blacklist";
 $custom_config[$module_id][5]['custom_mi_command'] = "fraud_reload";
 $custom_config[$module_id][6]['custom_mi_command'] = "reload_blacklist";
 
 
 //the system ID to send the reload MI command to
 $talk_to_this_assoc_id = 1;


##############################################
######### CUSTOM SEARCH OPTIONS ##############
##############################################
$custom_config[$module_id][0]['custom_search'] = 	array ( "enabled" => true, 
														"action_script" => "custom_actions/search.php"
												);
$custom_config[$module_id][1]['custom_search'] = 	array ( "enabled" => true, 
														"action_script" => "custom_actions/search.php"
												);
$custom_config[$module_id][3]['custom_search'] = 	array ( "enabled" => true, 
														"action_script" => "custom_actions/search.php"
												);
$custom_config[$module_id][4]['custom_search'] = 	array ( "enabled" => true, 
														"action_script" => "custom_actions/search.php"
												);
$custom_config[$module_id][5]['custom_search'] = 	array ( "enabled" => true, 
												"action_script" => "custom_actions/search.php"
										);
$custom_config[$module_id][6]['custom_search'] = 	array ( "enabled" => true, 
										"action_script" => "custom_actions/search.php"
								);
##############################################
####### CUSTOM ACTIONS COLUMNS ###############
##############################################

 $custom_config[$module_id][0]['custom_action_columns'] = 	array (
									"0" 	=> 	array(
												"header" 			=> "Edit",
												"show_header" 		=> false,
												"type"				=> "link",
												"action" 			=> "edit",
												"icon"				=> "../../../images/share/edit.png",
												"action_script" 	=> "custom_actions/edit.php",
												"action_template" 	=> "template/custom_templates/edit.php"
											),
									"1" 	=> 	array(
												"header" 			=> "Delete",
												"show_header" 		=> false,
												"type"				=> "link",
												"action" 			=> "delete",
												"icon"				=> "../../../images/share/delete.png",
												"action_script" 	=> "custom_actions/delete.php",
												"action_template" 	=> "template/custom_templates/delete.php",
												"events"			=> "onclick=\"return confirmDelete()\""
											)
							);
 $custom_config[$module_id][1]['custom_action_columns'] = 	array (
									"0" 	=> 	array(
												"header" 			=> "Edit",
												"show_header" 		=> false,
												"type"				=> "link",
												"action" 			=> "edit",
												"icon"				=> "../../../images/share/edit.png",
												"action_script" 	=> "custom_actions/edit.php",
												"action_template" 	=> "template/custom_templates/edit.php"
											),
									"1" 	=> 	array(
												"header" 			=> "Delete",
												"show_header" 		=> false,
												"type"				=> "link",
												"action" 			=> "delete",
												"icon"				=> "../../../images/share/delete.png",
												"action_script" 	=> "custom_actions/delete.php",
												"action_template" 	=> "template/custom_templates/delete.php",
												"events"			=> "onclick=\"return confirmDelete()\""
											)
							);
 $custom_config[$module_id][3]['custom_action_columns'] = 	array (
									"0" 	=> 	array(
												"header" 			=> "Edit",
												"show_header" 		=> false,
												"type"				=> "link",
												"action" 			=> "edit",
												"icon"				=> "../../../images/share/edit.png",
												"action_script" 	=> "custom_actions/edit.php",
												"action_template" 	=> "template/custom_templates/edit.php"
											),
									"1" 	=> 	array(
												"header" 			=> "Delete",
												"show_header" 		=> false,
												"type"				=> "link",
												"action" 			=> "delete",
												"icon"				=> "../../../images/share/delete.png",
												"action_script" 	=> "custom_actions/delete.php",
												"action_template" 	=> "template/custom_templates/delete.php",
												"events"			=> "onclick=\"return confirmDelete()\""
											)
							);
 $custom_config[$module_id][4]['custom_action_columns'] = 	array (
									"0" 	=> 	array(
												"header" 			=> "Edit",
												"show_header" 		=> false,
												"type"				=> "link",
												"action" 			=> "edit",
												"icon"				=> "../../../images/share/edit.png",
												"action_script" 	=> "custom_actions/edit.php",
												"action_template" 	=> "template/custom_templates/edit.php"
											),
									"1" 	=> 	array(
												"header" 			=> "Delete",
												"show_header" 		=> false,
												"type"				=> "link",
												"action" 			=> "delete",
												"icon"				=> "../../../images/share/delete.png",
												"action_script" 	=> "custom_actions/delete.php",
												"action_template" 	=> "template/custom_templates/delete.php",
												"events"			=> "onclick=\"return confirmDelete()\""
											)
							);
 $custom_config[$module_id][5]['custom_action_columns'] = 	array (
								"0" 	=> 	array(
											"header" 			=> "Edit",
											"show_header" 		=> false,
											"type"				=> "link",
											"action" 			=> "edit",
											"icon"				=> "../../../images/share/edit.png",
											"action_script" 	=> "custom_actions/edit.php",
											"action_template" 	=> "template/custom_templates/edit.php"
										),
								"1" 	=> 	array(
											"header" 			=> "Delete",
											"show_header" 		=> false,
											"type"				=> "link",
											"action" 			=> "delete",
											"icon"				=> "../../../images/share/delete.png",
											"action_script" 	=> "custom_actions/delete.php",
											"action_template" 	=> "template/custom_templates/delete.php",
											"events"			=> "onclick=\"return confirmDelete()\""
										)
						);
 $custom_config[$module_id][6]['custom_action_columns'] = 	array (
							"0" 	=> 	array(
										"header" 			=> "Edit",
										"show_header" 		=> false,
										"type"				=> "link",
										"action" 			=> "edit",
										"icon"				=> "../../../images/share/edit.png",
										"action_script" 	=> "custom_actions/edit.php",
										"action_template" 	=> "template/custom_templates/edit.php"
									),
							"1" 	=> 	array(
										"header" 			=> "Delete",
										"show_header" 		=> false,
										"type"				=> "link",
										"action" 			=> "delete",
										"icon"				=> "../../../images/share/delete.png",
										"action_script" 	=> "custom_actions/delete.php",
										"action_template" 	=> "template/custom_templates/delete.php",
										"events"			=> "onclick=\"return confirmDelete()\""
									)
					);
##############################################
####### CUSTOM ACTIONS BUTTON  ###############
##############################################

 $custom_config[$module_id][0]['custom_action_buttons'] = array (
									"0"		=>	array(
												"text" 				=> "Add",
												"action" 			=> "add",
												"style"				=> "formButton",
												"action_script"		=> "custom_actions/add.php",
												"action_template"	=> "template/custom_templates/add.php"
										)
						);
 $custom_config[$module_id][1]['custom_action_buttons'] = array (
									"0"		=>	array(
												"text" 				=> "Add",
												"action" 			=> "add",
												"style"				=> "formButton",
												"action_script"		=> "custom_actions/add.php",
												"action_template"	=> "template/custom_templates/add.php"
										)
						);
 $custom_config[$module_id][3]['custom_action_buttons'] = array (
									"0"		=>	array(
												"text" 				=> "Add",
												"action" 			=> "add",
												"style"				=> "formButton",
												"action_script"		=> "custom_actions/add.php",
												"action_template"	=> "template/custom_templates/add.php"
										)
						);
 $custom_config[$module_id][4]['custom_action_buttons'] = array (
									"0"		=>	array(
												"text" 				=> "Add",
												"action" 			=> "add",
												"style"				=> "formButton",
												"action_script"		=> "custom_actions/add.php",
												"action_template"	=> "template/custom_templates/add.php"
										)
						);
 $custom_config[$module_id][5]['custom_action_buttons'] = array (
							"0"		=>	array(
										"text" 				=> "Add",
										"action" 			=> "add",
										"style"				=> "formButton",
										"action_script"		=> "custom_actions/add.php",
										"action_template"	=> "template/custom_templates/add.php"
								)
				);
 $custom_config[$module_id][6]['custom_action_buttons'] = array (
					"0"		=>	array(
								"text" 				=> "Add",
								"action" 			=> "add",
								"style"				=> "formButton",
								"action_script"		=> "custom_actions/add.php",
								"action_template"	=> "template/custom_templates/add.php"
						)
		);
