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
    <div id="shopping"></div>
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
</style>


<script>
export default {
  mounted() {
    /**
     * For debug
     */

    setTimeout(() => {
      this.priceChecked("コカ・コーラ", "200");
    }, 300);
    setTimeout(() => {
      this.priceChecked("コーラ", "200");
    }, 1300);
    setTimeout(() => {
      this.priceChecked("ららぽーと", "500");
    }, 5800);
    setTimeout(() => {
      this.priceChecked("バカヤロ", "456");
    }, 13000);
    setTimeout(() => {
      this.priceChecked("コカ・コーラ", "200");
    }, 14000);
    setTimeout(() => {
      this.priceChecked("バカヤロ", "456");
    }, 16000);
    setTimeout(() => {
      this.shopping(1);
    }, 18000);
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
          opacity: 100,
        },
        300
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
            opacity: 100,
          },
          300
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
            opacity: 100,
          },
          300
        );
      }

      this.checkPrice.priceTimer = setTimeout(() => {
        this.resetCheckPriceBtn();
      }, 5000);
    },

    // shopping triggered
    shopping(id) {
      // button pressed fx
      let tl = anime.timeline({
        duration: 300,
      });
      tl.add({
        targets: ["#btn-shopping"],
        rotate: 15,
        scale: 1.2,
      })
        .add(
          {
            targets: ["#btn-shopping"],
            rotate: -5,
            scale: 1.1,
          },
          100
        )
        .add(
          {
            targets: ["#btn-shopping"],
            rotate: 0,
            scale: 1,
          },
          200
        );

      // main menu quit fx
      setTimeout(() => {
        anime({
          targets: "#mainMenu-content",
          duration: 300,
          easing: "easeInOutCubic",
          opacity: 0,
        });
        anime({
          targets: "#mainMenu-header",
          duration: 300,
          easing: "easeInOutCubic",
          opacity: 0,
          translateY: -100,
        });
      }, 350);

      // hide main menu and reset components position
      setTimeout(() => {
        $("#mainMenu").hide();
        anime({
          targets: "#mainMenu-content",
          duration: 1,
          opacity: 100,
        });
        anime({
          targets: "#mainMenu-header",
          duration: 1,
          opacity: 100,
          translateY: 0,
        });
      }, 700);

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
            console.log("success");
            console.log(res);
          })
          .fail(function () {
            console.log("err");
          })
          .always(function () {
            console.log("complete");
          });
      }, 700);
    },
  },

  data: function () {
    return {
      checkPrice: { priceTimer: null },
    };
  },

  props: ["id", "api_token"],
};
</script>

