var quotes = [
"\"Frankly, my dear, I don't give a damn.\"<br>-  Gone With the Wind",
 "\"I'm going to make him an offer he can't refuse.\"<br> - The Godfather", 
 "\"Toto, I've got a feeling we're not in Kansas anymore.\"<br>- The Wizard of Oz", 
 "\"Here's looking at you, kid.\"<br>- Casablanca",
  "\"Go ahead, make my day.\"<br>- Sudden Impact", 
  "\"May the Force be with you.\"<br>- Star Wars", 
  "\"Fasten your seatbelts. It's going to be a bumpy night.\"<br>- All About Eve",
   "\"You talking to me?\"<br>- Taxi Driver",
   "\"Here's Johnny!\"<br>- The Shining",
   "\"Bond. James Bond.\"<br>- Dr. No",
   "\"Mama always said life was like a box of chocolates. You never know what you're gonna get.\"<br>- Forrest Gump",
   "\"I see dead people.\"<br>- The Sixth Sense",
   "\"Houston, we have a problem.\"<br>- Apollo 13",
];

function genQuote() {
    var randNum = Math.floor(Math.random() * 12) + 1;
    document.getElementById('quote').innerHTML = quotes[randNum];
  }

  window.onload = function() {
    genQuote();
  };