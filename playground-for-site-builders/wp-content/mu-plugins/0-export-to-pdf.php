<?php
/*
Plugin Name: Export to PDF button
Description: Adds an "Save as PDF" print button to the frontend so you save your slides.
Author: Adam Zieliński
Version: 1.0
*/

function add_print_button() {
	// Don't display the button in wp-admin
	if(is_admin()) return;
	echo '<style>
			@media print {
			@page {
				 size: landscape;
				 margin: 0;
			}
				body {
					-webkit-print-color-adjust: exact;
					print-color-adjust: exact;
				}
				.print-button {
					display: none;
				}
			}

			.print-button {
				position: fixed;
				top: 1em;
				right: 1em;
				background-color: #333;
				color: #fff;
				border-radius: 8px;
				box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
				border: none;
				cursor: pointer;
				padding: 10px 20px;
				font-size: 30px;
				z-index: 1000000;
			}
		</style>
		<script>
			window.onload = function() {
				var printButton = document.createElement("button");
				printButton.textContent = "Save as PDF";
				printButton.className = "print-button";
				printButton.onclick = function() {
					window.scrollTo(0, 0);
					window.print();
				};
				document.body.appendChild(printButton);
			};
			window.onbeforeprint = function() {
				Array.from(document.querySelectorAll("details")).forEach(details => details.open = true);
			}
		</script>';
}

add_action('wp_footer', 'add_print_button');
