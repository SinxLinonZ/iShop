<template>
  <div id="page">
    <!-- <div>id: {{ id }}</div> -->

    <!-- main menu -->
    <div id="mainMenu">
      <div id="mainMenu-header">iShopセルフレジ</div>
      <div id="mainMenu-content">
        <div id="mainMenu-btn-priceCheck">
          <div class="btn" id="btn-checkPrice">
            <img
              height="200"
              width="200"
              src="https://png.pngtree.com/png-clipart/20191120/original/pngtree-barcode-scanner-machine-glyph-icon-vector-png-image_5058438.jpg"
              alt="icon"
            />
            <p>価格照会</p>
          </div>
          <p>商品をスキャンして値段照会</p>
          <p>Scan item to check price</p>
          <p>扫描商品查询价格</p>



        </div>
        <div id="mainMenu-btn-shopping">
          <div class="btn" id="btn-shopping">
            <img
              height="200"
              width="200"
              src="https://png.pngtree.com/png-clipart/20191120/original/pngtree-barcode-scanner-machine-glyph-icon-vector-png-image_5058438.jpg"
              alt="icon"
            />
            <p>お買い物</p>
          </div>
          <p>IDカードをスキャンしてお買い物</p>
          <p>Scan ID Card to shopping</p>
          <p>扫描ID卡开始购物</p>
        </div>
      </div>
    </div>

    <!-- check price -->
    <div id="checkPrice" style="display: none">
      <div id="checkPrice-title">価格照会</div>
      <div id="checkPrice-itemName">コカ・コーラ</div>
      <div id="checkPrice-price">￥２００</div>
    </div>

    <!-- shopping -->
    <div id="shopping">

    </div>


  </div>
</template>


<style>
/**
 * Global
 */
#page {
  height: 100vh;
  width: 100vw;
  background: #f1efeb;
  color: #202020;
  overflow: hidden;
}

.btn {
  display: grid;
  place-items: center;
  border-radius: 40px;
  box-shadow: 5px 5px 5px #808080;
  background: #ffffff;
  color: #007131;
  text-align: center;
  font-size: 2em;
  font-weight: bold;
  margin: 1em 1em;
}

/**
 * Main Menu
 */
#mainMenu {
  height: 100%;
  width: 100%;
  display: grid;
  grid-template-columns: auto;
  grid-template-rows: 10% 90%;
  text-align: center;
}

#mainMenu > * > * > p {
  font-weight: bold;
  font-size: 1.8em;
}

#mainMenu-header {
  background: #007131;
  color: #ffffff;
  display: grid;
  place-items: center;
  border-bottom-left-radius: 40px;
  border-bottom-right-radius: 40px;
  font-size: 3em;
}

#mainMenu-content {
  height: 100%;
  width: 100%;
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-template-rows: auto;
  place-items: center;
}

#btn-checkPrice,
#btn-shopping {
  height: 300px;
  width: 300px;
  border-radius: 60px !important;
  margin-bottom: 2em !important;
}


/**
 * Check plprice
 */
#checkPrice {
  position: fixed;
  top: 0;
  left: 0;
  height: 80%;
  width: 80%;

  margin: 10% 10%;
  padding: 2em 0;

  background: #ffffff;
  border-radius: 50px;
  box-shadow: 5px 5px 50px #808080;

  display: grid;
  /* place-content: center; */
  grid-template-rows: 10% 70% 20%;
  grid-template-columns: auto;

  font-weight: bold;
}

#checkPrice-title {
  text-align: center;
  font-size: 2em;
  border-bottom: 1px solid #202020;
}
#checkPrice-itemName {
  display: grid;
  place-items: center;

  text-align: center;
  font-size: 1.6em;
}
#checkPrice-price {
  border-top: 1px solid #202020;
  padding: 0 5%;

  font-size: 3em;
  line-height: 3em;
  text-align: end;
}
</style>


<script>
export default {
  props: ["id"],

  mounted() {},

  methods: {
    test: () => {},
  },

  data: function () {
    return {
      asd: 0,
    };
  },
};
</script>

