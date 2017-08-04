import React from 'react';
import ReactDOM from 'react-dom';
import $ from 'jquery';
// Ajout de tâches on click
class App extends React.Component {
	constructor() {
		super();
		this.state = {
			tasks : [
			{id:1, title: "Sortir les poubelles"},
			{id:2, title: "Faire le lave vaiselle"},
			{id:3, title: "Preparer le repas"},
			]
		};
	}
	addTask(){
		let tasks = this.state.tasks;
		tasks.push({id: +new Date(), title:"Dormir"});
		this.setState({tasks})
	};
	
	render() {
		return (
			<div class="titre">
			<h1 class="titre">ON CLICK :</h1>
			<Todo tasks={this.state.tasks} />
			<button onClick={this.addTask.bind(this)}>Ajouter Tache</button>
			</div>
			);
	}
}
class Todo extends React.Component {
	render(){
		let tasks = this.props.tasks.map((task)=>{
			return <li key={task.id}>{task.title}</li>;
		});
		return(
			<ul>
			{tasks}
			</ul>
			)
	}
}
ReactDOM.render(
	<App />,
	document.querySelector('#app2')
	);

 // le judgmental 50% de chance d'afficher le résultat :
 const judgmental = Math.random() < 0.5;

 const favTaches = (
 	<div>
 	<h1>Lucky Stats :</h1>
 	<ul>
 	<li>Es tu</li>
 	<li>Chanceux ??</li>
 	{!judgmental && <li>Tu es chanceux ^^</li>}
 	</ul>
 	</div>
 	);

 ReactDOM.render(
 	favTaches, 
 	document.getElementById('app')
 	);

//Affichage de la liste en AJAX :

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
		return false;
	});
//==document ready end==
});

// Le .map JSX :

const tasks = ["Le .map en JSX", "Generer dans une ul ^^"];
const tasksListe = tasks.map(tasks =>
	<li>{tasks}</li>
	);
	ReactDOM.render(
		<ul>{tasksListe}</ul>,
		document.getElementById('app3')
		);

		