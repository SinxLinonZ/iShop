<template>
  <div id="page">
    <!-- <div>id: {{ id }}</div> -->

    <!-- main menu -->
    <div id="mainMenu">
      <div id="mainMenu-header">iShopセルフレジ</div>
      <div id="mainMenu-content">
        <div id="mainMenu-btn-priceCheck">
          <div class="custom-btn" id="btn-checkPrice">
            <div id="mainMenu-btn-priceCheck-idle">
              <img
                height="200"
                width="200"
                src="https://png.pngtree.com/png-clipart/20191120/original/pngtree-barcode-scanner-machine-glyph-icon-vector-png-image_5058438.jpg"
                alt="icon"
              />
              <p>価格照会</p>
            </div>
            <!-- Display item price -->
            <div
              class="priceCheck-group"
              id="priceCheck-group1"
              style="position: absolute; opacity: 0"
            >
              <p style="margin: 0.25em 0" class="priceCheck-itemName"></p>
              <p style="margin: 0.25em 0" class="priceCheck-price"></p>
            </div>
            <div
              class="priceCheck-group"
              id="priceCheck-group2"
              style="position: absolute; opacity: 0"
            >
              <p style="margin: 0.25em 0" class="priceCheck-itemName"></p>
              <p style="margin: 0.25em 0" class="priceCheck-price"></p>
            </div>
          </div>
          <p>商品をスキャンして値段照会</p>
          <p>Scan item to check price</p>
          <p>扫描商品查询价格</p>
        </div>
        <div id="mainMenu-btn-shopping">
          <div class="custom-btn" id="btn-shopping">
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

    <!-- shopping -->
    <div id="shopping" style="display: none">
      <div id="shopping-loader" style="display: none">
        <div class="ui active centered inline loader huge"></div>
      </div>

      <!-- shopping list -->
      <div id="shopping-main" style="display: none">
        <div id="shopping-content">
          <div id="shopping-list">
            <div class="shopping-list-item">
              <p>コカ・コーラ</p>
              <p style="text-align: end">1</p>
              <p style="text-align: end">x</p>
              <p style="text-align: end">￥100</p>
            </div>
          </div>
          <div id="shopping-sum">
            <div id="shopping-sum-discount">
              <div class="shopping-sum-discount-row">
                <p>サマーセール</p>
                <p style="text-align: end">1</p>
              </div>
              <div class="shopping-sum-discount-row">
                <p>サマーセール</p>
                <p style="text-align: end">1</p>
              </div>
            </div>
            <div id="shopping-sum-total">
              <p style="font-size: 0.8em; letter-spacing: 0.2em">支払い金額</p>
              <p style="font-size: 2.4em; font-weight: bolder">￥200</p>
            </div>
          </div>
        </div>

        <!-- pay view -->
        <div id="shopping-payment" style="display: none">
          <div style="width: 100%; height: 100%; display: grid; place-items: center">
            <div style="height: fit-content">
              <p style="text-align: center; margin-bottom: .8em">IDカードをスキャンしてお支払い確定</p>
              <p style="text-align: center; margin-bottom: .8em">Scan ID Card to confirm payment</p>
              <p style="text-align: center; margin-bottom: .8em">扫描ID卡确认付款</p>
            </div>
          </div>

          <div style="width: 100%; height: 100%; border-top: #d0d0d0 1px solid; border-bottom: #d0d0d0 1px solid">

          </div>
          <p id="msg-overdraft" style="text-align: end; margin-top: .5em; font-size: .8em">※ー￥500まで貸越できます</p>
        </div>

        <!-- side menu -->
        <div id="shopping-sideMenu">
          <p id="customer-name" style="margin: 0">
            {{ shopping.customer.name }}　様
          </p>

          <!-- shopping button group -->
          <div id="shopping-sideMenu-shoppingBtnGrp">
            <div class="custom-btn" id="btn-shopping-add">
              <img
                height="60"
                width="60"
                src="https://png.pngtree.com/png-clipart/20191120/original/pngtree-barcode-scanner-machine-glyph-icon-vector-png-image_5058438.jpg"
                alt="icon"
              />
              追加
            </div>
            <div class="custom-btn" id="btn-shopping-remove">
              <img
                height="60"
                width="60"
                src="https://png.pngtree.com/png-clipart/20191120/original/pngtree-barcode-scanner-machine-glyph-icon-vector-png-image_5058438.jpg"
                alt="icon"
              />
              削除
            </div>
          </div>

          <div id="shopping-sideMenu-checkoutBtnGrp">
            <div class="custom-btn" id="btn-shopping-checkout">
              <img
                height="60"
                width="60"
                src="https://png.pngtree.com/png-clipart/20191120/original/pngtree-barcode-scanner-machine-glyph-icon-vector-png-image_5058438.jpg"
                alt="icon"
              />
              チェックアウト
            </div>
          </div>

          <!-- payment button group -->
          <div id="payment-sideMenu-optBtnGrp" style="display: none">
            <div class="custom-btn" id="btn-payment-back">
              <img
                height="60"
                width="60"
                src="https://png.pngtree.com/png-clipart/20191120/original/pngtree-barcode-scanner-machine-glyph-icon-vector-png-image_5058438.jpg"
                alt="icon"
              />
              戻る
            </div>
            <div class="custom-btn" id="btn-payment-cancel" style="color: #CC0000">
              <img
                height="60"
                width="60"
                src="https://png.pngtree.com/png-clipart/20191120/original/pngtree-barcode-scanner-machine-glyph-icon-vector-png-image_5058438.jpg"
                alt="icon"
              />
              キャンセル
            </div>
          </div>
          <div id="payment-sideMenu-bottom" style="display: none">
            <p></p>
          </div>
        </div>
      </div>
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

.custom-btn {
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
 * Shopping
 */
#shopping {
  height: 100%;
  width: 100%;
}

#shopping-loader {
  height: 100%;
  width: 100%;
  position: absolute;
  display: grid;
  place-items: center;
  grid-template-rows: 100%;
  grid-template-columns: 100%;
}

#shopping-main {
  height: 100%;
  width: 100%;
  display: grid;
  grid-template-rows: auto;
  grid-template-columns: 70% 30%;
}

#shopping-content {
  padding: 3em 3em;
  font-size: 2em;
  font-weight: bold;
  display: grid;
  grid-template-rows: 80% 20%;
  grid-template-columns: auto;
}

.shopping-list-item {
  display: grid;
  grid-template-rows: auto;
  grid-template-columns: 60% 10% 10% 20%;
}
.shopping-list-item > p {
  margin-bottom: 0.5em;
}

#shopping-sum {
  height: 100%;
  width: 100%;
  padding: 0 0.2em;
  padding-top: 1em !important;
  border-top: #d0d0d0 1px solid;

  display: grid;
  grid-template-rows: auto;
  grid-template-columns: 75% 25%;
}

#shopping-sum-discount {
  font-weight: normal;
  font-size: 0.75em;
}

.shopping-sum-discount-row {
  display: grid;
  grid-template-rows: auto;
  grid-template-columns: 33% 20%;
}
.shopping-sum-discount-row > p {
  margin-bottom: 0.3em;
}

#shopping-sum-total {
  display: grid;
  grid-template-columns: auto;
  grid-template-rows: 30% 70%;
  align-items: center;
}
#shopping-sum-total > p {
  margin: 0;
  text-align: center;
}

#shopping-payment {
  padding: 3em 3em;
  font-size: 2em;
  font-weight: bold;
  display: grid;
  grid-template-rows: 35% 60% 5%;
  grid-template-columns: auto;
}

#shopping-sideMenu {
  background: #007131;
  border-top-left-radius: 50px;
  border-bottom-left-radius: 50px;
  text-align: center;
  color: #ffffff;
  padding: 1.5em 0;

  display: grid;
  grid-template-columns: auto;
  grid-template-rows: 15% 60% 25%;
  place-items: center;
}

#shopping-sideMenu > p {
  font-size: 3em;
  font-weight: bold;
}

#shopping-sideMenu-shoppingBtnGrp,
#payment-sideMenu-optBtnGrp {
  width: 100%;
  height: 100%;
  display: grid;
  place-items: center;
  grid-template-rows: 30% 30% 30%;
}
#shopping-sideMenu-checkoutBtnGrp {
  width: 100%;
  height: 100%;
  display: grid;
  place-items: center;
}

#shopping-sideMenu > * > .custom-btn {
  width: 60%;
  height: 130px;
  border-radius: 30px !important;
  padding: 0.4em 0;
  box-shadow: 5px 5px 5px #202020 !important;
}
</style>


<script>
export default {
  mounted() {
    /**
     * For debug
     */

    // setTimeout(() => {
    //   this.priceChecked("コカ・コーラ", "200");
    // }, 300);
    // setTimeout(() => {
    //   this.priceChecked("コーラ", "200");
    // }, 1300);
    // setTimeout(() => {
    //   this.priceChecked("ららぽーと", "500");
    // }, 5800);
    // setTimeout(() => {
    //   this.priceChecked("バカヤロ", "456");
    // }, 13000);
    // setTimeout(() => {
    //   this.priceChecked("コカ・コーラ", "200");
    // }, 14000);
    // setTimeout(() => {
    //   this.priceChecked("バカヤロ", "456");
    // }, 16000);
    // setTimeout(() => {
    //   this.shoppingPressed(1);
    // }, 18000);

    setTimeout(() => {
      this.shoppingPressed(2);
    }, 500);
    setTimeout(() => {
      this.checkOutPressed();
    }, 5000);
  },

  methods: {
    /**
     * utilities
     */
    toFull(str) {
      return str.replace(/[A-Za-z0-9]/g, function (s) {
        return String.fromCharCode(s.charCodeAt(0) + 0xfee0);
      });
    },

    buttonPressedFx(element) {
      let tl = anime.timeline({
        duration: 300,
      });
      tl.add({
        targets: [element],
        rotate: 15,
        scale: 1.2,
      })
        .add(
          {
            targets: [element],
            rotate: -5,
            scale: 1.1,
          },
          100
        )
        .add(
          {
            targets: [element],
            rotate: 0,
            scale: 1,
          },
          200
        );
    },

    /**
     * main menu
     */

    // check price triggered
    resetCheckPriceBtn() {
      this.checkPrice.priceTimer = null;

      // reset button view
      let tl = anime.timeline({
        easing: "easeOutExpo",
        duration: 600,
      });
      tl.add({
        targets: [".priceCheck-group"],
        opacity: 0,
      }).add(
        {
          targets: ["#mainMenu-btn-priceCheck-idle"],
          translateY: [-40, 0],
          opacity: 1,
        },
        100
      );
      // remove active flag
      setTimeout(() => {
        $(".priceCheck-group").removeClass("active");
      }, 600);
    },

    priceChecked(name, price) {
      if (this.checkPrice.priceTimer) {
        clearTimeout(this.checkPrice.priceTimer);

        $(".priceCheck-group:not(.active) > .priceCheck-itemName").text(name);
        $(".priceCheck-group:not(.active) > .priceCheck-price").text(
          "￥" + this.toFull(price)
        );
        let nowActive = $(".priceCheck-group.active");
        let nextActive = $(".priceCheck-group:not(.active)");
        nowActive.removeClass("active");
        nextActive.addClass("active");

        let tl = anime.timeline({
          easing: "easeOutExpo",
          duration: 600,
        });
        tl.add({
          targets: [".priceCheck-group:not(.active)"],
          opacity: 0,
        }).add(
          {
            targets: [".priceCheck-group.active"],
            translateY: [+40, 0],
            opacity: 1,
          },
          100
        );
      } else {
        $("#priceCheck-group1 > .priceCheck-itemName").text(name);
        $("#priceCheck-group1 > .priceCheck-price").text(
          "￥" + this.toFull(price)
        );
        $("#priceCheck-group1").addClass("active");

        let tl = anime.timeline({
          easing: "easeOutExpo",
          duration: 600,
        });
        tl.add({
          targets: ["#mainMenu-btn-priceCheck-idle"],
          opacity: 0,
        }).add(
          {
            targets: ["#priceCheck-group1"],
            translateY: [+40, 0],
            opacity: 1,
          },
          100
        );
      }

      this.checkPrice.priceTimer = setTimeout(() => {
        this.resetCheckPriceBtn();
      }, 5000);
    },

    // shopping triggered, start shopping
    shoppingPressed(id) {
      let self = this;

      // button pressed fx
      this.buttonPressedFx("#btn-shopping");

      // main menu quit fx
      setTimeout(() => {
        anime({
          targets: "#mainMenu-content",
          duration: 600,
          easing: "easeInOutCubic",
          opacity: 0,
        });
        anime({
          targets: "#mainMenu-header",
          duration: 600,
          easing: "easeInOutCubic",
          opacity: 0,
          translateY: -100,
        });
      }, 350);

      // hide main menu and reset components position
      // display shopping view
      setTimeout(() => {
        $("#mainMenu").hide();
        anime({
          targets: "#mainMenu-content",
          duration: 1,
          opacity: 1,
        });
        anime({
          targets: "#mainMenu-header",
          duration: 1,
          opacity: 100,
          translateY: 0,
        });

        $("#shopping-loader").show();
        $("#shopping").fadeIn();
      }, 800);

      // get user info
      setTimeout(() => {
        $.ajax({
          type: "POST",
          dataType: "json",
          url: `/api/user/${id}`,
          data: {
            api_token: this.api_token,
          },
        })
          .done(function (res) {
            self.shopping.customer = res;
            self.shoppingStart();
          })
          .fail(function () {
            console.log("err");
          });
        // .always(function () {});
      }, 810);
    },

    /**
     * shopping
     */
    resetCustomer() {
      this.shopping = {
        customer: {
          name: null,
        },
        items: [],
      };
    },

    shoppingStart() {
      // hide loader
      $("#shopping-loader").fadeOut(200);

      // show shopping main view
      setTimeout(() => {
        $("#shopping-main").show();

        // shopping view intro fx
        let tl = anime.timeline({
          easing: "easeOutExpo",
          duration: 1500,
        });
        tl.add({
          targets: "#shopping-sideMenu",
          translateX: [400, 0],
        })
          .add(
            {
              targets: [
                "#customer-name",
                "#shopping-sideMenu-shoppingBtnGrp > .custom-btn",
                "#shopping-sideMenu-checkoutBtnGrp",
              ],
              translateY: [60, 0],
              opacity: [0, 1],
              delay: anime.stagger(100),
            },
            500
          )
          .add(
            {
              targets: ["#shopping-sum"],
              translateX: [-100, 0],
              opacity: [0, 1],
            },
            500
          );
      }, 200);
    },

    // check out
    checkOutPressed() {
      // Button pressed fx
      this.buttonPressedFx("#btn-shopping-checkout");

      // View switchment
      // Shopping list view quit fx
      setTimeout(() => {
        anime({
          easing: "easeOutExpo",
          duration: 800,
          targets: ["#shopping-content"],
          translateX: -100,
          opacity: 0,
        });
        anime({
          easing: "easeOutExpo",
          duration: 800,
          targets: [
            "#shopping-sideMenu-shoppingBtnGrp",
            "#shopping-sideMenu-checkoutBtnGrp",
          ],
          translateY: 100,
          opacity: 0,
        });
      }, 350);

      // Payment view intro fx
      setTimeout(() => {
        $("#shopping-content").hide();
        $("#shopping-sideMenu-shoppingBtnGrp").hide();
        $("#shopping-sideMenu-checkoutBtnGrp").hide();
        $("#shopping-payment").show();
        $("#payment-sideMenu-optBtnGrp").show();
        $("#payment-sideMenu-bottom").show();

        anime({
          easing: "easeOutExpo",
          duration: 800,
          targets: ["#shopping-payment"],
          translateX: [-100, 0],
          opacity: [0, 1],
        });
        anime({
          easing: "easeOutExpo",
          duration: 800,
          targets: [
            "#payment-sideMenu-optBtnGrp > *",
            "#payment-sideMenu-bottom",
          ],
          translateY: [60, 0],
          opacity: [0, 1],
          delay: anime.stagger(100),
        });
      }, 1150);

    },
  },

  data: function () {
    return {
      checkPrice: { priceTimer: null },
      shopping: {
        customer: {
          name: null,
        },
        items: [],
      },
    };
  },

  props: ["id", "api_token"],
};
</script>

