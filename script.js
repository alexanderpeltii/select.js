var form = document.forms.booksForm;//обращ к форме

form.themes.addEventListener('change', sendForm.bind(null,'getCategory'));

function sendForm(action){
	req = new XMLHttpRequest();
	req.onreadystatechange = processChange.bind(null,action);
	req.open("POST","getData.php",true);
	var formData = new FormData(form);
	formData.append("action",action);
	req.send(formData);
};


function processChange(action){
	if(req.readyState==4){
		if(req.status==200){
			if(action=='getCategory'){
				
			var categories = JSON.parse(req.responseText);
			
			var delsel = document.getElementById('mySelect');
			//console.log(delsel);
			if( delsel !=null ){
			delsel.remove();
			}

			var deltab = document.getElementById('myTable');
			//console.log(deltab);
			if( deltab !=null ){
			deltab.remove();
			}

			var selectCat = document.createElement('select');
			selectCat.id = 'mySelect';
			selectCat.name = 'category';
			selectCat.addEventListener('change', sendForm.bind(null,'getBooks'));

			var opt = '<option>Выберети категорию</option>';
			for(var i=0; i<categories.length; i++){
			opt+='<option>'+categories[i]+'</option>';
			};
			selectCat.innerHTML=opt;
			form.appendChild(selectCat);
			}

			else {
			var books = JSON.parse(req.responseText);
			//console.log(books.length) ;
			var deltab = document.getElementById('myTable');
			//console.log(deltab);
			if( deltab !=null ){
			deltab.remove();
			}
			var tabbook = document.createElement('table');
			tabbook.name = 'books';
			tabbook.id = 'myTable';
			var str = '<table>';
			for(var i=0; i<books.length; i++)
			{	
				str+='<tr><td>'+ books[i]+'</td></tr>';
			}
			str+='</table>';
			tabbook.innerHTML=str;
			form.appendChild(tabbook);
			}
				
		}
	}
}