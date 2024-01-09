const body = document.getElementById('body');
const loader = document.getElementById("loaderContainer");

window.addEventListener("load", function(){
      
      //loader.style.transform = "translateY(-1000px)";
      //setTimeout(function(){loader.style.display = "none";},200)
      hideLoader();
      body.style.display = "block"; // Assuming the initial style was "none"


      document.getElementById('navButtonContainer').addEventListener("click",function(){
         document.getElementById('nav-icon3').classList.toggle('open');
         document.getElementById('navCategorias').classList.toggle('display');
         document.getElementById('navButtonContainer').classList.toggle('border-radius');
     });
});

function hideLoader(){
  loader.style.transform = "translateY(-1000px)";
  setTimeout(function(){loader.style.display = "none";},200)
  loader.style.display = "none";
}

function showLoader(){
       loader.style.transform = "translateY(0)";
       loader.style.display = "flex";
     }

function link(event,url) {
//showLoader();
event.stopPropagation(); 
location.href = url; 
}

function Popup(url,name,width,height,resize,scroll) {
 var dialogWin = new Object();
 dialogWin.width = width;
 dialogWin.height = height;
 now = new Date();
 var millis=now.getTime();
 var mstr=""+millis;
 if (navigator.appName == "Netscape") {
     dialogWin.left = window.screenX + ((window.outerWidth - dialogWin.width) / 2);
     dialogWin.top = window.screenY + ((window.outerHeight - dialogWin.height) / 2);
     var attr = 'screenX=' + dialogWin.left + ',screenY=' + dialogWin.top + ',resizable=' + resize + ',width=' + dialogWin.width + ',height=' + dialogWin.height + ',scrollbars=' + scroll + ',menubar=no,location=no,toolbar=no,status=no,directories=no';
 } else if (document.all) {
     dialogWin.left = (screen.width - dialogWin.width) / 2;
     dialogWin.top = (screen.height - dialogWin.height) / 2;
     var attr = 'left=' + dialogWin.left + ',top=' + dialogWin.top + ',resizable=' + resize + ',width=' + dialogWin.width + ',height=' + dialogWin.height + ',scrollbars=' + scroll + ',menubar=no,location=no,toolbar=no,status=no,directories=no';
 }
window.open(url,name,attr);
}

function formatDate(originalDate) {
 var timestamp = Date.parse(originalDate);
 var formattedDate = new Date(timestamp).toLocaleDateString('en-GB', { day: '2-digit', month: '2-digit', year: 'numeric' });
 return formattedDate;
}

function renderTiempoEstimadoDeLectura(text) {
 // Calculate the number of words in the text
 const wordCount = text.trim().split(/\s+/).length;

 // Set the average reading speed in words per minute
 const averageSpeed = 200;

 // Calculate the estimated reading time in minutes and seconds
 const readingTimeMinutes = Math.floor(wordCount / averageSpeed);
 const readingTimeSeconds = Math.round(((wordCount % averageSpeed) / (averageSpeed / 60)));

 const formattedSeconds = readingTimeSeconds < 10 ? `0${readingTimeSeconds}` : readingTimeSeconds;

 return `${readingTimeMinutes}:${formattedSeconds} min.`;
}
