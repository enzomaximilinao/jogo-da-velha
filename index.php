<!doctype html>
<html lang="pt-br">
    <head>
         <title>Trabalho Bimestral - Jogo da Velha</title>
         <meta charset="utf-8"/>
         <style>
         	html, body {
			font-family: sans-serif;
		}

		body {
			max-width: 70em;
			margin: 2em auto;
		}

		main {
			text-align: center;
			font-size: 40px;
		}

		.cabecalho {
			background: #EEE;
			height: 80vh;
			position: relative;
		}

		.infoturno {
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
		}

		.formato{
			width:50px;
			height:50px;
			margin:0px;
			padding:0px;
			cursor:pointer;
			display:flex;
			justify-content:center;
			align-items:center;
			font-size:40px;
		}
        #velha{
        	position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
        	width:160px;
        	height:160px;
        	display:flex;
        	flex-wrap:wrap;
        	align-content:flex-start;
        }
        #qd-01{
        	border-right: 3px solid #FF0000;
        	border-bottom: 3px solid #FF0000;
        }
         #qd-02{
        	border-bottom: 3px solid #FF0000;
        }
         #qd-03{
        	border-left: 3px solid #FF0000;
        	border-bottom: 3px solid #FF0000;
        }
         #qd-04{
        	border-right: 3px solid #FF0000;
        	border-bottom: 3px solid #FF0000;
        }
         #qd-05{
        	border-bottom: 3px solid #FF0000;
        }
         #qd-06{
        	border-left: 3px solid #FF0000;
        	border-bottom: 3px solid #FF0000;
        }
         #qd-07{
        	border-right: 3px solid #FF0000;
        }
         #qd-09{
        	border-left: 3px solid #FF0000;
        }
         </style>
         <script>

         	var jogo=[];
         	var velha=[];
         	var turno=0;
         	var resultado;
         	var ativo=true;
         	var dificuldade=1;
         	var cpu=1;
         	var inicio=1;

         	function jogadacpu(){
         		if(ativo){
         			var l,c;
         			if(dificuldade==1){
         				do{
         					l=Math.round(Math.random()*2);
                            c=Math.round(Math.random()*2);
         				}while(jogo[l][c]!="");
         				jogo[l][c]="O";
         			}else if(dificuldade==2){

         			}
         			resultado=verResultado();
         			if(resultado!=""){
         				alert(resultado+ " ganhou!");
         				ativo=false;
         			}
         			attVelha();
         			turno=0;

         		}

         	}

         	function verResultado(){
         		var l,c;
         		for(l=0;l<3;l++){
         			if((jogo[l][0]==jogo[l][1])&&(jogo[l][1]==jogo[l][2])){
         				return jogo[l][0];
         			}
         		}

         		for(c=0;c<3;c++){
         			if((jogo[0][c]==jogo[1][c])&&(jogo[1][c]==jogo[2][c])){
         				return jogo[0][c];
         			}
         		}
         		if((jogo[0][0]==jogo[1][1])&&(jogo[1][1]==jogo[2][2])){
         				return jogo[0][0];
         			}
         		if((jogo[0][2]==jogo[1][1])&&(jogo[1][1]==jogo[2][0])){
         				return jogo[0][2];
         			}
         			return "";

         	}

         	function jogar(p){
         		if((ativo)&&(turno==0)){
         			switch(p){
         				case 1:
         				    if(jogo[0][0]==""){
         				    	jogo[0][0]="X";
                                turno=1;
         				    }
         				break;
         				case 2:
         				    if(jogo[0][1]==""){
         				    	jogo[0][1]="X";
                                turno=1;
         				    }
         				break;
         				case 3:
         				    if(jogo[0][2]==""){
         				    	jogo[0][2]="X";
                                turno=1;
         				    }
         				break;
         				case 4:
         				    if(jogo[1][0]==""){
         				    	jogo[1][0]="X";
                                turno=1;
         				    }
         				break;
         				case 5:
         				    if(jogo[1][1]==""){
         				    	jogo[1][1]="X";
                                turno=1;
         				    }
         				break;
         				case 6:
         				    if(jogo[1][2]==""){
         				    	jogo[1][2]="X";
                                turno=1;
         				    }
         				break;
         				case 7:
         				    if(jogo[2][0]==""){
         				    	jogo[2][0]="X";
                                turno=1;
         				    }
         				break;
         				case 8:
         				    if(jogo[2][1]==""){
         				    	jogo[2][1]="X";
                                turno=1;
         				    }
         				break;
         				case 9:
         				    if(jogo[2][2]==""){
         				    	jogo[2][2]="X";
                                turno=1;
         				    }
         				break;
         			}
         			if(turno==1){
         			    attVelha();
         			    resultado=verResultado();
         			    if(resultado!=""){
         				    alert(resultado+" ganhou!");
         				    ativo=false;
         				}
         				jogadacpu();    
         			}
         		}

         	}

         	function attVelha(){
         		for(var l=0;l<3;l++){
         			for(var c=0;c<3;c++){
         				if(jogo[l][c]=="X"){
         					velha[l][c].innerHTML="X";
         					velha[l][c].style.cursor="default";
         				}else if(jogo[l][c]=="O"){
         					velha[l][c].innerHTML="O";
         					velha[l][c].style.cursor="default";
         				}else{
         					velha[l][c].innerHTML="";
         					velha[l][c].style.cursor="pointer";

         				}
         			}
         		}
         	}
            function iniciar(){
                ativo=true;
                cpu=1;
                jogo=[
                      ["","",""],
                      ["","",""],
                      ["","",""]
                      ];
                velha=[
                [document.getElementById("qd-01"),document.getElementById("qd-02"),document.getElementById("qd-03")],
                [document.getElementById("qd-04"),document.getElementById("qd-05"),document.getElementById("qd-06")],
                [document.getElementById("qd-07"),document.getElementById("qd-08"),document.getElementById("qd-09")]];
                attVelha();
                

            }

            window.addEventListener("load",iniciar);
         </script>
    </head>
    <body>

    <main>	
         <div id="cabecalho">
         	<div id="infoturno">
         		<p>Vez do Jogador</p>
         		<img src="" border="0" height="50">
         	</div>
         	<button onclick="iniciar()">Tentar Novamente</button>
         </div>
         <div id="velha">
             <div id="qd-01" class="formato" onclick="jogar(1)"></div>
             <div id="qd-02" class="formato" onclick="jogar(2)"></div>
             <div id="qd-03" class="formato" onclick="jogar(3)"></div>
             <div id="qd-04" class="formato" onclick="jogar(4)"></div>
             <div id="qd-05" class="formato" onclick="jogar(5)"></div>
             <div id="qd-06" class="formato" onclick="jogar(6)"></div>
             <div id="qd-07" class="formato" onclick="jogar(7)"></div>
             <div id="qd-08" class="formato" onclick="jogar(8)"></div>
             <div id="qd-09" class="formato" onclick="jogar(9)"></div>
         </div>
    </main>
    </body>
</html>