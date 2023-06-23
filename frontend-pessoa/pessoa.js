//URL base da API de dados da pessoa
const URL = "http://localhost/CC3DeCria/api";

/* 
Função getAll()
Objetivo: Fazer uma requisição HTTP para obter
uma lista de pessoas em JSON e, posteriormente,
atualizar a tabela HTML.
*/
function getAll() {
    //Cliente HTTP faz a requisição para a API
    fetch(`${URL}/pessoa/Get.php`)
        .then(res => res.json())//Convertemos JSON em OBJ
        .then(
            data => {
                console.log(data);
                    
                data.forEach(pessoa => {
                    addTableRow(pessoa);
                });

            });
}

/* 
Fução: addTableRow
objetivo: adicionar uma linha na tabela HTML
*/

function addTableRow(pessoa) {
    const table = document.getElementById('tbpessoa');

    const tr = document.createElement('tr');
    //primeira celula da tabela
    const td1 = document.createElement('td');
    td1.innerHTML = pessoa.id;

    const td2 = document.createElement('td');
    td2.innerHTML = pessoa.nome;

    const td3 = document.createElement('td');
    td3.innerHTML = pessoa.email;

    const td4 = document.createElement('td');
    td4.innerHTML = pessoa.nascimento;

    const td5 = document.createElement('td');

    const btRemove = document.createElement('button');
    btRemove.innerHTML = "Excluir";
    btRemove.onclick = () => {
        //alert("Remover" + pessoa.nome);
        deletePessoa(tr,pessoa.id);
    };

    td5.appendChild(btRemove);

    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);
    tr.appendChild(td4);
    tr.appendChild(td5);

    table.tBodies[0].appendChild(tr);

}

/**
 * Objetivo: Deletar uma pessoa na API e remover a linha da tabela
 */
function deletePessoa(tr, id){
    console.log("Deletando o ID", id);

    fetch(`${URL}/pessoa/delete.php?id=${id}`)
    .then(res => {
        console.log(res);
        if(res.status == 200)
        tr.remove();
        else
        alert("Falha ao remover pessoa " + id);
    })
    .catch( err => {
        console.log(err);
    })
}

/**
 * Função: save
 * Objetivo: Invocar a API passando os dados do
 * formulario (nome, email, nascimento...)
*/
function save (){
    //Obter a referncia para os campos input
    const nome = document.getElementById('fNome');
    const email = document.getElementById('fEmail');
    const nascimento = document.getElementById('fNascimento');

    //Criar o objeto representando uma pessoa, contendo os valores do input
    const pessoa = {
        nome: fNome.value,
        email: fEmail.value,
        nascimento: fNascimento.value
    };

    console.log(pessoa);

    //Invocar a API
    fetch(`${URL}/pessoa/create.php`,{
        body: JSON.stringify(pessoa),
        method: "POST",
        headers: {
            
            "Content-type": "application/json",
        },

    }).then((res) => {
        if (res.status == 200 || res.status == 201) {
            alert("Salvo com sucesso!");
            
            res.json().then(pes => (addTableRow(pes)));
             
        }else alert("Falha ao salvar");
    });
}

//Invocando a função para obter a lista de pessoas e atualizar a tabela
getAll();