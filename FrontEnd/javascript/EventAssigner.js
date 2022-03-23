class EventAssigner{
	constructor(){}
	
	windowLoad(method){
		window.addEventListener('load',method,false);
	}
}

export {EventAssigner}