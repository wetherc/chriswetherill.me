alternative_facts = [
  "is a part-time rabble-rouser",
  "is VERY ANGRY",
  "is more a wreck than a lovable wreck",
  "had a nasty argument over a hot dog",
  "can't say hello to a stranger",
  "talks at length about his pets",
  "has an excruciating case of the munchies",
  "can barely put sentences together",
  "contains no useful information",
  "invites you to a cat birthday party",
  "realized the birds had become our teachers",
  "can't use a microwave",
  "has more than a dash of whimsy",
  "plays Tiddlywinks to win",
  "experienced a couple psychedelic visions",
  "just lets uncomfortable moments happen",
  "owns up to six pairs of pants",
  "is being needlessly argumentative",
  "can change after a few hours of drinks",
  "unsuccessfully tried not to disturb the bats",
  "remains crippled by indecision",
  "is devoted to the affairs of cats"
]

fact_of_the_day = alternative_facts[Math.floor(Math.random() * alternative_facts.length)];

document.addEventListener("DOMContentLoaded", function(event) {
  document.getElementById("bespoke-fact").innerHTML = fact_of_the_day;
  changePage();
})

function changePage() {
  var pathname = window.location.pathname;
  pathname =  pathname.replace(/^\/([^\/]+)\/*.*(\.php)*/g, '$1');
  pathname = "./".concat(pathname);

  var navs = document.getElementsByClassName("navbar-nav")[0].getElementsByTagName('li');
  for (var i = 0; i < navs.length; i++) {
    $(navs[i]).removeClass("active");
  }

  try {
    document.querySelector("a[href='" + pathname + "']").parentNode.className = "active";
  }
  catch(err) {
    document.querySelector("a[href='./']").parentNode.className = "active";
  }
}
