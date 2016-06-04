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
	"url_target" => "_self",
	"icon" => "fa-home",
	"label_htm" => "<span>Add your custom label/badge html here</span>",
	"sub" => array() //contains array of sub items with the same format as the parent
)

*/
$page_nav = array(
	"dashboard" => array(
		"title" => "Dashboard",
		"url" => APP_URL,
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
						'url' => APP_URL."/smartui-alert.php"
					),
					'progress' => array(
						'title' => 'Progress',
						'url' => APP_URL.'/smartui-progress.php'
					)
				)
			),
			"carousel" => array(
				"title" => "Carousel",
				"url" => APP_URL.'/smartui-carousel.php'
			),
			"tab" => array(
				"title" => "Tab",
				"url" => APP_URL.'/smartui-tab.php'
			),
			"accordion" => array(
				"title" => "Accordion",
				"url" => APP_URL.'/smartui-accordion.php'
			),
			"widget" => array(
				'title' => "Widget",
				'url' => APP_URL."/smartui-widget.php"
			),
			"datatable" => array(
				"title" => "DataTable",
				"url" => APP_URL."/smartui-datatable.php"
			),
			"button" => array(
				"title" => "Button",
				"url" => APP_URL."/smartui-button.php"
			),
			'smartform' => array(
				'title' => 'Smart Form',
				'url' => APP_URL.'/smartui-form.php'
			)
		)
	),
	"inbox" => array(
		"title" => "Inbox",
		"url" => APP_URL."/inbox.php",
		"icon" => "fa-inbox",
		"label_htm" => '<span class="badge pull-right inbox-badge">14</span>'
	),
	"graphs" => array(
		"title" => "Graphs",
		"icon" => "fa-bar-chart-o",
		"sub" => array(
			"flot" => array(
				"title" => "Flot Chart",
				"url" => APP_URL."/flot.php"
			),
			"morris" => array(
				"title" => "Morris Charts",
				"url" => APP_URL."/morris.php"
			),
			"inline" => array(
				"title" => "Inline Charts",
				"url" => APP_URL."/inline-charts.php"
			),
			"dygraphs" => array(
				"title" => "Dygraphs",
				"url" => APP_URL."/dygraphs.php",
			),
			"chartjs" => array(
				"title" => "Chart.js",
				"url" => APP_URL."/chartjs.php",
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
				"url" => APP_URL."/table.php"
			),
			"data" => array(
				"title" => "Data Tables",
				"url" => APP_URL."/datatables.php",
				"label_htm" => ' <span class="badge inbox-badge bg-color-greenLight">v1.10</span>'
			),
			"jqgrid" => array(
				"title" => "Jquery Grid",
				"url" => APP_URL."/jqgrid.php"
			)
		)
	),
	"forms" => array(
		"title" => "Forms",
		"icon" => "fa-pencil-square-o",
		"sub" => array(
			"smart_elements" => array(
				"title" => "Smart Form Elements",
				"url" => APP_URL."/form-elements.php"
			),
            "smart_layout" => array(
				"title" => "Smart Form Layouts",
				"url" => APP_URL."/form-templates.php"
			),
            "smart_validation" => array(
				"title" => "Smart Form Validation",
				"url" => APP_URL."/validation.php"
			),
            "bootstrap_forms" => array(
				"title" => "Bootstrap Form Elements",
				"url" => APP_URL."/bootstrap-forms.php"
			),
            "form_plugins" => array(
				"title" => "Form Plugins",
				"url" => APP_URL."/plugins.php"
			),
            "wizards" => array(
				"title" => "Wizards",
				"url" => APP_URL."/wizard.php"
			),
            "bootstrap_editors" => array(
				"title" => "Bootstrap Editors",
				"url" => APP_URL."/other-editors.php"
			),
            "dropzone" => array(
				"title" => "Dropzone",
				"url" => APP_URL."/dropzone.php"
			),
			"imagecrop" => array(
				"title" => "Image Cropping",
				"url" => APP_URL."/image-editor.php",
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
                "url" => APP_URL."/general-elements.php"
            ),
            "buttons" => array(
                "title" => "Buttons",
                "url" => APP_URL."/buttons.php"
            ),
            "icons" => array(
                "title" => "Icons",
                "sub" => array(
                    "fa" => array(
                        "title" => "Font Awesome",
                        "icon" => "fa-plane",
                        "url" => APP_URL."/fa.php"
                    ),
                    "glyph" => array(
                        "title" => "Glyph Icons",
                        "icon" => "fa-plane",
                        "url" => APP_URL."/glyph.php"
                    ),
                    "flags" => array(
                        "title" => "Flags",
                        "icon" => "fa-flag",
                        "url" => APP_URL."/flags.php"
                    )
                )
            ),
            "grid" => array(
                "title" => "Grid",
                "url" => APP_URL."/grid.php"
            ),
            "tree_view" => array(
                "title" => "Tree View",
                "url" => APP_URL."/treeview.php"
            ),
            "nestable_lists" => array(
                "title" => "Nestable Lists",
                "url" => APP_URL."/nestable-list.php"
            ),
            "jquery_ui" => array(
                "title" => "jQuery UI",
                "url" => APP_URL."/jqui.php"
            ),
            "typo" => array(
				"title" => "Typography",
				"url" => APP_URL."/typography.php"
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
					),
					"disabled" => array(
						"title" => "Item #4 (disabled)",
						"class" => "inactive",
						"icon" => "fa-folder-open"
					)
				)
			),
        )
    ),
    "cal" => array(
		"title" => "Calendar",
		"url" => APP_URL."/calendar.php",
		"icon" => "fa-calendar",
		"icon_badge" => "3"
	),
    "widgets" => array(
		"title" => "Widgets",
		"url" => APP_URL."/widgets.php",
		"icon" => "fa-list-alt"
	),
	"views" => array(
		"title" => "App Views",
		"icon" => "fa-puzzle-piece",
		"sub" => array(
			"projects" => array(
				"title" => "Projects",
				"icon" => "fa fa-file-text-o",
				"url" => APP_URL."/projects.php"
			),
			"blog" => array(
				"title" => "Blog",
				"icon" => "fa fa-paragraph",
				"url" => APP_URL."/blog.php"
			),
			"gallery" => array(
				"title" => "Gallery",
				"icon" => "fa fa-picture-o",
				"url" => APP_URL."/gallery.php"
			),
			"forum" => array(
				"title" => "Forum Layout",
				"icon" => "fa fa-comments",
				"sub" => array(
					"general" => array(
						"title" => "General View",
						"url" => APP_URL."/forum.php"
					),
					"topic" => array(
						"title" => "Topic View",
						"url" => APP_URL."/forum-topic.php"
					),
					"post" => array(
						"title" => "Post View",
						"url" => APP_URL."/forum-post.php"
					),
				)
			),
			"profile" => array(
				"title" => "Profile",
				"icon" => "fa fa-group",
				"url" => APP_URL."/profile.php"
			),
			"timeline" => array(
				"title" => "Timeline",
				"icon" => "fa fa-clock-o",
				"url" => APP_URL."/timeline.php"
			)
		)
	),
    "gmap_skins" => array(
		"title" => "GMap Skins",
		"url" => APP_URL."/gmap-xml.php",
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
				"url" => APP_URL."/pricing-table.php"
			),
            "invoice" => array(
				"title" => "Invoice",
				"url" => APP_URL."/invoice.php"
			),
            "login" => array(
				"title" => "Login",
				"url" => APP_URL."/login.php"
			),
            "register" => array(
				"title" => "Register",
				"url" => APP_URL."/register.php"
			),
            "lock" => array(
				"title" => "Lock Screen",
				"url" => APP_URL."/lock.php"
			),
            "err_404" => array(
				"title" => "Error 404",
				"url" => APP_URL."/error404.php"
			),
            "err_500" => array(
				"title" => "Error 500",
				"url" => APP_URL."/error500.php"
			),
			"blank" => array(
				"title" => "Blank Page",
				"url" => APP_URL."/blank_.php"
			),
            "email_template" => array(
				"title" => "Email Template",
				"url" => APP_URL."/email-template.php"
			),
            "search" => array(
				"title" => "Search Page",
				"url" => APP_URL."/search.php"
			),
            "ck_editor" => array(
				"title" => "CK Editor",
				"url" => APP_URL."/ckeditor.php"
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
		        "url" => APP_URL."/difver.php"
		    ),
		    "applayout" => array(
		        "title" => "App Settings",
		        "icon" => "fa-cube",
		        "url" => APP_URL."/applayout.php"
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

				<a href="ajax/chat.html" class="btn btn-xs btn-default btn-block sa-chat-learnmore-btn">About the API</a>
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