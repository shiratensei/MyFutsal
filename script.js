var activecell;

function editEntry(id){
	activecell = document.getElementById(id);
	var editor = document.getElementById('editor');
	var editor2 = document.getElementById('editor2');
	editor2.style.display = 'none';
	editor.style.display = 'block';           // Show
	return;
}

function deleteEntry(){
	activecell.innerHTML = "-";
	var editor = document.getElementById('editor');
	editor.style.display = 'none';          // Hide
	return;
}

function editEvent(){
	var editor = document.getElementById('editor');
	var editor2 = document.getElementById('editor2');
	editor.style.display = 'none';          // Hide
	editor2.style.display = 'block';
	var inputText = document.getElementById('agenda');
	inputText.value = activecell.innerHTML;	
	return;
}

function addEvent(){
	var inputText = document.getElementById('agenda');
	activecell.innerHTML = inputText.value;
	editor2.style.display = 'none';
	return;
}

function setEntry(){
	var front = 1;
	var back = 1;
	var arg;
	for(var i = 1; i <= 42; i++){		
		activecell = document.getElementById('a'+i);
		if(back % 7 != 0){
			arg = parseFloat(front + '.' + back);
			activecell.value = getEntry(arg);
			//console.log(arg);
			back += 1;
		}
		else{
			back = 1;
			front += 1;
			arg = parseFloat(front + '.' + back);
			activecell.value = getEntry(arg);
			//console.log(arg);
			back += 1;						
		}
	}
	return;
}

function getEntry(id){
	var active = document.getElementById(id);
	console.log(active.innerHTML);
	return active.innerHTML;	
}