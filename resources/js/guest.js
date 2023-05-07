const togglePassword = document.querySelectorAll('.togglePassword');
       const password = document.querySelectorAll('.input-password');

       for (let i = 0; i < togglePassword.length; i++){
            togglePassword[i].addEventListener("click" , () => {
                for(let j = 0; j < password.length; j++){
                    if(i === j){
                        const type = password[j].getAttribute("type") === "password" ? "text" : "password";
                        password[j].setAttribute("type", type);
                        // toggle the eye icon 
                        togglePassword[i].classList.toggle('bi-eye-slash');
                        togglePassword[i].classList.toggle('bi-eye');
                    }
                }
            })
       };
       // show icon hide/unhide password 
       for(let i = 0 ; i < password.length; i++){
            password[i].addEventListener("click" , function(){
                for(let j = 0; j < togglePassword.length; j++){
                    if( i === j){
                        togglePassword[j].classList.remove('invisible');
                        togglePassword[j].classList.add('visible');
                    }             
                }
            })
        };