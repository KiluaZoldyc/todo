class Hello extends React.Component {
	constructor(){
		super();
		this.state = {
			time: 0,
		}
	}

	increment(){
		this.setState({time : this.state.time+ 1})
	}

	render() {
		return (<div>
			<h1>time : {this.state.time}</h1>
			<button onClick={this.increment.bind(this)}>+</button>
			<Timer />
			</div>);
	}
}
class Timer extends React.Component {
	render(){
		return <div className="timer">{
			this.props.time
		}</div>
	}
}

ReactDOM.render(
	<Hello />,
	document.querySelector("#app")
	)




