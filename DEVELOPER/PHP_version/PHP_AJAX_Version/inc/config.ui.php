<?php

//CONFIGURATION for SmartAdmin UI

//ribbon breadcrumbs config
//array("Display Name" => "URL");
$breadcrumbs = array(
	"Home" => APP_URL
);

/*navigation array config

ex:
"dashboard" => array(
	"title" => "Display Title",
	"url" => "http://yoururl.com",
	"url_target" => "_blank",
	"icon" => "fa-home",
	"label_htm" => "<span>Add your custom label/badge html here</span>",
	"sub" => array() //contains array of sub items with the same format as the parent
)

*/
$page_nav = array(
	"dashboard" => array(
		"title" => "Dashboard",
		"url" => "ajax/dashboard.php",
		"icon" => "fa-home"
	),
	"smartui" => array(
		"title" => "Smart UI",
		"icon" => "fa-code",
		"sub" => array(
			"general" => array(
				'title' => 'General Elements',
				'icon' => 'fa-folder-open',
				'sub' => array(
					'alert' => array(
						'title' => 'Alerts',
						'url' => "ajax/smartui-alert.php"
					),
					'progress' => array(
						'title' => 'Progress',
						'url' => 'ajax/smartui-progress.php'
					)
				)
			),
			"carousel" => array(
				"title" => "Carousel",
				"url" => 'ajax/smartui-carousel.php'
			),
			"tab" => array(
				"title" => "Tab",
				"url" => 'ajax/smartui-tab.php'
			),
			"accordion" => array(
				"title" => "Accordion",
				"url" => 'ajax/smartui-accordion.php'
			),
			"widget" => array(
				'title' => "Widget",
				'url' => "ajax/smartui-widget.php"
			),
			"datatable" => array(
				"title" => "DataTable",
				"url" => "ajax/smartui-datatable.php"
			),
			"button" => array(
				"title" => "Button",
				"url" => "ajax/smartui-button.php"
			),
			'smartform' => array(
				'title' => 'Smart Form',
				'url' => 'ajax/smartui-form.php'
			)
		)
	),
	"inbox" => array(
		"title" => "Inbox",
		"url" => "ajax/inbox.php",
		"icon" => "fa-inbox",
		"label_htm" => '<span class="badge pull-right inbox-badge">14</span>',
	),
	"graphs" => array(
		"title" => "Graphs",
		"icon" => "fa-bar-chart-o",
		"sub" => array(
			"flot" => array(
				"title" => "Flot Chart",
				"url" => "ajax/flot.php"
			),
			"morris" => array(
				"title" => "Morris Charts",
				"url" => "ajax/morris.php"
			),
			"inline" => array(
				"title" => "Inline Charts",
				"url" => "ajax/inline-charts.php"
			),
			"dygraphs" => array(
				"title" => "Dygraphs",
				"url" => "ajax/dygraphs.php"
			),
			"chartjs" => array(
				"title" => "Chart.js",
				"url" => "ajax/chartjs.php",
				"label_htm" => ' <span class="badge pull-right inbox-badge bg-color-yellow">new</span>'
			)
		)
	),
	"tables" => array(
		"title" => "Tables",
		"icon" => "fa-table",
		"sub" => array(
			"normal" => array(
				"title" => "Normal Tables",
				"url" => "ajax/table.php"
			),
			"data" => array(
				"title" => "Data Tables",
				"url" => "ajax/datatables.php",
				"label_htm" => ' <span class="badge inbox-badge bg-color-greenLight">v1.10</span>'
			),
			"jqgrid" => array(
				"title" => "Jquery Grid",
				"url" => "ajax/jqgrid.php"
			)
		)
	),
	"forms" => array(
		"title" => "Forms",
		"icon" => "fa-pencil-square-o",
		"sub" => array(
			"smart_elements" => array(
				"title" => "Smart Form Elements",
				"url" => "ajax/form-elements.php"
			),
            "smart_layout" => array(
				"title" => "Smart Form Layouts",
				"url" => "ajax/form-templates.php"
			),
            "smart_validation" => array(
				"title" => "Smart Form Validation",
				"url" => "ajax/validation.php"
			),
            "bootstrap_forms" => array(
				"title" => "Bootstrap Form Elements",
				"url" => "ajax/bootstrap-forms.php"
			),
			"bootstrap_validation" => array(
				"title" => "Bootstrap Form Validation",
				"url" => "ajax/bootstrap-validator.php"
			),
            "form_plugins" => array(
				"title" => "Form Plugins",
				"url" => "ajax/plugins.php"
			),
            "wizards" => array(
				"title" => "Wizards",
				"url" => "ajax/wizard.php"
			),
            "bootstrap_editors" => array(
				"title" => "Bootstrap Editors",
				"url" => "ajax/other-editors.php"
			),
            "dropzone" => array(
				"title" => "Dropzone",
				"url" => "ajax/dropzone.php"
			),
			"imagecrop" => array(
				"title" => "Image Cropping",
				"url" => "ajax/image-editor.php",
                "label_htm" => '<span class="badge pull-right inbox-badge bg-color-yellow">new</span>'
			)
		)
	),
    "ui_elements" => array(
        "title" => "UI Elements",
        "icon" => "fa-desktop",
        "sub" => array(
            "general" => array(
                "title" => "General Elements",
                "url" => "ajax/general-elements.php"
            ),
            "buttons" => array(
                "title" => "Buttons",
                "url" => "ajax/buttons.php"
            ),
            "icons" => array(
                "title" => "Icons",
                "sub" => array(
                    "fa" => array(
                        "title" => "Font Awesome",
                        "icon" => "fa-plane",
                        "url" => "ajax/fa.php"
                    ),
                    "glyph" => array(
                        "title" => "Glyph Icons",
                        "icon" => "fa-plane",
                        "url" => "ajax/glyph.php"
                    ),
                    "flags" => array(
                        "title" => "Flags",
                        "icon" => "fa-flag",
                        "url" => "ajax/flags.php"
                    )
                )
            ),
            "grid" => array(
                "title" => "Grid",
                "url" => "ajax/grid.php"
            ),
            "tree_view" => array(
                "title" => "Tree View",
                "url" => "ajax/treeview.php"
            ),
            "nestable_lists" => array(
                "title" => "Nestable Lists",
                "url" => "ajax/nestable-list.php"
            ),
            "jquery_ui" => array(
                "title" => "jQuery UI",
                "url" => "ajax/jqui.php"
            ),
            "typo" => array(
				"title" => "Typography",
				"url" => "ajax/typography.php"
			),
			"nav6" => array(
				"title" => "Six Level Menu",
				"sub" => array(
					"second_lvl" => array(
						"title" => "Item #2",
						"icon" => "fa-folder-open",
						"sub" => array(
							"third_lvl" => array(
								"title" => "Sub #2.1",
								"icon" => "fa-folder-open",
								"sub" => array(
									"file" => array(
										"title" => "Item #2.1.1",
										"icon" => "fa-file-text"
									),
									"fourth_lvl" => array(
										"title" => "Expand",
										"icon" => "fa-plus",
										"sub" => array(
											"file" => array(
												"title" => "File",
												"icon" => "fa-file-text"
											),
											"fifth_lvl" => array(
												"title" => "Delete",
												"icon" => "fa-trash-o"
											)
										)
									)
								)
							)
						)
					),
					"folder" => array(
						"title" => "Item #3",
						"icon" => "fa-folder-open",
						"sub" => array(
							"third_lvl" => array(
								"title" => "Sub #3.1",
								"icon" => "fa-folder-open",
								"sub" => array(
									"file1" => array(
										"title" => "File",
										"icon" => "fa-file-text"
									),
									"file2" => array(
										"title" => "File",
										"icon" => "fa-file-text"
									)
								)
							)
						)
					)
				)
			),
        )
    ),
    "cal" => array(
		"title" => "Calendar",
		"url" => "ajax/calendar.php",
		"icon" => "fa-calendar",
		"icon_badge" => "3"
	),
    "widgets" => array(
		"title" => "Widgets",
		"url" => "ajax/widgets.php",
		"icon" => "fa-list-alt"
	),
	"views" => array(
		"title" => "App Views",
		"icon" => "fa-puzzle-piece",
		"sub" => array(
			"projects" => array(
				"title" => "Projects",
				"icon" => "fa fa-file-text-o",
				"url" => "ajax/projects.php"
			),
			"blog" => array(
				"title" => "Blog",
				"icon" => "fa fa-paragraph",
				"url" => "ajax/blog.php"
			),
			"gallery" => array(
				"title" => "Gallery",
				"icon" => "fa fa-picture-o",
				"url" => "ajax/gallery.php"
			),
			"forum" => array(
				"title" => "Forum Layout",
				"icon" => "fa fa-comments",
				"sub" => array(
					"general" => array(
						"title" => "General View",
						"url" => "ajax/forum.php"
					),
					"topic" => array(
						"title" => "Topic View",
						"url" => "ajax/forum-topic.php"
					),
					"post" => array(
						"title" => "Post View",
						"url" => "ajax/forum-post.php"
					),
				)
			),
			"profile" => array(
				"title" => "Profile",
				"icon" => "fa fa-group",
				"url" => "ajax/profile.php"
			),
			"timeline" => array(
				"title" => "Timeline",
				"icon" => "fa fa-clock-o",
				"url" => "ajax/timeline.php"
			)
		)
	),
    "gmap_skins" => array(
		"title" => "GMap Skins",
		"url" => "ajax/gmap-xml.php",
		"icon" => "fa-map-marker",
        "label_htm" => '<span class="badge bg-color-greenLight pull-right inbox-badge">9</span>'
	),
	"misc" => array(
		"title" => "Miscellaneous",
		"icon" => "fa-windows",
		"sub" => array(
			"landing_page" => array(
			    "title" => 'Landing Page',
			    "title_append" => '<i class="fa fa-external-link"></i>',
			    "url" => "http://bootstraphunter.com/smartadmin-landing/",
			    "url_target"=> "_blank"
		    ),
            "pricing_tables" => array(
				"title" => "Pricing Tables",
				"url" => "ajax/pricing-table.php"
			),
            "invoice" => array(
				"title" => "Invoice",
				"url" => "ajax/invoice.php"
			),
            "login" => array(
				"title" => "Login",
				"url" => APP_URL."/login.php",
				"url_target" => "_top"
			),
            "register" => array(
				"title" => "Register",
				"url" => APP_URL."/register.php",
				"url_target" => "_top"
			),
            "lock" => array(
				"title" => "Locked Screen",
				"url" => APP_URL."/lock.php",
				"url_target" => "_top"
			),
            "err_404" => array(
				"title" => "Error 404",
				"url" => "ajax/error404.php"
			),
            "err_500" => array(
				"title" => "Error 500",
				"url" => "ajax/error500.php"
			),
			"blank" => array(
				"title" => "Blank Page",
				"url" => "ajax/blank_.php"
			),
            "email_template" => array(
				"title" => "Email Template",
				"url" => "ajax/email-template.php"
			),
            "search" => array(
				"title" => "Search Page",
				"url" => "ajax/search.php"
			),
            "ck_editor" => array(
				"title" => "CK Editor",
				"url" => "ajax/ckeditor.php"
			),
		)
	),
	"smartint" => array(
		"title" => "SmartAdmin Intel",
		"icon" => "fa-cube txt-color-blue",
		"sub" => array(
			"difver" => array(
		        "title" => "Different Versions",
		        "icon" => "fa-stack-overflow",
		        "url" => "ajax/difver.php"
		    ),
		    "applayout" => array(
		        "title" => "App Settings",
		        "icon" => "fa-cube",
		        "url" => "ajax/applayout.php"
		    ),
		   "doc" => array(
		        "title" => "Documentation",
		        "icon" => "fa-book",
		        "url" => "http://192.241.236.31/smartadmin/BUGTRACK/track_/documentation/index.html",
		        "url_target"=> "_blank"
		    ),
		   "bugtrack" => array(
		        "title" => "Bug Tracker",
		        "icon" => "fa-bug",
		        "url" => "http://192.241.236.31/smartadmin/BUGTRACK/track_/",
		        "url_target"=> "_blank"
		    ),
		   	"support" => array(
		   		"title" => "SmartAdmin Support",
		   		"icon" => "fa fa-wechat",
		   		"url" => "http://myorange.ca/supportforum/",
		   		"url_target" => "_blank"
		   	)
		)
	),
	"smartchat" => array(
		"title" => "Smart Chat API <sup>beta</sup>",
		"icon" => "fa fa-lg fa-fw fa-comment-o",
		"icon_badge" => array(
			'content' => '!',
			'class' => 'bg-color-pink flash animated'
		),
		"li_class" => array("chat-users", "top-menu-invisible"),
		"sub" => '
			<div class="display-users">
				<input class="form-control chat-user-filter" placeholder="Filter" type="text">
		
			  	<a href="#" class="usr" 
				  	data-chat-id="cha1" 
				  	data-chat-fname="Sadi" 
				  	data-chat-lname="Orlaf" 
				  	data-chat-status="busy" 
				  	data-chat-alertmsg="Sadi Orlaf is in a meeting. Please do not disturb!" 
				  	data-chat-alertshow="true" 
				  	data-rel="popover-hover" 
				  	data-placement="right" 
				  	data-html="true" 
				  	data-content="
						<div class=\'usr-card\'>
							<img src=\'img/avatars/5.png\' alt=\'Sadi Orlaf\'>
							<div class=\'usr-card-content\'>
								<h3>Sadi Orlaf</h3>
								<p>Marketing Executive</p>
							</div>
						</div>
					"> 
				  	<i></i>Sadi Orlaf
			  	</a>
			
				<a href="#" class="usr" 
				  	data-chat-id="cha2" 
				  	data-chat-fname="Jessica" 
				  	data-chat-lname="Dolof" 
				  	data-chat-status="online" 
				  	data-chat-alertmsg="" 
				  	data-chat-alertshow="false" 
				  	data-rel="popover-hover" 
				  	data-placement="right" 
				  	data-html="true" 
				  	data-content="
						<div class=\'usr-card\'>
							<img src=\'img/avatars/1.png\' alt=\'Jessica Dolof\'>
							<div class=\'usr-card-content\'>
								<h3>Jessica Dolof</h3>
								<p>Sales Administrator</p>
							</div>
						</div>
					"> 
				  	<i></i>Jessica Dolof
				</a>
		
				<a href="#" class="usr" 
				  	data-chat-id="cha3" 
				  	data-chat-fname="Zekarburg" 
				  	data-chat-lname="Almandalie" 
				  	data-chat-status="online" 
				  	data-rel="popover-hover" 
				  	data-placement="right" 
				  	data-html="true" 
				  	data-content="
						<div class=\'usr-card\'>
							<img src=\'img/avatars/3.png\' alt=\'Zekarburg Almandalie\'>
							<div class=\'usr-card-content\'>
								<h3>Zekarburg Almandalie</h3>
								<p>Sales Admin</p>
							</div>
						</div>
					"> 
				  	<i></i>Zekarburg Almandalie
				</a>
				
				<a href="#" class="usr" 
				  	data-chat-id="cha4" 
				  	data-chat-fname="Barley" 
				  	data-chat-lname="Krazurkth" 
				  	data-chat-status="away" 
				  	data-rel="popover-hover" 
				  	data-placement="right" 
				  	data-html="true" 
				  	data-content="
						<div class=\'usr-card\'>
							<img src=\'img/avatars/4.png\' alt=\'Barley Krazurkth\'>
							<div class=\'usr-card-content\'>
								<h3>Barley Krazurkth</h3>
								<p>Sales Director</p>
							</div>
						</div>
					"> 
				  	<i></i>Barley Krazurkth
				</a>
			
				<a href="#" class="usr offline" 
				  	data-chat-id="cha5" 
				  	data-chat-fname="Farhana" 
				  	data-chat-lname="Amrin" 
				  	data-chat-status="incognito" 
				  	data-rel="popover-hover" 
				  	data-placement="right" 
				  	data-html="true" 
				  	data-content="
						<div class=\'usr-card\'>
							<img src=\'img/avatars/female.png\' alt=\'Farhana Amrin\'>
							<div class=\'usr-card-content\'>
								<h3>Farhana Amrin</h3>
								<p>Support Admin <small><i class=\'fa fa-music\'></i> Playing Beethoven Classics</small></p>
							</div>
						</div>
					"> 
				  	<i></i>Farhana Amrin (offline)
				</a>
		
				<a href="#" class="usr offline" 
					data-chat-id="cha6" 
				  	data-chat-fname="Lezley" 
				  	data-chat-lname="Jacob" 
				  	data-chat-status="incognito" 
				  	data-rel="popover-hover" 
				  	data-placement="right" 
				  	data-html="true" 
				  	data-content="
						<div class=\'usr-card\'>
							<img src=\'img/avatars/male.png\' alt=\'Lezley Jacob\'>
							<div class=\'usr-card-content\'>
								<h3>Lezley Jacob</h3>
								<p>Sales Director</p>
							</div>
						</div>
					"> 
				  	<i></i>Lezley Jacob (offline)
				</a>

				<a href="ajax/chat.php" class="btn btn-xs btn-default btn-block sa-chat-learnmore-btn">About the API</a>
			</div>'
	)
);

//configuration variables
$page_title = "";
$page_css = array();
$no_main_header = false; //set true for lock.php and login.php
$page_body_prop = array(); //optional properties for <body>
$page_html_prop = array(); //optional properties for <html>
?>