/*
AudioIndicator Component
Giacomo 'Peldi' Guilizzoni
http://www.peldi.com/blog/

This work is licensed under the Creative Commons Attribution-NonCommercial-ShareAlike License.
To view a copy of this license, visit http://creativecommons.org/licenses/by-nc-sa/1.0/ or
send a letter to Creative Commons, 559 Nathan Abbott Way, Stanford, California 94305, USA.
*/
#initclip

function AudioIndicatorClass() {
	this.init();
}

AudioIndicatorClass.prototype = new MovieClip();
Object.registerClass("AudioIndicatorSymbol", AudioIndicatorClass);

AudioIndicatorClass.prototype.init = function() {

	this.attachMovie("VMWToolTipSymbol","tip",1000);

	this.gainSetter_mc.onRollOver = function() {
		this.gotoAndStop(2);
		this._parent.tip.setBackgroundColor(254, 250, 200);
		this._parent.tip.startHover("Gain");
	}
	this.gainSetter_mc.onRollOut = function() {
		this.gotoAndStop(1);
		this._parent.tip.stopHover();
	}
	this.gainSetter_mc.onPress = function() {

		this._parent.onEnterFrame = null;

		if (this._parent.direction == "Horizontal") {
			this.onMouseMove = function() {
				this._x = _root._xmouse - this._parent._x;

				// Constrain the widget to the area
				if (this._x >= (this._parent.volumeBars_mc._width+this._parent.volumeBars_mc._x))
					this._x = this._parent.volumeBars_mc._width+this._parent.volumeBars_mc._x;
				if (this._x<= (this._width/2+this._parent.volumeBars_mc._x))
					this._x = this._width/2+this._parent.volumeBars_mc._x;
				this._parent.mic.setGain(100*(this._x-this._parent.volumeBars_mc._x)/this._parent.volumeBars_mc._width);
			}
		} else {
			this.onMouseMove = function() {
				this._x = this._parent._y  - _root._ymouse;

				// Constrain the widget to the area
				if (this._x >= (this._parent.volumeBars_mc._width+this._parent.volumeBars_mc._x))
					this._x = this._parent.volumeBars_mc._width+this._parent.volumeBars_mc._x;
				if (this._x<= (this._width/2+this._parent.volumeBars_mc._x))
					this._x = this._width/2+this._parent.volumeBars_mc._x;
				this._parent.mic.setGain(100*this._x/this._parent.volumeBars_mc._width);
			}
		}
	}
	this.gainSetter_mc.onRelease = this.gainSetter_mc.onReleaseOutside = function() {
		this._parent.mic.setGain(100*(this._x-this._parent.volumeBars_mc._x)/this._parent.volumeBars_mc._width);
		trace(this._parent.mic.gain);
		this.gotoAndStop(1);
		delete this.onMouseMove;
		this._parent.onEnterFrame = this._parent.listenToSettings;
	}

	this.onEnterFrame = this.listenToSettings;

	// ////
	this.silenceSetter_mc.onRollOver = function() {
		this.gotoAndStop(2);
		this._parent.tip.setBackgroundColor(254, 250, 200);
		this._parent.tip.startHover("Silence Level");
	}
	this.silenceSetter_mc.onRollOut = function() {
		this.gotoAndStop(1);
		this._parent.tip.stopHover();
	}
	this.silenceSetter_mc.onPress = function() {

		if (this._parent.direction == "Horizontal") {
			this.onMouseMove = function() {
				this._x = _root._xmouse - this._parent._x;

				// Constrain the widget to the area
				if (this._x >= (this._parent.volumeBars_mc._width+this._parent.volumeBars_mc._x))
					this._x = this._parent.volumeBars_mc._width+this._parent.volumeBars_mc._x;
				if (this._x<= (this.width/2+this._parent.volumeBars_mc._x))
					this._x = this.width/2+this._parent.volumeBars_mc._x;
				this._parent.mic.setSilenceLevel(100*this._x/this._parent.volumeBars_mc._width, 250);
			}
		} else {
			this.onMouseMove = function() {
				this._x = this._parent._y  - _root._ymouse;

				// Constrain the widget to the area
				if (this._x >= (this._parent.volumeBars_mc._width+this._parent.volumeBars_mc._x))
					this._x = this._parent.volumeBars_mc._width+this._parent.volumeBars_mc._x;
				if (this._x<= (this.width/2+this._parent.volumeBars_mc._x))
					this._x = this.width/2+this._parent.volumeBars_mc._x;
				this._parent.mic.setSilenceLevel(100*this._x/this._parent.volumeBars_mc._width, 250);
			}
		}
	}
	this.silenceSetter_mc.onRelease = this.silenceSetter_mc.onReleaseOutside = function() {
		this._parent.mic.setSilenceLevel(100*this._x/this._parent.volumeBars_mc._width, 250);
		this.gotoAndStop(1);
		delete this.onMouseMove;
	}

	this.liveDelay_txt._visible = false;
	this.silenceSetter_mc._visible = false;
	this.gainSetter_mc._visible = false;
	this.bg_mc.gotoAndStop(2);
	this._visible = false;
}
AudioIndicatorClass.prototype.listenToSettings = function() {
	//gain can be set by the settings dialog
	this.gainSetter_mc._x = this.mic.gain*this.volumeBars_mc._width/100+this.volumeBars_mc._x;
}

AudioIndicatorClass.prototype.publish = function(mic, outNs, interval) {
	this._visible = true;
	this.bg_mc.gotoAndStop(1);
	this.outNs = outNs;
	this.mic = mic;
	this.mic.micActive = false;
	this.mic.onActivity = function(active) {
		// track if the mic is detecting silence
		this.micActive = active;
	}
	this.silenceSetter_mc._visible = true;
	this.gainSetter_mc._visible = true;
	this.micInterval = setInterval(this,"_micOnActivity", interval);
	this.gainSetter_mc._x = (this.mic.gain*this.volumeBars_mc._width/100)+this.volumeBars_mc._x;
	this.silenceSetter_mc._x = (this.mic.silenceLevel*this.volumeBars_mc._width/100)+this.volumeBars_mc._x;
}

AudioIndicatorClass.prototype.stopPublish = function() {
	this.onEnterFrame = null;
	clearInterval(this.micInterval);
	this._visible = false;
}

AudioIndicatorClass.prototype.receive = function(inNs)
{
	this._visible = true;
	this.bg_mc.gotoAndStop(2);
	this.inNs = inNs;
	this.inNs.mc = this;
	this.inNs.v = function(g) {
		this.mc.mask_mc._width = g * this.mc.volumeBars_mc._width / 100;
		this.mc.isSilence = (g == 0);
	}
	this.onEnterFrame = function() {
		this.liveDelay_txt.text = "LiveDelay: "+this.inNs.liveDelay;
		if (this.isSilence)
			this.light_mc.gotoAndStop(1);
		else if (this.inNs.liveDelay<0.75)
			this.light_mc.gotoAndStop(2);
		else
			this.light_mc.gotoAndStop(3);
	}
	if (this.showLiveDelay == "visible")
		this.liveDelay_txt._visible = true;

	if (this.receiverView == "light only") {
		this.mask_mc._visible = false
		this.bg_mc._visible = false;
		this.volumeBars_mc._visible = false;
		this.liveDelay_txt._x = this.bg_mc._x;
		this.liveDelay_txt._y = this.light_mc._y + 1;
	} else if (this.receiverView == "level only") {
		this.light_mc._visible = false;
		this.liveDelay_txt._x = this.bg_mc._x;
	}
}

AudioIndicatorClass.prototype.stopReceive = function() {
	this.onEnterFrame = null;
	this._visible = false;
}

AudioIndicatorClass.prototype._micOnActivity = function()
{
	var l = (this.mic.micActive) ? this.mic.activityLevel * this.volumeBars_mc._width / 100 : 1;
	this.light_mc.gotoAndStop((this.mic.micActive) ? 2 : 1);
	this.mask_mc._width= l;
	var g = (this.mic.micActive) ? this.mic.activityLevel : 0;
	this.outNs.send("v",g);
}

AudioIndicatorClass.prototype.setSize = function(w,h)
{

	this._xscale = 100;
	this._yscale = 100;

	if (this.direction == "Horizontal") {
		this.w = w;
		this.h = h;
	} else {
		this.w = h;
		this.h = w;
	}
	this.bg_mc._width = this.w-26;
	this.bg_mc._height = this.h-20.4;
	this.volumeBars_mc._width = this.w-26.2;
	this.volumeBars_mc._height = this.h - 20.6;
	this.mask_mc._width = this.w-26.2;
	this.mask_mc._height = this.h - 20.6;

	//this.gainSetter_mc._x = (this.mic.gain*this.volumeBars_mc._width/100);
	//this.gainSetter_mc._y = h - 9.4;
	this.silenceSetter_mc._x = (this.mic.silenceLevel*this.volumeBars_mc._width/100);

}
#endinitclip

this.setSize(this._width,this._height);
stop();
