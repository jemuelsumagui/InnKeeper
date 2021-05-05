// JavaScript Document

function screenDimension(innerid) {
	var w = window,
    d = document,
    e = d.documentElement,
    g = d.getElementsByTagName('body')[0];


	console.log('-------------------------------------------------');
	console.log('screen.avail_W*H =' + window.screen.availWidth + '*' + window.screen.availHeight);
	console.log('screen._W*H =' + window.screen.width + '*' + window.screen.height);
	console.log('devicePixelRatio =' + window.devicePixelRatio);
	console.log('screen.inner_W*H =' + window.innerWidth + '*' + window.innerHeight);
	console.log('document.documentElement_W*H =' + e.clientWidth + '*' + e.clientHeight);
	console.log('document.body_W*H =' + g.clientWidth + '*' + g.clientHeight);

}

function conferma(element) {
	console.log('href -> ' + element.href);
	
	var domanda = confirm("Sei sicuro di voler cancellare?");

	if (domanda === true) {
		loc = element.href + '?par=val';
		location.href = loc;
	}else{
		alert('Operazione annullata');
	}

}