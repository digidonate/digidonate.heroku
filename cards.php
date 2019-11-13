
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="shortcut icon" type="image/x-icon" href="https://static.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico" />
<link rel="mask-icon" type="" href="https://static.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111" />
<title>CodePen - Swipable Stacked Cards - Planning Vacations</title>
<style>
  /*------ CSS Use Case Example START ------*/

/* import font ROBOTO */
@import url('https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700');

body {
    font-family: 'Roboto', sans-serif;
    font-size: 12px;
    margin: 0 15px;
}

.background-0 { background: #C87D26; }
.background-1 { background: #569D99; }
.background-2 { background: #740039; }
.background-3 { background: #839FC5; }
.background-4 { background: #6A4F76; }
.background-5 { background: #57636D; }
.background-6 { background: #6D5242; }
.background-7 { background: #4F5051; }

.background-0,
.background-1,
.background-2,
.background-3,
.background-4,
.background-5,
.background-6,
.background-7 {
  transition: all 400ms ease;
}

/* class created only for a better preview*/
.stage {
    position: absolute;
    opacity: 1;
    max-width: 600px;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
}

.stage.hidden {
  opacity: 0;
  transition: all 400ms ease;
}

@media screen and (max-width: 600px) {
    .stage {
        max-width: 100%;
      }
  }
 
 h1, h2, h3 {
   margin: 0;
 }
 
 h1 {
   font-size: 32px;
   font-weight: 400;
 }
 
 h2 {
   font-size: 24px;
   font-weight: 100;
   color: #FFF;
   text-align: center;
 }
 
 h3 {
   font-size: 18px;
   font-weight: 300;
   color: #BFBFBE;
   margin-top: 10px;
 }
 
 .title {
     width: 100%;
     padding-bottom: 30px;
     text-align: center;
     font-weight: 400;
     font-size: 22px;
     color: #fff;
 }

 .card-content {
   position: relative;
   color: #fff;
   padding: 5px;
 }
 
 .card-image {
   width: 100%;
   height: 100%;
 }
 .card-image img {
   border-top-left-radius: 10px;
   border-top-right-radius: 10px;
   -o-object-fit: cover;
      object-fit: cover;
   width: 100%;
   height: 100%;
   min-height: 330px;
 }
 
 .card-titles {
   position: absolute;
   bottom: 0;
   padding: 40px 30px;
 }
 
 .card-footer {
   display: -webkit-box;
   display: -ms-flexbox;
   display: flex;
   -webkit-box-pack: center;
       -ms-flex-pack: center;
           justify-content: center;
   -webkit-box-align: center;
       -ms-flex-align: center;
           align-items: center;
   padding: 25px 35px;
 }
 
 .popular-destinations-text {
   font-size: 16px;
   font-weight: 400;
   color: #8E9AA4;
   width: 100%;
   min-width: 110px;
 }
 
 .popular-destinations-images {
     display: -webkit-box;
     display: -ms-flexbox;
     display: flex;
     -webkit-box-pack: end;
         -ms-flex-pack: end;
             justify-content: flex-end;
     width: 100%;
 }
 
 .circle {
     width: 40px;
     height: 40px;
     border-radius:  50%;
     background: #fff;
     margin-left: 8px;
 }
 
 .circle img {
     border-radius: 50%
 }
 
 /* global actions buttons*/
.global-actions {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;
    -webkit-box-pack: center;
        -ms-flex-pack: center;
            justify-content: center;
    padding-top: 30px;
    min-width: 200px;
}
 
 .top-action,
 .right-action,
 .left-action {
     border-radius: 50%;
     display: -webkit-box;
     display: -ms-flexbox;
     display: flex;
   -webkit-box-align: center;
       -ms-flex-align: center;
           align-items: center;
     -webkit-box-pack: center;
         -ms-flex-pack: center;
             justify-content: center;
     background: #fff;
   -webkit-box-shadow: 0 3px 4px 0px rgba(0,0,0,0.5);
           box-shadow: 0 3px 4px 0px rgba(0,0,0,0.5);
 }
 .right-action,
 .left-action {
     width: 60px;
     height: 60px;
 }
 
.top-action {
    width: 40px;
    height: 40px;
    margin: 0 20px;
}

.final-state.active {
  position: absolute;
  opacity: 1;
  top: 0;
  left: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
  transition: all 400ms ease;
}

.final-state.hidden {
  opacity: 0;
}


/*------ CSS Use Case Example END ------*/

/*----- Stacked Cards component css START -----*/
body {
    overflow-x: hidden;
}

.no-transition {
  -webkit-transition: none ! important;
  transition: none ! important;
}

 .stackedcards-overflow {
     overflow-y: hidden !important;
 }
 
 .stackedcards.init {
     opacity: 0;/* set the opacity to 0 if you want a fade-in effect to stacked cards on page load */
 }
 
 .stackedcards {
     position: relative;
 }
 
 .stackedcards * {
     -webkit-user-select: none;
             -moz-user-select: none;
              -ms-user-select: none;
          user-select: none;
 }
 
 .stackedcards--animatable {
     -webkit-transition: all 400ms ease;
             -o-transition: all 400ms ease;
             transition: all 400ms ease;
 }
 
 .stackedcards .stackedcards-container > *,
 .stackedcards-overlay {
     position: absolute;
     width: 100%; /* set 100% */
     height: 100%; /* set 100% */
     will-change: transform, opacity;
     top: 0;
     border-radius: 10px;
     min-width: 265px;
 }
 
 .stackedcards-overlay.left > div,
 .stackedcards-overlay.right > div,
 .stackedcards-overlay.top > div {
     width: 100%;
     height: 100%;
     -webkit-box-align: center;
         -ms-flex-align: center;
             align-items: center;
     display: -webkit-box;
     display: -ms-flexbox;
     display: flex;
     -webkit-box-pack: center;
         -ms-flex-pack: center;
             justify-content: center;
 }
 
 .stackedcards-overlay.left,
 .stackedcards-overlay.right,
 .stackedcards-overlay.top {
     -webkit-box-align: center;
         -ms-flex-align: center;
             align-items: center;
     display: -webkit-box;
     display: -ms-flexbox;
     display: flex;
     -webkit-box-pack: center;
         -ms-flex-pack: center;
             justify-content: center;
     left: 0;
     opacity: 0;
     top: 0;
     height: 100%;
 }
 
 .stackedcards-overlay.top,
 .stackedcards-overlay.right,
 .stackedcards-overlay.left {
     background: #fff;
 }
 
 .stackedcards-overlay.left:empty,
 .stackedcards-overlay.right:empty,
 .stackedcards-overlay.top:empty {
   display: none !important;
 }
 
 .stackedcards-overlay-hidden {
     display: none;
 }
 
 .stackedcards-origin-bottom {
     -webkit-transform-origin: bottom;
             -ms-transform-origin: bottom;
         transform-origin: bottom;
 }
 
 .stackedcards-origin-top {
     -webkit-transform-origin: top;
             -ms-transform-origin: top;
         transform-origin: top;
 }
 
 .stackedcards-bottom,
 .stackedcards-top,
 .stackedcards-none {
     background: #fff; /* set card background background */
    box-shadow: 0 6px 12px 0 rgba(0,0,0,0.30);  
    height: 100%;
 }
 
 .stackedcards .stackedcards-container > :nth-child(1) {
     position: relative;
     display: block;
 }

/*----- Stacked Cards component css END -----*/
</style>
<script>
  window.console = window.console || function(t) {};
</script>
<script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>
</head>
<body translate="no">
<div class="stage">
<div class="title">What Kind of Traveler Are You?</div>
<div id="stacked-cards-block" class="stackedcards stackedcards--animatable init">
<div class="stackedcards-container">
<div class="card">
<div class="card-content">
<div class="card-image"><img src="https://image.ibb.co/gQsq07/Adventure_and_Outdoor.png" width="100%" height="100%" /></div>
<div class="card-titles">
<h1>Adventure <br /> and Outdoor</h1>
<h3>10 Destinations</h3>
 </div>
</div>
<div class="card-footer">
<div class="popular-destinations-text">Popular <br /> Destinations</div>
<div class="popular-destinations-images">
<div class="circle"><img src="https://image.ibb.co/jmEYL7/adventure_1.jpg" width="100%" height="100%" /></div>
<div class="circle"><img src="https://image.ibb.co/nsCynn/adventure_2.jpg" width="100%" height="100%" /></div>
<div class="circle"><img src="https://image.ibb.co/hmsL07/adventure_3.jpg" width="100%" height="100%" /></div>
</div>
</div>
</div>
<div class="card">
<div class="card-content">
<div class="card-image"><img src="https://image.ibb.co/fXPg7n/Beach_and_Chill.png" width="100%" height="100%" /></div>
<div class="card-titles">
<h1>Beach <br /> and Chill</h1>
<h3>12 Destinations</h3>
</div>
</div>
<div class="card-footer">
<div class="popular-destinations-text">Popular Destinations</div>
<div class="popular-destinations-images">
<div class="circle"><img src="https://image.ibb.co/muiA07/beach_chill_1.jpg" width="100%" height="100%" /></div>
<div class="circle"><img src="https://image.ibb.co/emAOL7/beach_chill_2.jpg" width="100%" height="100%" /></div>
<div class="circle"><img src="https://image.ibb.co/invq07/beach_chill_3.jpg" width="100%" height="100%" /></div>
</div>
</div>
</div>
<div class="card">
<div class="card-content">
<div class="card-image"><img src="https://image.ibb.co/c9gTnn/Romantic_Gateways.png" width="100%" height="100%" /></div>
<div class="card-titles">
<h1>Romantic <br /> Gateways</h1>
<h3>15 Destinations</h3>
</div>
</div>
<div class="card-footer">
<div class="popular-destinations-text">Popular Destinations</div>
<div class="popular-destinations-images">
<div class="circle"><img src="https://image.ibb.co/nQrkYS/romantic_1.jpg" width="100%" height="100%" /></div>
<div class="circle"><img src="https://image.ibb.co/ioqOL7/romantic_2.jpg" width="100%" height="100%" /></div>
<div class="circle"><img src="https://image.ibb.co/mXSESn/romantic_3.jpg" width="100%" height="100%" /></div>
</div>
</div>
</div>
<div class="card">
<div class="card-content">
<div class="card-image"><img src="https://image.ibb.co/jY88nn/city_breaks.png" width="100%" height="100%" /></div>
<div class="card-titles">
<h1>City <br /> Breaks</h1>
<h3>32 Destinations</h3>
</div>
</div>
<div class="card-footer">
<div class="popular-destinations-text">Popular Destinations</div>
<div class="popular-destinations-images">
<div class="circle"><img src="https://image.ibb.co/myaetS/city_break_1.jpg" width="100%" height="100%" /></div>
<div class="circle"><img src="https://image.ibb.co/ciocf7/city_break_2.jpg" width="100%" height="100%" /></div>
<div class="circle"><img src="https://image.ibb.co/i2e5YS/city_break_3.jpg" width="100%" height="100%" /></div>
</div>
</div>
</div>
<div class="card">
<div class="card-content">
<div class="card-image"><img src="https://image.ibb.co/eBNZSn/Family_Vacation.png" width="100%" height="100%" /></div>
<div class="card-titles">
<h1>Family <br /> Vancation</h1>
<h3>20 Destinations</h3>
</div>
</div>
<div class="card-footer">
<div class="popular-destinations-text">Popular Destinations</div>
<div class="popular-destinations-images">
<div class="circle"><img src="https://image.ibb.co/kEN3L7/family_vacation_1.jpg" width="100%" height="100%" /></div>
<div class="circle"><img src="https://image.ibb.co/iA8M7n/family_vacation_2.jpg" width="100%" height="100%" /></div>
<div class="circle"><img src="https://image.ibb.co/mXOcf7/family_vacation_3.jpg" width="100%" height="100%" /></div>
</div>
</div>
</div>
<div class="card">
<div class="card-content">
<div class="card-image"><img src="https://image.ibb.co/epvM7n/Art_and_culture.png" width="100%" height="100%" /></div>
<div class="card-titles">
<h1>Art and <br /> Culture</h1>
<h3>18 Destinations</h3>
</div>
</div>
<div class="card-footer">
<div class="popular-destinations-text">Popular Destinations</div>
<div class="popular-destinations-images">
<div class="circle"><img src="https://image.ibb.co/kVPYL7/art_culture_1.jpg" width="100%" height="100%" /></div>
<div class="circle"><img src="https://image.ibb.co/dp4Tnn/art_culture_2.jpg" width="100%" height="100%" /></div>
<div class="circle"><img src="https://image.ibb.co/bu6KtS/art_culture_3.jpg" width="100%" height="100%" /></div>
</div>
</div>
</div>
<div class="card">
<div class="card-content">
<div class="card-image"><img src="https://image.ibb.co/bXTXV7/Far_and_Away_2x.png" width="100%" height="100%" /></div>
<div class="card-titles">
<h1>Far and <br /> Away</h1>
<h3>23 Destinations</h3>
</div>
</div>
<div class="card-footer">
<div class="popular-destinations-text">Popular <br /> Destinations</div>
<div class="popular-destinations-images">
<div class="circle"><img src="https://image.ibb.co/fOYztS/far_away_1.jpg" width="100%" height="100%" /></div>
<div class="circle"><img src="https://image.ibb.co/izdXDS/far_away_2.jpg" width="100%" height="100%" /></div>
<div class="circle"><img src="https://image.ibb.co/mqwKtS/far_away_3.jpg" width="100%" height="100%" /></div>
</div>
</div>
</div>
</div>
<div class="stackedcards--animatable stackedcards-overlay top"><img src="https://image.ibb.co/m1ykYS/rank_army_star_2_3x.png" width="auto" height="auto" /></div>
<div class="stackedcards--animatable stackedcards-overlay right"><img src="https://image.ibb.co/dCuESn/Path_3x.png" width="auto" height="auto" /></div>
<div class="stackedcards--animatable stackedcards-overlay left"><img src="https://image.ibb.co/heTxf7/20_status_close_3x.png" width="auto" height="auto" /></div>
</div>
<div class="global-actions">
<div class="left-action"><img src="https://image.ibb.co/heTxf7/20_status_close_3x.png" width="26" height="26" /></div>
<div class="top-action"><img src="https://image.ibb.co/m1ykYS/rank_army_star_2_3x.png" width="18" height="16" /></div>
<div class="right-action"><img src="https://image.ibb.co/dCuESn/Path_3x.png" width="30" height="28" /></div>
</div>
</div>
<div class="final-state hidden"><h2>Got it! We received your preferences! <br /> To submit again, press F5.</h2></div>
<script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>
<script id="rendered-js">
      // JavaScript Document
document.addEventListener("DOMContentLoaded", function (event) {

  function stackedCards() {

    var stackedOptions = 'Top'; //Change stacked cards view from 'Bottom', 'Top' or 'None'.
    var rotate = true; //Activate the elements' rotation for each move on stacked cards.
    var items = 3; //Number of visible elements when the stacked options are bottom or top.
    var elementsMargin = 10; //Define the distance of each element when the stacked options are bottom or top.
    var useOverlays = true; //Enable or disable the overlays for swipe elements.
    var maxElements; //Total of stacked cards on DOM.
    var currentPosition = 0; //Keep the position of active stacked card.
    var velocity = 0.3; //Minimum velocity allowed to trigger a swipe.
    var topObj; //Keep the swipe top properties.
    var rightObj; //Keep the swipe right properties.
    var leftObj; //Keep the swipe left properties.
    var listElNodesObj; //Keep the list of nodes from stacked cards.
    var listElNodesWidth; //Keep the stacked cards width.
    var currentElementObj; //Keep the stacked card element to swipe.
    var stackedCardsObj;
    var isFirstTime = true;
    var elementHeight;
    var obj;
    var elTrans;

    obj = document.getElementById('stacked-cards-block');
    stackedCardsObj = obj.querySelector('.stackedcards-container');
    listElNodesObj = stackedCardsObj.children;

    topObj = obj.querySelector('.stackedcards-overlay.top');
    rightObj = obj.querySelector('.stackedcards-overlay.right');
    leftObj = obj.querySelector('.stackedcards-overlay.left');

    countElements();
    currentElement();
    changeBackground();
    listElNodesWidth = stackedCardsObj.offsetWidth;
    currentElementObj = listElNodesObj[0];
    updateUi();

    //Prepare elements on DOM
    addMargin = elementsMargin * (items - 1) + 'px';

    if (stackedOptions === "Top") {

      for (i = items; i < maxElements; i++) {
        listElNodesObj[i].classList.add('stackedcards-top', 'stackedcards--animatable', 'stackedcards-origin-top');
      }

      elTrans = elementsMargin * (items - 1);

      stackedCardsObj.style.marginBottom = addMargin;

    } else if (stackedOptions === "Bottom") {


      for (i = items; i < maxElements; i++) {
        listElNodesObj[i].classList.add('stackedcards-bottom', 'stackedcards--animatable', 'stackedcards-origin-bottom');
      }

      elTrans = 0;

      stackedCardsObj.style.marginBottom = addMargin;

    } else if (stackedOptions === "None") {

      for (i = items; i < maxElements; i++) {
        listElNodesObj[i].classList.add('stackedcards-none', 'stackedcards--animatable');
      }

      elTrans = 0;

    }

    for (i = items; i < maxElements; i++) {
      listElNodesObj[i].style.zIndex = 0;
      listElNodesObj[i].style.opacity = 0;
      listElNodesObj[i].style.webkitTransform = 'scale(' + (1 - items * 0.04) + ') translateX(0) translateY(' + elTrans + 'px) translateZ(0)';
      listElNodesObj[i].style.transform = 'scale(' + (1 - items * 0.04) + ') translateX(0) translateY(' + elTrans + 'px) translateZ(0)';
    }

    if (listElNodesObj[currentPosition]) {
      listElNodesObj[currentPosition].classList.add('stackedcards-active');
    }

    if (useOverlays) {
      leftObj.style.transform = 'translateX(0px) translateY(' + elTrans + 'px) translateZ(0px) rotate(0deg)';
      leftObj.style.webkitTransform = 'translateX(0px) translateY(' + elTrans + 'px) translateZ(0px) rotate(0deg)';

      rightObj.style.transform = 'translateX(0px) translateY(' + elTrans + 'px) translateZ(0px) rotate(0deg)';
      rightObj.style.webkitTransform = 'translateX(0px) translateY(' + elTrans + 'px) translateZ(0px) rotate(0deg)';

      topObj.style.transform = 'translateX(0px) translateY(' + elTrans + 'px) translateZ(0px) rotate(0deg)';
      topObj.style.webkitTransform = 'translateX(0px) translateY(' + elTrans + 'px) translateZ(0px) rotate(0deg)';

    } else {
      leftObj.className = '';
      rightObj.className = '';
      topObj.className = '';

      leftObj.classList.add('stackedcards-overlay-hidden');
      rightObj.classList.add('stackedcards-overlay-hidden');
      topObj.classList.add('stackedcards-overlay-hidden');
    }

    //Remove class init
    setTimeout(function () {
      obj.classList.remove('init');
    }, 150);


    function backToMiddle() {

      removeNoTransition();
      transformUi(0, 0, 1, currentElementObj);

      if (useOverlays) {
        transformUi(0, 0, 0, leftObj);
        transformUi(0, 0, 0, rightObj);
        transformUi(0, 0, 0, topObj);
      }

      setZindex(5);

      if (!(currentPosition >= maxElements)) {
        //roll back the opacity of second element
        if (currentPosition + 1 < maxElements) {
          listElNodesObj[currentPosition + 1].style.opacity = '.8';
        }
      }
    };

    // Usable functions
    function countElements() {
      maxElements = listElNodesObj.length;
      if (items > maxElements) {
        items = maxElements;
      }
    };

    //Keep the active card.
    function currentElement() {
      currentElementObj = listElNodesObj[currentPosition];
    };

    //Change background for each swipe.
    function changeBackground() {
      document.body.classList.add("background-" + currentPosition + "");
    };

    //Change states
    function changeStages() {
      if (currentPosition == maxElements) {
        //Event listener created to know when transition ends and changes states
        listElNodesObj[maxElements - 1].addEventListener('transitionend', function () {
          document.body.classList.add("background-7");
          document.querySelector('.stage').classList.add('hidden');
          document.querySelector('.final-state').classList.remove('hidden');
          document.querySelector('.final-state').classList.add('active');
          listElNodesObj[maxElements - 1].removeEventListener('transitionend', null, false);
        });
      }
    };

    //Functions to swipe left elements on logic external action.
    function onActionLeft() {
      if (!(currentPosition >= maxElements)) {
        if (useOverlays) {
          leftObj.classList.remove('no-transition');
          topObj.classList.remove('no-transition');
          leftObj.style.zIndex = '8';
          transformUi(0, 0, 1, leftObj);

        }

        setTimeout(function () {
          onSwipeLeft();
          resetOverlayLeft();
        }, 300);
      }
    };

    //Functions to swipe right elements on logic external action.
    function onActionRight() {
      if (!(currentPosition >= maxElements)) {
        if (useOverlays) {
          rightObj.classList.remove('no-transition');
          topObj.classList.remove('no-transition');
          rightObj.style.zIndex = '8';
          transformUi(0, 0, 1, rightObj);
        }

        setTimeout(function () {
          onSwipeRight();
          resetOverlayRight();
        }, 300);
      }
    };

    //Functions to swipe top elements on logic external action.
    function onActionTop() {
      if (!(currentPosition >= maxElements)) {
        if (useOverlays) {
          leftObj.classList.remove('no-transition');
          rightObj.classList.remove('no-transition');
          topObj.classList.remove('no-transition');
          topObj.style.zIndex = '8';
          transformUi(0, 0, 1, topObj);
        }

        setTimeout(function () {
          onSwipeTop();
          resetOverlays();
        }, 300); //wait animations end
      }
    };

    //Swipe active card to left.
    function onSwipeLeft() {
      removeNoTransition();
      transformUi(-1000, 0, 0, currentElementObj);
      if (useOverlays) {
        transformUi(-1000, 0, 0, leftObj); //Move leftOverlay
        transformUi(-1000, 0, 0, topObj); //Move topOverlay
        resetOverlayLeft();
      }
      currentPosition = currentPosition + 1;
      updateUi();
      currentElement();
      changeBackground();
      changeStages();
      setActiveHidden();
    };

    //Swipe active card to right.
    function onSwipeRight() {
      removeNoTransition();
      transformUi(1000, 0, 0, currentElementObj);
      if (useOverlays) {
        transformUi(1000, 0, 0, rightObj); //Move rightOverlay
        transformUi(1000, 0, 0, topObj); //Move topOverlay
        resetOverlayRight();
      }

      currentPosition = currentPosition + 1;
      updateUi();
      currentElement();
      changeBackground();
      changeStages();
      setActiveHidden();
    };

    //Swipe active card to top.
    function onSwipeTop() {
      removeNoTransition();
      transformUi(0, -1000, 0, currentElementObj);
      if (useOverlays) {
        transformUi(0, -1000, 0, leftObj); //Move leftOverlay
        transformUi(0, -1000, 0, rightObj); //Move rightOverlay
        transformUi(0, -1000, 0, topObj); //Move topOverlay
        resetOverlays();
      }

      currentPosition = currentPosition + 1;
      updateUi();
      currentElement();
      changeBackground();
      changeStages();
      setActiveHidden();
    };

    //Remove transitions from all elements to be moved in each swipe movement to improve perfomance of stacked cards.
    function removeNoTransition() {
      if (listElNodesObj[currentPosition]) {

        if (useOverlays) {
          leftObj.classList.remove('no-transition');
          rightObj.classList.remove('no-transition');
          topObj.classList.remove('no-transition');
        }

        listElNodesObj[currentPosition].classList.remove('no-transition');
        listElNodesObj[currentPosition].style.zIndex = 6;
      }

    };

    //Move the overlay left to initial position.
    function resetOverlayLeft() {
      if (!(currentPosition >= maxElements)) {
        if (useOverlays) {
          setTimeout(function () {

            if (stackedOptions === "Top") {

              elTrans = elementsMargin * (items - 1);

            } else if (stackedOptions === "Bottom" || stackedOptions === "None") {

              elTrans = 0;

            }

            if (!isFirstTime) {

              leftObj.classList.add('no-transition');
              topObj.classList.add('no-transition');

            }

            requestAnimationFrame(function () {

              leftObj.style.transform = "translateX(0) translateY(" + elTrans + "px) translateZ(0)";
              leftObj.style.webkitTransform = "translateX(0) translateY(" + elTrans + "px) translateZ(0)";
              leftObj.style.opacity = '0';

              topObj.style.transform = "translateX(0) translateY(" + elTrans + "px) translateZ(0)";
              topObj.style.webkitTransform = "translateX(0) translateY(" + elTrans + "px) translateZ(0)";
              topObj.style.opacity = '0';

            });

          }, 300);

          isFirstTime = false;
        }
      }
    };

    //Move the overlay right to initial position.
    function resetOverlayRight() {
      if (!(currentPosition >= maxElements)) {
        if (useOverlays) {
          setTimeout(function () {

            if (stackedOptions === "Top") {+2;

              elTrans = elementsMargin * (items - 1);

            } else if (stackedOptions === "Bottom" || stackedOptions === "None") {

              elTrans = 0;

            }

            if (!isFirstTime) {

              rightObj.classList.add('no-transition');
              topObj.classList.add('no-transition');

            }

            requestAnimationFrame(function () {

              rightObj.style.transform = "translateX(0) translateY(" + elTrans + "px) translateZ(0)";
              rightObj.style.webkitTransform = "translateX(0) translateY(" + elTrans + "px) translateZ(0)";
              rightObj.style.opacity = '0';

              topObj.style.transform = "translateX(0) translateY(" + elTrans + "px) translateZ(0)";
              topObj.style.webkitTransform = "translateX(0) translateY(" + elTrans + "px) translateZ(0)";
              topObj.style.opacity = '0';

            });

          }, 300);

          isFirstTime = false;
        }
      }
    };

    //Move the overlays to initial position.
    function resetOverlays() {
      if (!(currentPosition >= maxElements)) {
        if (useOverlays) {

          setTimeout(function () {
            if (stackedOptions === "Top") {

              elTrans = elementsMargin * (items - 1);

            } else if (stackedOptions === "Bottom" || stackedOptions === "None") {

              elTrans = 0;

            }

            if (!isFirstTime) {

              leftObj.classList.add('no-transition');
              rightObj.classList.add('no-transition');
              topObj.classList.add('no-transition');

            }

            requestAnimationFrame(function () {

              leftObj.style.transform = "translateX(0) translateY(" + elTrans + "px) translateZ(0)";
              leftObj.style.webkitTransform = "translateX(0) translateY(" + elTrans + "px) translateZ(0)";
              leftObj.style.opacity = '0';

              rightObj.style.transform = "translateX(0) translateY(" + elTrans + "px) translateZ(0)";
              rightObj.style.webkitTransform = "translateX(0) translateY(" + elTrans + "px) translateZ(0)";
              rightObj.style.opacity = '0';

              topObj.style.transform = "translateX(0) translateY(" + elTrans + "px) translateZ(0)";
              topObj.style.webkitTransform = "translateX(0) translateY(" + elTrans + "px) translateZ(0)";
              topObj.style.opacity = '0';

            });

          }, 300); // wait for animations time

          isFirstTime = false;
        }
      }
    };

    function setActiveHidden() {
      if (!(currentPosition >= maxElements)) {
        listElNodesObj[currentPosition - 1].classList.remove('stackedcards-active');
        listElNodesObj[currentPosition - 1].classList.add('stackedcards-hidden');
        listElNodesObj[currentPosition].classList.add('stackedcards-active');
      }
    };

    //Set the new z-index for specific card.
    function setZindex(zIndex) {
      if (listElNodesObj[currentPosition]) {
        listElNodesObj[currentPosition].style.zIndex = zIndex;
      }
    };

    // Remove element from the DOM after swipe. To use this method you need to call this function in onSwipeLeft, onSwipeRight and onSwipeTop and put the method just above the variable 'currentPosition = currentPosition + 1'. 
    //On the actions onSwipeLeft, onSwipeRight and onSwipeTop you need to remove the currentPosition variable (currentPosition = currentPosition + 1) and the function setActiveHidden

    function removeElement() {
      currentElementObj.remove();
      if (!(currentPosition >= maxElements)) {
        listElNodesObj[currentPosition].classList.add('stackedcards-active');
      }
    };

    //Add translate X and Y to active card for each frame.
    function transformUi(moveX, moveY, opacity, elementObj) {
      requestAnimationFrame(function () {
        var element = elementObj;

        // Function to generate rotate value 
        function RotateRegulator(value) {
          if (value / 10 > 15) {
            return 15;
          } else
          if (value / 10 < -15) {
            return -15;
          }
          return value / 10;
        }

        if (rotate) {
          rotateElement = RotateRegulator(moveX);
        } else {
          rotateElement = 0;
        }

        if (stackedOptions === "Top") {
          elTrans = elementsMargin * (items - 1);
          if (element) {
            element.style.webkitTransform = "translateX(" + moveX + "px) translateY(" + (moveY + elTrans) + "px) translateZ(0) rotate(" + rotateElement + "deg)";
            element.style.transform = "translateX(" + moveX + "px) translateY(" + (moveY + elTrans) + "px) translateZ(0) rotate(" + rotateElement + "deg)";
            element.style.opacity = opacity;
          }
        } else if (stackedOptions === "Bottom" || stackedOptions === "None") {

          if (element) {
            element.style.webkitTransform = "translateX(" + moveX + "px) translateY(" + moveY + "px) translateZ(0) rotate(" + rotateElement + "deg)";
            element.style.transform = "translateX(" + moveX + "px) translateY(" + moveY + "px) translateZ(0) rotate(" + rotateElement + "deg)";
            element.style.opacity = opacity;
          }

        }
      });
    };

    //Action to update all elements on the DOM for each stacked card.
    function updateUi() {
      requestAnimationFrame(function () {
        elTrans = 0;
        var elZindex = 5;
        var elScale = 1;
        var elOpac = 1;
        var elTransTop = items;
        var elTransInc = elementsMargin;

        for (i = currentPosition; i < currentPosition + items; i++) {
          if (listElNodesObj[i]) {
            if (stackedOptions === "Top") {

              listElNodesObj[i].classList.add('stackedcards-top', 'stackedcards--animatable', 'stackedcards-origin-top');

              if (useOverlays) {
                leftObj.classList.add('stackedcards-origin-top');
                rightObj.classList.add('stackedcards-origin-top');
                topObj.classList.add('stackedcards-origin-top');
              }

              elTrans = elTransInc * elTransTop;
              elTransTop--;

            } else if (stackedOptions === "Bottom") {
              listElNodesObj[i].classList.add('stackedcards-bottom', 'stackedcards--animatable', 'stackedcards-origin-bottom');

              if (useOverlays) {
                leftObj.classList.add('stackedcards-origin-bottom');
                rightObj.classList.add('stackedcards-origin-bottom');
                topObj.classList.add('stackedcards-origin-bottom');
              }

              elTrans = elTrans + elTransInc;

            } else if (stackedOptions === "None") {

              listElNodesObj[i].classList.add('stackedcards-none', 'stackedcards--animatable');
              elTrans = elTrans + elTransInc;

            }

            listElNodesObj[i].style.transform = 'scale(' + elScale + ') translateX(0) translateY(' + (elTrans - elTransInc) + 'px) translateZ(0)';
            listElNodesObj[i].style.webkitTransform = 'scale(' + elScale + ') translateX(0) translateY(' + (elTrans - elTransInc) + 'px) translateZ(0)';
            listElNodesObj[i].style.opacity = elOpac;
            listElNodesObj[i].style.zIndex = elZindex;

            elScale = elScale - 0.04;
            elOpac = elOpac - 1 / items;
            elZindex--;
          }
        }

      });

    };

    //Touch events block
    var element = obj;
    var startTime;
    var startX;
    var startY;
    var translateX;
    var translateY;
    var currentX;
    var currentY;
    var touchingElement = false;
    var timeTaken;
    var topOpacity;
    var rightOpacity;
    var leftOpacity;

    function setOverlayOpacity() {

      topOpacity = (translateY + elementHeight / 2) / 100 * -1;
      rightOpacity = translateX / 100;
      leftOpacity = translateX / 100 * -1;


      if (topOpacity > 1) {
        topOpacity = 1;
      }

      if (rightOpacity > 1) {
        rightOpacity = 1;
      }

      if (leftOpacity > 1) {
        leftOpacity = 1;
      }
    }

    function gestureStart(evt) {
      startTime = new Date().getTime();

      startX = evt.changedTouches[0].clientX;
      startY = evt.changedTouches[0].clientY;

      currentX = startX;
      currentY = startY;

      setOverlayOpacity();

      touchingElement = true;
      if (!(currentPosition >= maxElements)) {
        if (listElNodesObj[currentPosition]) {
          listElNodesObj[currentPosition].classList.add('no-transition');
          setZindex(6);

          if (useOverlays) {
            leftObj.classList.add('no-transition');
            rightObj.classList.add('no-transition');
            topObj.classList.add('no-transition');
          }

          if (currentPosition + 1 < maxElements) {
            listElNodesObj[currentPosition + 1].style.opacity = '1';
          }

          elementHeight = listElNodesObj[currentPosition].offsetHeight / 3;
        }

      }

    };

    function gestureMove(evt) {
      currentX = evt.changedTouches[0].pageX;
      currentY = evt.changedTouches[0].pageY;

      translateX = currentX - startX;
      translateY = currentY - startY;

      setOverlayOpacity();

      if (!(currentPosition >= maxElements)) {
        evt.preventDefault();
        transformUi(translateX, translateY, 1, currentElementObj);

        if (useOverlays) {
          transformUi(translateX, translateY, topOpacity, topObj);

          if (translateX < 0) {
            transformUi(translateX, translateY, leftOpacity, leftObj);
            transformUi(0, 0, 0, rightObj);

          } else if (translateX > 0) {
            transformUi(translateX, translateY, rightOpacity, rightObj);
            transformUi(0, 0, 0, leftObj);
          }

          if (useOverlays) {
            leftObj.style.zIndex = 8;
            rightObj.style.zIndex = 8;
            topObj.style.zIndex = 7;
          }

        }

      }

    };

    function gestureEnd(evt) {

      if (!touchingElement) {
        return;
      }

      translateX = currentX - startX;
      translateY = currentY - startY;

      timeTaken = new Date().getTime() - startTime;

      touchingElement = false;

      if (!(currentPosition >= maxElements)) {
        if (translateY < elementHeight * -1 && translateX > listElNodesWidth / 2 * -1 && translateX < listElNodesWidth / 2) {//is Top?

          if (translateY < elementHeight * -1 || Math.abs(translateY) / timeTaken > velocity) {// Did It Move To Top?
            onSwipeTop();
          } else {
            backToMiddle();
          }

        } else {

          if (translateX < 0) {
            if (translateX < listElNodesWidth / 2 * -1 || Math.abs(translateX) / timeTaken > velocity) {// Did It Move To Left?
              onSwipeLeft();
            } else {
              backToMiddle();
            }
          } else if (translateX > 0) {

            if (translateX > listElNodesWidth / 2 && Math.abs(translateX) / timeTaken > velocity) {// Did It Move To Right?
              onSwipeRight();
            } else {
              backToMiddle();
            }

          }
        }
      }
    };

    element.addEventListener('touchstart', gestureStart, false);
    element.addEventListener('touchmove', gestureMove, false);
    element.addEventListener('touchend', gestureEnd, false);

    //Add listeners to call global action for swipe cards
    var buttonLeft = document.querySelector('.left-action');
    var buttonTop = document.querySelector('.top-action');
    var buttonRight = document.querySelector('.right-action');

    buttonLeft.addEventListener('click', onActionLeft, false);
    buttonTop.addEventListener('click', onActionTop, false);
    buttonRight.addEventListener('click', onActionRight, false);

  }

  stackedCards();

});
      //# sourceURL=pen.js
    </script>
</body>
</html>
