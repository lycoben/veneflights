/* JQuery Curvy Corners by Mike Jolley - http://blue-anvil.com*/
jQuery.fn.corner = function(options) {
	
		var settings = {
		  tl: { radius: 8 },
		  tr: { radius: 8 },
		  bl: { radius: 8 },
		  br: { radius: 8 },
		  antiAlias: true,
		  autoPad: true,
		  validTags: ["div"] };
		if ( options && typeof(options) != 'string' )
			jQuery.extend(settings, options);

	return this.each(function() {
		new curvyObject(settings,this).applyCorners();
	});		
};
// Curvy corners
function curvyObject()
{
	this.box = arguments[1];
	this.settings = arguments[0];
	this.topContainer = null;
	this.bottomContainer = null;
	this.masterCorners = new Array();
	this.contentDIV = null;
	var boxHeight = jQuery(this.box).css("height");
	var boxWidth = jQuery(this.box).css("width");
	var borderWidth = jQuery(this.box).css("borderTopWidth");
	var bgImage = jQuery(this.box).css("backgroundImage");
	
	var boxPosition = jQuery(this.box).css("position");
	var boxPadding = jQuery(this.box).css("paddingTop");
	
	this.borderColour = format_colour(jQuery(this.box).css("borderTopColor")); 
	this.boxColour =  format_colour(jQuery(this.box).css("backgroundColor"));
	
	this.boxHeight = parseInt(((boxHeight != "" && boxHeight != "auto" && boxHeight.indexOf("%") == -1)? boxHeight.substring(0, boxHeight.indexOf("px")) : this.box.scrollHeight));
	this.boxWidth = parseInt(((boxWidth != "" && boxWidth != "auto" && boxWidth.indexOf("%") == -1)? boxWidth.substring(0, boxWidth.indexOf("px")) : this.box.scrollWidth));
	this.borderWidth	 = parseInt(((borderWidth != "" && borderWidth.indexOf("px") !== -1)? borderWidth.slice(0, borderWidth.indexOf("px")) : 0));
	this.boxPadding = parseInt(((boxPadding != "" && boxPadding.indexOf("px") !== -1)? boxPadding.slice(0, boxPadding.indexOf("px")) : 0));
 
	this.borderString = this.borderWidth + "px" + " solid " + this.borderColour;
	this.bgImage = ((bgImage != "none")? bgImage : "");
	
	// FIx safari
	if (this.bgImage=="initial") this.bgImage = "";
	
	this.boxContent = this.box.innerHTML;
	if(boxPosition != "absolute") jQuery(this.box).css("position","relative");
	jQuery(this.box).css("padding","0px !important");
	
	// Fix IE6 widths
	if((jQuery.browser.msie && jQuery.browser.version==6) && boxWidth == "auto" && boxHeight == "auto") jQuery(this.box).css("width","100%");
	
	if((jQuery.browser.msie)) {
			jQuery(this.box).css("zoom","1");
			jQuery(this.box +" *").css("zoom","normal");
	}
	
	if(this.settings.autoPad == true && this.boxPadding > 0)
	this.box.innerHTML = "";
	this.applyCorners = function()
	{
		for(var t = 0;
		t < 2;
		t++)
		{
			switch(t)
			
			{
				case 0:
				if(this.settings.tl || this.settings.tr)
				
				{
					var newMainContainer = document.createElement("DIV");
					var topMaxRadius = Math.max(this.settings.tl ? this.settings.tl.radius : 0, this.settings.tr ? this.settings.tr.radius : 0);
					
					jQuery(newMainContainer).css({ width:"100%", "font-size":"1px", overflow:"hidden", position:"absolute", "padding-left":this.borderWidth, "padding-right":this.borderWidth, height:topMaxRadius + "px",top:0 - topMaxRadius + "px",left:0 - this.borderWidth + "px"});
					
					
					
					this.topContainer = this.box.appendChild(newMainContainer);
					
				};
				
				break;
				case 1:
				if(this.settings.bl || this.settings.br)
				
				{
					var newMainContainer = document.createElement("DIV");
					var botMaxRadius = Math.max(this.settings.bl ? this.settings.bl.radius : 0, this.settings.br ? this.settings.br.radius : 0);
					
					jQuery(newMainContainer).css({ width:"100%", "font-size":"1px", overflow:"hidden", position:"absolute", "padding-left":this.borderWidth, "padding-right":this.borderWidth, height:botMaxRadius,bottom:0 - botMaxRadius + "px",left:0 - this.borderWidth + "px"});
					
					this.bottomContainer = this.box.appendChild(newMainContainer);
					
				};
				break;
			};
		};
		
		if(this.topContainer) jQuery(this.box).css("border-top",0);
		if(this.bottomContainer) jQuery(this.box).css("border-bottom",0);
		var corners = ["tr", "tl", "br", "bl"];
		for(var i in corners)
		{
			if(i > -1 < 4)
			{
				var cc = corners[i];
				if(!this.settings[cc])
				{
					if(((cc == "tr" || cc == "tl") && this.topContainer != null) || ((cc == "br" || cc == "bl") && this.bottomContainer != null))
					  {
						var newCorner = document.createElement("DIV");
						jQuery(newCorner).css({position:"relative","font-size":"1px", overflow:"hidden"});
						
						if(this.bgImage == "")
							jQuery(newCorner).css("backgroundColor",this.boxColour);
						else
							jQuery(newCorner).css("backgroundImage",this.bgImage);
						
						switch(cc)
						{
							case "tl":
							jQuery(newCorner).css({height:topMaxRadius - this.borderWidth,"margin-right":this.settings.tr.radius - (this.borderWidth*2), "border-left":this.borderString,"border-top":this.borderString,left:-this.borderWidth + "px"});
							break;
							case "tr":
							jQuery(newCorner).css({height:topMaxRadius - this.borderWidth,"margin-left":this.settings.tl.radius - (this.borderWidth*2), "border-right":this.borderString,"border-top":this.borderString,left:this.borderWidth + "px", "background-position":"-" + (topMaxRadius + this.borderWidth) + "px 0px"});
							break;
							case "bl":
							jQuery(newCorner).css({height:botMaxRadius - this.borderWidth,"margin-right":this.settings.br.radius - (this.borderWidth*2), "border-left":this.borderString,"border-bottom":this.borderString,left:-this.borderWidth + "px", "background-position":"-" + (this.borderWidth) + "px -" + (this.boxHeight + (botMaxRadius + this.borderWidth) ) + "px" });
							break;
							case "br":
							jQuery(newCorner).css({height:botMaxRadius - this.borderWidth,"margin-left":this.settings.bl.radius - (this.borderWidth*2), "border-right":this.borderString,"border-bottom":this.borderString,left:this.borderWidth + "px", "background-position":"-" + (botMaxRadius + this.borderWidth) + "px -" + (this.boxHeight + (botMaxRadius + this.borderWidth) )+ "px" });
							break;
						};
					};
				}
				else
				{
					if(this.masterCorners[this.settings[cc].radius])
					{
						var newCorner = this.masterCorners[this.settings[cc].radius].cloneNode(true);
					}
					else
					{
						var newCorner = document.createElement("DIV");
						jQuery(newCorner).css({	height:this.settings[cc].radius,width:this.settings[cc].radius,position:"absolute","font-size":"1px",overflow:"hidden"	});
						var borderRadius = parseInt(this.settings[cc].radius - this.borderWidth);
						for(var intx = 0, j = this.settings[cc].radius;
						intx < j;
						intx++)
						{
							if((intx +1) >= borderRadius)
							var y1 = -1;
							else
							var y1 = (Math.floor(Math.sqrt(Math.pow(borderRadius, 2) - Math.pow((intx+1), 2))) - 1);
							if(borderRadius != j)
							{
								if((intx) >= borderRadius)
								var y2 = -1;
								else
								var y2 = Math.ceil(Math.sqrt(Math.pow(borderRadius,2) - Math.pow(intx, 2)));
								if((intx+1) >= j)
								var y3 = -1;
								else
								var y3 = (Math.floor(Math.sqrt(Math.pow(j ,2) - Math.pow((intx+1), 2))) - 1);
							};
							if((intx) >= j)
							var y4 = -1;
							else
							var y4 = Math.ceil(Math.sqrt(Math.pow(j ,2) - Math.pow(intx, 2)));
							if(y1 > -1) this.drawPixel(intx, 0, this.boxColour, 100, (y1+1), newCorner, -1, this.settings[cc].radius);
							if(borderRadius != j)
							{
								for(var inty = (y1 + 1);
								inty < y2;
								inty++)
								
								{
									if(this.settings.antiAlias)
									
									{
										if(this.bgImage != "")
										
										{
											var borderFract = (pixelFraction(intx, inty, borderRadius) * 100);
											if(borderFract < 30)
											{
												this.drawPixel(intx, inty, this.borderColour, 100, 1, newCorner, 0, this.settings[cc].radius);
											}
											else
											{
												this.drawPixel(intx, inty, this.borderColour, 100, 1, newCorner, -1, this.settings[cc].radius);
											};
										}
										
										else
										
										{
											var pixelcolour = BlendColour(this.boxColour, this.borderColour, pixelFraction(intx, inty, borderRadius));
											this.drawPixel(intx, inty, pixelcolour, 100, 1, newCorner, 0, this.settings[cc].radius, cc);
											
										};
										
										
									};
									
									
								};
								
								if(this.settings.antiAlias)
								
								{
									if(y3 >= y2)
									
									{
										if (y2 == -1) y2 = 0;
										this.drawPixel(intx, y2, this.borderColour, 100, (y3 - y2 + 1), newCorner, 0, 0);
										
									};
									
									
								}
								
								else
								
								{
									if(y3 >= y1)
									
									{
										this.drawPixel(intx, (y1 + 1), this.borderColour, 100, (y3 - y1), newCorner, 0, 0);
										
									};
									
									
								};
								
								var outsideColour = this.borderColour;
								
							}
							
							else
							
							{
								var outsideColour = this.boxColour;
								var y3 = y1;
								
							};
							
							if(this.settings.antiAlias)
							
							{
								for(var inty = (y3 + 1);
								inty < y4;
								inty++)
								
								{
									
									this.drawPixel(intx, inty, outsideColour, (pixelFraction(intx, inty , j) * 100), 1, newCorner, ((this.borderWidth > 0)? 0 : -1), this.settings[cc].radius);
									
								};
								
								
							};
							
							
						};
						
						this.masterCorners[this.settings[cc].radius] = newCorner.cloneNode(true);
						
					};
					
					if(cc != "br")
					
					{
						for(var t = 0, k = newCorner.childNodes.length;
						t < k;
						t++)
						
						{
							var pixelBar = newCorner.childNodes[t];
							var pixelBarTop = parseInt(pixelBar.style.top.substring(0, pixelBar.style.top.indexOf("px")));
							var pixelBarLeft = parseInt(pixelBar.style.left.substring(0, pixelBar.style.left.indexOf("px")));
							var pixelBarHeight = parseInt(pixelBar.style.height.substring(0, pixelBar.style.height.indexOf("px")));
							if(cc == "tl" || cc == "bl")
							{
								jQuery(pixelBar).css("left",this.settings[cc].radius -pixelBarLeft -1 + "px");
							};
							
							if(cc == "tr" || cc == "tl")
							{
								jQuery(pixelBar).css("top", this.settings[cc].radius -pixelBarHeight -pixelBarTop + "px");
							};
							
							switch(cc)
							{
								case "tr":
								jQuery(pixelBar).css("background-position","-" + Math.abs((this.boxWidth - this.settings[cc].radius + this.borderWidth) + pixelBarLeft) + "px -" + Math.abs(this.settings[cc].radius -pixelBarHeight -pixelBarTop - this.borderWidth) + "px");
								break;
								case "tl":
								jQuery(pixelBar).css("background-position","-" + Math.abs((this.settings[cc].radius -pixelBarLeft -1) - this.borderWidth) + "px -" + Math.abs(this.settings[cc].radius -pixelBarHeight -pixelBarTop - this.borderWidth) + "px");
								break;
								case "bl":
								jQuery(pixelBar).css("background-position","-" + Math.abs((this.settings[cc].radius -pixelBarLeft -1) - this.borderWidth) + "px -" + Math.abs((this.boxHeight + this.settings[cc].radius + pixelBarTop) -this.borderWidth) + "px");
								break;
								
							};
							
							
						};
						
						
					};
					
					
				};
				
				if(newCorner)
				
				{
					switch(cc)
					
					{
						case "tl":
						if(jQuery(newCorner).css("position") == "absolute") jQuery(newCorner).css("top","0");
						if(jQuery(newCorner).css("position") == "absolute") jQuery(newCorner).css("left","0");
						if(this.topContainer) this.topContainer.appendChild(newCorner);
						break;
						case "tr":
						if(jQuery(newCorner).css("position") == "absolute") jQuery(newCorner).css("top","0");
						if(jQuery(newCorner).css("position") == "absolute") jQuery(newCorner).css("right","0");
						if(this.topContainer) this.topContainer.appendChild(newCorner);
						break;
						case "bl":
						if(jQuery(newCorner).css("position") == "absolute") jQuery(newCorner).css("bottom","0");
						if(newCorner.style.position == "absolute") jQuery(newCorner).css("left","0");
						if(this.bottomContainer) this.bottomContainer.appendChild(newCorner);
						break;
						case "br":
						if(jQuery(newCorner).css("position") == "absolute") jQuery(newCorner).css("bottom","0");
						if(jQuery(newCorner).css("position") == "absolute") jQuery(newCorner).css("right","0");
						if(this.bottomContainer) this.bottomContainer.appendChild(newCorner);
						break;
						
					};
					
					
				};
				
				
			};
			
			
		};
		
		var radiusDiff = new Array();
		radiusDiff["t"] = Math.abs(this.settings.tl.radius - this.settings.tr.radius);
		radiusDiff["b"] = Math.abs(this.settings.bl.radius - this.settings.br.radius);
		for(z in radiusDiff)
		
		{
			if(z == "t" || z == "b")
			
			{
				if(radiusDiff[z])
				
				{
					var smallerCornerType = ((this.settings[z + "l"].radius < this.settings[z + "r"].radius)? z +"l" : z +"r");
					var newFiller = document.createElement("DIV");
					
					jQuery(newFiller).css({	height:radiusDiff[z],width:this.settings[smallerCornerType].radius+ "px",position:"absolute","font-size":"1px",overflow:"hidden","background-color":this.boxColour	});
					
					switch(smallerCornerType)
					
					{
						case "tl":
						jQuery(newFiller).css({	bottom:"0px",left:"0px","border-right":this.borderString	});
						this.topContainer.appendChild(newFiller);
						break;
						case "tr":
						jQuery(newFiller).css({	bottom:"0px",right:"0px","border-right":this.borderString	});
						this.topContainer.appendChild(newFiller);
						break;
						case "bl":
						jQuery(newFiller).css({	top:"0px",left:"0px","border-left":this.borderString	});
						this.bottomContainer.appendChild(newFiller);
						break;
						case "br":
						jQuery(newFiller).css({	bottom:"0px",right:"0px","border-right":this.borderString	});
						this.bottomContainer.appendChild(newFiller);
						break;
					};
				};
				
				var newFillerBar = document.createElement("DIV");
				jQuery(newFillerBar).css({	position:"relative","font-size":"1px",overflow:"hidden","background-color":this.boxColour,"background-image":this.bgImage	});
				switch(z)
				
				{
					case "t":
					if(this.topContainer)
					
					{
						if(this.settings.tl.radius && this.settings.tr.radius)
						
						{
							jQuery(newFillerBar).css({	height:topMaxRadius - this.borderWidth,"margin-left":this.settings.tl.radius - this.borderWidth,"margin-right":this.settings.tr.radius - this.borderWidth,"border-top":this.borderString	});
							this.topContainer.appendChild(newFillerBar);
						
							if(this.bgImage != "")
							jQuery(newFillerBar).css("background-position","-" + (topMaxRadius + this.borderWidth) + "px 0px");
							
							
							
							this.topContainer.appendChild(newFillerBar);
							
						};
						
						jQuery(this.box).css("background-position","0px -" + (topMaxRadius - this.borderWidth) + "px");
						
					};
					
					break;
					case "b":
					if(this.bottomContainer)
					
					{
						if(this.settings.bl.radius && this.settings.br.radius)
						
						{
							jQuery(newFillerBar).css({	height:botMaxRadius - this.borderWidth + "px","margin-left":this.settings.bl.radius - this.borderWidth,"margin-right":this.settings.br.radius - this.borderWidth,"border-bottom":this.borderString	});
						this.bottomContainer.appendChild(newFillerBar);
						
							if(this.bgImage != "")
							jQuery(newFillerBar).css("background-position","-" + (botMaxRadius + this.borderWidth) + "px -" + (this.boxHeight + (topMaxRadius + this.borderWidth)) + "px");
							this.bottomContainer.appendChild(newFillerBar);
							
						};
						
						
					};
					
					break;
					
				};
				
				
			};
			
			
		};
		
		if(this.settings.autoPad == true && this.boxPadding > 0)
		
		{
			var contentContainer = document.createElement("DIV");
			jQuery(contentContainer).css("position","relative");
			contentContainer.innerHTML = this.boxContent;
			jQuery(contentContainer).addClass = "autoPadDiv";
			var topPadding = Math.abs(topMaxRadius - this.boxPadding);
			var botPadding = Math.abs(botMaxRadius - this.boxPadding);
			if(topMaxRadius < this.boxPadding)
			jQuery(contentContainer).css("padding-top",topPadding);
			if(botMaxRadius < this.boxPadding)
			jQuery(contentContainer).css("padding-bottom",botMaxRadius);
			
			jQuery(contentContainer).css({"padding-left":this.boxPadding,	"padding-right":this.boxPadding });
			this.contentDIV = this.box.appendChild(contentContainer);
			
		};

	};
	
	this.drawPixel = function(intx, inty, colour, transAmount, height, newCorner, image, cornerRadius)
	
	{
		var pixel = document.createElement("DIV");
		jQuery(pixel).css({	height:height,width:"1px",position:"absolute","font-size":"1px",overflow:"hidden"	});
		
		var topMaxRadius = Math.max(this.settings["tr"].radius, this.settings["tl"].radius);
		// Dont apply background image to border pixels
		if(image == -1 && this.bgImage != "")
		
		{
			jQuery(pixel).css({
						 "background-image":this.bgImage,
						 "background-position":((this.boxWidth - (cornerRadius - intx) + this.borderWidth)*-1) + "px " + (((this.boxHeight + topMaxRadius + inty) -this.borderWidth)*-1) + "px"
						 });
		}
		else
		{
			jQuery(pixel).css("background-color",colour);
		};
		
		if (transAmount != 100)
		setOpacity(pixel, transAmount);
		jQuery(pixel).css({top:inty + "px",left:intx + "px"});
		newCorner.appendChild(pixel);
		
	};
	
	
};



function BlendColour(Col1, Col2, Col1Fraction)

{
	var red1 = parseInt(Col1.substr(1,2),16);
	var green1 = parseInt(Col1.substr(3,2),16);
	var blue1 = parseInt(Col1.substr(5,2),16);
	var red2 = parseInt(Col2.substr(1,2),16);
	var green2 = parseInt(Col2.substr(3,2),16);
	var blue2 = parseInt(Col2.substr(5,2),16);
	if(Col1Fraction > 1 || Col1Fraction < 0) Col1Fraction = 1;
	var endRed = Math.round((red1 * Col1Fraction) + (red2 * (1 - Col1Fraction)));
	if(endRed > 255) endRed = 255;
	if(endRed < 0) endRed = 0;
	var endGreen = Math.round((green1 * Col1Fraction) + (green2 * (1 - Col1Fraction)));
	if(endGreen > 255) endGreen = 255;
	if(endGreen < 0) endGreen = 0;
	var endBlue = Math.round((blue1 * Col1Fraction) + (blue2 * (1 - Col1Fraction)));
	if(endBlue > 255) endBlue = 255;
	if(endBlue < 0) endBlue = 0;
	return "#" + IntToHex(endRed)+ IntToHex(endGreen)+ IntToHex(endBlue);
	
};
function IntToHex(strNum)
{
	base = strNum / 16;
	rem = strNum % 16;
	base = base - (rem / 16);
	baseS = MakeHex(base);
	remS = MakeHex(rem);
	return baseS + '' + remS;
	
};
function MakeHex(x)
{
	if((x >= 0) && (x <= 9))
	{
		return x; 
	}
	else
	{
		switch(x)
		{
			case 10: return "A";
			case 11: return "B";
			case 12: return "C";
			case 13: return "D";
			case 14: return "E";
			case 15: return "F";
		};
	};
};

function pixelFraction(x, y, r)
{
	var pixelfraction = 0;
	var xvalues = new Array(1);
	var yvalues = new Array(1);
	var point = 0;
	var whatsides = "";
	var intersect = Math.sqrt((Math.pow(r,2) - Math.pow(x,2)));
	if ((intersect >= y) && (intersect < (y+1)))
	
	{
		whatsides = "Left";
		xvalues[point] = 0;
		yvalues[point] = intersect - y;
		point = point + 1;
		
	};
	
	var intersect = Math.sqrt((Math.pow(r,2) - Math.pow(y+1,2)));
	if ((intersect >= x) && (intersect < (x+1)))
	
	{
		whatsides = whatsides + "Top";
		xvalues[point] = intersect - x;
		yvalues[point] = 1;
		point = point + 1;
		
	};
	
	var intersect = Math.sqrt((Math.pow(r,2) - Math.pow(x+1,2)));
	if ((intersect >= y) && (intersect < (y+1)))
	
	{
		whatsides = whatsides + "Right";
		xvalues[point] = 1;
		yvalues[point] = intersect - y;
		point = point + 1;
		
	};
	
	var intersect = Math.sqrt((Math.pow(r,2) - Math.pow(y,2)));
	if ((intersect >= x) && (intersect < (x+1)))
	
	{
		whatsides = whatsides + "Bottom";
		xvalues[point] = intersect - x;
		yvalues[point] = 0;
		
	};
	
	switch (whatsides)
	
	{
		case "LeftRight":
		pixelfraction = Math.min(yvalues[0],yvalues[1]) + ((Math.max(yvalues[0],yvalues[1]) - Math.min(yvalues[0],yvalues[1]))/2);
		break;
		case "TopRight":
		pixelfraction = 1-(((1-xvalues[0])*(1-yvalues[1]))/2);
		break;
		case "TopBottom":
		pixelfraction = Math.min(xvalues[0],xvalues[1]) + ((Math.max(xvalues[0],xvalues[1]) - Math.min(xvalues[0],xvalues[1]))/2);
		break;
		case "LeftBottom":
		pixelfraction = (yvalues[0]*xvalues[1])/2;
		break;
		default:
		pixelfraction = 1;
		
	};
	
	return pixelfraction;
	
};

function rgb2Hex(rgbColour)
{
	try
	{
		var rgbArray = rgb2Array(rgbColour);
		var red = parseInt(rgbArray[0]);
		var green = parseInt(rgbArray[1]);
		var blue = parseInt(rgbArray[2]);
		var hexColour = "#" + IntToHex(red) + IntToHex(green) + IntToHex(blue);
	}
	catch(e)
	{
		alert("There was an error converting the RGB value to Hexadecimal in function rgb2Hex");
		
	};
	return hexColour;
};
function rgb2Array(rgbColour)

{
	var rgbValues = rgbColour.substring(4, rgbColour.indexOf(")"));
	var rgbArray = rgbValues.split(", ");
	return rgbArray;
};
function setOpacity(obj, opacity) {
  
	  opacity = (opacity == 100)?99.999:opacity;

	  if(jQuery.browser.safari && obj.tagName != "IFRAME")
	  {
		  // Get array of RGB values
		  var rgbArray = rgb2Array(obj.style.backgroundColor);

		  // Get RGB values
		  var red   = parseInt(rgbArray[0]);
		  var green = parseInt(rgbArray[1]);
		  var blue  = parseInt(rgbArray[2]);

		  // Safari using RGBA support
		  obj.style.backgroundColor = "rgba(" + red + ", " + green + ", " + blue + ", " + opacity/100 + ")";
	  }
	  else if(typeof(obj.style.opacity) != "undefined")
	  {
		  // W3C
		  obj.style.opacity = opacity/100;
	  }
	  else if(typeof(obj.style.MozOpacity) != "undefined")
	  {
		  // Older Mozilla
		  obj.style.MozOpacity = opacity/100;
	  }
	  else if(typeof(obj.style.filter) != "undefined")
	  {
		  // IE
		  obj.style.filter = "alpha(opacity:" + opacity + ")";
	  }
	  else if(typeof(obj.style.KHTMLOpacity) != "undefined")
	  {
		  // Older KHTML Based Browsers
		  obj.style.KHTMLOpacity = opacity/100;
	  }
  
};
function format_colour(colour)

{
	var returnColour = "#ffffff";
	if(colour != "" && colour != "transparent")
	{
		if(colour.substr(0, 3) == "rgb")
		{
			returnColour = rgb2Hex(colour);
		}
		else if(colour.length == 4)
		{
			returnColour = "#" + colour.substring(1, 2) + colour.substring(1, 2) + colour.substring(2, 3) + colour.substring(2, 3) + colour.substring(3, 4) + colour.substring(3, 4);
		}
		else
		{
			returnColour = colour;
		};
	};
	return returnColour;
	
};
