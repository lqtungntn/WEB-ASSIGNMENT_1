// const x = setInterval(function () {
//   const videoText = document.getElementsByClassName("video-text");
//   videoText.innerHTML = "hello";
// }, 3000);
import anime from "animejs/lib/anime.es.js";

const videoText = document.getElementsByClassName("video-text");
videoText.value = "hello";

console.log("run into here", videoText);
