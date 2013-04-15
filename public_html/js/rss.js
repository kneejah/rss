var canvas, stage;

var mouseTarget;
var dragStarted;
var offset;
var update = true;

function init()
{
		// create stage and point it to the canvas:
		canvas = document.getElementById("canvas");

		//check to see if we are running in a browser with touch support
		stage = new createjs.Stage(canvas);

		// enable touch interactions if supported on the current device:
		createjs.Touch.enable(stage);

		// enabled mouse over / out events
		stage.enableMouseOver(10);
		stage.mouseMoveOutside = true; // keep tracking the mouse even when it leaves the canvas

		// load the source image:
		var image = new Image();
		image.src = "/images/us-states.png";
		image.onload = handleImageLoad;
}

function handleImageLoad(event) {
	var image = event.target;
	var bitmap;
	var container = new createjs.Container();
	stage.addChild(container);

	bitmap = new createjs.Bitmap(image);
	container.addChild(bitmap);
	bitmap.x = 0;
	bitmap.y = 0;
	bitmap.name = "bmp_1";

	// wrapper function to provide scope for the event handlers:
	(function(target) {
		bitmap.onPress = function(evt) {
			// bump the target in front of it's siblings:
			// container.addChild(target);
			var offset = {x: target.x - evt.stageX, y: target.y - evt.stageY};
			// add a handler to the event object's onMouseMove callback
			// this will be active until the user releases the mouse button:
			evt.onMouseMove = function(ev) {
				target.x = ev.stageX + offset.x;
				target.y = ev.stageY + offset.y;

				if (target.x > 0) target.x = 0;
				if (target.y > 0) target.y = 0;

				var currWindow = document.getElementById('canvas');
				currWinX = currWindow.width;
				currWinY = currWindow.height;

				if (target.x < -3221 + currWinX) target.x = -3221 + currWinX;
				if (target.y < -1777 + currWinY) target.y = -1777 + currWinY;

				// indicate that the stage should be updated on the next tick:
				update = true;
			}
		}
	})(bitmap);

	createjs.Ticker.addEventListener("tick", tick);
}

function tick(event) {
	// this set makes it so the stage only re-renders when an event handler indicates a change has happened.
	if (update) {
		update = false; // only update once
		stage.update(event);
	}
}