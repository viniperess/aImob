window.onload = function(){
	var formulario = document.getElementById("cadastro")
	formulario.addEventListener("submit", validaFormulario)
	formulario.addEventListener("submit", validaSenha)
	formulario.cpf.addEventListener("keypress", validaCPF)
	formulario.cpf.addEventListener("keypress", mascaraCPF)	
	}
	
	
	function validaFormulario(event){ //validar se as lacunas foram preenchidas
	
		document.getElementById("campodiv").innerHTML = ''
	
		let formulario = document.getElementById("cadastro")
		const numElementos = formulario.elements.length
		let submeter=true
		for(let i=0; i < numElementos; i++){
			let controle = formulario.elements[i];
			
			if(controle.value==""){
				controle.style.border="2px solid red"
				submeter=false
				document.getElementById("campodiv").innerHTML += "Lacuna vazia: "+ controle.name +"<br>" // irá mostrar as lacunas que não foram preenchidas
			}
		}
	
		const tamanho = formulario.email.value.length
		let valida = 0;
		for(let i=0;i<tamanho;i++){
			if(formulario.email.value[i]=='@')
				valida++;
			if(formulario.email.value[i]=='.')
				valida++;
		}
			if(valida<2){
				submeter = false
				alert("Preencher Email Corretamente");
			}
		
			if(!submeter){
				alert('Preencher Campos Obrigatorios')
				event.preventDefault()
			}
	
	
	}
	
	
	function validaCPF (event){ //deixar o telefone e o cpf somente com numeros 
	
		console.log("ContaLetra")
		if(event.keyCode < 48 || event.keyCode > 57){
			event.preventDefault()
		}
			
	}
	
	
	function validaSenha (event){ // validar para senha ter de 6 a 9 digitos / confirmar senha para que ambas sejam exatamente iguais
	
		document.getElementById("campodiv").innerHTML = ""
		var senha = document.getElementById("senha").value
		var conf  = document.getElementById("conf").value
	
	
		if(senha !== conf){
			alert("Problemas com a confirmacao de senha")
				   event.preventDefault()
		}
	
		 if(senha.length<6){
			  alert("Senha deve ter entre 6 a 9 caracteres!")
					  event.preventDefault()
		 }
	
		 if(senha.length>9){
			alert("Senha deve ter entre 6 a 9 caracteres!")
					event.preventDefault()
	   }
	
	}
	function mascaraCPF(event){ // faz com que o CPF já tenha seu formato pré-estabelecido onde so falta indicar os números correspondentes
		 
		if(event.keyCode < 48 || event.keyCode > 57){
			event.preventDefault();
		}
		if(this.value.length == 3){
			this.value = this.value + ".";
		}
		if(this.value.length == 7){
			this.value = this.value + ".";
		}
			if(this.value.length == 11){
			this.value = this.value + "-";
		}
		if(this.value.length >= 14){
			event.preventDefault();
		}
	}