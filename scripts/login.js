/*const logForm = document.getElementById("login_user_form")

const msgAlerta = document.getElementById("msgAlerta")

logForm.addEventListener("submit", async (e) =>{
    e.preventDefault();

    if(document.getElementById("email").value === ""){
        console.log("Erro: Necessário Preencher Campo Login!")
        msgAlerta.innerHTML = "<div class='alert alert-danger' role='alert'>Necessário Preencher o campo login!</div></br>"
    }else if(document.getElementById("senha").value === ""){
        console.log("Erro: Necessário Preencher Campo Senha!")
        msgAlerta.innerHTML = "<div class='alert alert-danger' role='alert'>Necessário Preencher o campo senha!</div></br>"
    }else{
        const dadosForm = new FormData(logForm)
        dadosForm.append("add", 1)
        console.log(dadosForm)


        const dados = await fetch("../User_Validation/User_Validation.php",{
            method: "POST",
            body: dadosForm
        })

        const resposta = await dados.json()
        console.log(resposta)

        if(reposta['erro']){
            msgAlerta.innerHTML = resposta['msg']
        }else{
            msgAlerta.innerHTML = resposta['msg']
        }

    }

})*/