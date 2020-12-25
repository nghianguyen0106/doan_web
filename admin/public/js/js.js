var in_user = document.getElementById("in-user");
var i_user = document.getElementById("fa-user");
var in_key = document.getElementById("in-key");
var i_key = document.getElementById("fa-key");



in_user.onclick=()=>{
		i_user.style.fontSize="20px";
		i_user.style.marginTop="10px";
		i_user.style.transform = 'translateX(-2px)';
		i_user.style.transition ="0.1s";

	}
	in_user.onblur=()=>{
	
		i_user.style.fontSize="25px";
		i_user.style.marginTop="5px";
		i_user.style.transition ="0.1s";
	}

	in_key.onclick=()=>{
		i_key.style.fontSize="20px";
		i_key.style.marginTop="10px";
		i_key.style.transform = 'translateX(-2px)';
		i_key.style.transition ="0.1s";

	}
	in_key.onblur=()=>{
	
		i_key.style.fontSize="25px";
		i_key.style.marginTop="5px";
		i_key.style.transition ="0.1s";
	}
	
