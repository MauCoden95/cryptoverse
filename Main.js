var swiper = new Swiper(".mySwiper", {
  slidesPerView: 3,
  spaceBetween: 30,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
},
});


let userBtn = document.querySelector('.user_btn');
var div = document.querySelector('.hiddenContent');

if (userBtn) {
    userBtn.addEventListener('click', () => {
      div.classList.toggle('form-admin-invisible');
    });
}





let stars = document.querySelector('.stars');
let range = document.querySelector('.range');

if (range) {
    range.addEventListener('change', () => {
        if (range.value == 1) {
            stars.innerHTML = '<i class="lni lni-star-fill"></i>';     
        }else if (range.value == 2) {
            stars.innerHTML = '<i class="lni lni-star-fill"></i>'+'<i class="lni lni-star-fill"></i>';     
        }else if (range.value == 3) {
            stars.innerHTML = '<i class="lni lni-star-fill"></i>'+'<i class="lni lni-star-fill"></i>'+'<i class="lni lni-star-fill"></i>';     
        }else if (range.value == 4) {
            stars.innerHTML = '<i class="lni lni-star-fill"></i>'+'<i class="lni lni-star-fill"></i>'+'<i class="lni lni-star-fill"></i>'+'<i class="lni lni-star-fill"></i>';     
        }else{
            stars.innerHTML = '<i class="lni lni-star-fill"></i>'+'<i class="lni lni-star-fill"></i>'+'<i class="lni lni-star-fill"></i>'+'<i class="lni lni-star-fill"></i>'+'<i class="lni lni-star-fill"></i>';     
        }
       
    })    
}




let btnMenu = document.querySelector('.btn_menu');
let navbar = document.querySelector('.nav');
const screen = window.matchMedia("(max-width: 760px)").matches;


 if (screen) {
    navbar.classList.add("hide");
  } else {
    navbar.classList.remove("hide");
  }

if (btnMenu) {
    btnMenu.addEventListener('click', () => {
        navbar.classList.toggle("hide");
        
    });    
}



/*PRICE CRYPTO*/
const API_URL = "https://min-api.cryptocompare.com/data/pricemulti?fsyms=BTC,ETH,LTC,ADA&tsyms=ARS,USD";
let priceBtcArs = document.querySelector('.price_btc--ars');
let priceEthArs = document.querySelector('.price_eth--ars');
let priceLtcArs = document.querySelector('.price_ltc--ars');
let priceAdaArs = document.querySelector('.price_ada--ars');

let btnPrice = document.querySelector('.btn_price');

let totalPriceBtcARS = 0;
let totalPriceEthARS = 0;
let totalPriceLtcARS = 0;
let totalPriceAdaARS = 0;

let btcArs = 0;
let ethArs = 0;
let ltcArs = 0;
let adaArs = 0;

let iptCalcBtc = document.querySelector('.input_calc_btc');
let iptCalcEth = document.querySelector('.input_calc_eth');
let iptCalcLtc = document.querySelector('.input_calc_ltc');
let iptCalcAda = document.querySelector('.input_calc_ada');


fetch(`${API_URL}`)
    .then((response) => response.json())
    .then((cryptos) => {
        btcArs = cryptos.BTC.ARS;    
        ethArs = cryptos.ETH.ARS;
        ltcArs = cryptos.LTC.ARS;
        adaArs = cryptos.ADA.ARS;

        if (priceBtcArs) {
            priceBtcArs.innerHTML = btcArs;
        }

        if (priceEthArs) {
            priceEthArs.innerHTML = ethArs;
        }
        
        if (priceLtcArs) {
            priceLtcArs.innerHTML = ltcArs;
        }

        if (priceAdaArs) {
            priceAdaArs.innerHTML = adaArs;
        }

        
        

        console.log(cryptos.ETH.ARS);
        console.log(cryptos.LTC.ARS);
    })







btnPrice.addEventListener("click", function(event) {
    event.preventDefault();
  
    let quantity = parseFloat(document.querySelector('.input_quantity').value);
    totalPriceBtcARS = quantity / btcArs;
    totalPriceEthARS = quantity / ethArs;
    totalPriceLtcARS = quantity / ltcArs;
    totalPriceAdaARS = quantity / adaArs;
    //console.log(totalPriceARS);

    if (iptCalcBtc) {
        iptCalcBtc.value = totalPriceBtcARS.toFixed(8);    
    }

    if (iptCalcEth) {
        iptCalcEth.value = totalPriceEthARS.toFixed(8);    
    }
    
    
    if (iptCalcLtc) {
        iptCalcLtc.value = totalPriceLtcARS.toFixed(8);    
    }

    if (iptCalcAda) {
        iptCalcAda.value = totalPriceAdaARS.toFixed(8);    
    }
    
    

});