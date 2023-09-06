const iconBar = document.querySelector(".fa-bars");
const menu = document.querySelector(".menu-menu-extended-container");

iconBar.addEventListener("click", () => {
  menu.classList.toggle("show");
});

document.addEventListener("click", function (event) {
  if (!menu.contains(event.target) && event.target !== iconBar) {
    menu.classList.remove("show");
  }
});

// const fter = document.querySelector("#ambious-footer");
// const img = document.querySelector(".img-banner");

// let height = 0;
// if (img) {
//   height = img.clientHeight;
//   fter.style.marginTop = height - 100 + "px";
// }
// // fter.style.marginTop = height + 100 + "px";

const acc = document.querySelector("#menu-item-32");
const acc1 = document.querySelector("#menu-item-262");
const close_btn = document.querySelector(".fa-circle-xmark");
const menu_right = document.querySelector(".menu-right");
const sign = document.querySelector(".sign-up");
const submit = document.querySelector("#submit_btn");
const popup = document.querySelector(".popup");
submit.addEventListener("click", () => {
  sign.classList.add("hide");
  popup.classList.add("show");
});

acc.addEventListener("click", () => {
  menu_right.classList.add("show");
});
acc1.addEventListener("click", () => {
  menu_right.classList.add("show");
});

close_btn.addEventListener("click", () => {
  menu_right.classList.remove("show");
});

const search = document.querySelector("#menu-item-31");
const search1 = document.querySelector("#menu-item-261");
// console.log(search1);

const search_form = document.querySelector(".search-form");
const search_form1 = document.querySelector(".search-mobile .search-form");
// console.log(search_form1);

search.addEventListener("click", show_search);
search1.addEventListener("click", show_search1);

function show_search() {
  search_form.classList.toggle("show");
}
function show_search1() {
  search_form1.classList.toggle("show");
}

const b = document.querySelector(
  "li.menu-item.menu-item-type-custom.menu-item-object-custom.menu-item-31"
);
// console.log(b);

function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// function show_tab() {
//   const s = document.querySelector(".s");
//   const a = document.querySelector(".a");
//   const c = document.querySelector(".c");
//   const s1 = document.querySelector("#search");
//   const a1 = document.querySelector("#account");
//   const c1 = document.querySelector("#cart");
//   s.addEventListener("click", () => {
//     s1.classList.add("show");
//   });
//   a.addEventListener("click", () => {
//     a1.classList.toggle("show");
//   });
//   c.addEventListener("click", () => {
//     c1.classList.toggle("show");
//   });
// }
// show_tab();
// const html =
//   '<i class="plus fa-solid fa-plus"></i><i class="minus fa-solid fa-minus"></i>';
// const quantity = document.querySelectorAll(".quantity");
// console.log(quantity);
// for (var i = 0; i < quantity.length; i++) {
//   quantity[i].insertAdjacentHTML("beforeend", html);
// }

// const plus = document.querySelectorAll(".plus"),
//   number = document.querySelectorAll("input[type=number]"),
//   minus = document.querySelectorAll(".minus");
// console.log(number[0].value);
// for (let i = 0; i < plus.length; i++) {
//   let a = number[i].value;
//   plus[i].addEventListener("click", () => {
//     a++;
//     number[i].value = a;
//   });
//   minus[i].addEventListener("click", () => {
//     if (a > 0) {
//       a--;
//       number[i].value = a;
//     }
//   });
// }
