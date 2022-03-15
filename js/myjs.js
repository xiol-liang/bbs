var form1=document.querySelector("#form1");
var form2=document.querySelector("#form2")
var text=document.querySelector("#text")
var btn=document.querySelector("#btn")

// var type1="";
// var type2="";
// var areas="";
function linkage(form1,form2,text,btn,data){
	for(var i=0;i<data.type1.length;i++){
		var opc=document.createElement("option");
		opc.innerHTML=data.type1[i].title;
		opc.value=data.type1[i].name;
		form1.appendChild(opc);	
	}
	
	form1.onchange=function(){
		
		form2.innerHTML=" <option>标题</option>"
	
		
		for(var j=0;j<data.type2[this.value].length;j++){
			var opc1=document.createElement("option");
			opc1.innerHTML=data.type2[this.value][j].title;
			opc1.value=data.type2[this.value][j].name;
			
			
			form2.appendChild(opc1)
			
	
		}

		

	}
	
	
	
}

linkage(form1,form2,text,btn,data);





