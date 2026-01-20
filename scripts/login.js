const logForm = document.getElementById("login_user_form")

const msgAlerta = document.getElementById("msgAlerta")

const permissaoAlerta = document.getElementById("msgAlertaPermissao")

logForm.addEventListener("submit", async (e) =>{
    //e.preventDefault();

    if(document.getElementById("login").value === ""){
        console.log("Erro: Necessário Preencher Campo Login!")
        msgAlerta.innerHTML = "</br><div class='alert alert-danger' role='alert'>Necessário Preencher o campo login!</div></br>"
        e.preventDefault();
    }else if(document.getElementById("senha").value === ""){
        console.log("Erro: Necessário Preencher Campo Senha!")
        msgAlerta.innerHTML = "</br><div class='alert alert-danger' role='alert'>Necessário Preencher o campo senha!</div></br>"
        e.preventDefault();
    }else{
        const dadosForm = new FormData(logForm)

        /*const dados = await fetch("../Privado/User_Controller.php?acao=login",{
            method: "POST",
            body: dadosForm
        })*/
       
        /*const resposta = await dados.json()
        console.log(resposta)

        if(resposta['erro']){
            msgAlerta.innerHTML = resposta['msg']
        }else{

            logForm.reset()

        }

        //window.location.assign("home.php")*/

    }

})

