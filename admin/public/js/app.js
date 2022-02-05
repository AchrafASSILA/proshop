// add toggle action
let menu = document.getElementById("toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");
menu.onclick = () => {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};
