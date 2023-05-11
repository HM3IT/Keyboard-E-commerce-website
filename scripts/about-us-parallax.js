const title = document.getElementById("title");
const sky = document.getElementsByClassName("parallax-bg-sky")[0];
const cloudLeft1 = document.getElementsByClassName(
  "parallax-bg-cloud-left1"
)[0];
const cloudLeft2 = document.getElementsByClassName(
  "parallax-bg-cloud-left2"
)[0];
const cloudLeft3 = document.getElementsByClassName(
  "parallax-bg-cloud-left3"
)[0];
const cloudLeft4 = document.getElementsByClassName(
  "parallax-bg-cloud-left4"
)[0];
const cloudTop = document.getElementsByClassName("parallax-bg-cloud-top")[0];
const cloudRight1 = document.getElementsByClassName(
  "parallax-bg-cloud-right1"
)[0];
const cloudRight2 = document.getElementsByClassName(
  "parallax-bg-cloud-right2"
)[0];

const mountainLeft1 = document.getElementsByClassName(
  "parallax-bg-mountain-left1"
)[0];
const mountainLeft2 = document.getElementsByClassName(
  "parallax-bg-mountain-left2"
)[0];
const mountainRight = document.getElementsByClassName(
  "parallax-bg-mountain-right1"
)[0];
const mountainBothSide = document.getElementsByClassName(
  "parallax-bg-mountain-both-side"
)[0];

const meadow = document.getElementsByClassName("parallax-bg-meadow")[0];
// const girl = document.getElementsByClassName("parallax-bg-girl")[0];

let fontSizeStr = window.getComputedStyle(title).fontSize;
let fontSize = parseInt(fontSizeStr, 10);
let prevScroll = 0;
let textValue = fontSize;

window.addEventListener("scroll", () => {
  let value = window.scrollY;

  let smoothValue = value * 0.325;

  title.style.marginTop = value * 2.5 + "px";
  cloudTop.style.left = smoothValue * 2.5 + "px";
  cloudLeft1.style.left = smoothValue * 2.5 + "px";
  cloudLeft2.style.left = smoothValue * 2.5 + "px";
  cloudLeft3.style.left = smoothValue * 2.5 + "px";
  cloudLeft4.style.left = smoothValue * 2.5 + "px";
  cloudRight1.style.left = smoothValue * 2.5 + "px";
  cloudRight2.style.left = smoothValue * 2.5 + "px";

  // Calculate new scale and translate values
  let scaleValue = 1 + value * 0.001;
  let translateZValue = -20 + value * 0.1;

  // Increase font size when scrolling down
  if (value > prevScroll) {
    let textValue = fontSize + value * 0.5;
    title.style.fontSize = textValue + "px";
    if (title.style.fontSize > "330px") {
      title.style.fontSize = "1px";
    }
  }
  // when scrolling up
  else {
    title.style.fontSize = fontSize + "px";
  }

  prevScroll = value;
  // Update transform property
  mountainBothSide.style.transform = `translateZ(${translateZValue}px) scale(${scaleValue})`;
  mountainLeft1.style.transform = `translateZ(${translateZValue}px) scale(${scaleValue})`;
  mountainLeft2.style.transform = `translateZ(${translateZValue}px) scale(${scaleValue})`;
  mountainRight.style.transform = `translateZ(${translateZValue}px) scale(${scaleValue})`;
  meadow.style.transform = `translateZ(${translateZValue}px) scale(${scaleValue})`;

  //  girl.style.marginTop = value * 2.5 + "px";
});

// text scroll fade in animation 

const observer= new IntersectionObserver((entries)=>{
entries.forEach((entry)=>{
    if(entry.isIntersecting){
        entry.target.classList.add('show');
    }else{
        entry.target.classList.remove('show');
    }
})
});

const hiddenElements = document.querySelectorAll('.hidden');
hiddenElements.forEach((element)=>observer.observe(element));