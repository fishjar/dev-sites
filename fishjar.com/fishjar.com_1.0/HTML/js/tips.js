// JavaScript Document
var tips = new Array();
tips[0] = "<p>Life<br />is like a box of chocolates,<br />you never know what you're gonna get.</p>";
tips[1] = "<p>Life<br />is hard.<br />keep your style, and get used to it!</p>";
tips[2] = "<p>Life<br />is a short trip,<br />the music's for the sad men.</p>";
tips[3] = "<p>Life<br />is like a dream,<br />just wake up to what you're doing right now.</p>";
tips[4] = "<p>Life<br />is is like a boat,<br />we are all rowing the boat of fate.</p>";
tips[5] = "<p>Life<br />is a roulette wheel,<br />success is my breathing space.</p>";
tips[6] = "<p>Life<br />is a flower, carry on smiling,<br /> and the world will smile with you.</p>";
var i = Math.floor(Math.random()*tips.length);
document.getElementById('index_right').innerHTML = tips[i];