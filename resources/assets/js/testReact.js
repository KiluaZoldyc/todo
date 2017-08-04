import React from 'react';
import ReactDOM from 'react-dom';
import $ from 'jquery';


// let $ = require("jquery");
$(document).ready(function(){

	$.get("api/todos/save", function( data ){
		let result = JSON.parse( data );
		let aff = result.map(function(todos){
			return '<li>'+ todos.name +'</li>';
		});
		$("#ajax_result").html( aff );
	});

	$("#form_save").submit(function(e){
		var form_data = $(this).serialize();
		console.log("form_data= "+form_data);
		$.ajax({
			type:"POST", 
			data: form_data,
			url: '/api/todos/save',
			success: function (form_data){
				$("#ajax_result").html(form_data);
			},
			error: function(){
				$("#ajax_result").html('erreur');

			}
		});
		e.preventDefault();
		// var post_name = $("#name").val();
		// var post_category = $("#category").val();
		// var post_token = $("input[name='_token']").val();
		// var obj = {name: post_name, category: post_category};
		// var json_formulaire = JSON.stringify( obj );

		return false;
	});
//==document ready end==
});


