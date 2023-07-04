const itensProd = document.querySelectorAll(".prod");

const produtos = [
    {
        id: 1,
        nome: "500 Dias com Ela",
        preco: "R$3,00",
        descricao: "ele vai la e quer ficar com ela e ela ouve the smiths e ai ele gosta dela e ai ela sai com ele ai ele fica feliz por um tempo dai ela nao quer mais ai ele fica triste ai ela casa ai ele fica triste ai ele fica de boa e vai procurar emprego sei la",
        categoria: "romance",
        img: "recursos/500dias.jpg",
        quantidade: 0
    },
    {
        id: 2,
        nome: "Clube da Luta",
        preco: "R$3,00",
        descricao: "o cara vai la e cria um culto de personalidade baseado em se estapear ai na vdd ele era o outro cara o tempo todo :00 e eh uma crítica ao consumismo eu acho",
        categoria: "ação",
        img: "recursos/clubeluta.jpg",
        quantidade: 0
    },
    {
        id: 3,
        nome: "Ela",
        preco: "R$3,00",
        descricao: "o cara se apaixona por um computador kkkkk e ainda é corneado",
        categoria: "romance",
        img: "recursos/her.jpg",
        quantidade: 0
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

atualizarCarrinho = () => {
    var containerCarrinho = document.getElementById('carrinho');
    containerCarrinho.innerHTML = "";
    produtos.map((val) => {
        if(val.quantidade > 0){
            containerCarrinho.innerHTML += `
            <div class="info-single-checkout">
                <p style="float:left">Produto: `+val.nome+`</p>
                <p style="float:right">Quantidade: `+val.quantidade+`</p>
                <div style="clear:both"></div>
            </div>
            `
        }
    })
}

var botao = document.getElementById('botaocarrinho');

for(var i = 0; i < botao.lenght; i++){
    botao[i].addEventListener("click", function(){
        let key = this.getAttribute('key');
        produtos[key].quantidade++;
        atualizarCarrinho();
        return false;
    })
}