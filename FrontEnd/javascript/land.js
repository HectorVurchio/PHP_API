import { EventAssigner } from './EventAssigner.js';
import { ApiQuery } from './ApiQuery.js';

let eventAss = new EventAssigner();
	
eventAss.windowLoad(()=>{cargadoPagina();});

function cargadoPagina(){
	const section = document.getElementsByTagName('section')[0];
	section.addEventListener('click',(e)=>{sectionclick(e);});
}

function sectionclick(e){
	const elemento = e.target;
	const elmID = elemento.id;
	switch(elmID){
		case `button-1`:
			buttonClick();
		break;
	}
}

function buttonClick(){
	const api = '/dbtesting'
	const respuesta = new ApiQuery(api,{}).GETrequest();
	respuesta.then(respuesta => {
		console.log(respuesta);
		const case2 = document.getElementById('case-2');
		case2.innerText = respuesta[0].date;
	});
}
