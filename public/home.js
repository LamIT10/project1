let dropdownNavbarLink = document.getElementById("dropdownNavbarLink");
let dropGuest = document.getElementById("dropGuest");
let dropUser = document.getElementById("dropUser");
function dropDown() {
    if (dropUser !== null) {
    if (dropUser.classList.contains("hidden")) {
      dropUser.classList.remove("hidden");
    } else {
      dropUser.classList.add("hidden");
    }
  }
  else {
      if (dropGuest.classList.contains("hidden")) {
        dropGuest.classList.remove("hidden");
      } else {
        dropGuest.classList.add("hidden");
      }
}
  
}

