const itensProd = document.querySelectorAll(".prod");

const produtos = [
    {
        id: 1,
        nome: "500 Dias com Ela",
        preco: "R$3,00",
        descricao: "ele vai la e quer ficar com ela e ela ouve the smiths e ai ele gosta dela e ai ela sai com ele ai ele fica feliz por um tempo dai ela nao quer mais ai ele fica triste ai ela casa ai ele fica triste ai ele fica de boa e vai procurar emprego sei la",
        categoria: "romance",
        img: "recursos/500dias.jpg"
    },
    {
        id: 2,
        nome: "Clube da Luta",
        preco: "R$3,00",
        descricao: "o cara vai la e cria um culto de personalidade baseado em se estapear ai na vdd ele era o outro cara o tempo todo :00 e eh uma crítica ao consumismo eu acho",
        categoria: "ação",
        img: "recursos/clubeluta.jpg"
    },
    {
        id: 3,
        nome: "Ela",
        preco: "R$3,00",
        descricao: "o cara se apaixona por um computador kkkkk e ainda é corneado",
        categoria: "romance",
        img: "recursos/her.jpg"
    }
]


inicializarHome = () => {
    var containerProdutos = document.getElementById('produto');
    produtos.map((val) => {
        containerProdutos.innerHTML += `
        <article id="produto" class="secao-p1">
            <div class="prodcaixa">
    
                <div class="prod">
                
                <img id="poster" src="`+ val.img + `">
                <div class="descricao">
                    <span>`+ val.categoria + `</span>
                    <h5>`+ val.nome + `</h5>
                    <h4>`+ val.preco + `</h4>
                </div>
                    <a href="#"><img src="recursos/carrinho.png" alt="carrinho de compras" width="20px" height="20px"></a>
                </div>
            </div>
        </article> 
        `;
    })
}



/*let produtoEscolhido = produtos[0];

const produtoImgAtual = document.querySelector(".imagemprod");
const produtoNomeAtual = document.querySelector(".nome");
const produtoDescricaoAtual = document.querySelector(".descricao");
const produtoCategoriaAtual = document.querySelector(".categoria");

itensProd.forEach((item, index) => {
    item.addEventListener("click", () => {
      //muda o produto escolhido
    produtoEscolhido = produtos[index];
      //muda os textos do produto no display
    produtoNomeAtual.textContent = produtoEscolhido.nome;
    produtoPrecoAtual.textContent = produtoEscolhido.preco;
    produtoImgAtual.src = produtoEscolhido.img;
  
    });
  });*/